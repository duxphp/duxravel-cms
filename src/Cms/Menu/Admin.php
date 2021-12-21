<?php

use \Duxravel\Core\Facades\Menu;

Menu::push('tools', function () {
    Menu::group([
        'name' => '站点工具',
        'order' => 0,
    ], function () {
        Menu::link('菜单管理', 'admin.cms.menu');
        Menu::link('自定义页面', 'admin.cms.page');
        Menu::link('内容标签', 'admin.cms.tags');
        Menu::link('模板标记', 'admin.cms.mark');
    });

    Menu::group([
        'name' => '站点菜单',
        'order' => 1,
    ], function () {
        $model = \Modules\Cms\Model\CmsMenu::get();
        $model->map(function ($item) {
            Menu::link($item['name'], 'admin.cms.menuItems', ['menu' => $item['menu_id']]);
        });
    });

});
