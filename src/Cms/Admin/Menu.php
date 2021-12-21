<?php

namespace Modules\Cms\Admin;

use Duxravel\Core\UI\Form;
use Duxravel\Core\UI\Table;

class Menu extends \Modules\System\Admin\Expend
{

    public string $model = \Modules\Cms\Model\CmsMenu::class;

    /**
     * @return Table
     * @throws \Exception
     */
    protected function table(): Table
    {
        $table = new Table(new $this->model());
        $table->title('菜单管理');
        $table->action()->button('添加', 'admin.cms.menu.page')->icon('plus')->type('dialog');

        $table->column('#', 'menu_id')->width(80);
        $table->column('名称', 'name');
        $column = $table->column('操作')->width('180')->align('right');
        $column->link('编辑', 'admin.cms.menu.page', ['id' => 'menu_id'])->type('dialog');
        $column->link('删除', 'admin.cms.menu.del', ['id' => 'menu_id'])->type('ajax', ['method' => 'post']);
        return $table;
    }

    public function form(int $id = 0): Form
    {
        $form = new Form(new $this->model());
        $form->dialog(true);
        $form->text('菜单名称', 'name');
        return $form;
    }

}
