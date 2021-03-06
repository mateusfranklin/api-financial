<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTransactionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transactions', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained();
            $table->foreignId('flow_id')->constrained();
            $table->foreignId('transaction_type_id')->constrained('transaction_types');
            $table->foreignId('transaction_subtype_id')->constrained('transaction_subtypes');
            $table->foreignId('from_bank_id')->constrained('banks');
            $table->foreignId('to_bank_id')->constrained('banks');
            $table->string('title');
            $table->decimal('value', 6, 2);
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('transactions');
    }
}
