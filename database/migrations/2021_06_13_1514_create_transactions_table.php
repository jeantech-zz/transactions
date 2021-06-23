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
            $table->unsignedBigInteger('account_id');
            $table->foreign('account_id')->references('id')->on('accounts');
            $table->unsignedBigInteger('client_id');
            $table->foreign('client_id')->references('id')->on('clients');
            $table->unsignedBigInteger('type_id');
            $table->foreign('type_id')->references('id')->on('types');
            $table->unsignedBigInteger('accounts_registry_id');
            $table->foreign('accounts_registry_id')->references('id')->on('registrations');
            $table->double('value');
            $table->timestamps();
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
