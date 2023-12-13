<?php
defined('APP_NAME') or die(header('HTTP/1.0 403 Forbidden'));

/*
 * @author Balaji
 * @name A to Z SEO Tools - PHP Script
 * @copyright © 2018 ProThemes.Biz
 *
 */
?>
<link href="<?php createLink('core/library/color-picker/color-picker.css',false,true); ?>" rel="stylesheet" type="text/css" />
<script src='<?php createLink('core/library/color-picker/color-picker.js',false,true); ?>'></script>

<div class="container main-container">
<div class="row">

      	<div class=" col-md-12 main-index color-index">
        
        <div class="xd_top_box">
         <?php echo $ads_720x90; ?>
        </div>
        
          	<h2 id="title" class="text-center"><?php echo $data['tool_name']; ?></h2>
            
            <br />
            <div id="container">
            <div id="palette" class="block">
                <div id="color-palette"></div>
                <div id="color-info">
                    <div class="title"> CSS Color </div>
                </div>
            </div>
        
            <div id="picker" class="block">
                <div class="ui-color-picker" data-topic="picker" data-mode="HSL"></div>
                <div id="picker-samples" sample-id="master"></div>
                <div id="controls">
                    <div id="delete">
                        <div id="trash-can"></div>
                    </div>
                    <div id="void-sample" class="icon"></div>
                </div>
            </div>
        
            <div id="canvas" data-tutorial="drop">
                <div id="zindex" class="ui-input-slider" data-topic="z-index" data-info="z-index"
                    data-max="20" data-sensivity="10"></div>
            </div>
            
            </div>
        
            <br />

<div class="xd_top_box">
<?php echo $ads_720x90; ?>
</div>

<h2 id="sec1" class="about_tool"><?php echo $lang['11'].' '.$data['tool_name']; ?></h2>
<p>
<?php echo $data['about_tool']; ?>
</p> <br />
</div>              
         		
    </div>
</div> <br />