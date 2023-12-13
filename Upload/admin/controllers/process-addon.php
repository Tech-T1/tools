<?php
defined('APP_NAME') or die(header('HTTP/1.1 403 Forbidden'));

/*
* @author Balaji
* @name: Rainbow PHP Framework
* @copyright 2023 ProThemes.Biz
*
*/

if(!function_exists('recurse_copy')){
    function recurse_copy($src,$dst) {
        if(!(is_dir($src)))
            return false;
        $dir = opendir($src);
        @mkdir($dst);
        while(false !== ( $file = readdir($dir)) ) {
            if (( $file != '.' ) && ( $file != '..' )) {
                if ( is_dir($src . D_S . $file) ) {
                    recurse_copy($src . D_S . $file,$dst . D_S . $file);
                }
                else {
                    if(!copy($src . D_S . $file,$dst . D_S . $file)){
                        $GLOBALS['addonRes'] .= "Copy Failed: ".$dst . D_S . $file.' <br>';
                        $GLOBALS['addonError'] = true;
                        $GLOBALS['errType'] = 2;
                    }
                }
            }
        }
        closedir($dir);
    }
}

$activeTheme = getTheme($con);

$pageTitle = "Manage Addons";
$subTitle = "Install Add-on";
$fullLayout = 1; $footerAdd = false;

if(isset($_POST['addon'])) {

    //Enter addon filename
    $addonFileName = raino_trim($_POST['addon']);

    //Addon Uploaded Path
    $target_dir = ADMIN_DIR . 'addons' . D_S;

    //Package File Path
    $file_path = $target_dir . $addonFileName;

    if (file_exists($file_path)) {

        //Temporarily extract Addons Data
        $addon_path = ADMIN_DIR . "addons/" . "ad_" . rand(1000, 999999);
        extractZip($file_path, $addon_path);

        //Check Addons Installer is exists
        if (file_exists($addon_path . "/atozseov3.tdata")) {
            if (file_exists($addon_path . "/install.php")) {
                //Found - Process Installer
                require_once($addon_path . "/install.php");

                if ($activeTheme != 'default' && $activeTheme != 'simpleX') {
                    $addonRes .= "Copying Theme Files to $activeTheme<br>";
                    if(!isset($noCopyTemp)) {
                        recurse_copy($addon_path . "/theme/default", ROOT_DIR . "/theme/$activeTheme");
                    }
                }
            } else {
                //Not Found
                $addonRes = "Addons Installer is not detected!";
                $addonError = true;
                $errType = 1;
            }
        } elseif (file_exists($addon_path . "/atozseo.tdata")){
            $addonRes = "Incompatible with AtoZ SEO Tools v3.2 <br>Update your addon into the latest version!";
            $addonError = true;
            $errType = 1;
        }else{
            //Not Found
            $addonRes = "Incompatible add-on!";
            $addonError = true;
            $errType = 1;
        }
        $addonRes = str_replace(array("<br>", "<br/>", "<br />"), PHP_EOL, $addonRes);
        //Delete the Addons Data
        delDir($addon_path);

        //Delete the package file
        delFile($file_path);
    } else {
        $addonRes = 'File Not Found!';
        $addonError = true;
        $errType = 1;
    }
} else {
    $addonRes = 'No Input!';
    $addonError = true;
    $errType = 1;
}
