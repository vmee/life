<?php

use Illuminate\Auth\UserTrait;
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableTrait;
use Illuminate\Auth\Reminders\RemindableInterface;

class Users extends Eloquent implements UserInterface, RemindableInterface {

	use UserTrait, RemindableTrait;


    public static $rules = array
    (
        'first_name' => 'required',
        'email' => 'required|email',
    );


	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */
	protected $hidden = array('password', 'remember_token');

    public function groups()
    {
        return $this->belongsToMany('Groups', 'users_groups','user_id', 'group_id');
    }


    public static function boot()
    {
        parent::boot();

        static::creating(function($post)
        {
            $post->password = json_encode(array($post->permissions=>1));
        });

        static::updating(function($post)
        {
            $post->permissions = json_encode(array($post->permissions=>1));
        });
    }


}
