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
    #qrImgage{
        margin: auto;
        margin-bottom: 20px;

    }
    .headtxt{
        font-size: 16px;
        font-weight: bold;
        color: #2d3436;
    }
    .outtxt{
        font-size: 22px;
        color: #00b894;
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

            <div class="text-left">
                <h2 id="title"><?php echo $data['tool_name']; ?></h2>
                <p>Upload a picture with a QR code in it and this decoder will try to read it and show the decoded text contents.</p>
                <br>
            </div>

            <?php
            if(isset($msg))
                echo $msg;
            ?>

            <?php if($outputText) { ?>

                <table class="table table-bordered">
                    <tr class="text-center">
                        <td class="headtxt">Decoded Text</td>
                    </tr>
                    <tr class="text-center">
                        <td class="outtxt"><?php echo $text; ?></td>
                    </tr>
                </table>

                <a class="btn btn-danger" href="<?php echo $toolURL; ?>">Try New QR Image</a>

            <?php } else { ?>
            <form onsubmit="return checkImgFn();" method="POST" action="<?php echo $toolURL; ?>" enctype="multipart/form-data">
                <div class="form-group">
                    <label for="qrImgage">Select QR image to decode:</label>
                    <div class="controls">
                        <img id="qrImgageBox" src="data:image/png;base64,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" style="text-align:center;"/> <br /><br />
                        <input type="file" name="qrImgage" id="qrImgage"  accept="image/png, image/jpeg" onchange="loadFile(event)" class="btn btn-default" />
                        <input type="submit" value="Decode" name="submit" class="btn btn-success" />
                    </div>
                </div>
            </form>
            <?php } ?>

            <br />
            </div>

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
    let checkImg = false;

    function checkImgFn(){
        if(!checkImg){
            sweetAlert(oopsStr, 'Select an QR image file!', "error");
        }
        return checkImg;
    }

    let loadFile = function(event) {
        checkImg = true;
        let output = document.getElementById('qrImgageBox');
        output.src = URL.createObjectURL(event.target.files[0]);
        output.onload = function() {
            URL.revokeObjectURL(output.src)
        }
    };
</script>