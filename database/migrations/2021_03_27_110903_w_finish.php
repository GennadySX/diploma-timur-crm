<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class WFinish extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

        Schema::table('companies', function (Blueprint $table) {
          $table->foreign('ceo_id')->references('id')->on('users')
          ->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('image_id')->references('id')->on('files')
                ->onDelete('cascade')->onUpdate('cascade');
        });


        Schema::table('roles', function (Blueprint $table) {
            $table->foreign('company_id')->references('id')->on('companies')
                ->onDelete('cascade')->onUpdate('cascade');
        });


        Schema::table('departments', function (Blueprint $table) {
            $table->foreign('company_id')->references('id')->on('companies')
                ->onDelete('cascade')->onUpdate('cascade');
        });

        Schema::table('documents', function (Blueprint $table) {
            $table->foreign('file_id')->references('id')->on('files')
                ->onDelete('cascade')->onUpdate('cascade');
        });

        Schema::table('tasks', function (Blueprint $table) {
            $table->foreign('creator_id')->references('id')->on('users')
                ->onDelete('cascade')->onUpdate('cascade');
        });


        Schema::table('user_tasks', function (Blueprint $table) {
            $table->foreign('company_id')->references('id')->on('companies')
                ->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('department_id')->references('id')->on('departments')
                ->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('task_id')->references('id')->on('tasks')
                ->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('executor_id')->references('id')->on('users')
                ->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('creator_id')->references('id')->on('users')
                ->onDelete('cascade')->onUpdate('cascade');
        });

        Schema::table('subscriptions', function (Blueprint $table) {
            $table->foreign('tariff_id')->references('id')->on('tariffs')
                ->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('company_id')->references('id')->on('companies')
                ->onDelete('cascade')->onUpdate('cascade');
        });

        Schema::table('files', function (Blueprint $table) {
            $table->foreign('user_id')->references('id')->on('users')
                ->onDelete('cascade')->onUpdate('cascade');
        });

        Schema::table('employees', function (Blueprint $table) {
            $table->foreign('user_id')->references('id')->on('users')
                ->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('company_id')->references('id')->on('companies')
                ->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('role_id')->references('id')->on('roles')
                ->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('department_id')->references('id')->on('departments')
                ->onDelete('cascade')->onUpdate('cascade');
        });

        Schema::table('chats', function (Blueprint $table) {
            $table->foreign('user_f_id')->references('id')->on('users')
                ->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('user_s_id')->references('id')->on('users')
                ->onDelete('cascade')->onUpdate('cascade');
        });

        Schema::table('emailers', function (Blueprint $table) {
            $table->foreign('sender_id')->references('id')->on('users')
                ->onDelete('cascade')->onUpdate('cascade');
           /* $table->foreign('receiver_id')->references('id')->on('users')
                ->onDelete('cascade')->onUpdate('cascade');*/
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
