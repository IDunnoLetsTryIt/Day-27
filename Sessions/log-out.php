<?php

session_start();
unset ($_SESSION['logged-in user']);
header("location: sessions.php");