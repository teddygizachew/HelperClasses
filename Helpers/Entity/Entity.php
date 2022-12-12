<?php
require_once('../CSV/CSVHelper.php');


class Entity
{
  static function createEntity($filename, $entityName, $entityValue)
  {
    $entity = [[$entityName, $entityValue]];
    CSVHelper::write($filename, $entity);
  }

  static function readEntity($filename)
  {
    $entities = CSVHelper::read($filename);
    return $entities;
  }

  static function updateEntity($filename, $entityName, $entityValue, $entityID)
  {
    $entity = [[$entityName, $entityValue]];
    CSVHelper::modify($filename, $entityID - 1, $entity);
  }

  static function deleteEntity($filename, $index)
  {
    CSVHelper::delete($filename, $index - 1);
  }

  static function displayEntities($entites_array)
  {
    if (count($entites_array) == 0) {
      echo 'Note item to Display. Go add an item and come back :)';
    }
    $i = 0;
    while ($i < count($entites_array)) {
      $line = $entites_array[$i];
      echo '<h5>' . $i + 1 . ': ' . $line[0] . ', ' . $line[1] . '</h5>';
      echo '<br/>';
      $i += 1;
    }
  }
}
