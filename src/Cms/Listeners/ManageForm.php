<?php

namespace Modules\Cms\Listeners;

use Duxravel\Core\UI\Form;

/**
 * 表单接口
 */
class ManageForm
{

    public function handle($event)
    {

        if ($event->class === \Modules\System\Admin\Setting::class) {
            $this->settingForm($event->form);
        }

    }

    public function settingForm($form)
    {
        $tabs = $form->element[1];

        $tabs->column('主题配置', function (Form $form) {
            $form->text('主题标题', 'THEME_TITLE');
            $form->text('主题关键词', 'THEME_KEYWORD');
            $form->text('主题描述', 'THEME_DESCRIPTION');
            $form->text('pc端主题', 'THEME_DEFAULT');
            $form->text('移动端主题', 'THEME_MOBILE');
        }, 1);

    }
}
