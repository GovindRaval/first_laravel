<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table)
        {
            $table->id();
            $table->string('first_name');
            $table->string('last_name');
            $table->string('username');
            $table->string('social_id')->nullable();
            $table->enum('login_type', array('website', 'google', 'facebook'))->default('website');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->string('mobile');
            $table->date('birth_date')->nullable();
            $table->integer('country')->nullable();
            $table->string('password_reset_token')->nullable();
            $table->rememberToken();
            $table->longText('profile_picture')->nullable();
            $table->boolean('is_active')->default('1');
            $table->dateTime('last_login')->nullable();
            $table->integer('locale')->nullable()->comment('User selected language ID');
            $table->timestamps();
            $table->softDeletes('deleted_at', 0);
            $table->integer('created_by')->nullable();
            $table->integer('updated_by')->nullable();
            $table->integer('deleted_by')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }

}
