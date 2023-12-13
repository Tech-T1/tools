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
    .ytThumb h5{
        font-size: 18px;
        color: #2d3436;
        margin-top: 20px;
    }
    .ytThumb img{
        margin-top: 20px;
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


            <input aria-label="input URL" class="form-control" id="inputURL" placeholder="Enter the youtube URL here" type="url" name="url">

            <div class="text-center">
                <br>
                <button onclick="downloadYTthumb();" class="btn btn-danger" type="button">Get Thumbnail Images</button>
            </div>

            <div id="ytThumb" class="ytThumb" style="width:100%;left:0">
                <div id='topListing' style="display: none">

                    <h5 id='hdrestext'>HD Thumbnail Image (1280x720)</h5>
                    <a id="hdreslink" class="btn btn-success download-btn">Download HD Thumbnail Image</a><br>
                    <img class="imageres" id='maxres' src="" alt="" /> <br>

                    <h5 id='sdrestext'>SD Thumbnail Image (640x480)</h5>
                    <a id="sdreslink" class="btn btn-success download-btn">Download SD Thumbnail Image</a><br>
                    <img id='sdres' src="" alt="" /><br>

                </div>

                <div id='bottomListing' style="display: none">

                    <h5 id='normalrestext'>Normal Thumbnail Image (480x360)</h5>
                    <a id="hqreslink" class="btn btn-success download-btn">Download Normal Thumbnail Image(480x360)</a><br>
                    <img id='hqres' src="" alt="" /><br>

                    <div id='extraYTImg'>
                        <h5>Normal Image (320x180)</h5>
                        <a id="mqreslink" class="btn btn-success download-btn">Download Normal Thumbnail Image(320x180)</a><br>
                        <img id='mqres' src="" alt="" /><br>

                        <h5>Normal Image (120x90)</h5>
                        <a id="defreslink" class="btn btn-success download-btn">Download Normal Thumbnail Image(120x90)</a><br>
                        <img id='defres' src="" alt="" /><br>
                    </div>
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


<script>

    let downloadURL = '<?php makeJavascriptStr($downloadLink, true); ?>';

    $('.download-btn').click(function() {
        let id = this.getAttribute('data-id');
        let quality = this.getAttribute('data-quality');

        fetch(downloadURL + id + '/' + quality)
            .then(resp => resp.blob())
            .then(blob => {
                const url = window.URL.createObjectURL(blob);
                const a = document.createElement('a');
                a.style.display = 'none';
                a.href = url;
                a.download = id+"-"+quality+'.jpg';
                document.body.appendChild(a);
                a.click();
            });
    });

    function downloadYTthumb() {
        let value = document.getElementById("inputURL").value;
        let result = (checkURL(value));
        if (result === 0) {
            return 0;
        }
        appendData(result);
        return false;
    }

    function setDisplay(value) {
        let arrayOfElements = document.getElementsByClassName('download-btn');
        let lengthOfArray = arrayOfElements.length;

        for (var i = 0; i < lengthOfArray; i++) {
            arrayOfElements[i].style.display = value;
        }
    }

    function isMaxResAvailable(result) {
        let img = new Image();
        img.onload = function () {
            if (this.width < 1280) {

                document.getElementById("hdreslink").style.display = "none";
                document.getElementById("hdrestext").textContent = "High resolution not available";
                isSDAvailalbe(result);
            } else {
                document.getElementById("hdrestext").textContent = "HD Image (1280x720)";
            }
        }
        img.onerror = function () {
            document.getElementById("sdrestext").textContent = "High resolution not available";
            isSDAvailalbe(result);
        }
        img.src = "https://img.youtube.com/vi/" + result + "/maxresdefault.jpg";

    }

    function isSDAvailalbe(result) {
        var img = new Image()
        img.onload = function () {
            if (this.width === 120 && this.height === 90) {
                document.getElementById("sdrestext").textContent = "Standard Quality not available";
                document.getElementById("sdreslink").style.display = "none";
            } else {
                document.getElementById("sdrestext").textContent = "SD Image (640x480)";
            }
        }
        img.onerror = function () {
            document.getElementById("sdrestext").textContent = "Standard Quality not available";

        }
        img.src = "https://img.youtube.com/vi/" + result + "/sddefault.jpg";

    }
    
    function appendData(result) {

        setDisplay("block");

        document.getElementById('hdreslink').setAttribute("data-id", result);
        document.getElementById('hdreslink').setAttribute("data-quality", "HD");

        document.getElementById('sdreslink').setAttribute("data-id", result);
        document.getElementById('sdreslink').setAttribute("data-quality", "SD");


        document.getElementById('hqreslink').setAttribute("data-id", result);
        document.getElementById('hqreslink').setAttribute("data-quality", "HQ");


        document.getElementById('mqreslink').setAttribute("data-id", result);
        document.getElementById('mqreslink').setAttribute("data-quality", "MQ");

        document.getElementById('defreslink').setAttribute("data-id", result);
        document.getElementById('defreslink').setAttribute("data-quality", "default");


        document.getElementById("hdreslink").style.display = "inline";
        document.getElementById("sdreslink").style.display = "inline";
        document.getElementById("hqreslink").style.display = "inline";
        document.getElementById("inputURL").value = "https://youtube.com/watch?v=" + result;
        document.getElementById("ytThumb").style.display = "block";
        document.getElementById("bottomListing").style.display = "block";
        document.getElementById("topListing").style.display = "block";
        document.getElementById("hdrestext").textContent = "HD Image (1280x720)";
        document.getElementById("sdrestext").textContent = "SD Image (640x480)";
        document.getElementById("normalrestext").textContent = "Normal Image (480x360)";
        document.getElementById("maxres").setAttribute("src", "https://img.youtube.com/vi/" + result + "/maxresdefault.jpg");
        document.getElementById("sdres").setAttribute("src", "https://img.youtube.com/vi/" + result + "/sddefault.jpg");
        document.getElementById("hqres").setAttribute("src", "https://i3.ytimg.com/vi/" + result + "/hqdefault.jpg");
        document.getElementById("mqres").setAttribute("src", "https://img.youtube.com/vi/" + result + "/mqdefault.jpg");
        document.getElementById("defres").setAttribute("src", "https://img.youtube.com/vi/" + result + "/default.jpg");
        isMaxResAvailable(result);

        document.getElementById("extraYTImg").style.display = "inline-block";
    }

    function checkURL(data) {

        let res = data.match(/(?:https?:\/{2})?(?:w{3}\.)?youtu(?:be)?\.(?:com|be)(?:\/watch\?v=|\/)([^\s&]+)/);
        if (res == undefined) {
            sweetAlert(oopsStr, 'Please check the URL you have entered!', "error");
            return 0;
        }
        return res[1];
    }

</script>