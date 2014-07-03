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
        $users = array();//UserModel::all()->toArray();
        
        $this->layout->with('title', '用户列表');
        $this->layout->content = View::make('manage.user.list')->with(compact('users'));
    }
    
    public function userList_ajax()
    {
        $posts = UserModel::select(array('id', 'username', 'roleid', 'email', 'ip', 'login_at'));
        return Datatables::of($posts)
            ->add_column('operations','
                <a href="{{ url ("manage", array("user", "edit", $id )) }}"><i class="fa fa-pencil"></i></a>
                <a href="javascript:void(0);" rel="{{$id}}" title="{{$username}}" class="delete-row"><i class="fa fa-trash-o"></i></a>
            ')
            ->edit_column('login_at', '
                @if(date("Y-m-d",strtotime($login_at)) == date("Y-m-d"))
                    <span class="label label-success">{{$login_at}}</span>
                @else
                    <span class="label label-default">{{$login_at}}</span>
                @endif
            ')
            ->edit_column('roleid','
                @if($roleid == USER_ROLE_SUPER_ADMIN)
                    <span class="label label-success">{{ \Service\Common\Html::$roles [$roleid] }}</span>
                @else
                    <span class="label label-default">{{ \Service\Common\Html::$roles [$roleid] }}</span>
                @endif
            ')
            //->remove_column('id')
            ->make();
    }
}