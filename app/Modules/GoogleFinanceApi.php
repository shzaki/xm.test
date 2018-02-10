<?php
/**
 * Created by PhpStorm.
 * User: sh_za
 * Date: 10-Feb-18
 * Time: 12:29 PM
 */

namespace App\Modules;

use Carbon\Carbon;
use GuzzleHttp\Client;
use GuzzleHttp\Psr7;
/**
 * Class GoogleFinanceApi
 * @package App\Modules
 *
 * API:  https://finance.google.com/finance/historical?output=csv&q={symbol}&startdate={start_date}&e nddate={end_date}
 * where:
 * {symbol} = value of the field Company Symbol
 * {start_date} = value of the field Start Date in the format M d, Y
 * {end_date} = value of the field End Date in the format M d, Y
 */
class GoogleFinanceApi
{
	private $url;

	// TODO: Change to use interface or abstract class
	public function __construct(Nasdaq $nasdaq, $output = 'csv')
	{
		$startDate 	= (new Carbon($nasdaq->getFromDate()))->toFormattedDateString();
		$endDate	= (new Carbon($nasdaq->getToDate()))->toFormattedDateString();

		$query_string = 'output='. $output . '&q=' .  $nasdaq->getSymbol() . '&startDate=' . urlencode($startDate) . '&endDate=' . urlencode($endDate);
		$this->url = 'https://finance.google.com/finance/historical?' . $query_string;
 	}

 	public function callApi()
	{
		$client = new Client();
		$response = $client->request('GET', $this->url, ['stream' => true]);

		$csvContents = $response->getBody()->getContents();

		$csvLines = explode("\n", $csvContents);

		$results = [];
		foreach ($csvLines as $line) {
			if(!empty($line)) {
				$results[] =  explode(",", $line);
			}
		}

		return $results;
	}
}