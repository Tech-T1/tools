<?php
defined('APP_NAME') or die(header('HTTP/1.0 403 Forbidden'));

/*
 * @author Balaji
 * @name A to Z SEO Tools - PHP Script
 * @copyright © 2018 ProThemes.Biz
 *
 */
?>
<link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/themes/smoothness/jquery-ui.css" />
<script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
<style>
table.calc td, .rgbtable td {
    padding: 3px;
}
#red, #green, #blue {
	float: left;
	clear: left;
	width: 300px;
	margin: 15px;
}
#swatch {
	width: 390px;
	height: 60px;
	margin-top: 5px;
	margin-left: 0px;
	background-image: none;
}
#red .ui-slider-range { background: #ef2929; }
#red .ui-slider-handle { border-color: #ef2929; }
#green .ui-slider-range { background: #8ae234; }
#green .ui-slider-handle { border-color: #8ae234; }
#blue .ui-slider-range { background: #729fcf; }
#blue .ui-slider-handle { border-color: #729fcf; }

.rgbtable input[type=text] { width:390px; padding-left:8px; }
.rgbtable input[type=number] { width:70px; padding-left:8px; }
@media all and (max-width: 576px) {
	#swatch { width:258px; }
	.rgbtable button { padding:7px 4px; margin-bottom:10px; }
	.rgbtable input[type=text], .rgbtable input[type=number] { padding:5px; font-size:x-large; width:258px; }
	.rgbtable { width:100%; padding:20px; }
	.rgbtable tr:nth-child(4) td { margin-top:-5px; padding-bottom:8px;}
	.rgbtable td:nth-child(3) { display:none;}
}
@media all and (min-width: 577px) {
	.rgbtable tr:nth-child(5) { line-height:60px; }
}
    
</style>
<script>
$( function() {
    function hexFromRGB(r, g, b) {
      var hex = [
        r.toString( 16 ),
        g.toString( 16 ),
        b.toString( 16 )
      ];
      $.each( hex, function( nr, val ) {
        if ( val.length === 1 ) {
          hex[ nr ] = "0" + val;
        }
      });
      return hex.join( "" ).toUpperCase();
    }
    function refreshSwatch() {
      var red = $( "#red" ).slider( "value" ),
        green = $( "#green" ).slider( "value" ),
        blue = $( "#blue" ).slider( "value" ),
        hex = hexFromRGB( red, green, blue );
        $( "#swatch" ).css( "background-color", "#" + hex );
        $("#r").val(red);
        $("#g").val(green);
        $("#b").val(blue);
    }

    $( "#red, #green, #blue" ).slider({
      orientation: "horizontal",
      range: "min",
      max: 255,
      value: 127,
      slide: refreshSwatch,
      change: refreshSwatch
    });
    clr();
} );

function onnumber(obj,n)
{
	var r=$("#r").val();
	var g=$("#g").val();
	var b=$("#b").val();
	if( n==1 )
		$("#red").slider("value", r);
	else if( n==2 )
		$("#green").slider("value", g);
	else
		$("#blue").slider("value", b);
}
function clr()
{
    $( "#red" ).slider( "value", 0 );
    $( "#green" ).slider( "value", 0 );
    $( "#blue" ).slider( "value", 0	 );
	$( "#swatch" ).css( "background-color", "white" );
	document.rgbtohex.reset();
}
function calc() 
{
	r = document.rgbtohex.r.value;
	g = document.rgbtohex.g.value;
	b = document.rgbtohex.b.value;
	if( r=="" ) r=0;
	if( g=="" ) g=0;
	if( b=="" ) b=0;
	r = parseInt(r);
	g = parseInt(g);
	b = parseInt(b);
	if( r<0 ) r=0;
	if( g<0 ) g=0;
	if( b<0 ) b=0;
	if( r>255 ) r=255;
	if( g>255 ) g=255;
	if( b>255 ) b=255;
	hex = r*65536+g*256+b;
	hex = hex.toString(16,6);
	len = hex.length;
	if( len<6 )
		for(i=0; i<6-len; i++)
			hex = '0'+hex;
 	document.rgbtohex.hex.value = '#'+hex.toUpperCase();
 	document.rgbtohex.rgb.value = 'rgb('+r+','+g+','+b+')';
 	var h,s,l;
 	r/=255;
 	g/=255;
 	b/=255;
 	var M = Math.max(r,g,b);
 	var m = Math.min(r,g,b);
 	var d = M-m;
 	if( d==0 ) h=0;
 	else if( M==r ) h=((g-b)/d)%6;
 	else if( M==g ) h=(b-r)/d+2;
 	else h=(r-g)/d+4;
 	h*=60;
 	if( h<0 ) h+=360;
 	l = (M+m)/2;
 	if( d==0 )
 		s = 0;
 	else
 		s = d/(1-Math.abs(2*l-1));
 	s*=100;
 	l*=100;
 	s = Math.round(s);
 	l = Math.round(l);
 	h = h.toFixed(0);
 	s = s.toFixed(0);
 	l = l.toFixed(0);
 	document.rgbtohex.hsl.value = 'hsl('+h+','+s+','+l+')';
}
</script>

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
            
            <br />
            
    <p><?php trans('Enter red, green and blue color levels (0-255) and press the <b>Convert</b> button', $lang['IP5']); ?>:</p>
    <form name="rgbtohex">
	<table class="rgbtable">
		<tr>
			<td><?php trans('Red color (R)', $lang['IP6']); ?>:</td>
			<td><input type="number" min="0" max="255" name="r" id="r" class="form-control" placeholder="0" tabindex="1" autofocus oninput="onnumber(this,1)"/></td>
			<td><div id="red"></div></td>
		</tr>
		<tr>
			<td><?php trans('Green color (G)', $lang['IP7']); ?>:</td>
			<td><input type="number" min="0" max="255" name="g" id="g" class="form-control" placeholder="0" tabindex="2" oninput="onnumber(this,2)"/></td>
			<td><div id="green"></div></td>
		</tr>
		<tr>
			<td><?php trans('Blue color (B)', $lang['IP8']); ?>:</td>
			<td><input type="number" min="0" max="255" name="b" id="b" class="form-control" placeholder="0" tabindex="3" oninput="onnumber(this,3)" /></td>
			<td><div id="blue"></div></td>
		</tr>
		<tr>
			<td><?php trans('Color preview', $lang['IP9']); ?>:</td>
			<td colspan="2"><div id="swatch" class="ui-widget-content ui-corner-all"></div></td>
		</tr>
		<tr>
			<td>&nbsp;</td>
		  	<td colspan="2">
				<button type="button" title="<?php trans('Convert', $lang['IP10']); ?>" class="btn btn-success" tabindex="4" onclick="calc()"> <?php trans('Convert', $lang['IP10']); ?></button>
				<button type="reset" title="<?php trans('Reset', $lang['IP11']); ?>" class="btn btn-danger" tabindex="5" onclick="clr()"> <?php trans('Reset', $lang['IP11']); ?></button>
		  	</td>
		</tr>
		<tr>
			<td><?php trans('Hex color code', $lang['IP12']); ?>:</td>
			<td colspan="2"><input type="text" name="hex" class="form-control" tabindex="7" readonly></td>
		</tr>
		<tr>
			<td><?php trans('RGB color code', $lang['IP13']); ?>:</td>
			<td colspan="2"><input type="text" name="rgb" class="form-control" tabindex="8" readonly></td>
		</tr>
		<tr>
			<td><?php trans('HSL color code', $lang['IP14']); ?>:</td>
			<td colspan="2"><input type="text" name="hsl" class="form-control" tabindex="9" readonly></td>
		</tr>
	</table>		
       </form>     
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