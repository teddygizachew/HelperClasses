<?php

/**
 * This class should contain methods for reading, writing, updating, and deleting 
 * information in a CSV file.
 */
class CSVHelper
{
  static function write($filename, $data, $overwrite = false)
  {
    if (!isset($data)) return false;

    if (!$overwrite) {
      // open csv file for append
      $fh = fopen($filename, 'a');
      if ($fh === false) {
        die('Error opening the file ' . $filename);
      }
    } else {
      // open csv file for writing
      $fh = fopen($filename, 'w');
      if ($fh === false) {
        die('Error opening the file ' . $filename);
      }
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

      $data = array();
      // read each line in CSV file at a time
      while ($row = fgets($fh)) {
        array_push($data, trim($row));
      }

      // close the file
      fclose($fh);
      return $data;
    } else {
      echo "File Not found!";
    }
    return null;
  }

  static function modify($filename, $index, $data)
  {
    if (file_exists($filename)) {
      $fh = fopen($filename, 'r');

      $line_array = CSVHelper::read($filename);

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
      echo 'You\'ve successfully deleted the item';
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
