<?php

namespace Modules\Cms\Service;

use Modules\Cms\Model\CmsMark;

/**
 * 标签扩展
 */
class Blade
{

    /**
     * 标记标签
     * @param array $args
     * @return mixed|string
     */
    public static function mark(array $args = [])
    {
        $params = [
            'id' => $args['id'] ?: null,
            'name' => $args['name'] ?: null
        ];
        if (!$params['id'] && !$params['name']) {
            return '';
        }
        $model = new CmsMark();
        if ($params['id']) {
            $model = $model->where(['mark_id' => $params['id']]);
        }
        if ($params['name']) {
            $model = $model->where(['name' => $params['name']]);
        }
        return $model->value('content');
    }

    /**
     * 菜单标签
     * @param array $args
     * @return \Illuminate\Database\Eloquent\Builder[]|\Illuminate\Database\Eloquent\Collection|\Illuminate\Database\Query\Builder[]|\Illuminate\Support\Collection|\Kalnoy\Nestedset\Collection|\Modules\Cms\Model\CmsMenuItems[]
     */
    public static function menu(array $args = [])
    {
        return Menu::list($args);
    }

    /**
     * 菜单标签
     * @param array $args
     * @return \Illuminate\Database\Eloquent\Builder[]|\Illuminate\Database\Eloquent\Collection|\Illuminate\Database\Query\Builder[]|\Illuminate\Support\Collection|\Kalnoy\Nestedset\Collection|\Modules\Tools\Model\ToolsMenuItems[]
     */
    public static function form(array $args = [])
    {
        $params = [
            'id' => $args['id'] ?: 1,
            'limit' => (int)$args['limit'] ?: 10,
            'page' => (bool)$args['page'],
        ];
        $data = new \Duxravel\Core\Model\FormData();
        $data = $data->where('status', 1);

        if ($params['id']) {
            $data = $data->where('form_id', $params['id']);
        }
        if ($params['page']) {
            $data = $data->paginate($params['limit']);
        } else {
            $data = $data->limit($params['limit'])->get();
        }
        return $data;

    }
}

