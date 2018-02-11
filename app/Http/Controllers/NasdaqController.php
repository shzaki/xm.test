<?php

namespace App\Http\Controllers;

use App\Modules\GoogleFinanceApi;
use App\Modules\Nasdaq;
use Illuminate\Http\Request;


class NasdaqController extends Controller
{
	/**
	 * Shows the Nasdaq Form
	 *
	 * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
	 */
    public function getForm()
	{
		return view('nasdaq');
	}

	/**
	 * Posts the Nasdaq form
	 * Gets back the results of the google finance API to fill the datatable and chart
	 *
	 * @param Request $request
	 *
	 * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
	 */
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
