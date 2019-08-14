<?php $__env->startSection('content'); ?>

<div class="breadcrumbs">
    <div class="breadcrumbs-inner">
        <div class="row m-0">
            <div class="col-sm-4">
                <div class="page-header float-left">
                    <div class="page-title">
                        <h1>My Profile</h1>
                    </div>
                </div>
            </div>
            <div class="col-sm-8">
                <div class="page-header float-right">
                    <div class="page-title">
                        <ol class="breadcrumb text-right">
                            <li><a href="<?php echo e(route('dashboard')); ?>">Dashboard</a></li>
                            <li class="active">Advanced</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="content">
            <div class="animated fadeIn">
                <?php if(session('success')): ?>
                <div class="sufee-alert alert with-close alert-success alert-dismissible fade show">
                    <span class="badge badge-pill badge-success">Success</span>
                    <?php echo e(session('success')); ?>

                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <?php endif; ?>
                <?php if(session('error')): ?>
                <div class="sufee-alert alert with-close alert-danger alert-dismissible fade show">
                    <span class="badge badge-pill badge-danger">Error</span>
                    <?php echo e(session('error')); ?>

                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <?php endif; ?>
                <div class="row">
                  <div class="col-lg-6">
                    <form action="<?php echo e(route('update_profile')); ?>" method="post" class="form-horizontal">
                      <?php echo csrf_field(); ?>
                      <div class="card">
                          <div class="card-header">
                              <strong>Basic Detail</strong>
                          </div>
                          <div class="card-body card-block">
                                <div class="row form-group">
                                  <div class="col col-md-4"><label for="text-input" class=" form-control-label">Name</label></div>
                                  <div class="col-12 col-md-8"><input type="text" id="fullname" name="fullname" placeholder="Name" class="form-control" value="<?php echo e($user->name); ?>"></div>
                                </div>
                                  <div class="row form-group">
                                      <div class="col col-md-4"><label class=" form-control-label">Email</label></div>
                                      <div class="col-12 col-md-8">
                                          <p class="form-control"><?php echo e($user->email); ?></p>
                                      </div>
                                  </div>
                                  <div class="row form-group">
                                    <div class="col col-md-4"><label for="text-input" class=" form-control-label">Address Line 1</label></div>
                                    <div class="col-12 col-md-8"><input type="text" id="address1" name="address1" placeholder="Address Line #1" class="form-control" value="<?php echo e($user->address1); ?>"></div>
                                  </div>
                                  <div class="row form-group">
                                    <div class="col col-md-4"><label for="text-input" class=" form-control-label">Address Line 2</label></div>
                                    <div class="col-12 col-md-8"><input type="text" id="address2" name="address2" placeholder="Address Line #2" class="form-control" value="<?php echo e($user->address2); ?>"></div>
                                  </div>
                                  <div class="row form-group">
                                    <div class="col col-md-4"><label for="text-input" class=" form-control-label">City</label></div>
                                    <div class="col-12 col-md-8"><input type="text" id="city" name="city" placeholder="City" class="form-control" value="<?php echo e($user->city); ?>"></div>
                                  </div>
                                  <div class="row form-group">
                                    <div class="col col-md-4"><label for="text-input" class=" form-control-label">State</label></div>
                                    <div class="col-12 col-md-8"><input type="text" id="state" name="state" placeholder="State" class="form-control" value="<?php echo e($user->state); ?>"></div>
                                  </div>
                                  <div class="row form-group">
                                      <div class="col col-md-4"><label for="select" class=" form-control-label">Country</label></div>
                                      <div class="col-12 col-md-8">
                                          <select name="country" id="country" class="form-control">
                                              <option value="0">--Select Country--</option>
                                              <?php $__currentLoopData = $countries; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $country): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <option value="<?php echo e($country->id); ?>" <?php echo e(($country->id==$user->country_id) ? 'Selected' : ''); ?>><?php echo e($country->name); ?></option>
                                              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                          </select>
                                      </div>
                                  </div>
                          </div>
                          <div class="card-footer">
                              <button type="submit" class="btn btn-primary btn-sm">
                                  <i class="fa fa-dot-circle-o"></i> Update
                              </button>
                              <button type="reset" class="btn btn-danger btn-sm">
                                  <i class="fa fa-ban"></i> Reset
                              </button>
                          </div>
                      </div>
                    </form>
                  </div>

                  <div class="col-xs-6 col-sm-6">
                    <div class="card">
                        <div class="card-header">
                            <strong class="card-title">Current Image</strong>
                        </div>
                        <div class="card-body">
                          <?php if($user->image): ?>
                            <img src="<?php echo e(asset('/public/images/user_images/'. $user->image)); ?>" width="200px" height="200px" />
                          <?php else: ?>
                            <img src="<?php echo e(asset('/public/images/user_images/default.jpg')); ?>" width="200px" height="200px" />
                          <?php endif; ?>
                    </div>
                </div>
                      <div class="card">
                        <form action="upload_user_image" method="post" enctype="multipart/form-data" class="form-horizontal">
                          <?php echo csrf_field(); ?>
                          <div class="card-header">
                              <strong class="card-title">Update Image</strong>
                          </div>
                          <div class="card-body">
                            <div class="row form-group">
                                <div class="col col-sm-5"><label for="input-small" class=" form-control-label">Image</label></div>
                                <div class="col col-sm-6"><input type="file" id="user_image" name="user_image" class="form-control-file"></div>
                            </div>
                          </div>
                          <div class="card-footer">
                            <button type="submit" class="btn btn-primary btn-sm">
                                <i class="fa fa-dot-circle-o"></i> Upload
                            </button>
                            <button type="reset" class="btn btn-danger btn-sm">
                                <i class="fa fa-ban"></i> Reset
                            </button>
                          </div>
                        </form>
                      </div>

      </div>



  </div>


</div><!-- .animated -->
</div><!-- .content -->
<script>
    jQuery(document).ready(function() {
        jQuery(".standardSelect").chosen({
            disable_search_threshold: 10,
            no_results_text: "Oops, nothing found!",
            width: "100%"
        });
    });
</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.partial', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>