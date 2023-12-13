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
    .tab-title{demoCondemoCon
        margin-bottom: 30px;
    }
    .question{
        font-size: 18px;
        color: #2d3436;
    }
    .wizard{
        margin-top: 50px;
    }
    .wizard .nav-tabs {
        position: relative;
        margin-bottom: 0;
        border-bottom-color: transparent;
    }

    .wizard > div.wizard-inner {
        position: relative;
        left: 15%;
    }

    .connecting-line {
        height: 2px;
        background: #e0e0e0;
        position: absolute;
        width: 50%;
        margin: 0 auto;
        left: -25%;
        right: 0;
        top: 50%;
        z-index: 1;
    }

    .wizard .nav-tabs > li.active > a, .wizard .nav-tabs > li.active > a:hover, .wizard .nav-tabs > li.active > a:focus {
        color: #555555;
        cursor: default;
        border: 0;
        border-bottom-color: transparent;
    }

    span.round-tab {
        width: 30px;
        height: 30px;
        line-height: 30px;
        display: inline-block;
        border-radius: 25%;
        background: #fff;
        z-index: 2;
        position: absolute;
        left: 0;
        text-align: center;
        font-size: 16px;
        color: #0e214b;
        font-weight: 500;
        border: 1px solid #ddd;
    }
    span.round-tab i{
        color:#555555;
    }
    .wizard li.active span.round-tab {
        background: #46B0CF;
        color: #fff;
        border-color: #46B0CF;
    }
    .wizard li.active span.round-tab i{
        color: #5bc0de;
    }
    .wizard .nav-tabs > li.active > a i{
        color: #46B0CF;
    }

    .wizard .nav-tabs > li {
        width: 25%;
    }

    .wizard li:after {
        content: " ";
        position: absolute;
        left: 46%;
        opacity: 0;
        margin: 0 auto;
        bottom: 0px;
        border: 5px solid transparent;
        border-bottom-color: red;
        transition: 0.1s ease-in-out;
    }



    .wizard .nav-tabs > li a {
        width: 30px;
        height: 30px;
        margin: 20px auto;
        border-radius: 100%;
        padding: 0;
        background-color: transparent;
        position: relative;
        top: 0;
    }
    .wizard .nav-tabs > li a i{
        position: absolute;
        top: -15px;
        font-style: normal;
        font-weight: 400;
        white-space: nowrap;
        left: 50%;
        transform: translate(-50%, -50%);
        font-size: 12px;
        font-weight: 700;
        color: #000;
    }

    .wizard .nav-tabs > li a:hover {
        background: transparent;
    }

    .wizard .tab-pane {
        position: relative;
        padding-top: 20px;
    }


    .wizard h3 {
        margin-top: 0;
    }
    .default-btn{
        font-size: 13px;
        padding: 8px 24px;
        border: none;
        border-radius: 4px;
        margin-top: 30px;
        color: #FFFFFF;
    }
    .prev-step{
        background-color: #8395a7;
    }
    .next-step{
        background-color: #46B0CF;
    }
    .copy-step{
        background-color: #6ab04c;
    }
    .download-step{
        background-color: #eb4d4b;
    }
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

    @media (max-width: 767px){
        .sign-content h3{
            font-size: 40px;
        }
        .wizard .nav-tabs > li a i{
            display: none;
        }
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

            <div class="wizard">
                <div class="wizard-inner">
                    <div class="connecting-line"></div>
                    <ul class="nav nav-tabs" role="tablist">
                        <li id="id1" role="presentation" class="active">
                            <a href="#step1" data-toggle="tab" aria-controls="step1" role="tab" aria-expanded="true"><span class="round-tab">1 </span> <i>Website</i></a>
                        </li>
                        <li id="id2" role="presentation" class="disabled">
                            <a href="#step2" data-toggle="tab" aria-controls="step2" role="tab"><span class="round-tab">2</span> <i>Additional</i></a>
                        </li>
                        <li id="id3" role="presentation" class="disabled">
                            <a href="#step3" data-toggle="tab" aria-controls="step3" role="tab"><span class="round-tab">3</span> <i>Finish</i></a>
                        </li>

                    </ul>
                </div>

                <form role="form" action="<?php echo $toolURL; ?>">
                    <div class="tab-content" id="main_form">
                        <div class="tab-pane active" role="tabpanel" id="step1">
                            <h4 class="tab-title text-center">Website Details</h4>
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
                                </div>
                            </div>
                            <ul class="list-inline pull-right">
                                <li><button type="button" class="default-btn next-step">Continue to next step</button></li>
                            </ul>
                        </div>
                        <div class="tab-pane" role="tabpanel" id="step2">
                            <h4 class="tab-title text-center">Additional Information</h4>

                            <p class="question">Do you show advertising through Google AdSense on your website?</p>
                            <input type="radio" id="xdSense" name="xdSense" value="1">
                            <label>Yes</label><br>
                            <input type="radio" id="xdSense" name="xdSense" value="0">
                            <label>No</label><br><br>

                            <p class="question">Do you show advertising from third parties?</p>
                            <input type="radio" id="xDS" name="xDS" value="1">
                            <label>Yes</label><br>
                            <input type="radio" id="xDS" name="xDS" value="0">
                            <label>No</label><br><br>

                            <p class="question">Do you use cookies on your website?</p>
                            <input type="radio" id="cookies" name="cookies" value="1">
                            <label>Yes</label><br>
                            <input type="radio" id="cookies" name="cookies" value="0">
                            <label>No</label><br>

                            <ul class="list-inline pull-right">
                                <li><button type="button" class="default-btn prev-step">Back</button></li>
                                <li><button type="button" class="default-btn next-step">Generate</button></li>
                            </ul>
                        </div>
                        <div class="tab-pane" role="tabpanel" id="step3">
                            <h4 class="tab-title text-center">Your Privacy Policy!</h4>

                            <div class="col-md-12">
                                <textarea class="form-control" rows="8" id="privacyData"></textarea>
                            </div>

                            <ul class="list-inline pull-right">
                                <li><button type="button" class="default-btn prev-step">Modify</button></li>
                                <li><button id="copyStr" type="button" class="default-btn copy-step">Copy to Clipboard</button></li>
                                <li><button id="downloadStr" type="button" class="default-btn download-step">Download as HTML</button></li>
                            </ul>

                            <div class="clearfix"></div>

                            <br>

                            <div class="demo-body">
                                <div class="demo-head">
                                    Preview your Privacy Policy
                                    <hr>
                                </div>
                                <div id="demoCon">

                                </div>
                            </div>
                        </div>
                        <div class="clearfix"></div>
                    </div>

                </form>
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

    let toolURL = '<?php makeJavascriptStr($toolURL . '/generate', true); ?>';

    $(document).ready(function () {
        $('.nav-tabs > li a[title]').tooltip();

        $('a[data-toggle="tab"]').on('show.bs.tab', function (e) {

            let $target = $(e.target);

            if ($target.parent().hasClass('disabled')) {
                return false;
            }
        });

        $(".next-step").click(function (e) {

            let $active = $('.wizard .nav-tabs li.active');
            $active.next().removeClass('disabled');
            nextTab($active);

        });
        $(".prev-step").click(function (e) {

            let $active = $('.wizard .nav-tabs li.active');
            prevTab($active);

        });
    });

    function nextTab(elem) {

        let selTab = $('.wizard .nav-tabs li.active').attr('id');
        let companyName = $('#companyName').val();
        let websiteName = $('#websiteName').val();
        let websiteURL = $('#websiteURL').val();
        websiteURL = websiteURL.replace(/^https?:\/\//, '');

        let xdSense = $("input[name='xdSense']:checked").val();
        let xDS =  $("input[name='xDS']:checked").val();
        let cookies =  $("input[name='cookies']:checked").val();


        if(selTab === 'id1') {
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
            $(elem).next().find('a[data-toggle="tab"]').click();
        }else if(selTab === 'id2') {
            if (!xdSense) {
                sweetAlert(oopsStr, 'Please answer the questions!', "error");
                return false;
            }else if (!xDS) {
                sweetAlert(oopsStr, 'Please answer the questions!', "error");
                return false;
            }else if (!cookies) {
                sweetAlert(oopsStr, 'Please answer the questions!', "error");
                return false;
            }

            $.post(toolURL,{companyName:companyName,websiteName:websiteName,websiteURL:websiteURL,xdSense:xdSense,xDS:xDS,cookies:cookies},function(data){
                if(data.success){
                    $('#privacyData').html(data.privacy);
                    $('#demoCon').html(data.privacy);
                    let pos = $('#privacyData').offset();$('body,html').animate({ scrollTop: pos.top });
                    $(elem).next().find('a[data-toggle="tab"]').click();
                }else{
                    sweetAlert(oopsStr, 'Failed!', "error");
                }
            });

        }
    }
    function prevTab(elem) {
        $(elem).prev().find('a[data-toggle="tab"]').click();
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
        let copyTextarea = document.querySelector('#privacyData');
        copyTextarea.select();
        try {
            var successful = document.execCommand('copy');
            var msg = successful ? 'successful' : 'unsuccessful';
            sweetAlert('Success', ' Copied to clipboard. You can paste your generated policy now.', "success");
        } catch (err) {
            sweetAlert(oopsStr, 'Unable to copy!', "error");
        }
    });
</script>