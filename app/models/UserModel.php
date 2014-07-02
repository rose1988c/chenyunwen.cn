<?php
/**
 * UserModel.php
 * 
 * @author: rose1988c
 * @email: rose1988.c@gmail.com
 * @created: 2014-7-1 下午5:51:17
 * @logs: 
 *       
 */
use \Illuminate\Auth\Reminders\RemindableInterface;
use \Illuminate\Auth\UserInterface;
class UserModel extends Eloquent implements RemindableInterface, UserInterface
{
    protected $table = 'mcc_user';
    protected $fillable = array ();
    protected $guarded = array ();
    protected $hidden = array('password');
    
    public function getReminderEmail()
    {
        return $this->username;
    }
	/* (non-PHPdoc)
     * @see \Illuminate\Auth\UserInterface::getAuthIdentifier()
     */
    public function getAuthIdentifier()
    {
        // TODO Auto-generated method stub
        return $this->attributes['id'];
        
    }

	/* (non-PHPdoc)
     * @see \Illuminate\Auth\UserInterface::getAuthPassword()
     */
    public function getAuthPassword()
    {
        // TODO Auto-generated method stub
        return $this->attributes['password'];
    }

    public function getRememberToken()
    {
        return $this->remember_token;
    }
    
    public function setRememberToken($value)
    {
        $this->remember_token = $value;
    }
    
    public function getRememberTokenName()
    {
        return 'remember_token';
    }

}
