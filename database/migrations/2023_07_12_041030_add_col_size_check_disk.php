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
        Schema::table('disk_partitions',function (Blueprint $table){
            $table->string('size')->nullable()->after('file_system');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('disk_partitions',function (Blueprint $table){
            $table->string('size')->nullable()->after('file_system');
        });
    }
};
