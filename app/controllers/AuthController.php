<?php

namespace App\Controllers;

use Auth, BaseController, Form, Input, Redirect, Sentry, View;

class AuthController extends \BaseController {


    public function isAdmin(){
        return Sentry::check();
    }

    /**
     * 显示登录页面
     * @return View
     */
    public function getLogin()
    {
        return View::make('auth.login');
    }

    /**
     * POST 登录验证
     * @return Redirect
     */
    public function postLogin()
    {
        $credentials = array(
            'email'    => Input::get('email'),
            'password' => Input::get('password')
        );

        try
        {
            $user = Sentry::authenticate($credentials, false);

            if ($user)
            {
                return Redirect::route('/');
            }
        }
        catch(\Exception $e)
        {
            return Redirect::route('admin.login')->withErrors(array('login' => $e->getMessage()));
        }
    }

    /**
     * 注销
     * @return Redirect
     */
    public function getLogout()
    {
        Sentry::logout();

        return Redirect::route('admin.login');
    }
}