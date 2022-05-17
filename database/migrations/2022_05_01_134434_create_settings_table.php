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
        Schema::create('settings', function (Blueprint $table) {
            $table->id()->autoIncrement();
            $table->string('title')->nullable()->change();
            $table->string('keyword')->nullable();
            $table->string('description')->nullable();
            $table->string('company',100)->nullable();
            $table->string('address')->nullable();
            $table->string('phone')->nullable();
            $table->string('email')->nullable();
            $table->string('fax',100)->nullable();
            $table->string('smtpserver')->nullable();
            $table->string('smtpemail')->nullable();
            $table->string('smtppassword')->nullable();
            $table->integer('smtpport')->nullable()->default(0);
            $table->string('facebook')->nullable();
            $table->string('instagram')->nullable();
            $table->string('twitter')->nullable();
            $table->text('aboutus')->nullable();
            $table->text('contact')->nullable();
            $table->text('references')->nullable();
            $table->string('status',10)->nullable()->default('False');
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
        Schema::dropIfExists('settings');
    }
};
