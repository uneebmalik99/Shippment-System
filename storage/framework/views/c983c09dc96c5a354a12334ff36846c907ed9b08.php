
<?php $__env->startSection('body'); ?>


    <div class="bg-light mt-4" style="height: 100%;overflow-x: scroll;">
        <table class="table table-hover sortable scroll" id="user_table">
            <thead>
                <th class="sorttable_nosort">Sr</th>
                <th>USERNAME</th>
                <th>EMAIL</th>
                <th>STATUS</th>
                <th>CITY</th>
                <th>STATE</th>
                <th>PHONE</th>
                <th>CUSTOMER NAME</th>
                <?php if(@$role == 1): ?>
                <th class="sorttable_nosort">ACTION</th>
                <?php endif; ?>
            </thead>
            <tbody id="tbody">
                <?php if(@$records->count() == 0): ?>
                    <tr>
                        <td colspan="10" class="h6 text-muted text-center">NO CUSTOMERS TO DISPLAY</td>
                    </tr>
                <?php endif; ?>
                <?php $i = 1; ?>
                <?php $__currentLoopData = $records; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $val): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr>
                        <td><?php echo e(@$i, false); ?></td>
                        <td><?php echo e(@$val['username'], false); ?></td>
                        <td><?php echo e(@$val['email'], false); ?></td>
                        <td><?php echo e(@$val['status'], false); ?></td>
                        <td><?php echo e(@$val['city'], false); ?></td>
                        <td><?php echo e(@$val['state'], false); ?></td>
                        <td><?php echo e(@$val['phone'], false); ?></td>
                        <td><?php echo e(@$val['customer_name'], false); ?></td>
                        <?php if($role == 1): ?>
                        <td>
                            <button><a href=<?php echo e(url($module['action'] . '/edit/' . $val[$module['db_key']]), false); ?>><i 
                                        class="ti-pencil"></i></a></button>
                            <button><a href=<?php echo e(url($module['action'] . '/delete/' . $val[$module['db_key']]), false); ?>><i class="ti-trash"></i></a></button>
                        </td>
                        <?php endif; ?>
                    </tr>
                    <?php $i++; ?>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </tbody>
        </table>
    </div>
    
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.partials.mainlayout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\TRT\Shippment-System\resources\views/user/list.blade.php ENDPATH**/ ?>