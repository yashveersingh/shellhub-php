<?php

namespace yashveersingh\shellhubPHP\database\migrations;

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * @return void
     */
    public function up(): void
    {
        Schema::create('shellhub_config', function (Blueprint $table) {
            $table->string('name', 190)->primary();
            $table->text('value')->nullable();
        });
    }

    /**
     * @return void
     */
    public function down(): void
    {
        Schema::dropIfExists('shellhub_config');
    }
};