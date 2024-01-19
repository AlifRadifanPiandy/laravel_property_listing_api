<?php

use App\Enums\PropertyTypeEnum;
use App\Enums\PropertyStatusEnum;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('property_characteristics', function (Blueprint $table) {
            $table->unsignedBigInteger('property_id');
            $table->float('price');
            $table->integer('bedrooms');
            $table->integer('bathrooms');
            $table->float('sqft');
            $table->float('price_sqft');
            $table->enum('property_type', [
                PropertyTypeEnum::SINGLE->value,
                PropertyTypeEnum::MULTIFAMILY->value,
                PropertyTypeEnum::TOWNHOUSE->value,
                PropertyTypeEnum::BUNGALOW->value,
            ]);
            $table->enum('property_status', [
                PropertyStatusEnum::SOLD->value,
                PropertyStatusEnum::SALE->value,
                PropertyStatusEnum::HOLD->value,
            ]);
            $table->timestamps();


            $table->foreign('property_id')->references('id')->on('properties')->cascadeOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('property_characteristics');
    }
};
