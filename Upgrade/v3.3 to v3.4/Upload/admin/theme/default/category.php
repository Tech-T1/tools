<?php
defined('APP_NAME') or die(header('HTTP/1.1 403 Forbidden'));

/*
 * @author Balaji
 * @name: Rainbow PHP Framework
 * @copyright 2022 ProThemes.Biz
 *
 */
?>   
      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            <?php echo $pageTitle; ?>  
            <small>Control panel</small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="<?php adminLink(); ?>"><i class="<?php getAdminMenuIcon($controller,$menuBarLinks); ?>"></i> Admin</a></li>
            <li class="active"><a href="<?php adminLink($controller); ?>"><?php echo $pageTitle; ?></a> </li>
          </ol>
        </section>

        <!-- Main content -->
        <section class="content">
        
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title"><?php echo $subTitle; ?></h3>
                <?php if($pointOut == ''){ ?>
                    <div style="position:absolute; top:4px; right:15px;">
                        <?php if($category) { ?>
                            <a class="btn btn-danger btn-sm" href="<?php adminLink($controller.'/category-option/disable'); ?>"><i class="fa fa-exclamation"></i> &nbsp; Disable category wise option</a>
                        <?php } else { ?>
                            <a class="btn btn-primary btn-sm" href="<?php adminLink($controller.'/category-option/enable'); ?>"><i class="fa fa-check"></i> &nbsp; Enable category wise option</a>
                        <?php } ?>

                        <a class="btn btn-success btn-sm" href="<?php adminLink($controller.'/page/add'); ?>"><i class="fa fa-plus"></i> &nbsp; Add Category</a>
                    </div>
                <?php }elseif($pointOut === 'page') { ?>
                    <div style="position:absolute; top:4px; right:15px;">
                        <a class="btn btn-danger btn-sm" href="<?php adminLink($controller); ?>"><i class="fa fa-arrow-left"></i> &nbsp; Go Back</a>
                    </div>
                <?php } ?>
            </div><!-- /.box-header -->
            <form action="#" method="POST">
            <div class="box-body">
          
            <?php if(isset($msg)) echo $msg; ?> <br />
            
            <?php if($pointOut == 'page') { ?>

                <div class="form-group">
                    <label>Name</label>
                    <input type="text" placeholder="Enter category name" name="cat[name]" value="<?php echo $cat['name']; ?>" class="form-control"/>
                </div>

                <div class="form-group">
                    <label>Description</label>
                    <textarea placeholder="Enter category description" name="cat[des]" class="form-control"><?php echo $cat['des']; ?></textarea>
                </div>

                <div class="form-group">
                    <label>Sort Order <small>(Optional)</small></label>
                    <input type="number" name="cat[sort]" value="<?php echo $cat['sort']; ?>" class="form-control"/>
                </div>

                <div class="form-group">
                    <label>Enable the Category</label>
                    <select class="form-control" name="cat[enabled]">
                        <option <?php isSelected($cat['enabled'],true, '1'); ?> value="1">Enabled</option>
                        <option <?php isSelected($cat['enabled'],false, '1'); ?>  value="0">Disabled</option>
                    </select>
                </div>

                <div class="form-group">
                    <label>Select Tools:</label>
                    <select name="cat[tools][]" class="form-control select2" multiple="multiple" data-placeholder="Select tools for this category?" style="width: 100%;">
                        <?php
                        foreach($tools as $toolID => $tool) {
                            if (!in_array($toolID, $cat['tools'])) echo '<option value="' . $toolID . '">' . $tool . '</option>';
                        }
                        foreach ($cat['tools'] as $tool) echo  '<option selected="" value="'.$tool.'">'.$tools[$tool].'</option>';
                        ?>
                    </select>
                </div>
                <br>
                <div class="text-center">
                    <?php if($editPage) { ?>
                        <input id="submit" class="btn btn-primary" type="submit" value="Update">
                    <?php }else { ?>
                        <input id="submit" class="btn btn-primary" type="submit" value="Save">
                    <?php } ?>
                </div>
                <br><br>
            <?php } else { ?>
            <table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered" id="mySitesTable">
            	<thead>
            		<tr>
                          <th>Sort Order</th>
                          <th>Name</th>
                          <th>Status</th>
                          <th>Actions</th>
            		</tr>
            	</thead>         
                <tbody>                        
                </tbody>
            </table>
            <?php } ?>
            </div><!-- /.box-body -->
            </form>
          </div><!-- /.box -->
            
        </section><!-- /.content -->
      </div><!-- /.content-wrapper -->
      
<?php
$ajaxLink = adminLink('?route='.$controller.'/ajax/getData&process',true);
$footerAddArr[] = <<<EOD
    <script type="text/javascript" language="javascript" class="init">
    $(document).ready(function() {
    	$('#mySitesTable').dataTable( {
    		"processing": true,
    		"serverSide": true,
    		"ajax": "$ajaxLink"
    	});
    });
    </script>    
EOD;
$footerAddArr[] = '    <script> 
       $(function () {
        //Initialize Select2 Elements
        $(".select2").select2();
        
        $("select").on("select2:select", function (evt) {
          var element = evt.params.data.element;
          var $element = $(element);
          
          $element.detach();
          $(this).append($element);
          $(this).trigger("change");
        });
        
        });
    </script>';
?>