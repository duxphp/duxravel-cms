<?php

use Illuminate\Support\Facades\Route;

Route::group([
    'prefix' => 'cms',
    'auth_app' => '内容管理'
], function () {

    Route::group([
        'auth_group' => '菜单管理'
    ], function () {
        Route::manage(\Modules\Cms\Admin\Menu::class)->only(['index', 'data', 'page', 'save', 'del'])->make();
    });
    Route::group([
        'auth_group' => '菜单内容管理'
    ], function () {
        Route::manage(\Modules\Cms\Admin\MenuItems::class)->only(['index', 'data', 'page', 'save', 'del', 'sort'])->prefix('menuItems-{menu}')->make();
    });

    Route::group([
        'auth_group' => '自定义页面'
    ], function () {
        Route::manage(\Modules\Cms\Admin\Page::class)->only(['index', 'data', 'page', 'save', 'del'])->make();
    });

    Route::group([
        'auth_tags' => '内容标签'
    ], function () {
        Route::get('tags', ['uses' => 'Modules\Cms\Admin\Tags@index', 'desc' => '列表'])->name('admin.cms.tags');
        Route::get('tags/ajax', ['uses' => 'Modules\Cms\Admin\Tags@ajax', 'desc' => 'ajax数据'])->name('admin.cms.tags.ajax');
        Route::post('tags/del/{id?}', ['uses' => 'Modules\Cms\Admin\Tags@del', 'desc' => '删除'])->name('admin.cms.tags.del');
        Route::get('tags/empty', ['uses' => 'Modules\Cms\Admin\Tags@empty', 'desc' => '清理'])->name('admin.cms.tags.empty');
    });
    Route::group([
        'auth_group' => '模板标记'
    ], function () {
        Route::manage(\Modules\Cms\Admin\Mark::class)->make();
    });
    // Generate Route Make
});

