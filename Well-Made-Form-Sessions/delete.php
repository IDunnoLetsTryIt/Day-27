<?php
require_once 'DBBlackbox.php';
require_once 'Session.php';
require_once 'Song.php';

// start the session
session_start();
//get the id from the URL:
$id = $_GET['id'];

//somehow delete a record from the database
delete($id);

Session::instance()->flash('success_message', 'Song deleted.');

// redirect to edit
header('location: list.php');
