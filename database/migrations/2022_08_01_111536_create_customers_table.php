<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCustomersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('customers', function (Blueprint $table) {
            $table->id();
            $table->string('customer_number')->nullable();
            $table->string('customer_name')->nullable();
            $table->string('level')->nullable();
            $table->string('status')->nullable();
            $table->string('main_phone')->nullable();
            $table->string('main_fax')->nullable();
            $table->string('industry')->nullable();
            $table->string('source')->nullable();
            $table->string('customer_type')->nullable();
            $table->string('sales_tpye')->nullable();
            $table->string('sales_person')->nullable();
            $table->string('inside_person')->nullable();
            $table->string('lead')->nullable();
            $table->string('payment_type')->nullable();
            $table->string('payment_term')->nullable();
            $table->string('price_code')->nullable();
            $table->string('location_number')->nullable();
            $table->string('zip_code')->nullable();
            $table->string('state')->nullable();
            $table->string('country')->nullable();
            $table->string('address_1')->nullable();
            $table->string('address_2')->nullable();
            $table->foreignId('added_by_role')->constrained('users')->onDelete('cascade')->onUpdate('cascade')->nullable();
            $table->string('add_by_email')->nullable();
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
        Schema::dropIfExists('customers');
    }
}
