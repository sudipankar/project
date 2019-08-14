<?php $__env->startSection('content'); ?>
<div class="container">
  <!-- page content -->
        <div class="right_col" role="main">
          <div class="">
            <div class="clearfix"></div>
            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2><?php echo e(($ebook) ? 'Edit' : 'Add'); ?> Ebook</h2>
                    <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                      </li>
                      <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
                        <ul class="dropdown-menu" role="menu">
                          <li><a href="#">Settings 1</a>
                          </li>
                          <li><a href="#">Settings 2</a>
                          </li>
                        </ul>
                      </li>
                      <li><a class="close-link"><i class="fa fa-close"></i></a>
                      </li>
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
				  <?php $site_url=URL::to('/');?>
                    <br />
					<?php if(isset($ebook)&&$ebook!=''){?>
					 <form id="ebook_form" data-parsley-validate class="form-horizontal form-label-left" enctype="multipart/form-data" method="post" action="<?php echo $site_url?>/ebooks/ebook_form_edit_submit/'. ($ebook ? $ebook->id : '') }}">
					 <input type="hidden" name="ebook_id" value="<?php echo $ebook->id;?>">
					  <?php echo csrf_field(); ?>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Title <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" id="title" name="title" required="required" class="form-control col-md-12 col-xs-12" value="<?php echo e($ebook ? $ebook->ebook_title : ''); ?>">
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="email">Description <span class="required"></span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <textarea class="resizable_textarea form-control" name="description" placeholder="Ebook Description"><?php echo e($ebook ? $ebook->ebook_desc : ''); ?></textarea>
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="email">Price <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" id="price" name="price"  required="required" class="form-control col-md-12 col-xs-12" value="<?php echo e($ebook ? $ebook->price : ''); ?>">
                        </div>
                      </div>
                      <div class="form-group">
                        <label for="country" class="control-label col-md-3 col-sm-3 col-xs-12">Profession</label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <select id="profession" class="form-control col-md-12 col-xs-12" name="profession">
                            <option value="0">-- Select --</option>
                            <?php $__currentLoopData = $professions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $profession): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                              <option value="<?php echo e($profession->id); ?>" <?php echo e(($ebook && $ebook->professions_id == $profession->id) ? "selected" : ""); ?>><?php echo e($profession->cat_name); ?></option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                          </select>
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Ebook Type</label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <div id="ebook_type" class="btn-group">
                            <label class="btn btn-primary">
                              <input type="radio" class="ebook_type" checked name="ebook_type" value="upload"> &nbsp; Upload &nbsp;
                            </label>
                            <label class="btn">
                              <input type="radio" class="ebook_type" name="ebook_type" value="create"> Create
                            </label>
                          </div>
                        </div>
                      </div>
                      <div class="form-group upload_ebook">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Add Ebook</label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="file" id="ebook_file" name="ebook_file" class="form-control-file">
                        </div>
                      </div>
                      <div class="form-group create_ebook" style="display:none;">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Add Ebook</label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <textarea class="form-control" name="ebook_content" id="summary-ckeditor"></textarea>
                        </div>
                      </div>
                      <div class="ln_solid"></div>
                      <div class="form-group">
                        <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                          <a href="<?php echo e(route('ebooks')); ?>" class="btn btn-primary">Back</a>
                    <!-- <button class="btn btn-primary" type="reset">Reset</button> -->
                          <input type="submit" class="btn btn-success" value="Update Ebook" />
                        </div>
                      </div>

                    </form>
					<?php }else{?>
					<form id="ebook_form" data-parsley-validate class="form-horizontal form-label-left" enctype="multipart/form-data" method="post" action="<?php echo $site_url?>/ebooks/ebook_form_submit">
                    
					<?php echo csrf_field(); ?>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Title <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" id="title" name="title" required="required" class="form-control col-md-12 col-xs-12" value="">
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="email">Description <span class="required"></span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <textarea class="resizable_textarea form-control" name="description" placeholder="Ebook Description"></textarea>
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="email">Price <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" id="price" name="price"  required="required" class="form-control col-md-12 col-xs-12" value="">
                        </div>
                      </div>
                      <div class="form-group">
                        <label for="country" class="control-label col-md-3 col-sm-3 col-xs-12">Profession</label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <select id="profession" class="form-control col-md-12 col-xs-12" name="profession">
                            <option value="0">-- Select --</option>
                            <?php $__currentLoopData = $professions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $profession): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                              <option value="<?php echo e($profession->id); ?>"><?php echo e($profession->cat_name); ?></option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                          </select>
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Ebook Type</label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <div id="ebook_type" class="btn-group">
                            <label class="btn btn-primary">
                              <input type="radio" class="ebook_type" checked name="ebook_type" value="upload"> &nbsp; Upload &nbsp;
                            </label>
                            <label class="btn">
                              <input type="radio" class="ebook_type" name="ebook_type" value="create"> Create
                            </label>
                          </div>
                        </div>
                      </div>
                      <div class="form-group upload_ebook">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Add Ebook</label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="file" id="ebook_file" name="ebook_file" class="form-control-file">
                        </div>
                      </div>
                      <div class="form-group create_ebook" style="display:none;">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Add Ebook</label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <textarea class="form-control" name="ebook_content" id="summary-ckeditor"></textarea>
                        </div>
                      </div>
                      <div class="ln_solid"></div>
                      <div class="form-group">
                        <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                          <a href="<?php echo e(route('ebooks')); ?>" class="btn btn-primary">Back</a>
                    <!-- <button class="btn btn-primary" type="reset">Reset</button> -->
                          <input type="submit" class="btn btn-success" value="Add Ebook" />
                        </div>
                      </div>

                    </form>
					<?php } ?>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- /page content -->
</div>
<script src="<?php echo e(asset('vendor/unisharp/laravel-ckeditor/ckeditor.js')); ?>"></script>
<script>
    CKEDITOR.replace( 'summary-ckeditor' );
    $(document).ready(function() {
      $(".ebook_type").change(function() {
        $(".ebook_type").parent().toggleClass("btn-primary");
        $(".upload_ebook, .create_ebook").toggle();
      });
    });
</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>