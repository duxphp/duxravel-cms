<?php

namespace Modules\Cms\Model;

/**
 * class CmsMenuItems
 * @package Modules\Cms\Model
 */
class CmsMenuItems extends \Duxravel\Core\Model\Base
{
    use \Kalnoy\Nestedset\NodeTrait;

    protected function getScopeAttributes(): array
    {
        return ['menu_id'];
    }

    protected $table = 'cms_menu_items';

    protected $primaryKey = 'item_id';

}
