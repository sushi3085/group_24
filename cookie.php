<?php

function getCookieOrDefault($cookieName, $default) {
    if (isset($_COOKIE[$cookieName])) return $_COOKIE[$cookieName];
    else return $default;
}

?>