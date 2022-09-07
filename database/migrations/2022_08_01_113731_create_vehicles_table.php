<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVehiclesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vehicles', function (Blueprint $table) {
            $table->id();
            $table->string('customer_name')->nullable();
            $table->string('vin')->nullable();
            $table->string('year')->nullable();
            $table->string('make')->nullable();
            $table->string('model')->nullable();
            $table->string('vehicle_type')->nullable();
            $table->string('color')->nullable();
            $table->string('weight')->nullable();
            $table->string('value')->nullable();
            $table->string('auction')->nullable();
            $table->foreignId('buyer_id')->constrained('customers')->onDelete('cascade')->onUpdate('cascade')->nullable();
            $table->string('key')->nullable();
            $table->string('note')->nullable();
            $table->string('hat_number')->nullable();
            $table->string('title_type')->nullable();
            $table->string('title')->nullable();
            $table->date('title_rec_date')->nullable();
            $table->string('title_state')->nullable();
            $table->integer('title_number')->nullable();
            $table->string('shipper_name')->nullable();
            $table->enum('status', ['0', '1', '2', '3', '4', '5'])->nullable();
            $table->date('sale_date')->nullable();
            $table->date('paid_date')->nullable();
            $table->integer('days')->nullable();
            $table->date('posted_date')->nullable();
            $table->date('pickup_date')->nullable();
            $table->date('delivered')->nullable();
            $table->string('pickup_location')->nullable();
            $table->string('site')->nullable();
            $table->string('dealer_fee')->nullable();
            $table->string('late_fee')->nullable();
            $table->string('auction_storage')->nullable();
            // $table->string('license_number');
            // $table->string('lotnumber');
            // $table->string('check_number');
            // $table->string('is_export');
            // $table->string('title_amount');
            // $table->string('container_number');
            // $table->string('additional_charges');
            $table->string('towing_charges')->nullable();
            $table->string('warehouse_storage')->nullable();
            $table->string('title_fee')->nullable();
            $table->string('port_detention_fee')->nullable();
            $table->string('custom_inspection')->nullable();
            $table->string('additional_fee')->nullable();
            $table->string('insurance')->nullable();
            // $table->foreignId('customer_id')->constrained('customers')->onDelete('cascade')->onUpdate('cascade')->nullable();
            // $table->foreignId('towing_request_id')->constrained('towing_requests')->onDelete('cascade')->onUpdate('cascade')->nullable();
            // $table->foreignId('location')->constrained('locations')->onDelete('cascade')->onUpdate('cascade')->nullable();
            $table->string('vehicle_is_deleted')->nullable();
            $table->foreignId('shipment_id')->constrained('shipments')->onDeletE('cascade')->onUpdate('cascade')->nullable();
            $table->foreignId('added_by_role')->nullable()->constrained('users')->onDelete('cascade')->onUpdate('cascade')->default(0);
            $table->string('added_by_email');
            $table->foreign('added_by_email')->references('email')->on('users');
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('vehicles');
    }
}
