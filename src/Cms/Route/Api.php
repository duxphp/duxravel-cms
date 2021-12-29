<?php

use Illuminate\Support\Facades\Route;

Route::get('CmsMenu/{id}', ['uses' => 'Modules\Cms\Api\Form@list', 'desc' => '表单列表'])->name('api.cms.form.list');
