<?php $__env->startSection('content'); ?>

<div class="breadcrumbs">
    <div class="breadcrumbs-inner">
        <div class="row m-0">
            <div class="col-sm-4">
                <div class="page-header float-left">
                    <div class="page-title">
                        <h1>Saved Ebooks Detail</h1>
                    </div>
                </div>
            </div>
            <div class="col-sm-8">
                <div class="page-header float-right">
                    <div class="page-title">
                        <ol class="breadcrumb text-right">
                            <li><a href="<?php echo e(route('dashboard')); ?>">Dashboard</a></li>
                            <li class="active">Saved Ebooks</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="content">
            <div class="animated fadeIn">

                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <strong class="card-title">Ebooks</strong>
                            </div>
                            <div class="card-body">
                                <table id="bootstrap-data-table" class="table table-striped table-bordered">
                                    <thead>
                                        <tr>
                                            <th>Ebook Title</th>
                                            <th>Ebook Description</th>
                                            <th>Profession</th>
                                            <th>Price</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $__currentLoopData = $ebooks; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $ebook): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <tr>
                                            <td><?php echo e($ebook->ebook_title); ?></td>
                                            <td><?php echo e($ebook->ebook_desc); ?></td>
                                            <td><?php echo e($ebook->cat_name); ?></td></td>
                                            <td><?php echo e($ebook->price); ?></td>
                                            <td><a href="<?php echo e(asset('/ebook_files/'. $ebook->ebook)); ?>" target="_blank" >View</a> <a href="<?php echo e(asset('/ebook_files/'. $ebook->ebook)); ?>" download="<?php echo e($ebook->ebook_title); ?>.pdf" >Download</a></td>
                                        </tr>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </tbody>
                                </table>
                            </div>
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