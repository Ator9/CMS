<?
class Conn extends mysqli
{
	public $_table	= 'table';
	public $_index	= 'table_primary';
	public $_fields	= array();

	protected $_dependantClasses = array(); // delete childrens
	
	public $_debug  = false;


	// ------------------------------------------------------------------------------- //


	function __construct($host=DB_HOST, $user=DB_USER, $pass=DB_PASS, $db=DB_NAME)
	{
		parent::__construct($host, $user, $pass, $db);
		if(mysqli_connect_errno()) throw new Exception(mysqli_connect_error());
		if(!parent::set_charset('utf8')) throw new Exception(mysqli_error($this));
		
		array_push($this->_fields, $this->_index); // adds index to fields list
	}


	// mysqli_query returns FALSE on failure.
	// For successful SELECT, SHOW, DESCRIBE or EXPLAIN queries mysqli_query() will return a result object.
	// For other successful queries mysqli_query() will return TRUE.
	public function query($sql)
	{
		if($this->_debug) echo $sql;
		if($result = parent::query($sql)) return $result;
	    if(mysqli_errno($this))	throw new Exception(mysqli_error($this).' '.$sql);
	}


	// Returns NULL if there are no more rows in resultset.
	public function get($indexID)
	{
		$sql = 'SELECT * FROM '.$this->_table.' WHERE '.$this->_index.' = "'.$this->escape($indexID).'" LIMIT 1';
		if(($rs = $this->query($sql)) && $rs->num_rows == 1)
		{
		    $this->set($rs->fetch_assoc());
		    return true;
		}
		return false;
	}


	// Returns NULL if there are no more rows in resultset.
	public function getBy($field, $value)
	{
		if(in_array($field, $this->_fields))
		{
			$sql = 'SELECT * FROM '.$this->_table.' WHERE '.$field.' = "'.$this->escape($value).'" LIMIT 1';
			if(($rs = $this->query($sql)) && $rs->num_rows == 1)
			{
			    $this->set($rs->fetch_assoc());
			    return true;
			}
		}
		return false;
	}
	

    public function getList($sql='', $limit=0, $links=0)
	{
		if($sql=='') $sql = 'SELECT t1.* FROM '.$this->_table.' AS t1';
		if($limit > 0)
		{
			$rs  		= $this->query(queryModificator($sql, array('SELECT' => 'COUNT(*)')));
    		list($cant) = $rs->fetch_row();
    		$paginator  = new Paginator($limit, $links, $cant);

    		$data = $this->query($sql.$paginator->sql);
    		$data->paginator = $paginator;

    		return $data;
		}

		return $this->query($sql);
	}


	public function save()
	{
        if($this->getID()) return $this->update();
        return $this->insert();
	}


	public function insert()
	{
		foreach($this->_fields as $field)
		{
			$arr[$field] = '"'.$this->escape($this->$field).'"';
		}

		if(in_array('date_created', $this->_fields)) $arr['date_created'] = 'NOW()';
		if(in_array('adminID_created', $this->_fields))
		{
			global $aSession;
			if(is_object($aSession)) $arr['adminID_created'] = '"'.$aSession->get('adminID').'"';
		}

		$sql = 'INSERT IGNORE INTO '.$this->_table.' ('.implode(',', array_keys($arr)).') VALUES ('.implode(',', $arr).')';
		if($this->query($sql))
		{
		    $this->setID($this->insert_id);
		    return true;
		}
		return false;
	}


	public function update()
	{
		foreach($this->_fields as $field)
		{
			$arr[$field] = $field.' = "'.$this->escape($this->$field).'"';
		}
        unset($arr['date_updated']);

		if(in_array('adminID_updated', $this->_fields))
		{
			global $aSession;
			if(is_object($aSession)) $arr['adminID_updated'] = 'adminID_updated = "'.$aSession->get('adminID').'"';
		}

		$sql = 'UPDATE IGNORE '.$this->_table.' SET '.implode(', ', $arr).' WHERE '. $this->_index.' = "'.$this->getID().'"';
		return $this->query($sql);
	}


	public function delete()
	{
		foreach($this->_dependantClasses as $className)
		{
			$db = new $className();
			$rs = $db->getList(array('WHERE' => $this->_index.' = "'.$this->getID().'"'));
			while($row = $rs->fetch_assoc())
			{
			    if($db->get($row[$db->_index])) $db->delete();
			}
		}

		$sql = 'DELETE FROM '.$this->_table.' WHERE '.$this->_index.' = "'.$this->escape($this->getID()).'"';
		return $this->query($sql);
	}


	public function set($data=array())
    {
        foreach($this->_fields as $field)
        {
            $this->$field = isset($data[$field]) ? $data[$field] : $this->$field;
        }
    }


	public function escape($str)
    {
        if(get_magic_quotes_gpc()) $str = stripslashes($str);
        $str = trim($str);
        return parent::real_escape_string($str);
    }


	// Extra -------------------------------------------------------------------------------------------------- //


    public function getID()
    {
        return $this->{$this->_index};
    }


    public function setID($id)
    {
        $this->{$this->_index} = $id;
    }


    public function getCount()
	{
		$sql = 'SELECT COUNT(*) FROM '.$this->_table;

		$rs  	 = $this->query($sql);
    	list($c) = $rs->fetch_row();

    	return $c;
	}


	// Verifico si el campo está disponible (email / username UNIQUE):
	public function isAvailable($field, $value)
	{
		if(in_array($field, $this->_fields))
		{
			$sql = 'SELECT '.$field.' FROM '.$this->_table.' WHERE '.$field.' = "'.$this->escape($value).'" LIMIT 1';

			if($rs = $this->query($sql))
			{
				if($rs->num_rows == 0) return true;
			}
		}
		return false;
	}


    // get next/prev indexID
	public function getPrevNext($indexID)
	{
		$sql = 'SELECT
					( SELECT '.$this->_index.' FROM '.$this->_table.' WHERE '.$this->_index.' < "'.$this->escape($indexID).'" ORDER BY '.$this->_index.' DESC LIMIT 1 ) AS prev,
					( SELECT '.$this->_index.' FROM '.$this->_table.' WHERE '.$this->_index.' > "'.$this->escape($indexID).'" ORDER BY '.$this->_index.' ASC LIMIT 1 ) AS next
					FROM '.$this->_table.' WHERE '.$this->_index.' = "'.$this->escape($indexID).'" LIMIT 1';
		if($rs = $this->query($sql)) return $rs->fetch_assoc();
		return false;
	}


	public function getAutoincrement($db=DB_NAME)
	{
		$sql = 'SELECT Auto_increment FROM information_schema.tables WHERE table_schema = "'.$db.'" AND table_name = "'.$this->_table.'"';

		$rs  	 = $this->query($sql);
    	list($c) = $rs->fetch_row();

    	return $c;
	}


	public function isTable($table)
	{
		$rs = $this->query('SHOW tables LIKE "'.$table.'"');
		if($rs->num_rows == 1) return true;
		return false;
	}
}
?>
