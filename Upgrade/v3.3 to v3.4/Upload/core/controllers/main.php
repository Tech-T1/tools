<?php
defined('APP_NAME') or die(header('HTTP/1.1 403 Forbidden'));

/*
 * @author Balaji
 * @name: A to Z SEO Tools - PHP Script
 * @copyright 2022 ProThemes.Biz
 *
 */

$tools = $ctools = array();

$cRes = mysqli_query($con, 'SELECT category FROM category_option WHERE id=1');
$cSet = mysqli_fetch_assoc($cRes);
$category = filBoolean($cSet['category']);

$result = mysqli_query($con, 'SELECT uid,tool_show,tool_name,tool_url,icon_name,tool_no FROM seo_tools ORDER BY CAST(tool_no AS UNSIGNED) ASC');
while ($row = mysqli_fetch_assoc($result)) {

    if (isSelected($row['tool_show']))
        $tools[$row['uid']] = array(shortCodeFilter($row['tool_name']), createLink($row['tool_url'], true), $row['icon_name'], $row['tool_show'], $row['tool_no']);
}

if($category){

    $result = mysqli_query($con, 'SELECT name,des,tools,enabled,pattern FROM category ORDER BY CAST(sort AS UNSIGNED) ASC');
    while ($row = mysqli_fetch_assoc($result)) {
        if (isSelected($row['enabled']))
            $ctools[] = array(shortCodeFilter($row['name']), shortCodeFilter($row['des']), dbStrToArr($row['tools']), intval($row['pattern']));
    }
}