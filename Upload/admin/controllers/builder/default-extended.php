<?php

defined('BUILDER_CON') or die(header('HTTP/1.1 403 Forbidden'));

/*
 * @author Balaji
 * @name: Rainbow PHP Framework
 * @copyright 2022 ProThemes.Biz
 *
 */

function adminColorPicker($name,$id=null,$title=null,$placeholder='Enter text',$value=null,$class=null,$mClass=null,$return=false){

    if($id !== NULL)
        $id = 'id="'.$id.'"';

    if($title === NULL)
        $title = '';
    else
        $title = '<label for="'.$name.'">'.shortCodeFilter($title).'</label>';

    $placeholder = shortCodeFilter($placeholder);
    $value = htmlentities($value);

    $data = $title.'
    <div class="input-group colorpicker-component '.$mClass.'">
        <input type="text" placeholder="'.$placeholder.'" '.$id.' name="'.$name.'" value="'.$value.'" class="form-control colorpicker '.$class.'">
        <span class="input-group-addon"><i></i></span>
    </div>';

    if(!$return)
        echo $data;

    return $data;
}

$pageTitle = 'Default Theme Settings';
$footerAdd = true; $to = array();
$page1 = $page2 = $page3 = '';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    
    if(isset($_POST['page1'])){
        $page1 = 'active';
        $to = array_map_recursive(
            function($item) use ($con) { return escapeTrim($con,$item); },
            $_POST['to']
        );
        
        //Load theme settings
        $tempTo = getThemeOptionsDev($con,$themePathName);
        if(isset($tempTo['custom']['css']))
            $to['custom']['css'] = $tempTo['custom']['css'];
        else
            $to['custom']['css'] = '';
            
        $to['general']['logo'] = $tempTo['general']['logo'];
        $to['general']['favicon'] = $tempTo['general']['favicon'];

        if(isset($_FILES['logoUpload']) && $_FILES['logoUpload']['name'] != ''){
            $isUploaded = secureImageUpload($_FILES['logoUpload']);
            if($isUploaded[0])
                $to['general']['logo'] = $isUploaded[1];
            else
                $msg = errorMsgAdmin($isUploaded[1]);
        }
        if(isset($_FILES['favUpload']) && $_FILES['favUpload']['name'] != ''){
            $isUploaded = secureImageUpload($_FILES['favUpload'],500000,array('png','ico','gif'));
            if($isUploaded[0])
                $to['general']['favicon'] = $isUploaded[1];
            else
                $msg = errorMsgAdmin($isUploaded[1]);
        }
        if(isset($_POST['langSwitch']))
            $to['general']['langSwitch'] = true;
        else
            $to['general']['langSwitch'] = false;
            
        if(isset($_POST['sidebar']))
            $to['general']['sidebar'] = 'right';
        else
            $to['general']['sidebar'] = 'left'; 

        if(isset($_POST['sSearch']))
            $to['general']['sSearch'] = true;
        else
            $to['general']['sSearch'] = false;
            
        if(isset($_POST['iSearch']))
            $to['general']['iSearch'] = true;
        else
            $to['general']['iSearch'] = false;
            
        if(isset($_POST['browseBtn']))
            $to['general']['browseBtn'] = true;
        else
            $to['general']['browseBtn'] = false;

        if(!isset($_POST['topTools']))
            $to['general']['topTools'] = $tempTo['general']['topTools'];
        else
           $to['general']['topTools'] = $_POST['topTools'];

        if(!isset($_POST['popTools']))
            $to['general']['popTools'] = $tempTo['general']['popTools'];
        else
            $to['general']['popTools'] = $_POST['popTools'];

        if(!isset($msg)){
           $themeStr = arrToDbStr($con,$to);
           $sqlQ = updateToDb($con,'themes_data',array($themePathName.'_theme' => $themeStr),array('id' => '1'));
           if($sqlQ)
             $msg = errorMsgAdmin($sqlQ);   
           else
            $msg = successMsgAdmin('Theme settings saved successfully');
        }
    }
    if(isset($_POST['page3'])){
       $page3 = 'active';
        
       //Load theme settings
       $to = getThemeOptionsDev($con,$themePathName);
       $to['custom']['css'] = escapeTrim($con,$_POST['to']['custom']['css']);
       $themeStr = arrToDbStr($con,$to);
       $sqlQ = updateToDb($con,'themes_data',array($themePathName.'_theme' => $themeStr),array('id' => '1'));
       if($sqlQ)
         $msg = errorMsgAdmin($sqlQ);   
       else
        $msg = successMsgAdmin('Theme settings saved successfully');

    }
}else{
    $page1 = 'active';
}

//Load theme settings
$to = getThemeOptionsDev($con,$themePathName);
$toolsList = getSEOToolsName($con);
