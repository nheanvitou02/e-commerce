<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
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
            $table->text('invoice');
            $table->unsignedBigInteger('customer_id');
            $table->string('service');
            $table->string('name');
            $table->bigInteger('phone');
            $table->text('address');
            $table->enum('status', array(
                'pending', 'success', 'failed', 'expired'
            ));
            $table->enum('substatus', array(
                'accept', 'receive', 'received'
            ))->default('accept');
            $table->bigInteger('grand_total');
            $table->timestamps();

            //relationship customer
            $table->foreign('customer_id')->references('id')->on('customers');
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
};
