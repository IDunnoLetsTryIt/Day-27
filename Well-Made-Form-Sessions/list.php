<?php

require_once 'DBBlackbox.php';
require_once 'Song.php';
//retrieve all songs from the database
// start the session
session_start();

// extract the success message fom the session
$success_message = $_SESSION['success_message'] ?? null;

// delete the success message from the session
unset ($_SESSION['success_message']);


$songs = select(null, null, 'Song');
?>

<?php include 'top-menu.php'; ?>


<?php if ($success_message) :?>
    <style>
        .success-message {
            background-color: antiquewhite;
            padding: 1rem;
        }
        </style>
    <div class = "success-message">
        <?= $success_message?>
    </div>
<?php endif; ?>
<ul>
    <?php foreach ($songs as $song) :?>
        <li>
            <?= $song->name ?>
            (<?= $song-> getLengthFormatted() ?>)

            <a href="edit.php?id=<?= $song->id?>"> edit</a>
            <form action="delete.php?id=<?= $song->id?>" method = "post" onsubmit = "if (!confirm ('do you want to'))return false;">
            <button>Delete</button>
            </form>
        </li>
        <?php endforeach; ?>
</ul>