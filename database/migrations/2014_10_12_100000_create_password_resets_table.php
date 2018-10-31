<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePasswordResetsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
<<<<<<< HEAD
        // Schema::create('password_resets', function (Blueprint $table) {
        //     $table->string('email')->index();
        //     $table->string('token');
        //     $table->timestamp('created_at')->nullable();
        // });
=======
        Schema::create('password_resets', function (Blueprint $table) {
            $table->string('email')->index();
            $table->string('token');
            $table->timestamp('created_at')->nullable();
        });
>>>>>>> 5e935d9159f4a261b936017432767933e646234b
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
<<<<<<< HEAD
        // Schema::dropIfExists('password_resets');
=======
        Schema::dropIfExists('password_resets');
>>>>>>> 5e935d9159f4a261b936017432767933e646234b
    }
}
