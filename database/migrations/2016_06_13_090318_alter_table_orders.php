<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AlterTableOrders extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('orders', function (Blueprint $table) {
            $table->string('agent')->default('');
            $table->string('buyer')->default('');
            $table->date('delivery_date')->default('');
            $table->tinyinteger('gg')->default('');
            $table->integer('qty')->default('');
            $table->double('fob')->default('');
            $table->double('weight_per_dzn')->default('');
            $table->double('qty_per_dzn')->default('');
            $table->double('total_yarn_weight')->default('');
            $table->double('total_yarn_cost')->default('');
            $table->double('acc_rate')->default('');
            $table->double('total_acc_cost')->default('');
            $table->double('btn_cost')->default('');
            $table->double('total_btn_cost')->default('');
            $table->double('zipper_cost')->default('');
            $table->double('total_zipper_cost')->default('');
            $table->double('print_cost')->default('');
            $table->double('total_print_cost')->default('');
            $table->double('total_fob')->default('');
            $table->double('total_cost')->default('');
            $table->double('balance_amount')->default('');
            $table->double('cost_of_making')->default('');
            $table->string('compositions')->default('');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('orders', function (Blueprint $table) {
            //
        });
    }
}
