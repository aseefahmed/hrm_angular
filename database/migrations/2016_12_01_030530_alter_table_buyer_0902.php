<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AlterTableBuyer0902 extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('buyers', function (Blueprint $table) {
            $table->string('postal_address', 255)->default('');
            $table->string('contact_person', 255)->default('');
            $table->string('email_address', 100)->default('');
            $table->string('contact_number', 15)->default('');
            $table->string('website', 100)->default('');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('buyers', function (Blueprint $table) {
            //
        });
    }
}
