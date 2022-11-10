<?php

/**
 * This class should contain methods for reading, writing, updating, and deleting 
 * information in a CSV file.
 */
class CSVHelper
{
  private static $obfuscator = '<?php die() ?>';

  static function write($filename, $data)
  {
    if (!isset($data)) return false;
    // open csv file for writing
    $fh = fopen($filename, 'w');

    if ($fh === false) {
      die('Error opening the file ' . $filename);
    }
    // write each row at a time to a file
    foreach ($data as $row) {
      fputcsv($fh, $row);
    }
    // close the file
    fclose($fh);
    echo "completed";
    return true;
  }

  static function read($filename)
  {
    $data = [];
    // open the file
    $fh = fopen($filename, 'r');

    if ($fh === false) {
      die('Cannot open the file ' . $filename);
    }

    // read each line in CSV file at a time
    while (($row = fgetcsv($fh)) !== false) {
      $data[] = $row;
    }

    // close the file
    fclose($fh);
    return $data;
  }

  static function modify($filname) {
    
  }
}
