<?php
/**
 * Javascript & PHP includes.
 *
 * @package   atica
 * @copyright 2012 Luis-Ramon Lopez Lopez
 * @license   http://www.fsf.org/licensing/licenses/agpl-3.0.html GNU Affero GPL 3
 */

// Include the main Propel script
require_once __ROOT__ . '/server/vendor/runtime/lib/Propel.php';
require_once __ROOT__ . '/server/config.inc.php';

// Initialize Propel with the runtime configuration
Propel::init(__ROOT__ . "/server/build/conf/atica-conf.php");

// Add the generated 'classes' directory to the include path
set_include_path(__ROOT__ . "/server/build/classes" . PATH_SEPARATOR . get_include_path());


?>
