<?php

use Illuminate\Support\Facades\Route;

Route::get('CmsMenu/{id}', ['uses' => 'Modules\Cms\Api\Menu@list', 'desc' => '่ๅๅ่กจ'])->name('api.cms.menu.list');
