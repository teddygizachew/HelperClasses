<?php

require_once('CSVHelper.php');

$data = [
  ['Symbol', 'Company', 'Price'],
  ['GOOG', 'Google Inc.', '800'],
  ['AAPL', 'Apple Inc.', '500'],
  ['AMZN', 'Amazon.com Inc.', '250'],
  ['YHOO', 'Yahoo! Inc.', '250'],
  ['FB', 'Facebook, Inc.', '30'],
];

// WRITE
CSVHelper::write('beatles.csv.php', $data); // write a recordset to a CSV file
// CSVHelper::write('beatles.csv.php',['firstname'=>'George','lastname'=>'Harrison']); // append a record to a CSV file
// CSVHelper::write('beatles.csv.php',[['firstname'=>'George','lastname'=>'Harrison'],['firstname'=>'Ringo','lastname'=>'Starr']]); // append a recordset to a CSV file
// CSVHelper::write('beatles.csv.php',[['firstname'=>'John','lastname'=>'Lennon'],['firstname'=>'Paul','lastname'=>'McCartney']],false); // write a recordset to a "secure" CSV file

// CSVHelper::write('beatles.csv.php',['a'=>['firstname'=>'John','lastname'=>'Lennon'],'b'=>['firstname'=>'Paul','lastname'=>'McCartney']],true,true); // write a recordset to a CSV file
// CSVHelper::write('beatles.csv.php',['c'=>['firstname'=>'George','lastname'=>'Harrison']],true); // append a record to a CSV file
// CSVHelper::write('beatles.csv.php',['d'=>['firstname'=>'George','lastname'=>'Harrison'],'e'=>['firstname'=>'Ringo','lastname'=>'Starr']],true); // append a recordset to a CSV file

// READ
echo '<pre>';print_r(CSVHelper::read('beatles.csv.php')); // read a recordset from a CSV file
//echo '<pre>';print_r(CSVHelper::read('beatles.csv.php',2,3)); // read one record from a CSV file
//echo '<pre>';print_r(CSVHelper::read('beatles.csv.php',1,5)); // read the first 3 records from a CSV file
//echo '<pre>';print_r(CSVHelper::read('beatles.csv.php',1,1,';',true)); // read a recordset from a CSV file using hasColumns

// MODIFY
///CSVHelper::modify('beatles.csv.php',0,['firstname'=>'John','lastname'=>'Lennon','birthdate'=>'1940-10-09']); // modify the first record in a CSV file
///CSVHelper::modify('beatles.csv.php',0,['firstname'=>'John','lastname'=>'Lennon','birthdate'=>'1940-10-09']); // modify the first record in a CSV file
///CSVHelper::modify('beatles.csv.php',0,['lastname'=>'Lennonx','birthdate'=>'1940-10-09','test'=>false],false,';',true); // modify the first record in a CSV file

// DELETE
///CSVHelper::delete('beatles.csv.php'); // delete a CSV file
///CSVHelper::delete('beatles.csv.php',4,true); // delete the first record from a CSV file
///CSVHelper::delete('beatles.csv.php',[0,1]); // delete the first and the second records from a CSV file

// FIND
//echo '<pre>';print_r(CSVHelper::find('beatles.csv.php','John'));//find all records that exactly match one field
//echo '<pre>';print_r(CSVHelper::find('beatles.csv.php','John',1));//find the first record that exactly matches one field
//echo '<pre>';print_r(CSVHelper::find('beatles.csv.php',[1=>'John'])); //find all the records where the second column exactly matches a value
//echo '<pre>';print_r(CSVHelper::find('beatles.csv.php',[1=>'John'],1)); //find the first record where the second column exactly matches a value
//echo '<pre>';print_r(CSVHelper::find('beatles.csv.php','John',null,false));//find all records that contains one field
//echo '<pre>';print_r(CSVHelper::find('beatles.csv.php','John',1,false));//find the first record that contains one field
//echo '<pre>';print_r(CSVHelper::find('beatles.csv.php',[1=>'John'],null,false)); //find all the records where the second column contains a value
//echo '<pre>';print_r(CSVHelper::find('beatles.csv.php',[1=>'John'],1,false)); //find the first record where the second column contains a value
//echo '<pre>';print_r(CSVHelper::find('beatles.csv.php',['email'=>'ncaporusso@gmail.com'],1,false,';',true)); //find the first record where the second column contains a value
