<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateToolsMenuItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tools_menu_items', function (Blueprint $table) {
            $table->increments('item_id');
            $table->integer('parent_id')->nullable()->index('parent_id')->comment('上级id');
            $table->integer('menu_id')->default(0)->index('menu_id')->comment('菜单id');
            $table->char('name', 50)->nullable()->default('')->comment('菜单名称');
            $table->string('url', 250)->nullable()->default('')->comment('菜单链接');
            $table->integer('_lft')->default(0);
            $table->integer('_rgt')->default(0);
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
        Schema::dropIfExists('tools_menu_items');
    }
}
