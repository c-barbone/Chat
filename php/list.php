<?php

include('bdd.php');

$sql = 'SELECT * FROM `message`';

$message = $db->query($sql);

$list=$message->fetchAll();

$messagesJson= json_encode($list);

echo $messagesJson;
?>