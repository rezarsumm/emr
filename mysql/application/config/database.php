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
  |	['hostname'] The hostname of your database server.
  |	['username'] The username used to connect to the database
  |	['password'] The password used to connect to the database
  |	['database'] The name of the database you want to connect to
  |	['dbdriver'] The database type. ie: mysql.  Currently supported:
  mysql, mysqli, postgre, odbc, mssql, sqlite, oci8
  |	['dbprefix'] You can add an optional prefix, which will be added
  |				 to the table name when using the  Active Record class
  |	['pconnect'] TRUE/FALSE - Whether to use a persistent connection
  |	['db_debug'] TRUE/FALSE - Whether database errors should be displayed.
  |	['cache_on'] TRUE/FALSE - Enables/disables query caching
  |	['cachedir'] The path to the fserver2er where cache files should be stored
  |	['char_set'] The character set used in communicating with the database
  |	['dbcollat'] The character collation used in communicating with the database
  |	['swap_pre'] A default table prefix that should be swapped with the dbprefix
  |	['autoinit'] Whether or not to automatically initialize the database.
  |	['stricton'] TRUE/FALSE - forces 'Strict Mode' connections
  |							- good for ensuring strict SQL while developing
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
$db['default']['hostname'] = 'localhost';
$db['default']['username'] = 'root';
$db['default']['password'] = '';
$db['default']['database'] = 'emr_pku';
$db['default']['dbdriver'] = 'mysqli';
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

$db['emr']['hostname'] = 'localhost';
$db['emr']['username'] = 'root';
$db['emr']['password'] = '';
$db['emr']['database'] = 'emr_pku';
$db['emr']['dbdriver'] = 'mysqli';
$db['emr']['dbprefix'] = '';
$db['emr']['pconnect'] = FALSE;
$db['emr']['db_debug'] = TRUE;
$db['emr']['cache_on'] = FALSE;
$db['emr']['cachedir'] = '';
$db['emr']['char_set'] = 'utf8';
$db['emr']['dbcollat'] = 'utf8_general_ci';
$db['emr']['swap_pre'] = '';
$db['emr']['autoinit'] = TRUE;
$db['emr']['stricton'] = FALSE;

/*$db['sismadak']['hostname'] = '192.168.20.8';
$db['sismadak']['username'] = 'root';
$db['sismadak']['password'] = '123';
$db['sismadak']['database'] = 'sirsak_db';
$db['sismadak']['dbdriver'] = 'mysql';
$db['sismadak']['dbprefix'] = '';
$db['sismadak']['pconnect'] = FALSE;
$db['sismadak']['db_debug'] = TRUE;
$db['sismadak']['cache_on'] = FALSE;
$db['sismadak']['cachedir'] = '';
$db['sismadak']['char_set'] = 'utf8';
$db['sismadak']['dbcollat'] = 'utf8_general_ci';
$db['sismadak']['swap_pre'] = '';
$db['sismadak']['autoinit'] = TRUE;
$db['sismadak']['stricton'] = FALSE;*/
/* End of file database.php */
/* Location: ./application/config/database.php */
