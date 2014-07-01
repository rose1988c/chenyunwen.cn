<?php
class BaseController extends Controller
{
    protected function setupLayout() {
        if( ! is_null($this->layout)) {
            $menu = $this->initMenu();
            $this->layout = View::make($this->layout, array (
                'menu' => $menu 
            ));
        }
    }

    private function initMenu() {
        $name = strtolower(substr(get_class($this), 0, - 10));
        
        //父级
        $menu = MenuModel::where('parentid', 0)->orWhere('exten', 'page')->orderBy('sorts', 'DESC')->get()->toArray();
        
        $menus = \Service\Common\Util::ArrayColumn($menu, 'id', 'parentid,name,enname,url,icons');
        
        foreach($menus as $parentid => &$value) {
            if($value ['parentid'] == 0) {
                $value ['is_parent'] = 'nav-parent';
                $value ['submenu'] = MenuModel::where('parentid', $parentid)->get()->toArray();
                
                
                foreach($value ['submenu'] as &$val) {
                    if($val ['url']) {
                        $val ['url'] = route($val ['enname']);
                    }
                    if($val ['enname'] === Route::currentRouteName()) {
                        $val ['is_active'] = 'active';
                    } else {
                        $val ['is_active'] = '';
                    }
                }
                unset($val);
            } else {
                $value ['is_parent'] = '';
            }
            if($value ['enname'] == $name) {
                $value ['is_active'] = 'active';
            } else {
                $value ['is_active'] = '';
            }
            if($value ['url']) {
                $value ['url'] = route($value ['url']);
            }
        }
        unset($value);
        return $menus;
    }
}