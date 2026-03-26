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
        Schema::create('customers', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->bigInteger('phone');
            $table->string('email')->unique();
            $table->enum('status', ['active', 'inactive'])->default('active');
            $table->dateTime('customer_since')->nullable();
            $table->decimal('total_revenue',10,2)->default(0);
            $table->enum('service', ['web development', 'SEO', 'software development', 'graphic designing']);
            $table->decimal('price',10,2)->default(0);
            $table->dateTime('last_transaction')->nullable();
            $table->unsignedBigInteger('assigned_employee');
            $table->foreign('assigned_employee')->references('id')->on('users')->onDelete('cascade');
            $table->timestamps();

            $table->softDeletes();

         });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('customers');
    }
};
