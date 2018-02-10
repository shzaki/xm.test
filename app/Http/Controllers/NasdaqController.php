<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Mail\NasdaqQuotesMail;
use Illuminate\Support\Facades\Mail;

class NasdaqController extends Controller
{
    public function postForm(Request $request)
	{
		$data = $request->only(['symbol', 'email', 'fromDate', 'toDate']);

		// data validation

		// send api

		// get result back as attachment

		// get result back as numbers

		// show results in the email as table

		// send result back to the form

		// use datatables

		// use highcharts

		// Arrange source code

		//Mail::to($data['email'])->send(new NasdaqQuotesMail($data));

		return view('test');
	}
}
