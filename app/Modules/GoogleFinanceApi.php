<?php

namespace App\Modules;

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
			$results 	 = self::convertCsvToArray($csvContents);

			return [$results, self::prepareArrayForChart($results)];

		} catch (\Exception $e){

			return [$e->getMessage(), ''];
		}
	}

	/**
	 * Converting csv data into an array
	 *
	 * @param $csvContents
	 *
	 * @return array
	 */
	public static function convertCsvToArray($csvContents)
	{
		$csvLines = explode("\n", $csvContents);

		$results = [];
		foreach ($csvLines as $line) {
			if(!empty($line)) {
				$results[] =  explode(",", $line);
			}
		}

		return $results;
	}

	/**
	 * Preparing the result array to the HighChart
	 * removing the header
	 * Converting the Date to timestamp
	 * Arranging the array by timestamp
	 * Convert to Json
	 *
	 * @param $results
	 *
	 * @return string
	 */
	public static function prepareArrayForChart($results)
	{
		$tempresults = [];

		foreach($results as $key=>$row)	{
			// Ignore first row since it has the header
			if($key != 0) {
				// Converting the first cell which has the date to timestamp
				foreach($row as $rowKey=>&$cell) {
					if ($rowKey == 0) {
						$cell = strtotime($cell)*1000;
						continue;
					}
				}
				$tempresults[] = $row;
			}
		}

		// Arranging the rows by timestamp
		usort ( $tempresults , function ($item1, $item2) {
			return $item1[0] <=> $item2[0];
		});

		return json_encode($tempresults, JSON_NUMERIC_CHECK);
	}
}