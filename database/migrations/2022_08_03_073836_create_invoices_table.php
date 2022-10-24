<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInvoicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('invoices', function (Blueprint $table) {
            $table->id();
            $table->foreignId('export_id')->constrained('exports')->onDelete('cascade')->onUpdate('cascade');
            $table->foreignId('customer_user_id')->constrained('customers')->onDelete('cascade')->onUpdate('cascade');
            $table->foreignId('consignee_id')->constrained('consignees')->onDelete('cascade')->onUpdate('cascade');
            $table->float('vehicle_id');
            $table->float('total_amount');
            $table->float('amount_paid');
            $table->float('amount_due');
            $table->float('due');
            $table->string('export_invoice');
            $table->string('note');
            $table->float('adjustment_damaged');
            $table->float('adjustment_storage');
            $table->float('adjustment_discount');
            $table->float('adjustment_other');
            $table->boolean('is_deleted')->default(0);
            $table->string('currency');
            $table->float('discount');
            $table->float('before_discount');
            $table->string('upload_invoice');
            $table->string('number');
            $table->string('issued_by');
            $table->string('status');
            $table->string('issued_at');
            $table->string('references');
            $table->string('working');
            $table->string('created_by');
            $table->string('payment_team');
            $table->foreignId('added_by_role')->constrained('users')->onDelete('cascade')->onUpdate('cascade');
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
        Schema::dropIfExists('invoices');
    }
}
