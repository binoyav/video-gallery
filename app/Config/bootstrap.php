<?php
/**
 * This file is loaded automatically by the app/webroot/index.php file after core.php
 *
 * This file should load/create any application wide configuration settings, such as 
 * Caching, Logging, loading additional configuration files.
 *
 * You should also use this file to include any files that provide global functions/constants
 * that your application uses.
 *
 * PHP 5
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright 2005-2011, Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright 2005-2011, Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       app.Config
 * @since         CakePHP(tm) v 0.10.8.2117
 * @license       MIT License (http://www.opensource.org/licenses/mit-license.php)
 */

// Setup a 'default' cache configuration for use in the application.
Cache::config('default', array('engine' => 'File'));

/**
 * The settings below can be used to set additional paths to models, views and controllers.
 *
 * App::build(array(
 *     'Plugin' => array('/full/path/to/plugins/', '/next/full/path/to/plugins/'),
 *     'Model' =>  array('/full/path/to/models/', '/next/full/path/to/models/'),
 *     'View' => array('/full/path/to/views/', '/next/full/path/to/views/'),
 *     'Controller' => array('/full/path/to/controllers/', '/next/full/path/to/controllers/'),
 *     'Model/Datasource' => array('/full/path/to/datasources/', '/next/full/path/to/datasources/'),
 *     'Model/Behavior' => array('/full/path/to/behaviors/', '/next/full/path/to/behaviors/'),
 *     'Controller/Component' => array('/full/path/to/components/', '/next/full/path/to/components/'),
 *     'View/Helper' => array('/full/path/to/helpers/', '/next/full/path/to/helpers/'),
 *     'Vendor' => array('/full/path/to/vendors/', '/next/full/path/to/vendors/'),
 *     'Console/Command' => array('/full/path/to/shells/', '/next/full/path/to/shells/'),
 *     'locales' => array('/full/path/to/locale/', '/next/full/path/to/locale/')
 * ));
 *
 */

/**
 * Custom Inflector rules, can be set to correctly pluralize or singularize table, model, controller names or whatever other
 * string is passed to the inflection functions
 *
 * Inflector::rules('singular', array('rules' => array(), 'irregular' => array(), 'uninflected' => array()));
 * Inflector::rules('plural', array('rules' => array(), 'irregular' => array(), 'uninflected' => array()));
 *
 */

/**
 * Plugins need to be loaded manually, you can either load them one by one or all of them in a single call
 * Uncomment one of the lines below, as you need. make sure you read the documentation on CakePlugin to use more
 * advanced ways of loading plugins
 *
 * CakePlugin::loadAll(); // Loads all plugins at once
 * CakePlugin::load('DebugKit'); //Loads a single plugin named DebugKit
 *
 */
 CakePlugin::loadAll(array(
 									 	'Admin' => array(
 																'routes' => true
 															), 
 										'AclExtras',
 										'Acl'
 									)
 								);
 define('DEFAULT_PAGE_LIMIT', 5);
 define('HTTP_ROOT', 'http://' . $_SERVER['HTTP_HOST'] . '/video-gallery/');
 
 
 /* -------------------------------------------------------------------
  * The settings below have to be loaded to make the acl plugin work.
 * -------------------------------------------------------------------
 *
 * See how to include these settings in the README file
 */
 
 /*
  * The model name used for the user role (typically 'Role' or 'Group')
 */
 Configure :: write('acl.aro.role.model', 'Group');
 
 /*
  * The primary key of the role model
 *
 * (can be left empty if your primary key's name follows CakePHP conventions)('id')
 */
 Configure :: write('acl.aro.role.primary_key', '');
 
 /*
  * The foreign key's name for the roles
 *
 * (can be left empty if your foreign key's name follows CakePHP conventions)(e.g. 'role_id')
 */
 Configure :: write('acl.aro.role.foreign_key', '');
 
 /*
  * The model name used for the user (typically 'User')
 */
 Configure :: write('acl.aro.user.model', 'User');
 
 /*
  * The primary key of the user model
 *
 * (can be left empty if your primary key's name follows CakePHP conventions)('id')
 */
 Configure :: write('acl.aro.user.primary_key', '');
 
 /*
  * The name of the database field that can be used to display the role name
 */
 Configure :: write('acl.aro.role.display_field', 'name');
 
 /*
  * You can add here role id(s) that are always allowed to access the ACL plugin (by bypassing the ACL check)
 * (This may prevent a user from being rejected from the ACL plugin after a ACL permission update)
 */
 Configure :: write('acl.role.access_plugin_role_ids', array(1));
 
 /*
  * You can add here users id(s) that are always allowed to access the ACL plugin (by bypassing the ACL check)
 * (This may prevent a user from being rejected from the ACL plugin after a ACL permission update)
 */
 Configure :: write('acl.role.access_plugin_user_ids', array(1));
 
 /*
  * The users table field used as username in the views
 * It may be a table field or a SQL expression such as "CONCAT(User.lastname, ' ', User.firstname)" for MySQL or "User.lastname||' '||User.firstname" for PostgreSQL
 */
 Configure :: write('acl.user.display_name', "User.name");
 
 /*
  * Indicates whether the presence of the Acl behavior in the user and role models must be verified when the ACL plugin is accessed
 */
 Configure :: write('acl.check_act_as_requester', true);
 
 /*
  * Add the ACL plugin 'locale' folder to your application locales' folders
 */
 App :: build(array('locales' => App :: pluginPath('Acl') . DS . 'locale'));
 
 /*
  * Indicates whether the roles permissions page must load through Ajax
 */
 Configure :: write('acl.gui.roles_permissions.ajax', true);
 
 /*
  * Indicates whether the users permissions page must load through Ajax
 */
 Configure :: write('acl.gui.users_permissions.ajax', true);
 
 include 'settings.php';