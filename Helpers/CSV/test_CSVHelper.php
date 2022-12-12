<?php

require_once('CSVHelper.php');

$data = [
  ['Symbol', 'Company', 'Price'],
  ['GOOG', 'Google Inc.', '800'],
  ['AAPL', 'Apple Inc.', '500'],
  ['AMZN', 'Amazon.com Inc.', '250'],
  ['YHOO', 'Yahoo! Inc.', '250']
];

// WRITE
CSVHelper::write('beatles.csv.php', $data); // write a recordset to a CSV file

// READ
// echo '<pre>';print_r(CSVHelper::read('beatles.csv.php')); // read a recordset from a CSV file

// MODIFY
// CSVHelper::modify('beatles.csv.php',0,['firstname'=>'John','lastname'=>'Lennon','birthdate'=>'1940-10-09']); // modify the first record in a CSV file

// DELETE
// CSVHelper::delete('beatles.csv.php', null, true); // delete a CSV file
