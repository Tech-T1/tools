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
    .outBox{
        margin-top: 50px;
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
                <h2 id="title"><?php echo $data['tool_name']; ?></h2>
            </div>

            <?php if($errorBox) { ?>
                <div class="alert alert-danger">
                    Your IFSC Code is invalid!
                </div>
                <div class="text-center">
                     <a class="btn btn-success" href="<?php echo $toolURL; ?>">Try New Code</a>
                </div>
            <?php } else { ?>

            <?php if($outputBox) { ?>

                    <div class="outBox" id="outBox">
                        <table class="table table-bordered">
                            <tr>
                                <td class="headtxt" colspan="2">Bank Details</td>
                            </tr>
                            <tr>
                                <td>IFSC Code</td>
                                <td><?php echo $ifscCode; ?></td>
                            </tr>
                            <tr>
                                <td>BANK</td>
                                <td><?php echo $bankDetails['BANK']; ?></td>
                            </tr>
                            <tr>
                                <td>BRANCH</td>
                                <td><?php echo $bankDetails['BRANCH']; ?></td>
                            </tr>
                            <tr>
                                <td>District</td>
                                <td><?php echo $bankDetails['CITY2']; ?></td>
                            </tr>
                            <tr>
                                <td>CITY</td>
                                <td><?php echo $bankDetails['CITY1']; ?></td>
                            </tr>
                            <tr>
                                <td>STATE</td>
                                <td><?php echo $bankDetails['STATE']; ?></td>
                            </tr>
                            <tr>
                                <td>BANK ADDRESS</td>
                                <td><?php echo $bankDetails['ADDRESS']; ?></td>
                            </tr>
                            <tr>
                                <td>PHONE NUMBER</td>
                                <td><?php echo $bankDetails['PHONE']; ?></td>
                            </tr>

                        </table>

                        <div class="text-center">
                            <a class="btn btn-success" href="<?php echo $toolURL; ?>">Find New</a>
                        </div>

                    </div>

            <?php   } else { ?>
            <form method="POST" action="<?php echo $toolOutputURL;?>" onsubmit="return checkData();">
                <div class="control-group">
                    <label>Enter the IFSC Code:</label>
                    <input class="form-control" id="ifsc" name="ifsc" placeholder="IFSC Code" />
                    <br>
                    <button class="btn btn-success">Find Now</button>
                </div>
            </form>
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


<script>

    function checkData(){
       let ifscCode = $('#ifsc').val();
       if(ifscCode == ''){
           sweetAlert(oopsStr, 'Enter your IFSC Code!', "error");
           return false;
       }
       return true;
    }

</script>