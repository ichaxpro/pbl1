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
        Schema::table('images', function (Blueprint $table) {
DB::statement('ALTER TABLE images ALTER COLUMN uploaded_by DROP DEFAULT');
        DB::statement('ALTER TABLE images ALTER COLUMN uploaded_by TYPE BIGINT USING 0');        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('images', function (Blueprint $table) {
            //
        });
    }
};
