<?php

namespace Modules\Cms\Api;

use Duxravel\Core\Api\Api;
use Modules\Cms\Resource\MenuItemsCollection;

class Menu extends Api
{

    public function list($id)
    {
        $args = request()->all();
        $args['id'] = $id;
        $data = \Modules\Cms\Service\Menu::list($args);
        return $this->success(new MenuItemsCollection($data));
    }

}
