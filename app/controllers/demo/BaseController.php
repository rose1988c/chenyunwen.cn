<?php

class BaseController extends Controller
{
    public function __construct()
    {
        
    }
    protected function setupLayout()
	{
		if ( ! is_null($this->layout))
		{
            $menu = $this->initMenu();
			$this->layout = View::make($this->layout, array('menu' => $menu));
		}
	}
    private function initMenu()
    {
        $name = strtolower(substr(get_class($this), 0, -10));
        
        $menu = MenuModel::where('submenu','!=' , '')->orWhere('exten', 'page')->orderBy('sorts', 'DESC')->get()->toArray();
        if (!$menu) return;
        $menu = \Service\Common\Util::ArrayColumn($menu, 'id', 'name,submenu,enname,url,icons');
        foreach($menu as &$value) {
            if ($value['submenu']) {
                $value['is_parent'] = 'nav-parent';
                $value['submenu'] = MenuModel::whereIn('id', explode(',', $value['submenu']))->get()->toArray();
                foreach($value['submenu'] as &$val) {
                    if ($val['url']) {
                        $val['url'] = route($val['enname']);
                    }
                    if ($val['enname'] === Route::currentRouteName()) {
                        $val['is_active'] = 'active';
                    } else {
                        $val['is_active'] = '';
                    }
                }
                unset($val);
            } else {
                $value['is_parent'] = '';                
            }
            if ($value['enname'] == $name) {
                $value['is_active'] = 'active';
            } else {
                $value['is_active'] = '';
            }
            if ($value['url']) {
                $value['url'] = route($value['url']);
            }
        }
        unset($value);
        return $menu;
    }
}