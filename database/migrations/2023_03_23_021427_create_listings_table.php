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
        Schema::create('listings', function (Blueprint $table) {
            $table->id();
            $table->string('mls_number');
            $table->string('status');
            $table->string('street_address');
            $table->string('city');
            $table->string('state');
            $table->string('zip_code');
            $table->string('county');
            $table->string('subdivision');
            $table->integer('year_built');
            $table->string('property_type');
            $table->string('property_subtype');
            $table->decimal('lot_size', 8, 2);
            $table->string('elementary_school');
            $table->string('middle_school');
            $table->string('high_school');
            $table->string('school_district');
            $table->string('stories');
            $table->integer('bedrooms');
            $table->decimal('bathrooms', 4, 2);
            $table->integer('square_footage');
            $table->decimal('listing_price', 11, 2);
            $table->text('description');
            $table->string('listing_office_name');
            $table->boolean('idx_include');
            $table->integer('days_on_market')->default(25);
            $table->float('hoa_fees')->default(50.00);
            $table->boolean('has_garage')->default(false);
            $table->boolean('has_pool')->default(false);
            $table->boolean('has_basement')->default(false);
            $table->boolean('is_waterfront')->default(false);
            $table->integer('parking_spots')->default(2);
            $table->boolean('has_open_house')->default(false);
            $table->boolean('has_ac')->default(true);
            $table->boolean('has_city_view')->default(true);
            $table->boolean('has_park_view')->default(false);
            $table->boolean('has_mountain_view')->default(false);
            $table->boolean('has_water_view')->default(false);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('listings');
    }
};
