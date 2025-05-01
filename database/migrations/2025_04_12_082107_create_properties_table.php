<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('properties', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('external_id')->unique();
            $table->string('owner_name')->nullable();
            $table->string('property_design')->nullable();
            $table->string('construction_stage')->nullable();
            $table->string('year_built')->nullable();
            $table->string('measurements')->nullable();
            $table->integer('no_rooms')->nullable();
            $table->integer('no_of_bathrooms')->nullable();
            $table->json('attributes')->nullable(); // Store the nested attributes JSON
            $table->text('description')->nullable();
            $table->string('master_bedroom_ensuite')->nullable();
            $table->integer('building_size')->nullable();
            $table->string('bulding_size_unit')->nullable();
            $table->integer('land_size')->nullable();
            $table->string('land_size_unit')->nullable();
            $table->decimal('price', 12, 2)->nullable();
            $table->string('listing_type')->nullable();
            $table->string('is_approved')->nullable();
            $table->timestamps();
        });
        
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('properties');
    }
};
