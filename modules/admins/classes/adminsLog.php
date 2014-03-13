<?php
class adminsLog extends ConnExtjs
{
	public $_table	= 'admins_logs';
	public $_index	= 'logID';
	public $_fields	= array('adminID',
	                        'classname',
	                        'task',
							'comment',
							'ip',
							'date_created',    // (Reserved) Automatic usage on insert (Conn.php)
							'date_updated');   // (Reserved) Automatic usage on update (Conn.php)


	// ------------------------------------------------------------------------------- //


    // Grid List:
    public function extGrid()
    {
        $sql = 'SELECT t1.*, t2.username
                FROM '.$this->_table.' AS t1
                LEFT JOIN admins AS t2 USING (adminID)
                WHERE 1';

        return parent::extGrid($sql);
    }
    

    // Log:
    public function log($data=array())
    {
        $this->adminID   = ($data['adminID']) ? $data['adminID'] : $GLOBALS['admin']['data']['adminID'];
        $this->classname = $data['classname'];
        $this->task      = $data['task'];
        $this->comment   = $data['comment'];
        $this->ip        = $_SERVER['REMOTE_ADDR'];

        return parent::insert();
    }
}
