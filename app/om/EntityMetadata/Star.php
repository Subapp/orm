<?php

return array (
  'entityClass' => 'IdPorn\\Dbl\\Star',
  'entityRepositoryClass' => 'IdPorn\\Dbl\\StarRepository',
  'tableName' => 'stars',
  'identifier' => 'id',
  'rawSQLNames' => 
  array (
    'id' => 'stars.id',
    'name' => 'stars.name',
    'created_at' => 'stars.created_at',
  ),
  'names' => 
  array (
    'id' => 'id',
    'name' => 'name',
    'created_at' => 'created_at',
  ),
  'relations' => 
  array (
  ),
  'enumerations' => 
  array (
  ),
  'default' => 
  array (
  ),
  'nullables' => 
  array (
  ),
  'unsigned' => 
  array (
    'id' => 'id',
  ),
  'primary' => 
  array (
    'id' => 'id',
  ),
  'instances' => 
  array (
    'id' => 
    Subapp\Orm\Schema\Field::__set_state(array(
       'column' => 'id',
       'name' => 'id',
       'type' => 
      Subapp\Orm\Schema\Types\IntegerType::__set_state(array(
         'length' => 11,
         'precision' => 0,
         'extra' => NULL,
      )),
       'default' => NULL,
       'unsigned' => true,
       'nullable' => false,
       'autoIncrement' => true,
       'primaryKey' => true,
       'identity' => false,
    )),
    'name' => 
    Subapp\Orm\Schema\Field::__set_state(array(
       'column' => 'name',
       'name' => 'name',
       'type' => 
      Subapp\Orm\Schema\Types\StringType::__set_state(array(
         'length' => 64,
         'precision' => 0,
         'extra' => NULL,
      )),
       'default' => NULL,
       'unsigned' => false,
       'nullable' => false,
       'autoIncrement' => false,
       'primaryKey' => false,
       'identity' => false,
    )),
    'created_at' => 
    Subapp\Orm\Schema\Field::__set_state(array(
       'column' => 'created_at',
       'name' => 'created_at',
       'type' => 
      Subapp\Orm\Schema\Types\DatetimeType::__set_state(array(
         'length' => 0,
         'precision' => 0,
         'extra' => NULL,
      )),
       'default' => NULL,
       'unsigned' => false,
       'nullable' => false,
       'autoIncrement' => false,
       'primaryKey' => false,
       'identity' => false,
    )),
  ),
);