<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name')->unique();
            $table->string('email')->unique();
//            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->string('avatar')->comment('图像');
            $table->string('confirmation_token')->comment('邮箱验证字段');
            $table->smallInteger('is_active')->comment('是否激活了邮箱');
            $table->integer('questions_count')->default(0)->comment('问题数');
            $table->integer('answers_count')->default(0)->comment('回答数');
            $table->integer('comments_count')->default(0)->comment('评论数');
            $table->integer('favorites_count')->default(0)->comment('收藏数');
            $table->integer('likes_count')->default(0)->comment('点赞数');
            $table->integer('followers_count')->default(0)->comment('关注数');
            $table->integer('following_count')->default(0)->comment('被关注数');
            $table->json('settings')->nullable();

            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}
