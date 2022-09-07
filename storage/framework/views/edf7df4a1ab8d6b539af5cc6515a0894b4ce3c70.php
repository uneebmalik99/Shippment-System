
<style>
    .vehicle_heading{
        background: #1F689E;
        box-shadow: inset 10px 14px 28px rgba(0, 0, 0, 0.25);
    }
    .vehicle_link_navbar{
        background: #99C4E2;
    }
    .vedicls_link_navbar2{
        background: #DFF2FE;
    }
    .add_new_vedicls{
        background: rgba(0, 26, 255, 0.47)!important;
        border-radius: 5px!important;
        color:white;
        padding:8px 15px;
    }
    
</style>
<?php $__env->startSection('body'); ?>
    <div>
        <div class="vehicle_heading p-3">
            <h5 class="text-white">Vehicle Page</h5>
        </div>
        <div class="vehicle_link_navbar">
            <div class="text-info col-10 d-flex justify-content-between p-3">
                <div>
                    <a class="vehicles" id="all_vehicles" style="cursor:pointer;" value="all_vehicles">All Vehicles</a>
                </div>
                <div>
                    <a class="vehicles" id="new_order" style="cursor:pointer;" value="new_order">New Order</a>
                </div>
                <div>
                    <a class="vehicles" id="posted"style="cursor:pointer;" value="posted">Posted</a>
                </div>
                <div>
                    <a class="vehicles" id="dispatch"style="cursor:pointer;" value="dispatch">Dispatch</a>
                </div>
                <div>
                    <a class="vehicles" id="on_hand"style="cursor:pointer;" value="on_hand">On hand</a>
                </div>
                <div>
                    <a class="vehicles" id="titles"style="cursor:pointer;" value="titles">No Titles</a>
                </div>
                <div>
                    <a class="vehicles" id="towing"style="cursor:pointer;" value="towing">Towing</a>
                </div>
            </div>
        </div>
        <div class="vedicls_link_navbar2">
            <div class="col-10 d-flex justify-content-between p-3">
                <div>
                    <a class="locations" id="NJ" style="cursor:pointer;" value="NJ">New Jersey</a>
                </div>
                <div>
                    <a class="locations" id="SAV" style="cursor:pointer;" value="SAV">Savannah</a>
                </div>
                <div>
                    <a class="locations" id="TX" style="cursor:pointer;" value="TX">Texas</a>
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
        
        <div class="bg-light" style="height: 100%;overflow-x: scroll;">
            <br>
            <div class="col-12 d-flex justify-content-end">
                <a href="<?php echo e(route('vehicle.create'), false); ?>" class="add_new_vedicls">New<i
                        class="fas fa-car pl-2"></i></a>
            </div>
            <br>

            <table class="table table-hover table-responsive" id="vedicls_table">
                <thead class="bg-light">
                    <th class="sorttable_nosort">Sr</th>
                    <th>CUSTOMER NAME</th>
                    <th>VIN</th>
                    <th>YEAR</th>
                    <th>MAKE</th>
                    <th>MODEL</th>
                    <th>VEHICLE_TYPE</th>
                    <th>VALUE</th>
                    <th>STATUS</th>
                    <th>BUYER</th>
                    <th class="sorttable_nosort">Action</th>
                </thead>
                <tbody id="tbody">
                    
                    <?php $i = 1; ?>
                    <?php $__currentLoopData = $records; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $val): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr>
                            <td><?php echo e(@$i, false); ?></td>
                            <td><?php echo e(@$val['customer_name'], false); ?></td>
                            <td><?php echo e(@$val['vin'], false); ?></td>
                            <td><?php echo e(@$val['year'], false); ?></td>
                            <td><?php echo e(@$val['make'], false); ?></td>
                            <td><?php echo e(@$val['model'], false); ?></td>
                            <td><?php echo e(@$val['vehicle_type'], false); ?></td>
                            <td><?php echo e(@$val['value'], false); ?></td>
                            <td><?php echo e(@$val['status'], false); ?></td>
                            <td><?php echo e(@$val['customer']['customer_name'], false); ?></td>
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
        
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.partials.mainlayout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\TRT\Shippment-System\resources\views/vehicle/list.blade.php ENDPATH**/ ?>