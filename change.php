<?php
$oldName = $_POST['data_name'];
$newName = preg_replace('/[^\p{L}\p{N}\s]/u', '', $_POST['new_name']);
$newName = trim($newName);
$dup = false;
$json = file_get_contents('data.json');
$datas = json_decode($json, true);
if ($newName) {
    if (strtolower($newName) == strtolower($oldName)) {
    } else {
        foreach ($datas as $data => $complete) {
            if (strtolower($data) == strtolower($newName)) {
                if ($oldName != $newName) {
                    $error = "You already have the data!";
                    require_once('errorHandling.php');
                }
                $dup = true;
            }
        }
    }
    if (!$dup) {
        $keys = array_keys($datas);
        $keys[array_search($oldName, $keys)] = $newName;
        $datas = array_combine($keys, $datas);
        file_put_contents('data.json', json_encode($datas), JSON_PRETTY_PRINT);
    }
}
header('Location: index.php');
