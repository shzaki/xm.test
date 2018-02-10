<?php
/**
 * Created by PhpStorm.
 * User: sh_za
 * Date: 10-Feb-18
 * Time: 11:00 AM
 */

namespace App\Modules;

use Illuminate\Support\Facades\Validator;

class Nasdaq
{

	private $symbol, $email, $fromDate, $toDate;

	/**
	 * Nasdaq constructor.
	 * @param $inputs
	 */
	public function __construct($inputs)
	{
		$this->symbol 	= $inputs['symbol'];
		$this->email 	= $inputs['email'];
		$this->fromDate = $inputs['fromDate'];
		$this->toDate 	= $inputs['toDate'];

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
	}

	/**
	 * @return mixed
	 */
	public function getSymbol()
	{
		return $this->symbol;
	}

	/**
	 * @return mixed
	 */
	public function getEmail()
	{
		return $this->email;
	}

	/**
	 * @return mixed
	 */
	public function getFromDate()
	{
		return $this->fromDate;
	}

	/**
	 * @return mixed
	 */
	public function getToDate()
	{
		return $this->toDate;
	}

}