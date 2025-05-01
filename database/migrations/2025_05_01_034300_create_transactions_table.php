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
        Schema::create('transactions', function (Blueprint $table) {
            $table->id();
            $table->integer('transaction_type')->default(0);
            $table->text('title');
            $table->text('description')->nullable();
            $table->decimal('amount', 10, 2);
            $table->integer('installments');
            $table->timestamps();

            $table->foreignId('credit_card_id')->constrained('credit_cards')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('transactions');
    }
};
