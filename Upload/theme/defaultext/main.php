<?php
defined('APP_NAME') or die(header('HTTP/1.1 403 Forbidden'));
/*
 * @author Balaji
 * @name: A to Z SEO Tools - PHP Script
 * @theme: Default Style
 * @copyright 2022 ProThemes.Biz
 *
 */
?>
<div class="container main-container">

<div class="row">
  	    <?php
        if($themeOptions['general']['sidebar'] == 'left')
            require_once(THEME_DIR."sidebar.php");
        ?>
  		<div class="col-md-8" id="seoTools">
        <?php if(isSelected($themeOptions['general']['iSearch'])){ ?>
        <div id="searchSec" class="col-md-12">
            <div class="form-group">
                <div class="input-group green shadow">
                    <div class="input-group-addon search-green"><i class="fa fa-search"></i></div>
                        <input type="text" class="form-control input-lg" placeholder="<?php echo $lang['AS30']; ?>" autocomplete="off" id="search" />
                    </div>
               	</div>
            <div class="search-results" id="index-results"></div>
            <hr />
        </div>      
        <?php } if($category){
            $count = 0;
            $unassigned = $tools;
            foreach ($ctools as $ctool){
                echo '<div class="col-md-12">'. (($count===0) ? '' : '<br><br>').'<h1 class="category_heading">'.$ctool[0].' <span> Tools</span></h1><p class="category_des">'.$ctool[1].'</p><div class="clearfix"></div><div class="category_box">';

                $toolsCount = 0; $customClass = false; $customCSS = '';

                if($ctool[3] === 2)
                    echo '<div class="col-md-6">'.$homePageAd.'</div>';

                foreach($ctool[2] as $toolsID) {

                    if(!isset($tools[$toolsID]))
                        continue;

                    if($customClass)
                        $cssClass = $customCSS;
                    else
                        $cssClass = 'col-sm-3 col-xs-6';

                    $tool = array(); $tool = $tools[$toolsID];
                    unset($unassigned[$toolsID]);

                    if ($tool[2] == '' || (!file_exists(THEME_DIR . $tool[2]))) $tool[2] = 'icons/no_image.png';
                    echo '<div class="'.$cssClass.'">
                        <div class="thumbnail">
                            <a class="seotoollink" data-placement="top" data-toggle="tooltip" data-original-title="' . $tool[0] . '" title="' . $tool[0] . '" href="' . $tool[1] . '"><img alt="' . $tool[0] . '" src="' . themeLink($tool[2], true) . '" class="seotoolimg" />
                            <div class="caption">
                                    ' . $tool[0] . '
                            </div></a>
                        </div>
                    </div>';

                    if($toolsCount === 3){
                        echo '<div class="clearfix"></div>';
                        $toolsCount = 0;
                        continue;
                    }

                    $toolsCount++;
                }
                echo '</div></div><div class="clearfix"></div>';
                $count++;
            }

            $toolsCount = $loop = 0;
            $closeAction = false;
            foreach ($unassigned as $tool){
                $loop++;
                $closeAction = true;
                if ($loop==1)
                    echo '<div class="col-md-12"><h1 class="category_heading">Unassigned <span> Tools</span></h1><div class="clearfix"></div><div class="category_box">';

                $cssClass = 'col-sm-3 col-xs-6';
                if ($tool[2] == '' || (!file_exists(THEME_DIR . $tool[2]))) $tool[2] = 'icons/no_image.png';
                echo '<div class="'.$cssClass.'">
                        <div class="thumbnail">
                            <a class="seotoollink" data-placement="top" data-toggle="tooltip" data-original-title="' . $tool[0] . '" title="' . $tool[0] . '" href="' . $tool[1] . '"><img alt="' . $tool[0] . '" src="' . themeLink($tool[2], true) . '" class="seotoolimg" />
                            <div class="caption">
                                    ' . $tool[0] . '
                            </div></a>
                        </div>
                    </div>';
                if($toolsCount === 3){
                    echo '<div class="clearfix"></div>';
                    $toolsCount = 0;
                    continue;
                }
                $toolsCount++;
            }

            if($closeAction) echo '</div></div><div class="clearfix"></div>';

            } else {

            $count = 1;
            $loop = $oneTime = $smCount = 0;
            $tools_count = count($tools);
            $browserBtn = isSelected($themeOptions['general']['browseBtn']);
            foreach ($tools as $tool) {
                $loop++;
                if ($count == 1) {
                    $smCount++;
                    if ($smCount == 4) {
                        if ($oneTime == 0) {
                            $oneTime = 1;
                            if ($browserBtn) echo '<div class="text-center moreToolsBut"><button class="btn btn-info" id="browseTools">' . $lang['AS11'] . '</button></div>';
                        }
                        echo $browserBtn ? '<div class="row hideAll">' : '<div class="row">';
                        $smCount--;
                    } else {
                        echo '<div class="row">';
                    }

                }
                if ($tool[2] == '' || (!file_exists(THEME_DIR . $tool[2]))) $tool[2] = 'icons/no_image.png';
                echo '   <div class="col-md-3">
                        <div class="thumbnail">
                            <a class="seotoollink" data-placement="top" data-toggle="tooltip" data-original-title="' . $tool[0] . '" title="' . $tool[0] . '" href="' . $tool[1] . '"><img alt="' . $tool[0] . '" src="' . themeLink($tool[2], true) . '" class="seotoolimg" />
                            <div class="caption">
                                    ' . $tool[0] . '
                            </div></a>
                        </div>
                    </div>';
                if ($loop == 20) { ?>
                    <div class="xd_top_box">
                        <?php echo $ads_468x70; ?>
                    </div>
                <?php }
                if ($tools_count == $loop) {
                    echo '</div><!-- /.row -->';
                    $count = 0;
                }
                if ($count == 4) {
                    $count = 0;
                    echo '</div><!-- /.row -->';
                }
                $count++;

            }
        }
        ?>
  		</div>
              
        <?php
        if($themeOptions['general']['sidebar'] == 'right')
            require_once(THEME_DIR."sidebar.php");
        ?>

  	</div>
</div> <br /> <br />