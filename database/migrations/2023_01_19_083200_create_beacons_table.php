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
        Schema::create('beacons', function (Blueprint $table) {
            $table->id();
            $table->timestamps();

            $table->unsignedBigInteger('organization_id');
            $table->string('pickup_address');
            $table->string('pickup_address_2');
            $table->string('pickup_city');
            $table->string('pickup_state');
            $table->char('pickup_postal_code', 10);
            $table->string('dropoff_address');
            $table->string('dropoff_address_2');
            $table->string('dropoff_city');
            $table->string('dropoff_state');
            $table->char('dropoff_postal_code', 10);
            $table->string('instructions')->nullable();
            $table->integer('status')->default(0);
            $table->date('last_activity')->nullable();

            $table->foreign('organization_id')
                ->references('id')
                ->on('organizations')
                ->onDelete('NO ACTION');

            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('beacons');
    }
};
