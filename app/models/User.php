<?php

use Illuminate\Auth\UserTrait;
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableTrait;
use Illuminate\Auth\Reminders\RemindableInterface;

class User extends Eloquent implements UserInterface, RemindableInterface {

	use UserTrait, RemindableTrait;

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'users';
	protected $primaryKey = 'uid';
	protected $fillable = ['first_name','last_name' ,'username' ,'dob','gender','email','password','legend','admin','profile_image','brought_by', 'created_at', 'updated_at'];
	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */
	protected $hidden = array('password', 'remember_token');

	public function cycles()
    {
        return $this->hasMany('Cycle', 'uid','uid');
    }
    public function cycledetails()
    {
        return $this->hasMany('Cycledetail', 'uid','uid');
    }
    public function notifications()
    {
        return $this->hasMany('Notification', 'uid','uid');
    }
    public function accountdetails()
    {
        return $this->hasMany('Accountdetail', 'uid','uid');
    }
     public function under()
    {
        return $this->hasMany('Under','uid','uid');
    }
}
