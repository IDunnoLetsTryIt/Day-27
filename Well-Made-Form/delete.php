<?php
require_once 'DBBlackbox.php';
require_once 'Song.php';

// start the session
session_start();
//get the id from the URL:
$id = $_GET['id'];

//somehow delete a record from the database
delete($id);

$_SESSION['success_message'] = 'The song was deleted.';

// redirect to edit
header('location: list.php');
