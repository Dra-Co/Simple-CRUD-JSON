<?php
$name = $_POST['data_name'];
$json = file_get_contents('data.json');
$datas = json_decode($json, true);
$datas[$name]['complete'] = !$datas[$name]['complete'];
file_put_contents('data.json', json_encode($datas));
header("Location: index.php");
