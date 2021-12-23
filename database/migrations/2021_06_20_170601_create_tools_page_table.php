<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateToolsPageTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tools_page', function (Blueprint $table) {
            $table->increments('page_id');
            $table->char('name', 50)->nullable()->default('')->comment('页面名称');
            $table->string('keywords', 250)->nullable()->default('')->comment('页面关键词');
            $table->string('description', 250)->nullable()->default('')->comment('页面描述');
            $table->string('tpl', 250)->nullable()->default('')->comment('模板名称');
            $table->integer('create_time');
            $table->integer('update_time');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tools_page');
    }
}
