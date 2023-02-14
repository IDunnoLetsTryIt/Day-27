<?php

require_once "Computer.php";

//new object
$my_computer = new Computer;

$my_computer->operating_system = 'windows';
$my_computer->model = 'ASUS';
$my_computer->is_portable = true;
$my_computer->status = 'off';

// var_dump($my_computer);
$my_computer->switchOff();

$my_computer->toggleSwitch();

?>

<h1>My computer</h1>
<table>
    <tr><th>Model:</th><td><?=$my_computer->model?></td></tr>
    <tr><th>OS:</th><td><?=$my_computer->operating_system?></td></tr>
    <tr><th>Portable:</th><td><?=$my_computer->is_portable ? 'yes' : 'no'?></td></tr>
    <tr><th>Status:</th><td>switched <?=$my_computer->status?></td></tr>
</table>