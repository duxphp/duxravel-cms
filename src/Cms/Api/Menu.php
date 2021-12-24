<?php

namespace Duxravel\Core\Api;

use Duxravel\Core\Api\Api;
use Duxravel\Core\Resource\MenuItemsCollection;
use Modules\Article\Resource\TagsCollection;
use Duxravel\Core\Resource\FormDataCollection;
use Duxravel\Core\Resource\FormDataResource;
use Duxravel\Core\Resource\FormResource;

class Menu extends Api
{

    public function list($id)
    {
        $args = request()->all();
        $args['id'] = $id;
        $data = \Modules\Cms\Service\Menu::list($args);
        return $this->success(new MenuItemsCollection($res));
    }

}
