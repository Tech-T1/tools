<?php
defined('APP_NAME') or die(header('HTTP/1.0 403 Forbidden'));

/*
 * @author Balaji
 * @name A to Z SEO Tools - PHP Script
 * @copyright © 2018 ProThemes.Biz
 *
 */
?>
<style>
.smartRed{
    color: #c0392b;
}
.smartGreen{
    color: #27ae60;
}
</style>
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

               <?php if ($pointOut != 'output') { ?>
                <hr />
                <form name="hform" id="hform" onSubmit="getCode();return false;">
                
                <h3>1. <?php trans('Select redirect type', $lang['AD1']); ?></h3> 
              
                <div class="groupBox" style="margin-left: 25px;">
                    <br />
                    <label>
                          <input class="minimal" type="radio" id="selectwww" name="selectwww" value="1" checked="" />
                          <span style="margin-top: 4px;"><?php trans('Redirect from', $lang['AD2']); ?> <strong class="smartRed">www</strong> to <strong class="smartGreen">non-www</strong></span>
                    </label>
                     <br /> 
                    <label>
                          <input class="minimal" type="radio" id="selectwww" name="selectwww" value="0" />
                          <span><?php trans('Redirect from', $lang['AD2']); ?> <strong class="smartRed">non-www</strong> to <strong class="smartGreen">www</strong></span>
                    </label>
                        
                    <br />
                </div>
                
                <br />
                
                <h3>2. <?php trans('Enter your domain name', $lang['165']); ?></h3>
                    <div class="groupBox">
                    <input type="text" id="fdomain" name="fdomain" size="45" maxlength="127" class="fdomain form-control"  value="example.com" onFocus="if(this.value=='example.com') { this.value=''; this.style.color='#000000'; }" onBlur="if(this.value=='') { this.value='example.com'; this.style.color='#777777'; }"/>
                    <br /><small><?php trans('Do not include www. Domain name only - e.g. <b>yourdomain.com</b>', $lang['AD3']); ?></small>
                </div>
              
                <br />
                
                <h3>3. <?php trans('Get your code', $lang['AD4']); ?></h3>
                
                    <div class="groupBox">
                    
    		        <a class="btn btn-info" onclick="getCode();">Get .htaccess Code</a>
                </div>
                
                <br />
                <h3>4. <?php trans('Copy the code to your .htaccess file', $lang['AD5']); ?></h3>
                
                <textarea id="outBox" class="outBox form-control" name="outBox" rows="8" onClick="this.select();"></textarea>
                <br />
                
                </form>
   
                          
               <?php } ?>

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
    
<script type=""text/javascript"">

function getCode() {
    var ridx = getRadioSelected(document.hform.selectwww);
    var domain = document.hform.fdomain.value;
    
    if(validateDomain(domain))
    {
        if(ridx == 1) {
            rules = getHtSubRules("www", "", domain);        
        } else {
            rules = getHtSubRules("", "www", domain);
        }
        document.hform.outBox.value = rules;
    }
    else
    {
        document.hform.outBox.value = "";
        alert("<?php makeJavascriptStr($lang['AD6'], true); ?>");    
    }
    
}
function getRadioSelected(obj) {

    sel = false;
    len = obj.length;
    
    for (i = 0; i <len; i++) {
        if (obj[i].checked) {
            sel = obj[i].value
        }
    }
    return sel;
}
function validateDomain(domain) {
    var v = new RegExp();
    v.compile("^[A-Za-z0-9-_]+\\.[A-Za-z0-9-_%&\?\/.=]+$");
    if (!v.test(domain)) {
        return false;
    }
    else
    {
        return true;
    }
}
function getHtSubRules(dsrc,ddest,domain) {

    var rules = "RewriteEngine On\n";
    if(dsrc) {
        dsrc += ".";
    }
    if(ddest) {
        ddest += ".";
    }
    rules += "RewriteCond %{HTTP_HOST"+"} ^"+dsrc+domain+" [NC]\n";
    rules += "RewriteRule ^(.*)$ http://"+ddest+domain+"/$1 [L,R=301]\n";

    return rules;
}
</script>