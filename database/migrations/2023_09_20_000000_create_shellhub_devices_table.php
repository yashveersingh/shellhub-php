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
        Schema::create('shellhub_devices', function (Blueprint $table) {
            $table->string('uid', 190)->primary();
            $table->string('name', 190);
            $table->macAddress('mac');
            $table->json('info');
            $table->string('tenant_id', 190);
            $table->dateTime('last_seen')->nullable();
            $table->boolean('is_online')->default(false);
            $table->string('namespace', 50);
            $table->tinyInteger('status');
            $table->dateTime('created_at');
        });
    }

    /**
     * @return void
     */
    public function down(): void
    {
        Schema::dropIfExists('shellhub_devices');
    }
};