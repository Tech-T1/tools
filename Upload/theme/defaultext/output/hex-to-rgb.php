<?php
defined('APP_NAME') or die(header('HTTP/1.1 403 Forbidden'));

/*
 * @author Balaji
 * @name A to Z SEO Tools - PHP Script
 * @copyright 2022 ProThemes.Biz
 *
 */
?>

<style>
    .highlight{
        color: #c0392b;
    }
    #color{
        height: 70px;
        border: 1px solid #2d3436;
        background-color: rgb(255, 255, 255);
        border-radius: 5px !important;
        box-shadow: none !important;
    }
    .top40{
        margin-top: 40px;
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

            <div class="text-center">
                <h2 id="title"><?php echo $data['tool_name']; ?></h2>
            </div>


            <div class="row">
                <div class="col-md-12 top40">

                    <p>Enter 6 digits hex color code and press the Convert button:</p>
                    <br>
                    <form id="colorform" name="colorform" autocomplete="off">
                        <div class="form-group">
                            <label for="hex">Hex color code <small class="highlight">(Eg. #1D9D73)</small></label>
                            <input type="text" id="hex" name="hex" placeholder="000000" minlength="3" maxlength="8" class="form-control form-control-lg" autofocus="">
                        </div>
                        <div class="form-group">
                            <button type="button" title="Convert" class="btn btn-primary" onclick="colorConvert()"> <i class="fa fa-check"></i> Convert</button>
                            <button class="btn btn-success" id="copyStr" onclick="return false;"> <i class="fa fa-clipboard"></i> Copy RGB Code</button>
                            <button type="reset" title="Reset" class="btn btn-secondary" onclick="colorClr()"> <i class="fa fa-refresh"></i> Reset</button>
                        </div>
                        <div class="form-group">
                            <label for="r">Red color (R)</label>
                            <input type="text" id="r" name="r" class="form-control form-control-lg" readonly="">
                        </div>
                        <div class="form-group">
                            <label for="g">Green color (G)</label>
                            <input type="text" id="g" name="g" class="form-control form-control-lg" readonly="">
                        </div>
                        <div class="form-group">
                            <label for="b">Blue color (B)</label>
                            <input type="text" id="b" name="b" class="form-control form-control-lg" readonly="">
                        </div>
                        <div class="form-group">
                            <label for="css">CSS color</label>
                            <input type="text" id="css" name="css" class="form-control form-control-lg" readonly="">
                        </div>
                        <div class="form-group">
                            <label for="color">Color preview</label>
                            <input type="text" id="color" name="color" class="form-control" readonly="">
                        </div>
                    </form>

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
<?php
$footerAddArr[] = '<script>var pos = $(\'#title\').offset();$(\'body,html\').animate({ scrollTop: pos.top });</script>';
?>

<script>

    function colorClr() {
        document.colorform.reset();
        document.colorform.color.style.backgroundColor="#FFFFFF";
    }

    function colorConvert() {
        console.log(document.colorform.color.style.backgroundColor);
        var r,g,b,a="";
        hex = document.colorform.hex.value;
        if( hex=="" ) hex="000000";
        if( hex.charAt(0)=="#" ) hex=hex.substring(1,hex.length);
        if( hex.length!=6 && hex.length!=8 && hex.length!=3 )
        {
            sweetAlert(oopsStr, 'Please enter 6 digits color code!', "error");
            return;
        }
        if( hex.length==3 )
        {
            r = hex.substring(0,1);
            g = hex.substring(1,2);
            b = hex.substring(2,3);
            r=r+r;
            g=g+g;
            b=b+b;
        }
        else
        {
            r = hex.substring(0,2);
            g = hex.substring(2,4);
            b = hex.substring(4,6);
        }
        if( hex.length==8 )
        {
            a = hex.substring(6,8);
            a = (parseInt(a, 16)/255.0).toFixed(2);
        }
        r = parseInt(r, 16);
        g = parseInt(g, 16);
        b = parseInt(b, 16);
        var css="rgb("+r+", "+g+", "+b+")";
        if( hex.length==8 )
            css="rgba("+r+", "+g+", "+b+", "+a+")";

        document.colorform.r.value = r;
        document.colorform.g.value = g;
        document.colorform.b.value = b;
        document.colorform.css.value = css;
        document.colorform.color.style.backgroundColor='#'+hex;
    }
    $("#copyStr").click(function() {
        let copyTextarea = document.querySelector('#css');
        copyTextarea.select();
        try {
            var successful = document.execCommand('copy');
            var msg = successful ? 'successful' : 'unsuccessful';
            sweetAlert('Success', 'RGB Code has been copied to clipboard', "success");
        } catch (err) {
            sweetAlert(oopsStr, 'Unable to copy!', "error");
        }
    });
</script>