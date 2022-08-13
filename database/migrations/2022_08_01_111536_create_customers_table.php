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
            $table->string('customer_name');
            $table->string('company_name');
            $table->string('phone');
            $table->string('address_line1');
            $table->string('address_line2');
            $table->string('email')->unique();
            $table->string('city');
            $table->string('state');
            $table->string('zip_code');
            $table->string('country');
            $table->string('tax_id');
            $table->string('phone_two');
            $table->string('note');
            $table->foreignId('added_by_role')->constrained('users')->onDelete('cascade')->onUpdate('cascade');
            $table->string('added_by_email');
            $table->foreign('added_by_email')->references('email')->on('users')->onDelete('cascade')->onUpdate('cascade');
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
