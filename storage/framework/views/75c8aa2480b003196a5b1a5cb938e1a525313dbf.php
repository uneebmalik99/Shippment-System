
<?php $__env->startSection('body'); ?>
    <div>
        <div class="bg-primary bg-gradient p-3">
            <h5 class="text-white">Shipment</h5>
        </div>
        <div class="bg-danger">
            <div class="text-info col-8 d-flex justify-content-between p-3">
                <div>
                    <a class="contianer col-2" id="all_container" style="cursor:pointer;" value="all_container">All
                        Container</a>
                </div>
                <div>
                    <a class="contianer col-2" id="booked" style="cursor:pointer;" value="booked">Booked</a>
                </div>
                <div>
                    <a class="contianer col-2" id="shipped"style="cursor:pointer;" value="shipped">Shipped</a>
                </div>
                <div>
                    <a class="contianer col-2" id="arrived"style="cursor:pointer;" value="arrived">Arrived</a>
                </div>
                <div>
                    <a class="contianer col-2" id="completed"style="cursor:pointer;" value="completed">Completed</a>
                </div>
            </div>
        </div>
        <div class="bg-success">
            <div class="col-10 d-flex justify-content-between p-3">
                <div>
                    <a class="locations col-4" id="NJ" style="cursor:pointer;" value="NJ">New Jersey</a>
                </div>
                <div>
                    <a class="locations col-2" id="SAV" style="cursor:pointer;" value="SAV">Savannah</a>
                </div>
                <div>
                    <a class="locations col-2" id="TX" style="cursor:pointer;" value="TX">Texas</a>
                </div>
                <div>
                    <a class="locations" id="LA" style="cursor:pointer;" value="LA">Los Angeles</a>
                </div>
                <div>
                    <a class="locations" id="SEA" style="cursor:pointer;" value="SEA">Seattle</a>
                </div>
                <div>
                    <a class="locations" id="BAL" style="cursor:pointer;" value="BAL">Baltimore</a>
                </div>
                <div>
                    <a class="locations" id="NFK" style="cursor:pointer;" value="NFK">Norfolk</a>
                </div>
            </div>
        </div>
        <div class="bg-light px-3 pt-4 pb-2 d-flex justify-content-between">
            <div class="col-5 d-flex align-items-center text-info">
                <span><b>Show</b></span>
                <div class="col-3 d-flex justify-content-center px-1">
                    <select class="form-control border border-info rounded col-10" name="pagination"
                        id="pagination_vehicle">
                        <option value="100">100</option>
                        <option value="200">200</option>
                        <option value="300">300</option>
                    </select>
                </div>
                <span><b>Entries</b></span>
            </div>
            <div class="col-7 d-flex justify-content-end align-items-center ml-4">
                <div class="col-8 p-0">
                    <input type="text" class="btn border border-info rounded col-12 text-dark text-left"
                        id="search_vehicle" name="search" placeholder="Search by customer name, year, make, model...">
                </div>
                <div class="col-3">
                    <a href="<?php echo e(route('shipment.create'), false); ?>" class="text-black btn btn-info rounded col-12">New<i
                            class="fas fa-shipping-fast pl-2"></i></a>
                </div>
            </div>
        </div>
        <div class="bg-light" style="height: 100%;overflow-x: scroll;">
            <table class="table table-hover sortable scroll">
                <thead class="bg-light">
                    <th class="sorttable_nosort">Sr</th>
                    <th>COMPANY NAME</th>
                    <th>COMPANY EMAIL</th>
                    <th>PHONE</th>
                    <th>TYPE</th>
                    <th>LOADING DATE</th>
                    <th>CUT OFF DATE</th>
                    <th>SAIL DATE</th>
                    <th>EST ARRIVAL DATE</th>
                    <th>CONTAINER NO</th>
                    <th>CONSIGNEE</th>
                    <th>LOADING STATE</th>
                    <th>LOADING COUNTRY</th>
                    <th>DESTINATION STATE</th>
                    <th>DESTINATION COUNTRY</th>
                    <th class="sorttable_nosort">Action</th>
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
                            <td><?php echo e(@$val['company_name'], false); ?></td>
                            <td><?php echo e(@$val['customer_email'], false); ?></td>
                            <td><?php echo e(@$val['customer_phone'], false); ?></td>
                            <td><?php echo e(@$val['shipment_type'], false); ?></td>
                            <td><?php echo e(@$val['loading_date'], false); ?></td>
                            <td><?php echo e(@$val['cut_off_date'], false); ?></td>
                            <td><?php echo e(@$val['sail_date'], false); ?></td>
                            <td><?php echo e(@$val['est_arrival_date'], false); ?></td>
                            <td><?php echo e(@$val['container_no'], false); ?></td>
                            <td><?php echo e(@$val['select_consignee '], false); ?></td>
                            <td><?php echo e(@$val['loading_state '], false); ?></td>
                            <td><?php echo e(@$val['loading_country '], false); ?></td>
                            <td><?php echo e(@$val['destination_state'], false); ?></td>
                            <td><?php echo e(@$val['destination_country'], false); ?></td>
                            <td>
                                <button><a href=<?php echo e(url($module['action'] . '/edit/' . $val[$module['db_key']]), false); ?>><i
                                            class="ti-pencil"></i></a></button><button><a
                                        href=<?php echo e(url($module['action'] . '/delete/' . $val[$module['db_key']]), false); ?>><i
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
                        Displaying <?php echo e($records->count(), false); ?> of <?php echo e($records->total(), false); ?> shipment(s).
                    </p>
                </div>
                <div>
                    <?php echo e($records->links(), false); ?>

                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.partials.mainlayout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\TRT\Shippment-System\resources\views/shipment/list.blade.php ENDPATH**/ ?>