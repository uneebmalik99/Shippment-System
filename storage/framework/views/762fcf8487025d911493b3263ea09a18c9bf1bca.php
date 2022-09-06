
<?php $__env->startSection('body'); ?>
    <div class="d-flex justify-content-center mt-3">
        <div class="col-10 card border-light rounded mt-3">
            
            <form action=<?php echo e($action); ?> method="POST">
                <?php echo csrf_field(); ?>
                <?php if(Session::get('success')): ?>
                    <div class="alert alert-success">
                        <?php echo e(Session::get('success')); ?>

                    </div>
                <?php endif; ?>
                <div>
                    <div class="d-flex py-3">
                        <div class="col-6">
                            <div class="d-flex align-items-center">
                                <label for="username" class="col-4">Username:</label>
                                <input type="text" class="form-control col-8" name="username" id="username"
                                    value="<?php echo e($user['username']); ?>">
                            </div>
                            <div class="d-flex justify-content-end">
                                <span class="text-danger">
                                    <?php $__errorArgs = ['username'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                        <?php echo e($message); ?>

                                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                </span>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="d-flex align-items-center">
                                <label for="email" class="col-4">Email:</label>
                                <input type="email" class="form-control col-8" name="email" id="email"
                                    value="<?php echo e($user['email']); ?>">
                            </div>
                            <div class="d-flex justify-content-end">
                                <span class="text-danger">
                                    <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                        <?php echo e($message); ?>

                                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                </span>
                            </div>
                        </div>
                    </div>
                    <div class="d-flex py-3">
                        <div class="col-6">
                            <div class="d-flex align-items-center">
                                <label for="status" class="col-4">Status:</label>
                                <input type="number" class="form-control col-8" name="status" id="status"
                                    value="<?php echo e($user['status']); ?>">
                            </div>
                            <div class="d-flex justify-content-end">
                                <span class="text-danger">
                                    <?php $__errorArgs = ['status'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                        <?php echo e($message); ?>

                                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                </span>
                            </div>
                        </div>
                        <div class="col-6 d-flex align-items-center">
                            <label for="city" class="col-4">City:</label>
                            <input type="text" class="form-control col-8" name="city" id="city"
                                value="<?php echo e($user['city']); ?>">
                        </div>
                    </div>
                    <div class="d-flex py-3">
                        <div class="col-6 d-flex align-items-center">
                            <label for="state" class="col-4">State:</label>
                            <input type="text" class="form-control col-8" name="state" id="state"
                                value="<?php echo e($user['state']); ?>">
                        </div>
                    </div>
                    <div class="d-flex py-3">
                        <div class="col-6">
                            <div class=" d-flex align-items-center">
                                <label for="phone" class="col-4">Phone:</label>
                                <input type="number" class="form-control col-8" name="phone" id="phone"
                                    value="<?php echo e($user['phone']); ?>">
                            </div>
                            <div class="d-flex justify-content-end">
                                <span class="text-danger">
                                    <?php $__errorArgs = ['phone'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                        <?php echo e($message); ?>

                                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                </span>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="d-flex align-items-center">
                                <label for="customer_name" class="col-4">Customer Name:</label>
                                <input type="text" class="form-control col-8" name="customer_name" id="customer_name"
                                    value="<?php echo e($user['customer_name']); ?>">
                            </div>
                            <div class="d-flex justify-content-end">
                                <span class="text-danger">
                                    <?php $__errorArgs = ['customer_name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                        <?php echo e($message); ?>

                                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                </span>
                            </div>
                        </div>
                    </div>
                    <div class="col-6 py-2">
                        <input type="submit" value="Update" class="btn btn-primary rounded" name="update">
                    </div>
                </div>
            </form>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.partials.mainlayout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\TRT\Shippment-System\resources\views/user/create_edit.blade.php ENDPATH**/ ?>