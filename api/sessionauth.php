<?php

/**
 * ATICA server app. Auth API.
 *
 * @package   atica
 * @copyright 2012 Luis-Ramon Lopez Lopez
 * @license   http://www.fsf.org/licensing/licenses/agpl-3.0.html GNU Affero GPL 3
 */
class SessionAuth implements iAuthenticate {

    function __isAuthenticated() {
        if (FALSE === isset($_GET['token'])) {
            return FALSE;
        } else {
            $num = SessionQuery::create()->filterById($_GET['token'])->filterByExpiration(array('min'=>'now'))->count();
            return ($num > 0);
        }
    }
}

?>
