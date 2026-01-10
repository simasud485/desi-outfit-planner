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
        Schema::table('outfits', function (Blueprint $table) {
            // use strings here to store the path or URL
            $table->string('image_url')->nullable()->after('advice');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('outfits', function (Blueprint $table) {
            //
        });
    }
};
