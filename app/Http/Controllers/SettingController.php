<?php

namespace App\Http\Controllers;

/******************************************************
 * IM - Vocabulary Builder
 * Version : 1.0.2
 * Copyright© 2016 Imprevo Ltd. All Rights Reversed.
 * This file may not be redistributed.
 * Author URL:http://imprevo.net
 ******************************************************/

use App\User;
use App\Generalsetting;
use App\Paymentsetting;
use App\Coin;
use Validator;
use App\Http\Controllers\Controller;
//use Illuminate\Foundation\Auth\ThrottlesLogins;
//use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests;
use Illuminate\Http\Request;
use Redirect;
use Input;
use Reminder;
use Mail;
use Session;
use Log;
use File;

class SettingController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Registration & Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users, as well as the
    | authentication of existing users. By default, this controller uses
    | a simple trait to add these behaviors. Why don't you explore it?
    |
    */

    /**
     * Create a new authentication controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function general_settings()
    {



		$codeList = Generalsetting::all();
		$settings = [];
		for($i = 0; $i < count($codeList); $i++) {
			$settings[$codeList[$i]["name"]] = $codeList[$i]["value"];
		}

    	return view('general_settings', ['settings'=>$settings]);
    }

    public function payment_settings()
    {
		      $codeList = Paymentsetting::all();

		      $settings = [];
		      for($i = 0; $i < count($codeList); $i++) {
			       $settings[$codeList[$i]["name"]] = $codeList[$i]["value"];
		      }
          $coins = Coin::all();
    	    return view('payment_settings', ['settings'=>$settings, 'coins' => $coins]);
    }

    public function postPaymentSetting(Request $request)
    {
        $code = Paymentsetting::firstOrCreate(["name" => "enable_auto_reward"]);
        $code->value = $request->get('enable_auto_reward');
        $code->save();

        $coins = Coin::all();

        foreach ($coins as $coin){
          $code = Paymentsetting::firstOrCreate(["name" => $coin['coin_name']]);
          $code->value = $request->get($coin['coin_name']);
          $code->save();
        }

        return back()->with('success',"Settings have been successfully saved.");
        //return Redirect::route('admin.setting');
    }
}
