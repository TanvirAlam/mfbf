<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateIncomeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('incomes', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('category_id')->references('id')->on('categories');
            $table->string('description')->nullable();
            $table->integer('amount_b_skat')->nullable();
            $table->integer('amount_a_skat');
            $table->dateTime('collect_at')->nullable();
            $table->boolean('occurrence');
            $table->string('interval');
            $table->dateTime('cancelled_at')->nullable();
            $table->string('docs')->nullable();
            $table->index(['category_id']);
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
        Schema::dropIfExists('income');
    }
}
