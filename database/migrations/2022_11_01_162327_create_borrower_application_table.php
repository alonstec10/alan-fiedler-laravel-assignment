<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('borrower_loan_application', function (Blueprint $table) {
            $table->primary(['borrower_id', 'loan_application_id'], 'borrower_application_id');
            $table->foreignId('borrower_id')->constrained()->onDelete('cascade');
            $table->foreignId('loan_application_id')->constrained()->onDelete('cascade');
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
        Schema::dropIfExists('borrower_loan_application');
    }
};
