<?php
defined('APP_NAME') or die(header('HTTP/1.1 403 Forbidden'));

/*
 * @author Balaji
 * @name A to Z SEO Tools - PHP Script
 * @copyright 2022 ProThemes.Biz
 *
 */
?>

<!-- Bootstrap Color Picker CSS -->
<link href="<?php themeLink('css/colorpicker/bootstrap-colorpicker.min.css'); ?>" rel="stylesheet"/>

<style>
    .top40{
        margin-top: 40px;
    }
    .input-group > .form-control{
        box-shadow: none;
    }
    .highlight{
        color: #c0392b;
    }
    .form-control[disabled], .form-control[readonly], fieldset[disabled] .form-control {
        background-color: #ecf5f5;
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

            <div class="row top40">
                <div class="col-md-6">
                    <label>Image Size: <small class="highlight">(Width x Height)</small> </label>
                    <input type="text" id="imageSize" value="<?php echo $size; ?>" class="form-control">

                    <br>

                    <label>Text Color: </label>
                    <div class="input-group colorpicker-element">
                        <input type="text" value="#<?php echo $textColor; ?>" class="form-control" name="textColor" id="textColor" />
                        <span class="input-group-addon"><i id="textColorAdd" style="background-color: #<?php echo $textColor; ?>;"></i></span>
                    </div>

                </div>
                <div class="col-md-6">
                    <label>Background Color: </label>

                    <div class="input-group colorpicker-element">
                        <input type="text" value="#<?php echo $backColor; ?>" class="form-control" name="backColor" id="backColor" />
                        <span class="input-group-addon"><i id="backColorAdd" style="background-color: #<?php echo $backColor; ?>;"></i></span>
                    </div>

                    <br>

                    <label>Image Format: </label>
                    <select class="form-control" id="format">
                        <option selected value="">Default</option>
                        <?php foreach($supportedFormats as $format){
                            echo '<option value="'.$format.'">'.strtoupper($format).'</option>';
                        }
                        ?>
                    </select>

                </div>

                <div class="col-md-12">
                    <br>
                    <label>Custom Text:</label>
                    <input type="text" id="customText" value="<?php echo $customText; ?>" class="form-control">
                </div>

            </div>
            <div class="row top40">

                <div class="col-md-12">
                    <label>Image Link:</label>
                </div>
                <div class="col-md-10">
                    <input readonly type="text" id="imageLink" value="<?php echo $imageLink; ?>" class="form-control">
                </div>
                <div class="col-md-2">
                    <button id="copyStr" class="btn btn-success">Copy</button>
                </div>

                <div class="col-md-12 top40">
                    <label>Image Preview:</label>
                    <br>
                    <img id="previewImage" class="imageres" src="<?php echo $imageLink; ?>" alt="Preview Image" />

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
<!-- JavaScript -->
<script src="<?php themeLink('js/plugins/colorpicker/bootstrap-colorpicker.min.js'); ?>" type="text/javascript"></script>

<script>
    let placeholderURL = '<?php makeJavascriptStr($placeholderURL, true); ?>';
    let backColor, textColor, imageSize, imageLink, customText, format;

    function updateMe(){
        let additional = '';

        imageSize = $('#imageSize').val();
        backColor = $('#backColor').val().replace("#", "");
        textColor = $('#textColor').val().replace("#", "");
        customText = $('#customText').val();
        format = $('#format').val();

        if(customText == ''){
            if(format != '')
                additional = '.' + format;
        }else{
            additional = '/' + customText;
            if(format != '')
                additional = additional + '/' + format;
        }

        imageLink = placeholderURL + imageSize + '/' + backColor + '/' + textColor + additional;
        $('#imageLink').val(imageLink);
        $("#previewImage").attr("src",imageLink);
    }

    $('#backColorAdd').click(function(){
        $('#backColor').colorpicker('show');
    });
    $('#backColor').colorpicker().on('changeColor', function() {
       $('#backColorAdd').css("background-color", $(this).data('colorpicker').color);
        updateMe();
    });

    $('#textColorAdd').click(function(){
        $('#textColor').colorpicker('show');
    });
    $('#textColor').colorpicker().on('changeColor', function() {
        $('#textColorAdd').css("background-color", $(this).data('colorpicker').color);
        updateMe();
    });

    $('#imageSize').on('change', function() {
        updateMe();
    });
    $('#customText').on('change', function() {
        updateMe();
    });
    $('#format').on('change', function() {
        updateMe();
    });

    $("#copyStr").click(function() {
        let copyTextarea = document.querySelector('#imageLink');
        copyTextarea.select();
        try {
            var successful = document.execCommand('copy');
            var msg = successful ? 'successful' : 'unsuccessful';
            sweetAlert('Success', 'Image link has been copied to clipboard', "success");
        } catch (err) {
            sweetAlert(oopsStr, 'Unable to copy!', "error");
        }
    });

</script>