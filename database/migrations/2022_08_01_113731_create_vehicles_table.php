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
            $table->string('hat_number');
            $table->string('year');
            $table->string('color');
            $table->string('make');
            $table->string('model');
            $table->string('vin');
            $table->string('weight');
            $table->string('pieces');
            $table->string('value');
            $table->string('license_number');
            $table->string('towed_from');
            $table->string('lotnumber');
            $table->string('towed_amount');
            $table->string('storage_amount');
            $table->enum('status', ['0', '1']);
            $table->string('check_number');
            $table->string('additional_charges');
            $table->foreignId('customer_id')->constrained('customers')->onDelete('cascade')->onUpdate('cascade');
            $table->foreignId('towing_request_id')->constrained('towing_requests')->onDelete('cascade')->onUpdate('cascade');
            $table->foreignId('location')->constrained('locations')->onDelete('cascade')->onUpdate('cascade');
            $table->string('is_export');
            $table->string('title_amount');
            $table->string('container_number');
            $table->string('key');
            $table->string('vehicle_is_deleted');
            $table->string('note_status');
            $table->foreignId('added_by_role')->constrained('users')->onDelete('cascade')->onUpdate('cascade');
            $table->foreignId('added_by_email')->constrained('users')->onDelete('cascade')->onUpdate('cascade');
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
