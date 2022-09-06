
<?php $__env->startSection('body'); ?>
    <div class="px-3 pt-4 pb-2 d-flex justify-content-between">
        <div class="col-6 d-flex align-items-center text-info">
            <span>Show</span>
            <select class="mx-2 form-control border border-info rounded col-2" name="pagination" id="pagination_vehicle">
                <option value="100">100</option>
                <option value="200">200</option>
                <option value="300">300</option>
            </select>
            <span>Entries</span>
        </div>
        <div class="col-6 d-flex justify-content-end">
            <input type="text" class="form-control border border-info rounded col-10" id="search_user" name="search"
                placeholder="Search">
        </div>
    </div>
    <div class="bg-light" style="height: 100%;overflow-x: scroll;">
        <table class="table table-hover sortable scroll">
            <thead>
                <th class="sorttable_nosort">Sr</th>
                <th>USERNAME</th>
                <th>EMAIL</th>
                <th>STATUS</th>
                <th>CITY</th>
                <th>STATE</th>
                <th>PHONE</th>
                <th>CUSTOMER NAME</th>
                <th class="sorttable_nosort">ACTION</th>
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
                        <td><?php echo e(@$i); ?></td>
                        <td><?php echo e(@$val['username']); ?></td>
                        <td><?php echo e(@$val['email']); ?></td>
                        <td><?php echo e(@$val['status']); ?></td>
                        <td><?php echo e(@$val['city']); ?></td>
                        <td><?php echo e(@$val['state']); ?></td>
                        <td><?php echo e(@$val['phone']); ?></td>
                        <td><?php echo e(@$val['customer_name']); ?></td>
                        <td>
                            <button><a href=<?php echo e(url($module['action'] . '/edit/' . $val[$module['db_key']])); ?>><i
                                        class="ti-pencil"></i></a></button>
                            <button><a href=<?php echo e(url($module['action'] . '/delete/' . $val[$module['db_key']])); ?>><i
                                        class="ti-trash"></i></a></button>
                        </td>
                    </tr>
                    <?php $i++; ?>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </tbody>
        </table>
    </div>
    <div class="d-flex justify-content-end p-2" id="page">
        <div>
            <div>
                <p>
                    Displaying <?php echo e($records->count()); ?> of <?php echo e($records->total()); ?> user(s).
                </p>
            </div>
            <div>
                <?php echo e($records->links()); ?>

            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.partials.mainlayout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\TRT\Shippment-System\resources\views/user/list.blade.php ENDPATH**/ ?>