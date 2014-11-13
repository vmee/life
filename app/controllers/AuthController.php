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
     * 显示注册页面
     * @return View
     */
    public function getRegister(){
        return View::make('auth.register');
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
                return Redirect::route('home');
            }
        }
        catch(\Exception $e)
        {
            return Redirect::route('login')->withErrors(array('login' => $e->getMessage()));
        }
    }


    /**
     * POST 注册
     * @return Redirect
     */
    public function postRegister()
    {
        $credentials = array(
            'email'    => Input::get('email'),
            'password' => Input::get('password'),
            'activated' => true,
        );

        try
        {

            // Create the user
            $user = Sentry::createUser($credentials);

            // Find the group using the group id
            $group = Sentry::findGroupByName('普通用户');

            // Assign the group to the user
            $user->addGroup($group);

            return Redirect::route('login');

        }
        catch(\Exception $e)
        {
            return Redirect::route('register')->withErrors(array('register' => $e->getMessage()));
        }
    }


    /**
     * 注销
     * @return Redirect
     */
    public function getLogout()
    {
        Sentry::logout();

        return Redirect::route('login');
    }
}