<?php

class Groups extends \Eloquent {
	protected $fillable = [];

    public static $rules = array
    (
        'name' => 'required',
        'permissions' => 'required',
    );


    public function users()
    {
        return $this->belongsToMany('Groups', 'users_groups', 'user_id', 'group_id');
    }


    public static function boot()
    {
        parent::boot();

        static::creating(function($post)
        {
            $post->permissions = json_encode(array($post->permission=>1));
        });

        static::updating(function($post)
        {
            $post->permissions = json_encode(array($post->permissions=>1));
        });
    }

}