<?php

namespace Helper\Downloading;

/**
 * Csv Class
 */
class Csv
{

  /**
   * @param string, $fileName
   * @param array, $tableFieldName
   * @param array, $tableFieldContent
   */
  public function __construct(string $fileName, array $tableFieldName, array $tableFieldContent)
  {

    header('Content-type: text/csv');
    header('Content-Disposition: attachment; filename=' . $fileName . '.csv');

    $output = fopen('php://output', 'w');

    fputcsv($output, $tableFieldName);

    foreach ($tableFieldContent as $key => $row) {
      fputcsv($output, $row);
    }

    fclose($output);

  }



}
