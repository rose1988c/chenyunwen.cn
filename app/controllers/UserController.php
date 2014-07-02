<?php
/**
 * UserController.php
 * 
 * @author: rose1988c
 * @email: rose1988.c@gmail.com
 * @created: 2014-7-1 下午3:18:09
 * @logs: 
 *       
 */
class UserController extends BaseController
{
    protected $layout = 'layouts.manage';
    protected $data = array();
    
    public function userList()
    {
        $this->layout->with('title', '用户列表');
        $this->layout->content = View::make('manage.user.list');
    }
}