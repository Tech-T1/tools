<?php
defined('APP_NAME') or die(header('HTTP/1.1 403 Forbidden'));
/*
 * @author Balaji
 * @name: Rainbow PHP Framework
 * @Theme: Default Style
 * @copyright 2022 ProThemes.Biz
 *
 */
?>

<div class="col-md-4" id="rightCol">
    <div class="widget_tool_box box_shadow_border pn mb25">
        <ul>
            <li class="popular-seo-t pn">
                <h3 class="mn p10">Popular SEO Tools</h3>
            </li>
            <?php getPopSEOTools($con, $themeOptions['general']['popTools']); ?>
        </ul>
    </div>
    <div class="widget_tool_box box_shadow_border pn mb25">
        <ul>
            <li class="popular-seo-t pn">
                <h3 class="mn p10">Partners</h3>
            </li>
        </ul>
        <div class="clearfix"></div> <br>
        <?php if(isSelected($themeOptions['general']['sSearch'])){ ?>   
        <div id="sidebarSc" class="col-md-12">
            <div class="form-group">
                <div class="input-group green shadow">
                    <div class="input-group-addon"><i class="fa fa-search"></i></div>
                        <input type="text" class="form-control" placeholder="<?php echo $lang['AS39']; ?>" autocomplete="off" id="sidebarsearch" />
                    </div>
               	</div>
            <div class="search-results" id="sidebar-results"></div>
        </div>
        <?php } ?>

        <div class="sideXd">
        <?php echo $ads_250x300; ?>
        </div>
                
        <div class="sideXd">
        <?php echo $ads_250x125; ?>
        </div>

        <br>

    </div>
</div>