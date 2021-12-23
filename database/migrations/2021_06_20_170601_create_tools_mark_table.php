<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateToolsMarkTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cms_mark', function (Blueprint $table) {
            $table->increments('mark_id');
            $table->char('name', 255)->nullable()->comment('名称');
            $table->char('type', 20)->default('')->comment('类型');
            $table->text('content')->nullable()->comment('内容');
            $table->integer('create_time')->default(0);
            $table->integer('update_time')->default(0);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cms_mark');
    }
}
