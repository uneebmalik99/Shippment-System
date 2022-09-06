

<?php $__env->startSection('body'); ?>

    
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-12 w-100 d-flex justify-content-end">
                <button class="btn text-white mb-2" style="background: #2B00D4;
                box-shadow: 0px 4px 4px rgba(241, 233, 233, 0.25);
                border-radius: 100px;">New Ticket</button>
            </div>
        </div>
    </div>
    <div class="bg-light" style="height: 100%;overflow-x: scroll;">
        <table class="table table-hover sortable scroll" id="table_id">
            <thead>
                <th>Created By</th>
                <th>Subject</th>
                <th>Assigned</th>
                <th>STATUS</th>
                <th>Privacy</th>
                <th>Created At</th>
                
            </thead>
            <tbody id="tbody">
                <tr>
                    <td>
                        <div class="d-flex">
                            <div><img src="<?php echo e(asset('assets/images/user.png')); ?>" alt="" style="width: 30px;height:30px;" class="mr-2"></div>
                            <div>
                                <b>kashif latef</b>
                                <p>Porduct designer</p>
                            </div>
                        </div>
                    </td>
                    <td>
                        <div>
                            <b>Blog Writer</b>
                            <p>#32432</p>
                        </div>
                    </td>
                    <td>
                        Simply Web
                    </td>
                    <td>
                        <button class="text-white" style="background: #53A24C;
                        border-radius: 5px;width: 60px;
                        height: 26px;border:none!important;outline:none">Open</button>
                    </td>
                    <td>
                        <div class="d-flex">
                            <div><i class="fa fa-lock text-danger"></i></div>
                            <div class="text-danger ml-1">Private</div>
                        </div>
                    </td>
                    <td>
                        <div>
                            <b>April 2, 2022</b>
                            <p>5.20AM</p>
                        </div>
                    </td>

                </tr>



                <tr>
                    <td>
                        <div class="d-flex">
                            <div><img src="<?php echo e(asset('assets/images/user.png')); ?>" alt="" style="width: 30px;height:30px;" class="mr-2"></div>
                            <div>
                                <b>kashif latef</b>
                                <p>Porduct designer</p>
                            </div>
                        </div>
                    </td>
                    <td>
                        <div>
                            <b>Blog Writer</b>
                            <p>#32432</p>
                        </div>
                    </td>
                    <td>
                        Simply Web
                    </td>
                    <td>
                        <button class="text-black" style="background: #FFC831;
                        border-radius: 5px;width: 60px;
                        height: 26px;border:none!important;outline:none;">Pending</button>
                    </td>
                    <td>
                        <div class="d-flex">
                            <div><i class="fa fa-globe text-success"></i></div>
                            <div class="text-success ml-1">Public</div>
                        </div>
                    </td>
                    <td>
                        <div>
                            <b>April 2, 2022</b>
                            <p>5.20AM</p>
                        </div>
                    </td>

                </tr>
              
            </tbody>
        </table>
    </div>
    
<?php $__env->stopSection(); ?>



<?php echo $__env->make('layouts.partials.mainlayout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\TRT\Shippment-System\resources\views/ticket/list.blade.php ENDPATH**/ ?>