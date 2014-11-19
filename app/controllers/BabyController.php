<?php

namespace App\Controllers;

use Auth, BaseController, Form, Input, Redirect, Sentry, View;

class BabyController extends \BaseController {

    public function add(){
            return View::make('baby.add');
    }

    public function home($id=0){

        if(!$id){
            $id =  \Session::get('user_baby_id');
        }elseif(\Baby::isUserBaby($id)){
            \Session::set('user_baby_id',$id);
            return Redirect::route('baby.home');
        }
        return View::make('baby.home');
    }

    public function setting(){

        \Former::populate( \Baby::find(\Session::get('user_baby_id')) );

        return View::make('baby.add');
    }

	/**
	 * Display a listing of the resource.
	 * GET /baby
	 *
	 * @return Response
	 */
	public function index()
	{
		//
	}

	/**
	 * Show the form for creating a new resource.
	 * GET /baby/create
	 *
	 * @return Response
	 */
	public function create()
	{
		//

        $baby = new \Baby();
        $baby->name = Input::get('name');
        $baby->birth_date = Input::get('birth_date');
        $baby->birth_time = Input::get('birth_time');
        $baby->birth_place = Input::get('birth_place');
        $baby->sign = Input::get('sign');


        if(!$baby->save()){
            return Redirect::route('baby.add')->withErrors(array('baby.add' => $baby->errors()->all()[0]));
        }else{
            \Session::forget('user_babys');
            return Redirect::route('home');
        }




	}

	/**
	 * Store a newly created resource in storage.
	 * POST /baby
	 *
	 * @return Response
	 */
	public function store()
	{
		//
	}

	/**
	 * Display the specified resource.
	 * GET /baby/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		//
	}

	/**
	 * Show the form for editing the specified resource.
	 * GET /baby/{id}/edit
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit()
	{
        $baby = \Baby::find(\Session::get('user_baby_id'));
        $baby->name = Input::get('name');
        $baby->birth_date = Input::get('birth_date');
        $baby->birth_time = Input::get('birth_time');
        $baby->birth_place = Input::get('birth_place');
        $baby->sign = Input::get('sign');

        if(!$baby->save()){
            return Redirect::route('baby.setting')->withErrors(array('baby.add' => $baby->errors()->all()[0]));
        }else{
            \Session::forget('user_babys');
            return Redirect::route('baby.home');
        }
	}

	/**
	 * Update the specified resource in storage.
	 * PUT /baby/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		//
	}

	/**
	 * Remove the specified resource from storage.
	 * DELETE /baby/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}

}