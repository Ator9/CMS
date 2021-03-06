<?php
/**
 * Webhook Bitbucket / GitHub
 *
 *
 * Usage:
 * $params = [
 *     'git_dir'  => '/var/www/'.$_SERVER['HTTP_HOST'].'/private',
 *     'work_dir' => '/var/www/'.$_SERVER['HTTP_HOST'].'/web'
 *  ];
 * $webhook = new Webhook($params);
 * $webhook->run();
 *
 *
 * Repo Config:
 *     git remote add origin git@bitbucket.org:username/project.git
 *     sudo chown -R user:group .
 *     sudo -u user ssh-keygen
 *     sudo -u user git --work-tree=/var/www/domain/web --git-dir=/var/www/domain/private pull origin master
 *
 */
class Webhook
{
    private $git_dir  = ''; // /var/www/sitedir/private
    private $work_dir = ''; // /var/www/sitedir/web
    // private whitelisted_ips = [ '131.103.20.04' ];


    // ------------------------------------------------------------------------------- //


    /**
     * Construct - Set config
     */
    public function __construct($params = [])
    {
        foreach($params as $key => $value)
        {
            if(isset($this->$key)) $this->$key = $value;
        }
    }


    public function run()
    {
        if($this->git_dir == '' || $this->work_dir == '') exit('Invalid dir config');

        echo 'Starting Git Sync...<br><br>';
        echo 'Current User: '.exec('whoami').'<br>';
        echo 'Current Path: '.exec('pwd').'<br><br>';
        
        echo $command = 'git --work-tree='.$this->work_dir.' --git-dir='.$this->git_dir.' checkout -f';
        exec($command." 2>&1", $output);
        vd($output);

        echo $command = 'git --work-tree='.$this->work_dir.' --git-dir='.$this->git_dir.' pull origin master';
        exec($command." 2>&1", $output);
        vd($output);
    }
}
