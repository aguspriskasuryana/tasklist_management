<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
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
|	['cachedir'] The path to the folder where cache files should be stored
|	['char_set'] The character set used in communicating with the database
|	['dbcollat'] The character collation used in communicating with the database
|				 NOTE: For MySQL and MySQLi databases, this setting is only used
| 				 as a backup if your server is running PHP < 5.2.3 or MySQL < 5.0.7
|				 (and in table creation queries made with DB Forge).
| 				 There is an incompatibility in PHP with mysql_real_escape_string() which
| 				 can make your site vulnerable to SQL injection if you are using a
| 				 multi-byte character set and are running versions lower than these.
| 				 Sites using Latin-1 or UTF-8 database character set and collation are unaffected.
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

$db['default']['hostname'] = '126.2.0.142';
$db['default']['username'] = 'app';
$db['default']['password'] = '12345678';
$db['default']['database'] = 'db_dashtik';
$db['default']['dbdriver'] = 'mysql';
$db['default']['dbprefix'] = '';
$db['default']['pconnect'] = TRUE;
$db['default']['db_debug'] = TRUE;
$db['default']['cache_on'] = FALSE;
$db['default']['cachedir'] = '';
$db['default']['char_set'] = 'utf8';
$db['default']['dbcollat'] = 'utf8_general_ci';
$db['default']['swap_pre'] = '';
$db['default']['autoinit'] = TRUE;
$db['default']['stricton'] = FALSE;
/*
$db['default']['hostname'] = '126.2.0.142';
$db['default']['username'] = 'app';
$db['default']['password'] = '12345678';
$db['default']['database'] = 'db_dashtik';
$db['default']['dbdriver'] = 'mysql';
$db['default']['dbprefix'] = '';
$db['default']['pconnect'] = TRUE;
$db['default']['db_debug'] = TRUE;
$db['default']['cache_on'] = FALSE;
$db['default']['cachedir'] = '';
$db['default']['char_set'] = 'utf8';
$db['default']['dbcollat'] = 'utf8_general_ci';
$db['default']['swap_pre'] = '';
$db['default']['autoinit'] = TRUE;
$db['default']['stricton'] = FALSE;
*/
$db['database2']['hostname'] = '126.2.0.252';
$db['database2']['username'] = 'app';
$db['database2']['password'] = '12345678';
$db['database2']['database'] = 'db_walldisplay';
$db['database2']['dbdriver'] = 'mysql';
$db['database2']['dbprefix'] = '';
$db['database2']['pconnect'] = TRUE;
$db['database2']['db_debug'] = TRUE;
$db['database2']['cache_on'] = FALSE;
$db['database2']['cachedir'] = '';
$db['database2']['char_set'] = 'utf8';
$db['database2']['dbcollat'] = 'utf8_general_ci';
$db['database2']['swap_pre'] = '';
$db['database2']['autoinit'] = TRUE;
$db['database2']['stricton'] = FALSE;


$db['database3']['hostname'] = '126.2.0.252';
$db['database3']['username'] = 'app';
$db['database3']['password'] = '12345678';
$db['database3']['database'] = 'eatl';
$db['database3']['dbdriver'] = 'mysql';
$db['database3']['dbprefix'] = '';
$db['database3']['pconnect'] = TRUE;
$db['database3']['db_debug'] = TRUE;
$db['database3']['cache_on'] = FALSE;
$db['database3']['cachedir'] = '';
$db['database3']['char_set'] = 'utf8';
$db['database3']['dbcollat'] = 'utf8_general_ci';
$db['database3']['swap_pre'] = '';
$db['database3']['autoinit'] = TRUE;
$db['database3']['stricton'] = FALSE;


$db['database4']['hostname'] = '126.2.0.252';
$db['database4']['username'] = 'app';
$db['database4']['password'] = '12345678';
$db['database4']['database'] = 'db_fingerprint';
$db['database4']['dbdriver'] = 'mysql';
$db['database4']['dbprefix'] = '';
$db['database4']['pconnect'] = TRUE;
$db['database4']['db_debug'] = TRUE;
$db['database4']['cache_on'] = FALSE;
$db['database4']['cachedir'] = '';
$db['database4']['char_set'] = 'utf8';
$db['database4']['dbcollat'] = 'utf8_general_ci';
$db['database4']['swap_pre'] = '';
$db['database4']['autoinit'] = TRUE;
$db['database4']['stricton'] = FALSE;


/*$db['default']['hostname'] = 'localhost';
$db['default']['username'] = 'root';
$db['default']['password'] = '';
$db['default']['database'] = 'dash_tik';
$db['default']['dbdriver'] = 'mysql';
$db['default']['dbprefix'] = '';
$db['default']['pconnect'] = TRUE;
$db['default']['db_debug'] = TRUE;
$db['default']['cache_on'] = FALSE;
$db['default']['cachedir'] = '';
$db['default']['char_set'] = 'utf8';
$db['default']['dbcollat'] = 'utf8_general_ci';
$db['default']['swap_pre'] = '';
$db['default']['autoinit'] = TRUE;
$db['default']['stricton'] = FALSE;


$db['default']['hostname'] = 'localhost';
$db['default']['username'] = 'root';
$db['default']['password'] = '';
$db['default']['database'] = 'db_dashtik';
$db['default']['dbdriver'] = 'mysql';
$db['default']['dbprefix'] = '';
$db['default']['pconnect'] = TRUE;
$db['default']['db_debug'] = TRUE;
$db['default']['cache_on'] = FALSE;
$db['default']['cachedir'] = '';
$db['default']['char_set'] = 'utf8';
$db['default']['dbcollat'] = 'utf8_general_ci';
$db['default']['swap_pre'] = '';
$db['default']['autoinit'] = TRUE;
$db['default']['stricton'] = FALSE;

$db['database2']['hostname'] = 'localhost';
$db['database2']['username'] = 'root';
$db['database2']['password'] = '';
$db['database2']['database'] = 'db_walldisplay';
$db['database2']['dbdriver'] = 'mysql';
$db['database2']['dbprefix'] = '';
$db['database2']['pconnect'] = TRUE;
$db['database2']['db_debug'] = TRUE;
$db['database2']['cache_on'] = FALSE;
$db['database2']['cachedir'] = '';
$db['database2']['char_set'] = 'utf8';
$db['database2']['dbcollat'] = 'utf8_general_ci';
$db['database2']['swap_pre'] = '';
$db['database2']['autoinit'] = TRUE;
$db['database2']['stricton'] = FALSE;


$db['database3']['hostname'] = 'localhost';
$db['database3']['username'] = 'root';
$db['database3']['password'] = '';
$db['database3']['database'] = 'eatl';
$db['database3']['dbdriver'] = 'mysql';
$db['database3']['dbprefix'] = '';
$db['database3']['pconnect'] = TRUE;
$db['database3']['db_debug'] = TRUE;
$db['database3']['cache_on'] = FALSE;
$db['database3']['cachedir'] = '';
$db['database3']['char_set'] = 'utf8';
$db['database3']['dbcollat'] = 'utf8_general_ci';
$db['database3']['swap_pre'] = '';
$db['database3']['autoinit'] = TRUE;
$db['database3']['stricton'] = FALSE;


$db['database4']['hostname'] = 'localhost';
$db['database4']['username'] = 'root';
$db['database4']['password'] = '';
$db['database4']['database'] = 'db_fingerprint';
$db['database4']['dbdriver'] = 'mysql';
$db['database4']['dbprefix'] = '';
$db['database4']['pconnect'] = TRUE;
$db['database4']['db_debug'] = TRUE;
$db['database4']['cache_on'] = FALSE;
$db['database4']['cachedir'] = '';
$db['database4']['char_set'] = 'utf8';
$db['database4']['dbcollat'] = 'utf8_general_ci';
$db['database4']['swap_pre'] = '';
$db['database4']['autoinit'] = TRUE;
$db['database4']['stricton'] = FALSE;

priska suryana*/
/* End of file database.php */
/* Location: ./application/config/database.php */