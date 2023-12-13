<?php
defined('APP_NAME') or die(header('HTTP/1.0 403 Forbidden'));

/*
 * @author Balaji
 * @name A to Z SEO Tools - PHP Script
 * @copyright © 2017 ProThemes.Biz
 *
 */
?>

<style>
.percentbox {
    text-align: center;
    font-size: 18px;
}
.percentimg {
    text-align: center;
    display: none;
}
#resultBox{
    display:none;
}
</style>
<script>
var msgDomain = "<?php makeJavascriptStr($lang['IP3'],true); ?>";
var geoIPPath = "<?php createLink('geo-ip/ip-info'); ?>";
</script>
<script src='<?php createLink('core/library/geo-ip.js',false,true); ?>'></script>

  <div class="container main-container">
	<div class="row">
    
      	    <?php
            if($themeOptions['general']['sidebar'] == 'left')
                require_once(THEME_DIR."sidebar.php");
            ?>
            
          	<div class="col-md-8 main-index">
            
            <div class="xd_top_box">
             <?php echo $ads_720x90; ?>
            </div>
            
                <h2 id="title"><?php echo $data['tool_name']; ?></h2>
                <div id="mainbox">
               <?php if ($pointOut != 'output') { ?>
               <br />
               <p><?php trans('Enter up to 20 IPs (Each IP must be on separate line)', $lang['IP1']); ?>
               </p>
               <textarea class="form-control" placeholder="eg. 171.24.46.35" name="linksBox" id="linksBox" rows="3" style="height: 270px;"></textarea>
               <input type="hidden" id="authCode" value="<?php echo $secKey.$secVal; ?>" />
               <br />
               <?php if ($toolCap) echo $captchaCode; ?>
               <div class="text-center">
               <a class="btn btn-info" style="cursor:pointer;" id="checkButton"><?php echo $lang['8']; ?></a>
               </div>     
               </div>           
               <?php 
               } 
               ?>
            <div id="resultBox">
            <div class="percentimg">
            <img src="<?php themeLink('img/load.gif'); ?>" />
            <br />
            <?php echo $lang['146']; ?>...
            <br />
            </div>
            <br />
            <div id="results">
                <table class="table table-bordered table-striped" id="ipinfo">
              
                        <tr>
                            <th><?php echo $lang['15']; ?></th>
                            <th><?php echo $lang['16']; ?></th>
                            <th><?php echo $lang['17']; ?></th>
                            <th><?php echo $lang['18']; ?></th>
                            <th><?php echo $lang['22']; ?></th>
                            <th><?php echo $lang['19']; ?></th>
                            <th><?php echo $lang['20']; ?></th>
                            <th><?php echo $lang['21']; ?></th>
                        </tr>
      
                </table>
                <script>
                    downloadData = "<?php echo makeJavascriptStr($lang['15']).','.makeJavascriptStr($lang['16']).','.makeJavascriptStr($lang['17']).','.makeJavascriptStr($lang['18']).','.makeJavascriptStr($lang['22']).','.makeJavascriptStr($lang['19']).','.makeJavascriptStr($lang['20']).','.makeJavascriptStr($lang['21']); ?>"  + '\n';
                </script>
            </div>

            <div class="text-center">
            <br /> &nbsp; <br />
            <button id="exportButton" class="btn btn-danger"><?php echo $lang['AS1']; ?></button>
            <a class="btn btn-info" href="<?php echo $toolURL; ?>"><?php trans('Try New IP', $lang['IP4']); ?></a>
            <br />
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
                        
            <?php
            if($themeOptions['general']['sidebar'] == 'right')
                require_once(THEME_DIR."sidebar.php");
            ?>      		
        </div>
    </div> <br />