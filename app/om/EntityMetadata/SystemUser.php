<?php

return array (
  'entityClass' => 'CvLand\\PhpDatabaseLayer\\SystemUser',
  'entityRepositoryClass' => 'CvLand\\PhpDatabaseLayer\\SystemUserRepository',
  'tableName' => 'systemUser',
  'identifier' => 'id',
  'rawSQLNames' => 
  array (
    'id' => 'systemUser.id',
    'name' => 'systemUser.name',
    'password' => 'systemUser.password',
    'access' => 'systemUser.accessBitMask',
    'created' => 'systemUser.created',
  ),
  'names' => 
  array (
    'id' => 'id',
    'name' => 'name',
    'password' => 'password',
    'access' => 'accessBitMask',
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
    'accessBitMask' => 'access',
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
    'password' => 
    Subapp\Orm\Schema\Field::__set_state(array(
       'column' => 'password',
       'name' => 'password',
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
    'access' => 
    Subapp\Orm\Schema\Field::__set_state(array(
       'column' => 'accessBitMask',
       'name' => 'access',
       'type' => 
      Subapp\Orm\Schema\Types\IntegerType::__set_state(array(
         'length' => 0,
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