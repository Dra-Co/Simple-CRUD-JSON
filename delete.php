<?php
$json = file_get_contents('data.json');
$datas = json_decode($json, true);
if ($_POST['data_name']) {
    $name = $_POST['data_name'];
    unset($datas[$name]);
} else {
    foreach ($datas as $data => $i) {
        unset($datas[$data]);
    }
}
file_put_contents('data.json', json_encode($datas), JSON_PRETTY_PRINT);
header("Location: index.php");
