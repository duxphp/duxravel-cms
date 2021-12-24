<?php

use Illuminate\Support\Facades\Route;


Route::get('form/{id}', ['uses' => 'Modules\Cms\Api\Form@list', 'desc' => '表单列表'])->name('api.cms.form.list');
Route::get('form-info/{id}', ['uses' => 'Modules\Cms\Api\Form@info', 'desc' => '表单列表'])->name('api.cms.form.list');
Route::post('form-info/{id}', ['uses' => 'Modules\Cms\Api\Form@push', 'desc' => '表单提交'])->name('api.cms.form.push');


Route::get('CmsMenu/{id}', ['uses' => 'Modules\Cms\Api\Form@list', 'desc' => '表单列表'])->name('api.cms.form.list');
