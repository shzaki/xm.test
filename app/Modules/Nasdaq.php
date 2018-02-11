<?php

namespace App\Modules;



// TODO: Change to use interface or abstract class

class Nasdaq
{
	private $symbol, $email, $fromDate, $toDate;

	/**
	 * Nasdaq constructor.
	 *
	 * @param $inputs
	 */
	public function __construct($inputs)
	{
		$this->symbol 	= $inputs['symbol'];
		$this->email 	= $inputs['email'];
		$this->fromDate = $inputs['fromDate'];
		$this->toDate 	= $inputs['toDate'];
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