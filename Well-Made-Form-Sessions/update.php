<?php



require_once 'DBBlackbox.php';
require_once 'Song.php';
require_once 'Session.php';
// session_start();

// find the ID of the record we want to edit in the request
$id = $_GET['id'];
 
// somehow retrieve existing data from some storage
$song = find( $id, 'Song' );
 
// validation

// declare that everything is fine
$valid = true;
$error_messages = [];

// 'trim' removes white space from both sides of the string
if (trim($_POST['name']) === '') {
    // if name is empty
    $valid = false;

    // add an error message with a multidimensional array
    $error_messages['name'][] = 'Name is mandatory';
}


if (trim($_POST['author']) === '') {
    // if author is empty
    $valid = false;
    $error_messages['author'][] = 'Author name is mandatory';
}

if ($valid === false) {
    // flash error messages
   Session::instance()->flash("error messages", $error_messages);

//    flash all incoming $_POST data
Session::instance()->flashRequest();
    // redirect
    header('Location: edit.php?id='.$id);
    // don't proceed with the rest of the script
    exit();
}

// update data from request
$song->name = $_POST['name'] ?? $song->name;
$song->author = $_POST['author'] ?? $song->author;
$song->length = $_POST['length'] ?? $song->length;
$song->album = $_POST['album'] ?? $song->album;
// ...
 
// somehow save the data into the database (using the unique ID)
update($id, $song);

Session::instance() ->flash('success_message', 'Song was successfully updated');

// redirect to edit
header('location: edit.php?id=' .$id);