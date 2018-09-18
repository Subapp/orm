<?php

return array (
  'entityClass' => 'CvLand\\PhpDatabaseLayer\\SystemUserToken',
  'entityRepositoryClass' => 'CvLand\\PhpDatabaseLayer\\SystemUserTokenRepository',
  'tableName' => 'systemUserToken',
  'identifier' => 'id',
  'rawSQLNames' => 
  array (
    'id' => 'systemUserToken.id',
    'userId' => 'systemUserToken.userId',
    'token' => 'systemUserToken.token',
    'created' => 'systemUserToken.created',
  ),
  'names' => 
  array (
    'id' => 'id',
    'userId' => 'userId',
    'token' => 'token',
    'created' => 'created',
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
    'userId' => 'userId',
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
    'userId' => 
    Subapp\Orm\Schema\Field::__set_state(array(
       'column' => 'userId',
       'name' => 'userId',
       'type' => 
      Subapp\Orm\Schema\Types\IntegerType::__set_state(array(
         'length' => 11,
         'precision' => 0,
         'extra' => NULL,
      )),
       'default' => NULL,
       'unsigned' => true,
       'nullable' => false,
       'autoIncrement' => false,
       'primaryKey' => false,
       'identity' => false,
    )),
    'token' => 
    Subapp\Orm\Schema\Field::__set_state(array(
       'column' => 'token',
       'name' => 'token',
       'type' => 
      Subapp\Orm\Schema\Types\StringType::__set_state(array(
         'length' => 128,
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
    'created' => 
    Subapp\Orm\Schema\Field::__set_state(array(
       'column' => 'created',
       'name' => 'created',
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