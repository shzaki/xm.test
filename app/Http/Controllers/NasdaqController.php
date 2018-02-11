<?php

namespace App\Http\Controllers;

use App\Modules\GoogleFinanceApi;
use App\Modules\Nasdaq;
use Illuminate\Http\Request;
use \App\Mail\NasdaqQuotesMail;
use Illuminate\Support\Facades\Mail;


class NasdaqController extends Controller
{
    public function postForm(Request $request)
	{

		$inputs = $request->only(['symbol', 'email', 'fromDate', 'toDate']);

		$viewData = $inputs;

		$nasdaqObj = new Nasdaq($inputs);

		$googleObj = new GoogleFinanceApi($nasdaqObj);

		[$results, $jsonResults] = $googleObj->callApi();

		$viewData['results'] 	 = $results;
		$viewData['jsonResults'] = $jsonResults;



		// Arrange source code

		// Add Symbols to DB or cache
		// Do validation on it clientside and server side

		// Add loading page
		// Add sweet alert

		//Mail::to($viewData['email'])->send(new NasdaqQuotesMail($viewData));
		// find a proper smtp


		return view('nasdaq')->with($viewData);
	}
}
