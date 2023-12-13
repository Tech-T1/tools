<?php
defined('APP_NAME') or die(header('HTTP/1.1 403 Forbidden'));
/*
 * @author Balaji
 * @name: A to Z SEO Tools - PHP Script
 * @theme: Default Style
 * @copyright 2022 ProThemes.Biz
 *
 */

$pageTopAd = $smallSEOAd;
$pageMAd = $smallSEOAd1;
$homePageAd = $smallSEOAd2;

function getPopSEOTools($con, $arr){
    $count = 1;
    $result = mysqli_query($con, 'SELECT uid,tool_show,tool_url,tool_name,tool_no FROM seo_tools ORDER BY CAST(tool_no AS UNSIGNED) ASC');
    while ($row = mysqli_fetch_assoc($result)){
        if(isSelected($row['tool_show'])){
            if(in_array($row['uid'],$arr)) {
                echo '<li class="tool' . $count . '"><div class="icon_image fa fa-check"></div><a href="' . createLink($row['tool_url'], true) . '">' . shortCodeFilter($row['tool_name']) . ' </a></li>';
                $count++;
            }
        }
    }
}

function getRandomToolsDef($con, $toolUID = ''){
    $tools = array();

    $ctools = array();
    $result = mysqli_query($con, 'SELECT enabled,tools FROM category');
    while ($row = mysqli_fetch_assoc($result)) {
        if (isSelected($row['enabled'])) {
            $ctools = dbStrToArr($row['tools']);
            if(!is_array($ctools))
                $ctools = array();
            if (in_array($toolUID, $ctools)) {
                break;
            } else {
                $ctools = array();
            }
        }
    }

    $count = 0;

    if (count($ctools) === 0) {
        $result = mysqli_query($con, 'SELECT uid,tool_name,tool_url,icon_name,tool_show,tool_no FROM seo_tools ORDER BY RAND() LIMIT 10');
        while ($row = mysqli_fetch_assoc($result)) {
            if (isSelected($row['tool_show']))
                $tools[$row['uid']] = array(shortCodeFilter($row['tool_name']), createLink($row['tool_url'], true), $row['icon_name'], $row['tool_show'], $row['tool_no']);
            if ($count === 3)
                break;
            $count++;
        }
        return $tools;
    } else {
        shuffle($ctools);
        foreach ($ctools as $ctool) {
            $result = mysqli_query($con, 'SELECT uid,tool_name,tool_url,icon_name,tool_show,tool_no FROM seo_tools WHERE uid="' . $ctool . '"');
            $row = mysqli_fetch_assoc($result);
            if (isSelected($row['tool_show'])) {
                $tools[$row['uid']] = array(shortCodeFilter($row['tool_name']), createLink($row['tool_url'], true), $row['icon_name'], $row['tool_show'], $row['tool_no']);
                if ($count === 3)
                    break;
                $count++;
            }
        }
        return $tools;
    }
}

if(isset($data['about_tool'])){
    $rndTools = getRandomToolsDef($con, $data['uid']);

    $data['about_tool'] .= '<div class="widget_tool_box box_shadow_border pn mb10 mt35">    <ul><li class="popular-seo-t pn"><h3 class="mn p10">Related Tools</h3></li></ul><div class="clearfix"></div><div class="mt25">';

    foreach($rndTools as $rndTool){

        if ($rndTool[2] == '' || (!file_exists(THEME_DIR . $rndTool[2]))) $rndTool[2] = 'icons/no_image.png';
        $data['about_tool'] .= '<div class="col-sm-3 col-xs-6">
                        <div class="thumbnail">
                            <a class="seotoollink" data-placement="top" data-toggle="tooltip" data-original-title="' . $rndTool[0] . '" title="' . $rndTool[0] . '" href="' . $rndTool[1] . '"><img alt="' . $rndTool[0] . '" src="' . themeLink($rndTool[2], true) . '" class="seotoolimg" />
                            <div class="caption">
                                    ' . $rndTool[0] . '
                            </div></a>
                        </div>
                    </div>';
    }

    $data['about_tool'] .= '    </div></div><div class="clearfix"></div>';
}

$cssData = '.masthead{background:{{primary}} none repeat scroll 0 0}.category_heading{color:{{primary}}}.submasthead{background:{{primary}} none repeat scroll 0 0}.footer-title::after{background:{{primary}} none repeat scroll 0 0}a{color:{{secondary}}}.thumbnail:hover{box-shadow:0 0 5px 3px {{secondary}}}.navbar-nav>li:hover>a,.navbar-nav>li.active>a,.navbar-nav>li.open>a,.navbar-nav>li:active>a{border-top:3px solid {{secondary}}}.btn-link{color:{{secondary}}}.pagination>li>span{color:{{secondary}}}a.list-group-item.active>.badge,.nav-pills>.active>a>.badge{color:{{secondary}}}a.thumbnail.active{border-color:{{secondary}}}.navbar-brand .icon{background:{{secondary}}}.home{background-color:{{secondary}}}.features-menu .feature-item .fa{border:3px solid {{secondary}};color:{{secondary}}}.btn.btn-social{background:{{secondary}}}.testimonial-item .testimonial-content{border-top:3px solid {{secondary}}}.footer{border-top:4px solid {{secondary}}}.b-widgets{background:{{fprimary}} none repeat scroll 0 0}.footer{background:{{fsecondary}} none repeat scroll 0 0!important}.widget_tool_box ul .popular-seo-t h3{background:{{widget}}}';

$cssData = str_replace(
    array('{{primary}}', '{{secondary}}', '{{widget}}', '{{fprimary}}', '{{fsecondary}}'),
    array($themeOptions['color']['primary'], $themeOptions['color']['secondary'], $themeOptions['color']['box'], $themeOptions['color']['footer1'], $themeOptions['color']['footer2']),
    $cssData
);
$themeOptions['custom']['css'] .= $cssData;