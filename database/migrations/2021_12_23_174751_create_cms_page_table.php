<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCmsPageTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cms_page', function (Blueprint $table) {
            $table->increments('page_id');
            $table->char('name', 50)->nullable()->comment('页面名称');
            $table->string('keywords')->nullable()->comment('页面关键词');
            $table->string('description')->nullable()->comment('页面描述');
            $table->string('tpl')->nullable()->comment('模板名称');
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
        Schema::dropIfExists('cms_page');
    }
}
