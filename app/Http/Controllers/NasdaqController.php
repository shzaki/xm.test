<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Mail\NasdaqQuotesMail;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;

class NasdaqController extends Controller
{
    public function postForm(Request $request)
	{
		$inputs = $request->only(['symbol', 'email', 'fromDate', 'toDate']);

		$rules  = [
			'symbol' 	=> 'required',
			'email'		=> 'required|email',
			'fromDate'  =>  'required|date|date_format:Y-m-d|before:tomorrow|before_or_equal:toDate',
			'toDate'    =>  'required|date|date_format:Y-m-d|before:tomorrow|after_or_equal:fromDate'
		];

		$messages = [
			// Custom Messages if needed
		];

		// data validation
		$validator = Validator::make($inputs, $rules, $messages);

		if ($validator->fails()) {
			return redirect('/test')
				->withErrors($validator)
				->withInput();
		}

		// send api

		// get result back as attachment

		// get result back as numbers

		// show results in the email as table

		// send result back to the form

		// use datatables

		// use highcharts

		// Arrange source code

		// Add Symbols to DB or cache
		// Do validation on it clientside and server side

		//Mail::to($data['email'])->send(new NasdaqQuotesMail($data));

		return view('test')->with($inputs);
	}
}
