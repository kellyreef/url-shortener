<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateShortlinkTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('shortlinks', function (Blueprint $table) {
            $table->bigIncrements('id');
            // 8 Characters should generally be enough, but 20 gives user custom longer urls
            $table->string('slug', 20)->unique()->index();
            // 2048 is the max url limitation of characters
            $table->string('destination', 2048);
            $table->unsignedBigInteger('clicks')->default(0);
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
        Schema::dropIfExists('shortlinks');
    }
}
