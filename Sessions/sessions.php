<?php


session_start();

$_SESSION['start'] = date('H:i:s');
var_dump($_SESSION);

// to empty:
// unset ($_SESSION['start']);

?>

<?php if(isset($_SESSION['logged-in-user'])) :?>
    User #<?=$_SESSION['logged-in-user'] ?> is logged in.
    <form action="logout.php" method="post">
        <button>Log out</button>
    </form>
<?php else : ?>

<form action="log-in.php" method="post">

<input type="email" name="email">
<input type="password" name="password">

<button>Log In</button>

</form>

<?php endif; ?>