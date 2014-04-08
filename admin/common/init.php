<?php
require(dirname(__FILE__).'/../../includes/init.php');

if(file_exists(dirname(__FILE__).'/../config.php')) require(dirname(__FILE__).'/../config.php');
else require(dirname(__FILE__).'/../config.default.php');

// Admin Session:
$aSession = new Session('admin');

// Login check:
if($aSession->exists('adminData'))
{
    // Stores all admin data glabally:
    $GLOBALS['admin']['data'] = $aSession->get('adminData');

    // Stores accounts data glabally:
    $accountsDB = new adminsAccountsAdmins;
    $GLOBALS['admin']['data']['accounts'] = $accountsDB->getAccountsByAdmin();
}
elseif(basename($_SERVER['PHP_SELF']) != 'login.php')
{
    header('Location: '.ADMIN.'/login.php');
    exit;
}

// Admin Log:
$log = new adminsLog;

// Admin Lang:
$lang = new Lang;

// Ajax class loader:
if(isset($_GET['_class']) && basename($_SERVER['PHP_SELF']) != 'login.php')
{
    $obj = new $_GET['_class'];
    if(isset($_GET['_method'])) $obj->$_GET['_method']();
    exit;
}

// http://code.google.com/speed/page-speed/docs/rendering.html#SpecifyCharsetEarly
header('Content-type: text/html; charset=UTF-8');


