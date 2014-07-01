<?php
/**
 * AccountController.php
 * 
 * @author: rose1988c
 * @email: rose1988.c@gmail.com
 * @created: 2014-7-1 下午4:51:33
 * @logs: 
 *       
 */
class AccountController extends BaseController
{
    protected $layout = 'layouts.account';
    
    public function signup()
    {
        if (Request::server('REQUEST_METHOD') == 'POST')
        {
            // rules
            $rules = array (
                'username' => 'required',
                'email' => 'required',
                'password' => 'required'
            );
            $messages = array (
                'required' => '字段 :attribute 是必填项.'
            );
            $validator = Validator::make(Input::all(), $rules, $messages);
            
            if($validator->fails()) {
                return Redirect::to(url('/signup'))->withErrors($validator)->withInput();
            }
            
            // create
            $username = HTML::entities( Input::get('username', false) );
            $password = Input::get('password', false);
            $email = HTML::entities( Input::get('email', false) );
            
            $data = array(
                'username' => $username,
                'password' => Hash::make($password),
                'email' => $email,
            );
            
            //TODO username or email exits
            $user = UserModel::create($data);
            
            if ($user) 
            {
                return Redirect::to(url('/login'));
            }
            
        } else {
            $this->layout->with('title', '用户注册');
            $this->layout->content = View::make('account.signup');
        }
    }
    
    public function login() {
        
        if (Request::server('REQUEST_METHOD') == 'POST')
        {
            $rules = array (
                'username' => 'required',
                'email' => 'required',
                'password' => 'required' 
            );
            $messages = array (
                'required' => 'The :attribute field is required.' 
            );
            $validator = Validator::make(Input::all(), $rules, $messages);
            
            if($validator->fails()) {
                return Redirect::to(urls::absolute('/login'))->withErrors($validator)->withInput();
            }
            
            $user = $this->authUser(Input::get('email'), Input::get('password'));
            
            if($user) {
                // guard 应干的事。。。。先hacker吧
                // 登录
                Session::put('login_user', $user);
                $user = new \Guard\Auth\User($user);
                Auth::login($user);
            }
            return Redirect::to(route('index'));
        } else {
            $this->layout->with('title', '用户登录');
            $this->layout->content = View::make('account.login');
        }
    }

    private function authUser($email, $password) {
        $user = GameUserModel::whereRaw('username = ? ', array (
            $email 
        ))->first();
        if(is_object($user) && Hash::check($password, $user->password)) {
            return $user->toArray();
        } else {
            return false;
        }
    }

    public function logout() {
        Auth::logout();
        return Redirect::to(urls::absolute());
    }
}