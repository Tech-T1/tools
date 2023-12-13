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
    .demo-body {
        margin-top: 40px;
        border-radius: 5px;
        border: 1px solid #e3e3e3;
    }
    .demo-head {
        font-weight: 400;
        color: #222f3e;
        font-size: 20px;
        text-align: center;
        margin-top: 20px;
    }
    #demoCon{
        margin-bottom: 20px;
        min-height: 20px;
        padding: 19px;
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

            <?php if ($pointOut !== 'output') { ?>
                <br />

                <form method="POST" action="<?php echo $toolOutputURL;?>" onsubmit="return checkDatas();">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Your Company Name</label>
                                <input class="form-control" type="text" name="companyName" id="companyName" placeholder="">
                                <small>(Don't have a company registered, enter the website name.)</small>
                            </div>

                            <div class="form-group">
                                <label>Your Website Name</label>
                                <input class="form-control" type="text" name="websiteName" id="websiteName" placeholder="">
                            </div>

                            <div class="form-group">
                                <label>Your Website URL</label>
                                <input class="form-control" type="text" name="websiteURL" id="websiteURL" placeholder="">
                            </div>
                            <br>

                            <input class="btn btn-info" type="submit" value="<?php echo $lang['8']; ?>" name="submit"/>

                        </div>
                    </div>
                </form>

                <?php
            } else {
                //Output Block
                if(isset($error)) {

                    echo '<br/><br/><div class="alert alert-error">
            <strong>Alert!</strong> '.$error.'
            </div><br/><br/>
            <div class="text-center"><a class="btn btn-info" href="'.$toolURL.'">'.$lang['12'].'</a>
            </div><br/>';

                } else {
                    ?>
                    <br />

                    <h4 class="tab-title text-center">Your Terms & Conditions!</h4>

                    <div class="col-md-12">
                        <textarea class="form-control" rows="8" id="termsData"><?php echo $termsData; ?></textarea>

                        <div class="clearfix"></div><br>

                        <a class="btn btn-info" href="<?php echo $toolURL; ?>"><?php echo $lang['27']; ?></a>
                        <button id="copyStr" type="button" class="btn btn-success">Copy to Clipboard</button>
                        <button id="downloadStr" type="button" class="btn btn-danger">Download as HTML</button>

                    </div>

                        <div class="clearfix"></div><br>

                        <div class="demo-body">
                            <div class="demo-head">
                                Preview your Terms & Conditions
                                <hr>
                            </div>
                            <div id="demoCon">
                                <?php echo $termsData; ?>
                            </div>
                        </div>

                    <div class="text-center">
                        <br /> &nbsp; <br />

                        <br />
                    </div>

                <?php } } ?>

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
    function checkDatas() {
        let selTab = $('.wizard .nav-tabs li.active').attr('id');
        let companyName = $('#companyName').val();
        let websiteName = $('#websiteName').val();
        let websiteURL = $('#websiteURL').val();
        websiteURL = websiteURL.replace(/^https?:\/\//, '');
        if (companyName == '') {
            sweetAlert(oopsStr, 'Enter your company name!', "error");
            return false;
        } else if (websiteName == '') {
            sweetAlert(oopsStr, 'Enter your website name!', "error");
            return false;
        } else if (websiteURL == '') {
            sweetAlert(oopsStr, 'Enter your website url!', "error");
            return false;
        }
        return true;
    }

    $("#downloadStr").click(function() {
        let downloadLink = document.createElement('a');
        let downloadContent = $('#demoCon').html();
        let fileName = 'download.html';

        downloadLink.href = 'data:text/html;charset=utf-8,' + encodeURIComponent(downloadContent);
        downloadLink.download = fileName;
        document.body.appendChild(downloadLink);
        downloadLink.click();
        document.body.removeChild(downloadLink);
    });

    $("#copyStr").click(function() {
        let copyTextarea = document.querySelector('#termsData');
        copyTextarea.select();
        try {
            var successful = document.execCommand('copy');
            var msg = successful ? 'successful' : 'unsuccessful';
            sweetAlert('Success', ' Copied to clipboard. You can paste your generated terms now.', "success");
        } catch (err) {
            sweetAlert(oopsStr, 'Unable to copy!', "error");
        }
    });

</script>