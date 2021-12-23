<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCmsTagsHasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cms_tags_has', function (Blueprint $table) {
            $table->string('has_type')->nullable();
            $table->integer('has_id')->nullable()->index('user_id');
            $table->integer('tag_id')->nullable()->index('role_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cms_tags_has');
    }
}
