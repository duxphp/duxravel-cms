<?php

namespace Modules\Cms\Admin;

use Illuminate\Support\Facades\Log;

class MenuExpend extends \Modules\System\Admin\Expend
{
    public int $menuId;

    public function index($menuId = 0)
    {
        $this->menuId = $menuId;
        return parent::index();
    }

    public function ajax($menuId = 0)
    {
        $this->menuId = $menuId;
        return parent::ajax();
    }

    public function add($menuId = 0)
    {
        $this->menuId = $menuId;
        return parent::add();
    }

    public function edit($menuId = 0, $id = 0)
    {
        $this->menuId = $menuId;
        return parent::edit($id);
    }

    public function page($menuId = 0, $id = 0)
    {
        $this->menuId = $menuId;
        return parent::page($id);
    }

    public function save($menuId = 0, $id = 0)
    {

        $this->menuId = $menuId;
        return parent::save($id);
    }

    public function del($menuId = 0, $id = 0)
    {
        $this->menuId = $menuId;
        return parent::del($id);
    }

    public function data($menuId = 0)
    {
        $this->menuId = $menuId;
        return parent::data();
    }
}
