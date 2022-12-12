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
    if (file_exists($filename)) {
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
    }
    return $data;
  }

  static function modify($filename, $index, $data)
  {
    if (file_exists($filename)) {
      $fh = fopen($filename, 'r');

      $line_array = array();
      while ($line = fgets($fh)) {
        array_push($line_array, (trim($line)));
      }
      fclose($fh);

      $line_counter = 0;
      $new_file_content = '';
      $fh = fopen($filename, 'r');
      while ($line = fgets($fh)) {
        if ($line_counter == $index) {
          if ($line_array[$line_counter] != $data) {
            $element = implode(",", $data);
            $new_file_content .= $element . PHP_EOL;
          }
        } else {
          $new_file_content .= $line;
        }
        $line_counter++;
      }
      fclose($fh);

      file_put_contents($filename, $new_file_content);
    } else {
      echo '404: File not found!';
    }
  }

  static function delete($filename, $index = null, $clear = false)
  {
    if ($clear == true) {
      file_put_contents($filename, '');
    } else {
      $line_counter = 0;
      $new_file_content = '';
      $fh = fopen($filename, 'r');
      while ($line = fgets($fh)) {
        if ($line_counter == $index) {
          $new_file_content .= '';
        } else {
          $new_file_content .= $line;
        }
        $line_counter++;
      }
      fclose($fh);

      file_put_contents($filename, $new_file_content);
      echo 'You\'ve successfully deleted the quote';
    }
    return null;
  }

  static function getUser($filename, $data)
  {
    if (file_exists($filename)) {
      $fh = fopen($filename, 'r');

      // read each line in CSV file at a time
      while (($row = fgetcsv($fh)) !== false) {
        $line = explode(";", $row[0]);
        if (trim($line[0]) == $data) {
          return true;
        }
      }

      return False;
      fclose($fh);
    } else {
      echo "File Does Not Exist";
    }
  }
}
