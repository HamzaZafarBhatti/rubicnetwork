<!-- start page title -->
<div class="row">
    <div class="col-12">
        <div class="page-title-box d-sm-flex align-items-center justify-content-between">
            <h4 class="mb-sm-0 font-size-18"><?php if(isset($title1)): ?> <?php echo e($title1); ?>  <?php endif; ?> <div><small><?php if(isset($small)): ?> <?php echo e($small); ?> <?php endif; ?></small></div></h4>

            <div class="page-title-right">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="javascript: void(0);"><?php echo e($li_1); ?></a></li>
                    <?php if(isset($title2)): ?>
                        <li class="breadcrumb-item active"><?php echo e($title2); ?></li>
                    <?php endif; ?>
                </ol>
            </div>

        </div>
    </div>
</div>
<!-- end page title -->
<?php /**PATH D:\xampp\htdocs\rubicnetwork\resources\views/components/breadcrumb.blade.php ENDPATH**/ ?>