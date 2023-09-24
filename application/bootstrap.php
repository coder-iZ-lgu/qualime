f<?php defined('SYSPATH') or die('No direct script access.');

// -- Environment setup --------------------------------------------------------

// Load the core Kohana class
require SYSPATH.'classes/Kohana/Core'.EXT;

if (is_file(APPPATH.'classes/Kohana'.EXT))
{
	// Application extends the core
	require APPPATH.'classes/Kohana'.EXT;
}
else
{
	// Load empty core extension
	require SYSPATH.'classes/Kohana'.EXT;
}

/**
 * Set the default time zone.
 *
 * @link http://kohanaframework.org/guide/using.configuration
 * @link http://www.php.net/manual/timezones
 */
date_default_timezone_set('America/Chicago');

/**
 * Set the default locale.
 *
 * @link http://kohanaframework.org/guide/using.configuration
 * @link http://www.php.net/manual/function.setlocale
 */
setlocale(LC_ALL, 'en_US.utf-8');

/**
 * Enable the Kohana auto-loader.
 *
 * @link http://kohanaframework.org/guide/using.autoloading
 * @link http://www.php.net/manual/function.spl-autoload-register
 */
spl_autoload_register(array('Kohana', 'auto_load'));

/**
 * Optionally, you can enable a compatibility auto-loader for use with
 * older modules that have not been updated for PSR-0.
 *
 * It is recommended to not enable this unless absolutely necessary.
 */
//spl_autoload_register(array('Kohana', 'auto_load_lowercase'));

/**
 * Enable the Kohana auto-loader for unserialization.
 *
 * @link http://www.php.net/manual/function.spl-autoload-call
 * @link http://www.php.net/manual/var.configuration#unserialize-callback-func
 */
ini_set('unserialize_callback_func', 'spl_autoload_call');

// -- Configuration and initialization -----------------------------------------

/**
 * Set the default language
 */
//I18n::lang('en-us');
I18n::lang('ru-ru');

/**
 * Set Kohana::$environment if a 'KOHANA_ENV' environment variable has been supplied.
 *
 * Note: If you supply an invalid environment name, a PHP warning will be thrown
 * saying "Couldn't find constant Kohana::<INVALID_ENV_NAME>"
 */
if (isset($_SERVER['KOHANA_ENV']))
{
    Kohana::$environment = Kohana::PRODUCTION;
    Kohana::$environment = constant('Kohana::'.strtoupper($_SERVER['KOHANA_ENV']));
}

/**
 * Initialize Kohana, setting the default options.
 *
 * The following options are available:
 *
 * - string   base_url    path, and optionally domain, of your application   NULL
 * - string   index_file  name of your index file, usually "index.php"       index.php
 * - string   charset     internal character set used for input and output   utf-8
 * - string   cache_dir   set the internal cache directory                   APPPATH/cache
 * - integer  cache_life  lifetime, in seconds, of items cached              60
 * - boolean  errors      enable or disable error handling                   TRUE
 * - boolean  profile     enable or disable internal profiling               TRUE
 * - boolean  caching     enable or disable internal caching                 FALSE
 * - boolean  expose      set the X-Powered-By header                        FALSE
 */
Kohana::init(array(
	'base_url'   => '/',
    'index_file' => FALSE,
    'errors' => TRUE
));

/**
 * Attach the file write to logging. Multiple writers are supported.
 */
Kohana::$log->attach(new Log_File(APPPATH.'logs'));

/**
 * Attach a file reader to config. Multiple readers are supported.
 */
Kohana::$config->attach(new Config_File);

Cookie::$salt = '987765860298123';
/**
 * Enable modules. Modules are referenced by a relative or absolute path.
 */

Kohana::modules(array(
	 'auth'       => MODPATH.'auth',       // Basic authentication
	 'cache'      => MODPATH.'cache',      // Caching with multiple backends
	// 'codebench'  => MODPATH.'codebench',  // Benchmarking tool
	 'database'   => MODPATH.'database',   // Database access
	// 'image'      => MODPATH.'image',      // Image manipulation
	// 'minion'     => MODPATH.'minion',     // CLI Tasks
	 'orm'        => MODPATH.'orm',        // Object Relationship Mapping
	// 'unittest'   => MODPATH.'unittest',   // Unit testing
	 'userguide'  => MODPATH.'userguide',  // User guide and API documentation
	'kohana-3.3-mysqli' => MODPATH.'kohana-3.3-mysqli',
        'captcha'  => MODPATH.'captcha', //Captcha
	));

/**
 * Set the routes. Each route must have a minimum of a name, a URI and a set of
 * defaults for the URI.
 */
/*
if ( ! Route::cache())
         {
             Route::set('admin', 'admin(/<controller>(/<action>(/<id>)))')
                 ->defaults(array(
                     'directory'  => 'admin',
                     'controller' => 'main',
                     'action'     => 'index',
                 ));
             Route::cache(TRUE);
         }


Route::set('comments', 'comments/<id>', array('id' => '.+'))
    ->defaults(array(
        'controller' => 'comments',
        'action'     => 'index',
    ));
 * */
 
/*
Route::set('member', 'login')
    ->defaults(array(
        'controller' => 'member',
        'action' => 'login'
    ));

*/
/*
Route::set('admin-tests', 'admin')
    ->defaults(array(
        'controller' => 'admin_main',
        'action' => 'index'
    ));

Route::set('tests', '<tests>/<testname>-<id>', array('testname' => '.+'), array('id' => '[0-9]+'))
    ->defaults(array(
        'controller' => 'tests',
        'action' => 'test'
    ));

Route::set('member', '<action>', array('action' => 'register|login|logout'))
    ->defaults(array(
        'controller' => 'member',
    ));
*/
/*
Route::set('member', '<member>(/<id>)', array('action' => 'register|logout'))
    ->defaults(array(
        'controller' => 'member',
    ));
*/
/*
Route::set('articles', '<articles>/<id>-<artname>', array('id' => '[0-9]+'), array('artname' => '.+'))
    ->defaults(array(
        'controller' => 'articles',
        'action'     => 'article',
    ));
*/


Route::set('auth', '<action>', array('action' => 'login|logout|register'))
	->defaults(array(
                'directory'  => 'index',
		'controller' => 'auth',
	));

/*
Route::set('tests', '<audience>/<action>', array('action' => 'tests', 'audience' => 'university|school|'))
    ->defaults(array(
        'directory' => 'index',
        'controller' => 'tests',
    ));
*/

Route::set('tests', '<action>(/<audience>)', array('action' => 'tests', 'audience' => 'university|school|iq'))
    ->defaults(array(
        'directory' => 'index',
        'controller' => 'tests',
    ));

Route::set('test', '<action>/<audience>/<id>', array('action' => 'test', 'audience' => 'university|school|iq'))
    ->defaults(array(
        'directory' => 'index',
        'controller' => 'tests',
    ));

Route::set('ajax', 'ajax(/<action>(/<id>(/<param1>)))')
    ->defaults(array(
        'controller' => 'ajax',
    ));


Route::set('static', '<action>', array('action' => 'about|help'))
    ->defaults(array(
        'directory' => 'index',
        'controller' => 'static',
    ));

Route::set('admin_tests', 'admin/<action>(/<audience>)', array('action' => 'tests', 'audience' => 'university|school|iq'))
	->defaults(array(
            'directory'  => 'admin',
            'controller' => 'tests',
	    'action' => 'tests'
	));

Route::set('admin_sections', 'admin/<controller>(/<audience>(/<action>))', array('audience' => 'university|school|iq'))
	->defaults(array(
            'directory'  => 'admin',
            'controller' => 'sections'
	));


Route::set('admin', 'admin(/<controller>(/<action>(/<id>)))')
	->defaults(array(
            'directory'  => 'admin',
        'controller' => 'main',
            'action'     => 'index',
	));


Route::set('personal', 'personal(/<action>(/<id>))')
    ->defaults(array(
        'directory' => 'index',
        'controller' => 'personal',
    ));

/*
Route::set('admin_test', 'admin/<action>/<audience>/<id>', array('action' => 'test', 'audience' => 'university|school'))
    ->defaults(array(
        'directory' => 'index',
        'controller' => 'tests',
    ));*/
/*
Route::set('user', 'user(/<controller>(/<action>(/<id>)))')
	->defaults(array(
            'directory'  => 'user',
            'controller' => 'main',
            'action'     => 'index',
	));
*/
Route::set('widgets', 'widgets(/<controller>(/<param>))', array('param' => '.+'))
	->defaults(array(
            'action'     => 'index',
            'directory' => 'widgets',
	));

Route::set('error', 'error/<action>(/<message>)', array('action' => '[0-9]++', 'message' => '.+'))
    ->defaults(array(
      'controller'  => 'error'
    ));

Route::set('default', '(<controller>(/<action>(/<id>)))')
	->defaults(array(
                'directory'  => 'index',
		'controller' => 'main',
		'action'     => 'index',
	));
