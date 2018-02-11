<?php

namespace App\Helpers;

use GuzzleHttp\Client;

/**
 * A Helper class that contains common static functions used all over the system
 * Class TraderHelper
 * @package App\Helpers
 */
class TraderHelper
{
	/**
	 * Getting CompanySymbols from a given URL
	 * url is 'http://www.nasdaq.com/screening/companies-by-industry.aspx?exchange=NASDAQ&render=download'
	 * TODO: Can be sent as a default parameter, depends on business
	 * @return array|string
	 */
	public static function getCompanySymbols()
	{
		try {
			$client = new Client();//TODO: Make a ClientHelper
			$response 	 = $client->request('GET', 'http://www.nasdaq.com/screening/companies-by-industry.aspx?exchange=NASDAQ&render=download', ['stream' => true]);
			$csvContents = $response->getBody()->getContents();

			$companies 	 = CsvHelper::convertCsvToArray($csvContents);

			array_forget($companies, 0);

			$results = [];

			foreach($companies as $company) {
				$results[] = trim($company[0], '"');
			}

			return $results;

		} catch (\Exception $e){

			return $e->getMessage();
		}
	}
}