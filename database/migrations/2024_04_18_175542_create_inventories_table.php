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
        Schema::create('inventories', function (Blueprint $table) {
            $table->id();
            $table->foreignId('branch_id')->constrained('branches')->onDelete('cascade');
            // $table->date('date'); // Podemos usar timestamps para eso.
            // $table->integer('quantity'); //No se usará
            $table->string('brand');
            $table->string('model')->nullable();
            $table->string('serial_number')->nullable();
            $table->string('status')->nullable();
            $table->string('image')->nullable();
            $table->string('wholesaler')->nullable();
            $table->text('description')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('inventories');
    }
};
