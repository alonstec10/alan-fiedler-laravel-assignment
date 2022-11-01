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
        Schema::create('borrower_application', function (Blueprint $table) {
            $table->primary(['borrower_id', 'loan_applications_id']);
            $table->foreignId('borrower_id')->constrained()->onDelete('cascade');
            $table->foreignId('loan_applications_id')->constrained()->onDelete('cascade');
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
        Schema::dropIfExists('borrower_application');
    }
};
