<?php
session_start();
/**
 * @author Balaji
 * @name: Rainbow PHP Framework
 * @copyright 2021 ProThemes.Biz
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

$sql = "CREATE TABLE `ddos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `ip` varchar(200) DEFAULT NULL,
  `data` blob,
  `banned` int(11) DEFAULT NULL,
  `date` date DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8";

if (mysqli_query($con,$sql)) {
    //Success

    $siteInfo =  mysqli_query($con, "SELECT other_settings FROM site_info where id=1");
    $siteInfoRow = mysqli_fetch_assoc($siteInfo);
    $other = dbStrToArr($siteInfoRow['other_settings']);
    $other['other']['ddos'] = true;
    $other['other']['ddosLimit'] = 15;
    $other_settings = arrToDbStr($con,$other);
    mysqli_query($con, "UPDATE site_info SET other_settings='$other_settings' WHERE id=1");

    define('ADMIN_DIR', ROOT_DIR.ADMIN_DIR_NAME.DIRECTORY_SEPARATOR);
    define('ADMIN_CON_DIR', ADMIN_DIR.'controllers'.DIRECTORY_SEPARATOR);

    $adminPanelLinks =
       '
       $menuBarLinks[\'18A\'] = array(true, \'Database Editor\',\'exploder/db-editor.php\',\'fa fa-database\');
       ';
    putMyData(ADMIN_CON_DIR.'links.php', $adminPanelLinks, FILE_APPEND);

    unlink('upgrade.php');

    echo "<br> <b>Upgrade Completed!</b> <br>";
    echo '<meta http-equiv="refresh" content="1;url=index.php">';

} else {
    //Error
    echo "Error creating query: " . mysqli_error($con)."<br>";
}