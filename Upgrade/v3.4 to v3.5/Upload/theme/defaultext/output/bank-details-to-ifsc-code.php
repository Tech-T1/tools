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
.control-group{
    margin-bottom: 20px;
}
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

            <div class="control-group">
            <label>Select your bank</label>
                <select id="bank" class="form-control">
                    <option selected disabled>Select Bank</option>
                    <option>ABHYUDAYA COOPERATIVE BANK LIMITED</option><option>THE AKOLA DISTRICT CENTRAL COOPERATIVE BANK</option><option>THE AHMEDNAGAR DISTRICT CENTRAL CO-OPERATIVE BANK LTD</option><option>AIRTEL PAYMENTS BANK LIMITED</option><option>The Ajara Urban Co op Bank Ltd Ajara</option><option>AMBARNATH JAIHIND COOP BANK LTD AMBARNATH</option><option>AKOLA JANATA COMMERCIAL COOPERATIVE BANK</option><option>AHMEDABAD MERCANTILE COOPERATIVE BANK</option><option>AHMEDNAGAR MERCHANTS CO-OP BANK LTD</option><option>AUSTRALIA AND NEW ZEALAND BANKING GROUP LIMITED</option><option>THE ANDHRA PRADESH STATE COOPERATIVE BANK LIMITED</option><option>ANDHRA PRAGATHI GRAMEENA BANK</option><option>ANDHRA PRADESH GRAMEENA VIKAS BANK</option><option>THE A.P. MAHESH COOPERATIVE URBAN BANK LIMITED</option><option>ARVIND SAHAKARI BANK LTD</option><option>APNA SAHAKARI BANK LIMITED</option><option>AU SMALL FINANCE BANK LIMITED</option><option>ALMORA URBAN COOPERATIVE BANK LIMITED</option><option>BASSEIN CATHOLIC COOPERATIVE BANK LIMITED</option><option>THE BARAMATI SAHAKARI BANK LTD</option><option>BANK OF BARODA</option><option>BARCLAYS BANK</option><option>BANK OF BAHARAIN AND KUWAIT BSC</option><option>BHARAT COOPERATIVE BANK MUMBAI LIMITED</option><option>BANK OF CEYLON</option><option>BANDHAN BANK LIMITED</option><option>BANK OF INDIA</option><option>BOMBAY MERCANTILE COOPERATIVE BANK LTD</option><option>B N P PARIBAS</option><option>BHAGINI NIVEDITA SAHAKARI BANK LTD PUNE</option><option>BANK OF AMERICA</option><option>MUFG BANK, LTD</option><option>CENTRAL BANK OF INDIA</option><option>CITIZEN CREDIT COOPERATIVE BANK LIMITED</option><option>JP MORGAN BANK</option><option>CITI BANK</option><option>CITY UNION BANK LIMITED</option><option>CAPITAL SMALL FINANCE BANK LIMITED</option><option>CANARA BANK</option><option>COASTAL LOCAL AREA BANK LTD</option><option>THE COSMOS CO OPERATIVE BANK LIMITED</option><option>CREDIT SUISEE AG</option><option>CHHATTISGARH RAJYA GRAMIN BANK</option><option>CREDIT AGRICOLE CORPORATE AND INVESTMENT BANK CALYON BANK</option><option>SHRI CHHATRAPATI RAJASHRI SHAHU URBAN COOPERATIVE BANK LIMITED</option><option>CSB BANK LIMITED</option><option>CTBC BANK CO LTD</option><option>DBS BANK INDIA LIMITED</option><option>DCB BANK LIMITED</option><option>Darussalam Co operative Urban Bank Ltd</option><option>DEOGIRI NAGARI SAHAKARI BANK LTD. AURANGABAD</option><option>DEUSTCHE BANK</option><option>DEPOSIT INSURANCE AND CREDIT GUARANTEE CORPORATION</option><option>THE DELHI STATE COOPERATIVE BANK LIMITED</option><option>DHANALAKSHMI BANK</option><option>DMK JAOLI BANK</option><option>DOMBIVLI NAGARI SAHAKARI BANK LIMITED</option><option>DOHA BANK</option><option>DURGAPUR STEEL PEOPLES CO-OPERATIVE BANK LTD</option><option>EMIRATES NBD BANK P J S C</option><option>EXPORT IMPORT BANK OF INDIA</option><option>EQUITAS SMALL FINANCE BANK LIMITED</option><option>ESAF SMALL FINANCE BANK LIMITED</option><option>FEDERAL BANK</option><option>FINO PAYMENTS BANK</option><option>FIRSTRAND BANK LIMITED</option><option>FINCARE SMALL FINANCE BANK LTD</option><option>THE GREATER BOMBAY COOPERATIVE BANK LIMITED</option><option>THE GADCHIROLI DISTRICT CENTRAL COOPERATIVE BANK LIMITED</option><option>THE GUJARAT STATE COOPERATIVE BANK LIMITED</option><option>HARYANA STATE COOPERATIVE BANK</option><option>THE HASTI COOP BANK LTD</option><option>HDFC BANK</option><option>HIMACHAL PRADESH STATE COOPERATIVE BANK LTD</option><option>HSBC BANK</option><option>Hutatma Sahakari Bank Ltd</option><option>WOORI BANK</option><option>PT BANK MAYBANK INDONESIA TBK</option><option>IDBI BANK</option><option>INDUSTRIAL BANK OF KOREA</option><option>INDUSTRIAL AND COMMERCIAL BANK OF CHINA LIMITED</option><option>ICICI BANK LIMITED</option><option>IDFC First Bank Ltd</option><option>IDFC FIRST BANK LTD</option><option>INDIAN BANK</option><option>IDUKKI DISTRICT CO OPERATIVE BANK LTD</option><option>INDUSIND BANK</option><option>INDIAN OVERSEAS BANK</option><option>INDIA POST PAYMENT BANK</option><option>Irinjalakuda Town Co-Operative Bank Ltd</option><option>JAMMU AND KASHMIR BANK LIMITED</option><option>JANASEVA SAHAKARI BANK LIMITED</option><option>JANASEVA SAHAKARI BANK BORIVLI LIMITED</option><option>JIO PAYMENTS BANK LIMITED</option><option>JALGAON JANATA SAHAKARI BANK LIMITED</option><option>THE JALGAON PEOPELS COOPERATIVE BANK LIMITED</option><option>JANAKALYAN SAHAKARI BANK LIMITED</option><option>JANATA SAHAKARI BANK LIMITED</option><option>JANA SMALL FINANCE BANK LTD</option><option>JANATHA SEVA COOPERATIVE BANK LTD</option><option>THE KANGRA CENTRAL COOPERATIVE BANK LIMITED</option><option>KALLAPPANNA AWADE ICHALKARANJI JANATA SAHAKARI BANK LIMITED</option><option>THE KANGRA COOPERATIVE BANK LIMITED</option><option>KARNATAKA BANK LIMITED</option><option>KOOKMIN BANK</option><option>KALUPUR COMMERCIAL COOPERATIVE BANK</option><option>KOZHIKODE DISTRICT COOPERATIAVE BANK LTD</option><option>THE KALYAN JANATA SAHAKARI BANK LTD.</option><option>KOTAK MAHINDRA BANK LIMITED</option><option>KERALA GRAMIN BANK</option><option>THE KURMANCHAL NAGAR SAHAKARI BANK LIMITED</option><option>KEB Hana Bank</option><option>The Kolhapur Urban Co-op Bank Ltd</option><option>The Kerala State Co Operative Bank Ltd</option><option>THE KARANATAKA STATE COOPERATIVE APEX BANK LIMITED</option><option>THE KARAD URBAN COOPERATIVE BANK LIMITED</option><option>KARUR VYSYA BANK</option><option>KARNATAKA VIKAS GRAMEENA BANK</option><option>BANK OF MAHARASHTRA</option><option>Maharashtra Gramin Bank</option><option>The Meghalaya Co-operative Apex Bank Ltd</option><option>GS Mahanagar Co-operative Bank Limited, Mumbai</option><option>MODEL COOPERATIVE BANK LTD</option><option>THE MUMBAI DISTRICT CENTRAL COOPERATIVE BANK LIMITED</option><option>MIZUHO BANK LTD</option><option>The Malkapur Urban Co Operative Bank Ltd Malkapur</option><option>Mahesh Sahakari Bank Ltd Pune</option><option>MAHARASHTRA STATE COOPERATIVE BANK</option><option>MASHREQBANK PSC</option><option>The Muslim Co-operative Bank Ltd</option><option>THE MEHSANA URBAN COOPERATIVE BANK</option><option>THE MUNICIPAL COOPERATIVE BANK LIMITED</option><option>SIR M VISVESVARAYA CO OPERATIVE BANK LTD</option><option>FIRST ABU DHABI BANK PJSC</option><option>NATIONAL BANK FOR AGRICULTURE AND RURAL DEVELOPMENT</option><option>THE NILAMBUR CO OPERATIVE URBAN BANK LTD NILAMBUR</option><option>NORTH EAST SMALL FINANCE BANK LIMITED</option><option>NAGPUR NAGARIK SAHAKARI BANK LIMITED</option><option>NEW INDIA COOPERATIVE BANK LIMITED</option><option>NAV JEEVAN CO OP BANK LTD</option><option>NKGSB COOPERATIVE BANK LIMITED</option><option>THE NASIK MERCHANTS COOPERATIVE BANK LIMITED</option><option>NUTAN NAGARIK SAHAKARI BANK LIMITED</option><option>THE BANK OF NOVA SCOTIA</option><option>NSDL Payments Bank Limited</option><option>THE NAINITAL BANK LIMITED</option><option>NAGAR URBAN CO OPERATIVE BANK</option><option>THE NAVNIRMAN CO-OPERATIVE BANK LIMITED</option><option>THE ODISHA STATE COOPERATIVE BANK LTD</option><option>G P PARSIK BANK</option><option>KARNATAKA GRAMIN BANK</option><option>PRIME COOPERATIVE BANK LIMITED</option><option>Pavana Sahakari Bank LTD</option><option>PUNJAB AND SIND BANK</option><option>THE PANDHARPUR URBAN CO OP. BANK LTD. PANDHARPUR</option><option>PUNJAB NATIONAL BANK</option><option>The Pusad Urban Cooperative Bank Ltd Pusad</option><option>PAYTM PAYMENTS BANK LTD</option><option>QATAR NATIONAL BANK SAQ</option><option>RABOBANK INTERNATIONAL</option><option>RBL Bank Limited</option><option>RBL BANK LIMITED</option><option>RESERVE BANK OF INDIA</option><option>Rajnandgaon District Central Co-operative Bank Ltd</option><option>RAJASTHAN MARUDHARA GRAMIN BANK</option><option>RAJKOT NAGRIK SAHAKARI BANK LIMITED</option><option>RAJARAMBAPU SAHAKARI BANK LIMITED</option><option>RAJGURUNAGAR SAHAKARI BANK LIMITED</option><option>THE RAJASTHAN STATE COOPERATIVE BANK LIMITED</option><option>RAJARSHI SHAHU SAHAKARI BANK LTD  PUNE</option><option>SBER BANK</option><option>SAHEBRAO DESHMUKH COOPERATIVE BANK LIMITED</option><option>SANT SOPANKAKA SAHAKARI BANK LTD</option><option>STATE BANK OF INDIA</option><option>SAMARTH SAHAKARI BANK LTD</option><option>STANDARD CHARTERED BANK</option><option>THE SURAT DISTRICT COOPERATIVE BANK LIMITED</option><option>THE SATARA DISTRICT CENTRAL COOPERATIVE BANK LTD</option><option>SREE CHARAN SOUHARDHA CO OPERATIVE BANK LTD</option><option>SHINHAN BANK</option><option>SOUTH INDIAN BANK</option><option>THE SINDHUDURG DISTRICT CENTRAL COOP BANK LTD</option><option>SOLAPUR JANATA SAHAKARI BANK LIMITED</option><option>Shree Kadi Nagarik Sahakari Bank Limited</option><option>SHIKSHAK SAHAKARI BANK LIMITED</option><option>SUMITOMO MITSUI BANKING CORPORATION</option><option>Shivalik Small Finance Bank Limited</option><option>Smriti Nagrik Sahakari Bank Maryadit</option><option>Saraspur Nagrik Co operative Bank Ltd Saraspur</option><option>SOCIETE GENERALE</option><option>THE SURATH PEOPLES COOPERATIVE BANK LIMITED</option><option>SARASWAT COOPERATIVE BANK LIMITED</option><option>SBM BANK INDIA LIMITED</option><option>SURAT NATIONAL COOPERATIVE BANK LIMITED</option><option>SURYODAY SMALL FINANCE BANK LIMITED</option><option>Suco Souharda Sahakari Bank Ltd</option><option>SUTEX COOPERATIVE BANK LIMITED</option><option>THE SEVA VIKAS COOPERATIVE BANK LIMITED</option><option>THE SHAMRAO VITHAL COOPERATIVE BANK</option><option>Shri Veershaiv Co Op Bank Ltd</option><option>The Akola Urban Cooperative Bank Limited</option><option>The Banaskantha Mercantile Cooperative Bank Ltd</option><option>THE THANE BHARAT SAHAKARI BANK LIMITED</option><option>THE THANE DISTRICT CENTRAL COOPERATIVE BANK LIMITED</option><option>TUMKUR GRAIN MERCHANTS COOPERATIVE BANK LIMITED</option><option>THRISSUR DISTRICT CO-OPERATIVE BANK LTD</option><option>TJSB SAHAKARI BANK LTD</option><option>TAMILNAD MERCANTILE BANK LIMITED</option><option>The Malad Sahakari Bank Ltd</option><option>THE NAWANAGAR COOPERATIVE BANK LTD</option><option>THE TAMIL NADU STATE APEX COOPERATIVE BANK</option><option>THE PUNJAB STATE COOPERATIVE BANK LTD</option><option>TELANGANA STATE COOP APEX BANK</option><option>Satara Sahakari Bank Ltd</option><option>TEXTILE TRADERS CO OPERATIVE BANK LTD</option><option>UNION BANK OF INDIA</option><option>UCO BANK</option><option>Ujjivan Small Finance Bank Limited</option><option>UNITED OVERSEAS BANK LIMITED</option><option>UTTAR PRADESH COOPERATIVE BANK LTD</option><option>THE URBAN CO OPERATIVE BANK Ltd No ONE SEVEN FIVE EIGHT PERINTHALMANNA</option><option>AXIS BANK</option><option>UTKARSH SMALL FINANCE BANK</option><option>THE UDAIPUR URBAN CO OPERATIVE BANK LTD</option><option>THE VARACHHA COOPERATIVE BANK LIMITED</option><option>VASAI JANATA SAHAKARI BANK LTD</option><option>The Vijay Co Operative Bank Limited</option><option>THE VISHWESHWAR SAHAKARI BANK LIMITED</option><option>VASAI VIKAS SAHAKARI BANK LIMITED</option><option>THE WEST BENGAL STATE COOPERATIVE BANK</option><option>YES BANK</option><option>THE ZOROASTRIAN COOPERATIVE BANK LIMITED</option><option>ZILA SAHAKRI BANK LIMITED GHAZIABAD</option>
                </select>
            </div>

            <div class="control-group">
                <label>State in which bank is situated</label>
                <select id="state" class="form-control">
                    <option selected disabled>Select State</option>
                </select>
            </div>

            <div class="control-group">
                <label>District in which bank is situated</label>
                <select id="district" class="form-control">
                    <option selected disabled>Select District</option>
                </select>
            </div>

            <div class="control-group">
                <label>Branch of Bank within District</label>
                <select id="branch" class="form-control">
                    <option selected disabled>Select Branch</option>
                </select>
            </div>

            <button id="findNow" class="btn btn-danger">Find Now</button>

            <br />

            <div class="outBox hide" id="outBox">
                <table class="table table-bordered">
                    <tr>
                        <td class="headtxt" colspan="2">Bank Details</td>
                    </tr>
                    <tr class="text-center">
                        <td>IFSC Code</td>
                        <td class="outtxt" id="ifsc"></td>
                    </tr>
                    <tr class="text-center">
                        <td>Bank Address</td>
                        <td id="address"></td>
                    </tr>
                </table>

                <div class="text-center">
                    <a class="btn btn-success" href="<?php echo $toolURL; ?>">Find New</a>
                </div>

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
    let toolURL = '<?php makeJavascriptStr($toolURL . '/ajax', true); ?>';
    let bankName, state, district, branch = '';
    $('#bank').on('change', function() {

        $('#state').html("<option selected disabled>Select State</option>");
        $('#district').html("<option selected disabled>Select District</option>");
        $('#branch').html("<option selected disabled>Select Branch</option>");
        state, district, branch = '';

         bankName = this.options[this.selectedIndex].text;
         $.get(toolURL + '/bank/' + bankName,function(data){
            if(data.success){

                $.each(data.states, function(key, value) {
                    $('#state')
                        .append($("<option></option>")
                            .attr("value", key)
                            .text(key));
                });
            }else{
                sweetAlert(oopsStr, 'Failed!', "error");
            }
         });
    });

    $('#state').on('change', function() {

        $('#district').html("<option selected disabled>Select District</option>");
        $('#branch').html("<option selected disabled>Select Branch</option>");
        district, branch = '';

        state = this.options[this.selectedIndex].text;
        $.get(toolURL + '/state/' + bankName + '/' + state,function(data){
            if(data.success){

                $.each(data.districts, function(key, value) {
                    $('#district')
                        .append($("<option></option>")
                            .attr("value", key)
                            .text(key));
                });
            }else{
                sweetAlert(oopsStr, 'Failed!', "error");
            }
        });
    });

    $('#district').on('change', function() {

        $('#branch').html("<option selected disabled>Select Branch</option>");
        branch = '';

        district = this.options[this.selectedIndex].text;
        $.get(toolURL + '/district/' + bankName + '/' + state + '/' + district,function(data){
            if(data.success){

                $.each(data.branch, function(key, value) {
                    $('#branch')
                        .append($("<option></option>")
                            .attr("value", key)
                            .text(key));
                });
            }else{
                sweetAlert(oopsStr, 'Failed!', "error");
            }
        });
    });

    $('#branch').on('change', function() {
        branch = this.options[this.selectedIndex].text;
    });

    $("#findNow").click(function() {

        if(bankName == ''){
            sweetAlert(oopsStr, 'Select Bank!', "error");
        }else if(state == ''){
            sweetAlert(oopsStr, 'Select State!', "error");
        }else if(district == ''){
            sweetAlert(oopsStr, 'Select District!', "error");
        }else if(branch == ''){
            sweetAlert(oopsStr, 'Select Branch!', "error");
        }else{
            $.get(toolURL + '/search/' + bankName + '/' + state + '/' + district + '/' + branch,function(data){
                if(data.success){
                    $('#ifsc').html(data.ifsc);
                    $('#address').html(data.all.ADDRESS);
                    $('#outBox').removeClass("hide");
                    let pos = $('.outBox').offset();$('body,html').animate({ scrollTop: pos.top });
                }else{
                    sweetAlert(oopsStr, 'Failed!', "error");
                }
            });
        }
    });

</script>