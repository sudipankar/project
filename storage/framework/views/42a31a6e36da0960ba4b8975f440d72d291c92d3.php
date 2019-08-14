<?php $__env->startSection('content'); ?>
<div class="container">
  <!-- page content -->
        <div class="right_col" role="main">
          <div class="">
            <!-- <div class="page-title">
              <div class="title_left">
                <h3>Users List</h3>
              </div>

              <div class="title_right">
                <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">
                  <div class="input-group">
                    <input type="text" class="form-control" placeholder="Search for...">
                    <span class="input-group-btn">
                      <button class="btn btn-default" type="button">Go!</button>
                    </span>
                  </div>
                </div>
              </div>
            </div> -->

            <div class="clearfix"></div>

            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Ebooks List</h2>
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
                    <a href="<?php echo e(route('ebook_form')); ?>" ><button type="button" class="btn btn-round btn-primary">Add new ebook</button></a>
                    <table id="datatable-responsive" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                      <thead>
                        <tr>
                          <th>Title</th>
                          <th>Description</th>
                          <th>Profession</th>
                          <th>Price</th>
                          <th>Status</th>
                          <th>Actions</th>
                          <!-- <th>Age</th>
                          <th>Extn.</th>
                          <th>E-mail</th> -->
                        </tr>
                      </thead>
                      <tbody>
                        <?php $__currentLoopData = $ebooks; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $ebook): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                          <tr>
                            <td><?php echo e($ebook->ebook_title); ?></td>
                            <td><?php echo e($ebook->ebook_desc); ?></td>
                            <td><?php echo e($ebook->cat_name); ?></td>
                            <td><?php echo e($ebook->price); ?></td>
                            <td>
                              <input type="checkbox" class="js-switch change_status" <?php echo e(($ebook->status) ? 'checked' : ''); ?> />
                              <input type="hidden" name="ebook_id" id="ebook_id" value="<?php echo e($ebook->id); ?>" />
                            </td>
                            <td>
                              <!-- <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal">Open Modal</button> -->
                              <a data-title="<?php echo e($ebook->ebook_title); ?>" data-toggle="modal" data-target="#ebookViewer" data-filename="<?php echo e(asset('ebook_files/'. $ebook->ebook)); ?>" class="btn btn-xs btn-default view_ebook"><i class="fa fa-eye"></i> View</a>
                              <a href="<?php echo e(Request::url().'/ebook_form/'.$ebook->id); ?>" class="btn btn-xs btn-default"><i class="fa fa-edit"></i> Edit</a>
                              <a href="<?php echo e(Request::url().'/'.$ebook->id); ?>/delete" class="btn btn-xs btn-default"><i class="fa fa-close"></i> Delete</a>
                            </td>
                          </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                      </tbody>
                    </table>


                  </div>
                </div>
              </div>
            </div>
          </div>
          <!-- Modal -->
<div id="ebookViewer" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Filename: <span class="filename_header"></span></h4>
      </div>
      <div class="modal-body">
        <embed src="" id="file_viewer" frameborder="0" width="100%" height="500px">
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>
        </div>
        <!-- /page content -->
</div>
<script>
  $(document).ready(function() {
    $(document).on("click", "span.switchery-default", function() {
      var eid = $(this).next("#ebook_id").val();
      $.ajax({
        url:'/ebooks/'+ eid +'/changestatus',
        type:'GET',
        success:function(data) {
          alert(JSON.stringify(data));
        },
        error: function(err) {
          alert(JSON.stringify(err));
        }
      });
    });

    $(".view_ebook").click(function() {
      // $('#ebookViewer').modal({
      //   show: true
      // });
      var ebook_title = $(this).data('title');
      var filename = $(this).data('filename');
      $('.filename_header').text(ebook_title);
      $('#file_viewer').attr('src', filename);
    });
  });
</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>