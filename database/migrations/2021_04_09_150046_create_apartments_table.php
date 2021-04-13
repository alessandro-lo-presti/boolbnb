<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateApartmentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('apartments', function (Blueprint $table) {
            $table->id();
            $table->foreignId("user_id")->constrained();
            $table->string("title", 50);
            $table->integer("n_rooms");
            $table->integer("n_beds");
            $table->integer("n_bathrooms");
            $table->integer("mqs");
            $table->string("address", 100);
            $table->string("city", 30);
            $table->decimal("longitude", 7, 4);
            $table->decimal("latitude", 7, 4);
            $table->string("image", 100);
            $table->boolean('visibility');
            $table->integer("visualization");
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
        Schema::dropIfExists('apartments');
    }
}
