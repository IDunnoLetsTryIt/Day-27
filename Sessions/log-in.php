<?php

if ($_POST['email'] == 'chuckelks@gmail.com'
&& $_POST['paasword'] == 'love')
 {
// sign-in the user
session_start();

$_SESSION['logged-in user'] = 1;
};

header ("Location: sessions.php");