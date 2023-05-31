<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');
/*
  | -------------------------------------------------------------------
  | DATABASE CONNECTIVITY SETTINGS
  | -------------------------------------------------------------------
  | This file will contain the settings needed to access your database.
  |
  | For complete instructions please consult the 'Database Connection'
  | page of the User Guide.
  |
  | -------------------------------------------------------------------
  | EXPLANATION OF VARIABLES
  | -------------------------------------------------------------------
  |
  | ['hostname'] The hostname of your database server.
  | ['username'] The username used to connect to the database
  | ['password'] The password used to connect to the database
  | ['database'] The name of the database you want to connect to
  | ['dbdriver'] The database type. ie: mysql.  Currently supported:
  mysql, mysqli, postgre, odbc, mssql, sqlite, oci8
  | ['dbprefix'] You can add an optional prefix, which will be added
  |        to the table name when using the  Active Record class
  | ['pconnect'] TRUE/FALSE - Whether to use a persistent connection
  | ['db_debug'] TRUE/FALSE - Whether database errors should be displayed.
  | ['cache_on'] TRUE/FALSE - Enables/disables query caching
  | ['cachedir'] The path to the fserver2er where cache files should be stored
  | ['char_set'] The character set used in communicating with the database
  | ['dbcollat'] The character collation used in communicating with the database
  | ['swap_pre'] A default table prefix that should be swapped with the dbprefix
  | ['autoinit'] Whether or not to automatically initialize the database.
  | ['stricton'] TRUE/FALSE - forces 'Strict Mode' connections
  |             - good for ensuring strict SQL while developing
  |
  | The $active_group variable lets you choose which connection group to
  | make active.  By default there is only one group (the 'default' group).
  |
  | The $active_record variables lets you determine whether or not to load
  | the active record class
 */

$active_group = 'default';
$active_record = TRUE;

//$db['default']['hostname'] = '202.91.14.3';
//$db['default']['username'] = 'earsipmanado';
//$db['default']['password'] = '34rs1pm4n4d0';
//$db['default']['hostname'] = '10.0.0.1';
//$db['default']['hostname'] = '192.168.10.41';
// konfigurasi db asli
// DESKTOP-FJQOGPK\SQLEXPRESS local sql
$db['default']['hostname'] = '192.168.2.50';
$db['default']['username'] = 'admin';
$db['default']['password'] = '123';
$db['default']['database'] = 'DB_RSMM';
// $db['default']['hostname'] = '192.168.2.50';
// $db['default']['username'] = 'admin';
// $db['default']['password'] = '123';
// $db['default']['database'] = 'DB_RSMM';

$db['default']['dbdriver'] = 'sqlsrv';
$db['default']['dbprefix'] = '';
$db['default']['pconnect'] = FALSE;
$db['default']['db_debug'] = TRUE;
$db['default']['cache_on'] = FALSE;
$db['default']['cachedir'] = '';
$db['default']['char_set'] = 'utf8';
$db['default']['dbcollat'] = 'utf8_general_ci';
$db['default']['swap_pre'] = '';
$db['default']['autoinit'] = TRUE;
$db['default']['stricton'] = FALSE;

$db['hospital']['hostname'] = '192.168.2.50';
$db['hospital']['username'] = 'admin';
$db['hospital']['password'] = '123';
$db['hospital']['database'] = 'PKU';
// $db['default']['hostname'] = '192.168.2.50';
// $db['default']['username'] = 'admin';
// $db['default']['password'] = '123';
// $db['default']['database'] = 'PKU';

$db['hospital']['dbdriver'] = 'sqlsrv';
$db['hospital']['dbprefix'] = '';
$db['hospital']['pconnect'] = FALSE;
$db['hospital']['db_debug'] = TRUE;
$db['hospital']['cache_on'] = FALSE;
$db['hospital']['cachedir'] = '';
$db['hospital']['char_set'] = 'utf8';
$db['hospital']['dbcollat'] = 'utf8_general_ci';
$db['hospital']['swap_pre'] = '';
$db['hospital']['autoinit'] = TRUE;
$db['hospital']['stricton'] = FALSE;
/* End of file database.php */
/* Location: ./application/config/database.php */
