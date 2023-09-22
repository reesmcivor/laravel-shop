<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('coupons', function (Blueprint $table) {
            $table->id();
            $table->string('code')->unique();
            $table->enum('type', ['percentage', 'amount']);
            $table->decimal('value', 8, 2);
            $table->boolean('is_global')->default(false);
            $table->boolean('is_enabled')->default(true);
            $table->unsignedInteger('use_limit')->nullable(); // null means unlimited
            $table->unsignedInteger('used_count')->default(0);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('coupons');
    }
}