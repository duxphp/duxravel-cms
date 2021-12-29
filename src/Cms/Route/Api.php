<?php

use Illuminate\Support\Facades\Route;

Route::get('CmsMenu/{id}', ['uses' => 'Modules\Cms\Api\Menu@list', 'desc' => '菜单列表'])->name('api.cms.menu.list');
