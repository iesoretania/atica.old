<?php
/**
 * ATICA server app. API Gateway.
 *
 * @package   atica
 * @copyright 2012 Luis-Ramon Lopez Lopez
 * @license   http://www.fsf.org/licensing/licenses/agpl-3.0.html GNU Affero GPL 3
 */
define('__ROOT__', dirname(dirname(__FILE__)));

require_once __ROOT__.'/server/restler/restler.php';

require_once 'v1.php';
require_once 'sessionauth.php';
set_include_path(get_include_path() . PATH_SEPARATOR .__ROOT__.'/server/restler/');
spl_autoload_register('spl_autoload');

$r = new Restler();
$r->addAPIClass('v1');
$r->addAuthenticationClass('SessionAuth');
$r->handle();
?>
