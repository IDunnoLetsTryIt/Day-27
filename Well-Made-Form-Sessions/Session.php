<?php

class Session
{
    public static $singleton = null;

    // returns the singleton instance of this class

    public static function instance(): static
    {
        if (static::$singleton === null) {
            // if the $singleton property of this class is still null (we have not yet creaated an object)
            // create an object of this class and put it in this class's $singleton property
            static::$singleton = new static;
        }

        return static::$singleton;
    }

    // the rest of the code is non-static:

    public array $data = [];

    public array $old_request = [];

    public function __construct()
    {
        // this happens only once so it is a good spot to initiate the session.
        // start the session
        session_start();

        $this->data = $_SESSION;
        // merge the flash data into the common data so that we can retrieve them using ->get:
        $this->data = array_merge($this->data, $_SESSION['flashed_data'] ?? []);
        // delete the flashed data from the session:
        unset($_SESSION['flashed_data']);

        // get the previous request's data from the session and store it in this object
        $this->old_request = $_SESSION['flashed_request'] ?? [];
        // delete 'flashed_request' from the session
        unset($_SESSION['flashed_request']);
    }
    // stores a value in the session
    public function set($key, $value)
    {
        $this->data[$key] = $value;
        $_SESSION[$key] = $value;
    }
    // retrieves a value from the session or returns the default value:

    public function get($key, $default = null)
    {
        return $this->data[$key] ?? $default;
    }

    // stores a value in the session's 'flashed_data' element:
    public function flash($key, $value)
    {
        $_SESSION['flashed_data'][$key] = $value;
    }
    // flashes the entire current $_POST request so that it can be accessed in the following one
    public function flashRequest()
    {
        $_SESSION['flashed_request'] = $_POST;
    }
    // retrieves data from the previous request's $_POST(if it has been flashed) or returns the default value
    public function old ($key, $default = null)
    {
        return $this-> old_request[$key] ?? $default;
    }
}
