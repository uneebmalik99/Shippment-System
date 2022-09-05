
<?php $__env->startSection('body'); ?>
    <div class="page-body p-4">
        <div class="col-12 p-3">
            <!-- Sticky Notes card start -->
            <div class="card border border-info rounded">
                <div class="card-header d-flex justify-content-between py-2">
                    <div>
                        <h5>Sticky Notes</h5>
                        <span>Click <code>Add Note</code> button to add new sticky notes</span>
                    </div>
                    <div class="d-flex">
                        <div class="card-header-right rounded d-flex align-items-center h-50 p-1 mr-2"
                            style="background: rgba(33, 73, 134, 0.27); color: #214986">
                            <i class="icofont icofont-rounded-down"></i>
                        </div>
                        <div class="card-header-right rounded d-flex align-items-center h-50 p-1 mr-2"
                            style="background: rgba(105, 108, 255, 0.16); color: ##696CFF;">
                            <i class="icofont icofont-refresh"></i>
                        </div>
                        <div class="card-header-right rounded d-flex align-items-center h-50 p-1"
                            style="background: rgba(239, 87, 87, 0.29); color: rgba(239, 87, 87, 1);">
                            <i class="icofont icofont-close-circled"></i>
                        </div>
                    </div>
                </div>
                <div class="card-block sticky-card">
                    <button type="button" id="idRunTheCode" class="btn btn-primary rounded waves-effect waves-light"
                        data-toggle="tooltip" data-placement="top" title="Add note">
                        <i class="icofont icofont-ui-add"></i><span class="m-l-10">Add notes</span>
                    </button>
                </div>
            </div>
            <div id="sticky-body">
                <div class="row">
                    <div class="col-sm-2">
                        <p id="notes" class="notes"></p>
                    </div>
                    <div class="col-sm-2">
                        <p id="notes1" class="notes1"></p>
                    </div>
                </div>

            </div>
            <!-- Sticky Notes card end -->
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.partials.mainlayout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\TRT\Shippment-System\resources\views/sticky/list.blade.php ENDPATH**/ ?>