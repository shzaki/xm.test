<?php

namespace App\Http\Controllers;

use App\Modules\GoogleFinanceApi;
use App\Modules\Nasdaq;
use Illuminate\Http\Request;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\Mail;
use App\Mail\NasdaqQuotesMail;
use Illuminate\Support\Facades\Validator;
use App\Helpers\TraderHelper;
use Illuminate\Support\Facades\Redirect;


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
		$rules  = [
			'symbol' 	=> 'required|in:' . implode(',', TraderHelper::getCompanySymbols()),
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
			return Redirect::route('nasdaq')
				->withErrors($validator)
				->withInput();
		}

		// Validation is ok
		$nasdaqObj = new Nasdaq($inputs);
		$googleObj = new GoogleFinanceApi($nasdaqObj);
		[$results, $jsonResults] = $googleObj->callApi();

		$viewData = $inputs;
		$viewData['results'] 	 = $results;
		$viewData['jsonResults'] = $jsonResults;
		// Send email
		Mail::to($viewData['email'])->send(new NasdaqQuotesMail($viewData));

		return view('nasdaq')->with($viewData);
	}

	/**
	 * Getting Customers' symbols
	 *
	 * @return array|string
	 */
	public function getSymbols()
	{
		return TraderHelper::getCompanySymbols();
	}
}
