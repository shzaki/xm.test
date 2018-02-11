<?php

namespace App\Helpers;


class CsvHelper
{
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