<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

/**
 * CSVReader Class
 *
 * Allows to retrieve a CSV file content as a two dimensional array.
 * Optionally, the first text line may contains the column names to
 * be used to retrieve fields values (default).
 */
class CSVReader
{

	var $fields; // columns names retrieved after parsing
	var $separator = ','; // separator used to explode each line
	var $enclosure = '"'; // enclosure used to decorate each field

	var $max_row_size = 4096; // maximum row size to be used for decoding

	/**
	 * Parse a file containing CSV formatted data.
	 *
	 * @access    public
	 * @param     string
	 * @param     boolean
	 * @return    array
	 */
	function parse_csv($p_Filepath, $p_NamedFields = true)
	{
		$this->separator = detectDelimiter($p_Filepath);
		$content = false;
		$file = fopen($p_Filepath, 'r');
		if ($p_NamedFields) {
			$this->fields = fgetcsv($file, $this->max_row_size, $this->separator, $this->enclosure);
		}
		while (($row = fgetcsv($file, $this->max_row_size, $this->separator, $this->enclosure)) != false) {
			if ($row[0] != null) { // skip empty lines
				if (!$content) {
					$content = array();
				}

				if ($p_NamedFields) {
					$items = array();

					foreach ($this->fields as $id => $field) {
						if (isset($row[$id])) {
							$items[$field] = $row[$id];
						}
					}
					$content[] = $items;
				} else {
					$content[] = $row;
				}
			}
		}
		fclose($file);
		return $content;
	}
}

function detectDelimiter($csvFile)
{
	$delimiters = [";" => 0, "," => 0, "\t" => 0, "|" => 0];

	$handle = fopen($csvFile, "r");
	$firstLine = fgets($handle);
	fclose($handle);
	foreach ($delimiters as $delimiter => &$count) {
		$count = count(str_getcsv($firstLine, $delimiter));
	}

	return array_search(max($delimiters), $delimiters);
}
