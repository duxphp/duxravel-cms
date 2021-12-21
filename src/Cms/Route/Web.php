<?php

use Illuminate\Support\Facades\Route;

Route::group([
    'app' => '系统工具'
], function () {
    Route::group([
        'group' => '自定义页面'
    ], function () {
        Route::get('page/{id}', ['uses' => 'Modules\Cms\Web\Pages@index', 'desc' => '页面'])->name('web.pages');
    });
});
