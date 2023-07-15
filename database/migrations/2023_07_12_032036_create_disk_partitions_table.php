<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('disk_partitions', function (Blueprint $table) {
            $table->id();
            $table->string('file_system')->nullable();
            $table->string('size')->nullable();
            $table->string('used')->nullable();
            $table->string('available')->nullable();
            $table->string('use%')->nullable();
            $table->bigInteger('belongtoVirtualMachine')->unsigned()->nullable();
            $table->foreign('belongtoVirtualMachine')->references('id')->on('virtualmachines');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('disk_partitions');
    }
};
