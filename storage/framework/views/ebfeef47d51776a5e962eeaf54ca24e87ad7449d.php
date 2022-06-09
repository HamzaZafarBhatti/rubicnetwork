<?php $__env->startSection('content'); ?>
    <div class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header header-elements-inline">
                        <h6 class="card-title font-weight-semibold">Plans</h6>
                    </div>
                    <div class="">
                        <table class="table datatable-show-all">
                            <thead>
                                <tr>
                                    <th>S/N</th>
                                    <th>Image</th>
                                    <th>Name</th>
                                    <th>Daily percent</th>
                                    <th>Price</th>
                                    <th>Duration</th>
                                    <th>Hashrate</th>
                                    <th>Ref percent</th>
                                    <th>Status</th>
                                    <th>Created</th>
                                    <th>Updated</th>
                                    <th class="text-center">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $__currentLoopData = $plans; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $k => $val): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <tr>
                                        <td><?php echo e(++$k); ?>.</td>
                                        <td><img src="<?php echo e(url('/')); ?>/asset/images/<?php echo e($val->image); ?>"
                                                style="height: auto; max-width: 40%;"></td>
                                        <td><?php echo e($val->name); ?></td>
                                        <td><?php echo e($val->percent); ?>%</td>
                                        <td><?php echo e(substr($val->amount, 0, 9)); ?>BTC</td>
                                        <td><?php echo e($val->duration . $val->period); ?>(s)</td>
                                        <td><?php echo e($val->hashrate); ?></td>
                                        <td><?php echo e($val->ref_percent); ?></td>
                                        <td>
                                            <?php if($val->status == 0): ?>
                                                <span class="badge badge-danger">Disabled</span>
                                            <?php elseif($val->status == 1): ?>
                                                <span class="badge badge-success">Active</span>
                                            <?php endif; ?>
                                        </td>
                                        <td><?php echo e(date('Y/m/d h:i:A', strtotime($val->created_at))); ?></td>
                                        <td><?php echo e(date('Y/m/d h:i:A', strtotime($val->updated_at))); ?></td>
                                        <td class="text-center">
                                            <div class="list-icons">
                                                <div class="dropdown">
                                                    <a href="#" class="list-icons-item" data-toggle="dropdown">
                                                        <i class="icon-menu9"></i>
                                                    </a>
                                                    <div class="dropdown-menu dropdown-menu-right">
                                                        <a class='dropdown-item'
                                                            href="<?php echo e(route('admin.plans.edit', $val->id)); ?>"><i
                                                                class="icon-pencil7 mr-2"></i>Edit</a>
                                                    </div>
                                                </div>
                                            </div>
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
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\xampp\htdocs\rubicnetwork\resources\views/admin/stake_plans/index.blade.php ENDPATH**/ ?>