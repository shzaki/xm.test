<?php
/**
 * Created by PhpStorm.
 * User: sh_za
 * Date: 10-Feb-18
 * Time: 11:00 AM
 */

namespace App\Modules;


class Nasdaq
{

	private $symbol, $email, $fromDate, $toDate;

	public function __construct($data)
	{
		$this->symbol 	= $data['symbol'];
		$this->email 	= $data['email'];
		$this->fromDate = $data['fromDate'];
		$this->toDate 	= $data['toDate'];
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