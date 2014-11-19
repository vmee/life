<?php

class Baby extends \LaravelBook\Ardent\Ardent {
	protected $fillable = [];

    protected $table = 'babys';

    public static $rules = array(
        'name'                  => 'required|between:4,16',
        'birth_date'                 => 'required',
        'birth_time'              => 'required',
    );

    public function beforeSave(){

        $this->user_id = Sentry::getUser()->getId();
    }


    public static function getUserALlBaby($id=0){

        $userId = $id ? $id :Sentry::getUser()->getId();
        if(!$userId) return false;

        if ((!$id || $id==$userId) && Session::has('user_babys'))
        {
            return Session::get('user_babys');
        }

        $data = self::where('user_id','=', $userId)->get();
        $babys = array();
        foreach($data as $baby){
            $babys[$baby->id] = $baby;
        }

        if(!$id || $id==$userId) Session::set('user_babys', $babys);

        return $babys;
    }

    public static function isUserBaby($babyId, $userId=0){
        $babys = self::getUserALlBaby($userId);
        return isset($babys[$babyId]);
    }

    public static function getUserBaby($babyId, $userId=0){
        $babys = self::getUserALlBaby($userId);
        return $babys[$babyId];
    }
}       