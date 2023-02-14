<?php
// helper functions allow easy access to more complex function/method names

require_once 'Session.php';
// alias for the ->old() method of the Session instance

function old ($key, $default = null)
    {
        return Session::instance()-> old_request[$key] ?? $default;
    }