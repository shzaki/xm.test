<?php

namespace App\Modules;

use App\Helpers\CsvHelper;
use Carbon\Carbon;
use GuzzleHttp\Client;
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

	/**
	 * GoogleFinanceApi constructor.
	 * This will build the url, need to think about a better place to store this url or make a more generic class to call any API
	 *
	 * @param Nasdaq $nasdaq
	 *
	 * @param string $output
	 */
	public function __construct(Nasdaq $nasdaq, $output = 'csv')
	{
		// Getting the right date format M d, Y
		$startDate 	= (new Carbon($nasdaq->getFromDate()))->toFormattedDateString();
		$endDate	= (new Carbon($nasdaq->getToDate()))->toFormattedDateString();

		// Building the url and encoding the dates
		$query_string = 'output='. $output . '&q=' .  $nasdaq->getSymbol() . '&startdate=' . rawurlencode($startDate) . '&enddate=' . rawurlencode($endDate);
		$this->url = 'https://finance.google.com/finance/historical?' . $query_string;
 	}

	/**
	 * Calling the API and returning results in 2 formats for (table and chart)
	 *
	 * @return array [$results, $jsonResults]
	 */
 	public function callApi()
	{
		try {
			$client = new Client();
			$response 	 = $client->request('GET', $this->url, ['stream' => true]);
			$csvContents = $response->getBody()->getContents();
			$results 	 = CsvHelper::convertCsvToArray($csvContents);

			return [$results, CsvHelper::prepareArrayForChart($results)];

		} catch (\Exception $e){

			return [$e->getMessage(), ''];
		}
	}
}