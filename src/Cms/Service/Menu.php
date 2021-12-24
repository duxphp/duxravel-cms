<?php

namespace Modules\Cms\Service;

use Modules\Cms\Model\CmsMark;

/**
 * 菜单相关
 */
class Menu
{

    public static function list(array $args = [])
    {
        $params = [
            'parent' => $args['parent'] ?: 0,
            'id' => $args['id'] ?: 1,
            'limit' => (int)$args['limit'] ?: 10,
        ];
        $data = new \Modules\Cms\Model\CmsMenuItems();
        $data = $data->scoped(['menu_id' => $params['id']])->defaultOrder();

        if ($params['parent']) {
            $data = $data->where('item_id', $params['parent'])->first()->descendants()->get()->toTree()->take($params['limit']);
        } else {
            $data = $data->get()->toTree()->take($params['limit']);
        }
        return $data;
    }
}

