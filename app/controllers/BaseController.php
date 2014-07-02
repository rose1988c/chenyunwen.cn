<?php
/**
 * BaseController.php
 * 
 * @author: rose1988c
 * @email: rose1988.c@gmail.com
 * @created: 2014-7-2 下午4:55:51
 * @logs: 
 *       
 */
class BaseController extends Controller
{
    protected function setupLayout() {
        if( ! is_null($this->layout)) {
            $this->layout = View::make($this->layout, array (
                'menu' => $this->initMenu()
            ));
        }
    }

    /**
     * 初始化菜单
     * 
     * @return array menu
     */
    private function initMenu() {
        //控制器名字
        //$name = strtolower(substr(get_class($this), 0, - 10));
        
        // 菜单
        $menu = MenuModel::where('parentid', 0)->orderBy('sorts', 'DESC')->get()->toArray();
        $menus = \Service\Common\Util::ArrayColumn($menu, 'id', 'id,parentid,name,url,icons');
        
        foreach($menus as $parentid => &$parendval) {
            // 定义
            $parendval ['is_active'] = '';
            $parendval ['is_parent'] = '';
            $parendval ['nav-active'] = '';
            
            // 顶级菜单
            if($parendval ['parentid'] == 0) {
                
                $parendval ['submenu'] = MenuModel::where('parentid', $parentid)->get()->toArray();
                $parendval ['is_parent'] = empty($parendval ['submenu']) ? '' : 'nav-parent';
                
                // 只有一级处理
                if (empty($parendval ['submenu']) && $parendval ['url'] === Request::path()) {
                    $parendval ['is_active'] = 'active';
                    $parendval ['is_parent'] = 'nav-parent';
                }
                
                // 子菜单
                foreach($parendval ['submenu'] as &$subval) {
                    $subval ['is_active'] = '';
                    if($subval ['url'] === Request::path()) {
                        $subval ['is_active'] = 'active';
                        $parendval ['is_active'] = 'active';
                    }
                }
                
                unset($subval);
            }
            
            // nav-active
            if ($parendval ['is_active'] && $parendval ['is_parent'])
            {
                $parendval ['nav-active'] = 'nav-active';
            }
            
        }
        unset($parendval);
        return $menus;
    }
}