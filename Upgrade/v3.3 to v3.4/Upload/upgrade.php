<?php
session_start();
/**
 * @author Balaji
 * @name: Rainbow PHP Framework
 * @copyright 2022 ProThemes.Biz
 *
 */
//Application Path
define('ROOT_DIR', realpath(dirname(__FILE__)) .DIRECTORY_SEPARATOR);
define('APP_DIR', ROOT_DIR .'core'.DIRECTORY_SEPARATOR);
define('CONFIG_DIR', APP_DIR .'config'.DIRECTORY_SEPARATOR);

//Load Configuration & Functions
require CONFIG_DIR.'config.php';
require APP_DIR.'functions.php';

//Database Connection
$con = dbConncet($dbHost,$dbUser,$dbPass,$dbName);

importMySQLdb($con, ROOT_DIR.'db.sql');

define('ADMIN_DIR', ROOT_DIR.ADMIN_DIR_NAME.DIRECTORY_SEPARATOR);
define('ADMIN_CON_DIR', ADMIN_DIR.'controllers'.DIRECTORY_SEPARATOR);

$adminPanelLinks = '
$menuBarLinks[\'11A\'] = array(true, \'Homepage Categories\',\'category\',\'fa fa-database\');
';

putMyData(ADMIN_CON_DIR.'links.php', $adminPanelLinks, FILE_APPEND);

unlink('upgrade.php');
unlink('db.sql');

echo "<br> <b>Upgrade Completed!</b> <br>";
echo '<meta http-equiv="refresh" content="1;url=index.php">';