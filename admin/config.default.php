<?
/* Create "config.php" & change */

// Title:
$GLOBALS['admin']['title'] = 'UX CMS';

// DOCTYPE
// http://www.sencha.com/forum/showthread.php?137309-Summary-of-lt-!DOCTYPE-gt-Recommendations
// IE6/7 support: <!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
$GLOBALS['admin']['doctype'] = '<!DOCTYPE html>';

// languages (Default first position):
$GLOBALS['admin']['locale'] = array('es'=>'Español', 'en'=>'English');

// Default module: 
$GLOBALS['admin']['default_module'] = 0;

// Buttons tree footer (2 max): 
$GLOBALS['admin']['fbar_buttons'][] = array('url' => HOST, 'text' => 'Home Page');
?>
