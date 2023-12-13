<?php

defined('APP_NAME') or die(header('HTTP/1.0 403 Forbidden'));

/*
* @author Balaji
* @name: Rainbow PHP Framework
* @copyright © 2018 ProThemes.Biz
*
*/

$pageTitle = 'Website Advertisement';
$subTitle = "Site Ads Settings";
$fullLayout = 1; $footerAdd = false; $footerAddArr = array();

if ($_SERVER['REQUEST_METHOD'] == 'POST'){
    
    $ad720x90 = escapeTrim($con, $_POST['ad720x90']);
    $ad250x300 = escapeTrim($con, $_POST['ad250x300']);
    $ad250x125 = escapeTrim($con, $_POST['ad250x125']);
    $ad480x60 = escapeTrim($con, $_POST['ad480x60']);
    $text_ads = escapeTrim($con, $_POST['text_ads']);
    $smallSEOAd = escapeTrim($con, $_POST['smallSEOAd']);
    $smallSEOAd1 = escapeTrim($con, $_POST['smallSEOAd1']);
    $smallSEOAd2 = escapeTrim($con, $_POST['smallSEOAd2']);

    $query = "UPDATE ads SET  smallSEOAd='$smallSEOAd',  smallSEOAd1='$smallSEOAd1',  smallSEOAd2='$smallSEOAd2', ad720x90='$ad720x90', ad250x300='$ad250x300', ad250x125='$ad250x125', ad480x60='$ad480x60', text_ads='$text_ads' WHERE id='1'";
    mysqli_query($con, $query);

    if (mysqli_errno($con))
        $msg = errorMsgAdmin(mysqli_error($con));
     else
        $msg = successMsgAdmin('Ads Settings saved successfully');
}

//Load AD Codes
$dbAd = mysqli_query($con, "SELECT * FROM ads where id='1'");
$dbAdRow = mysqli_fetch_array($dbAd);
$ad720x90 = Trim($dbAdRow['ad720x90']);
$ad250x300 = Trim($dbAdRow['ad250x300']);
$ad250x125 = Trim($dbAdRow['ad250x125']);
$ad480x60 = Trim($dbAdRow['ad480x60']);
$text_ads = Trim($dbAdRow['text_ads']);
$smallSEOAd = Trim($dbAdRow['smallSEOAd']);
$smallSEOAd1 = Trim($dbAdRow['smallSEOAd1']);
$smallSEOAd2 = Trim($dbAdRow['smallSEOAd2']);