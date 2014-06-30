<?php
/**
 * ManageController.php
 * 
 * @author: Cyw
 * @email: chenyunwen01@bianfeng.com
 * @created: 2014-6-20 下午1:38:54
 * @logs: 
 *       
 */
use \Service\Common\Util as Util;
class ManageController extends BaseController
{
    protected $layout = 'layouts.manage';
    protected $data = array();
    
    public function __construct()
    {
        
    }
    
    public function index()
    {
        $this->data['title'] = '后台管理';
        
        $this->layout->content = View::make('manage.index')->with($this->data);
    }
}