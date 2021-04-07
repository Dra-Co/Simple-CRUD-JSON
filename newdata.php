    <?php
    $dataName = preg_replace('/[^\p{L}\p{N}\s]/u', '', $_POST['data_name']);
    $dataName = trim($dataName);
    if ($dataName) {
        if (file_exists('data.json')) {
            $json = file_get_contents('data.json');
            $datas = json_decode($json, true);
        } else {
            $datas = [];
        }
        foreach ($datas as $data => $complete) {
            if (strtolower($data) == strtolower($dataName)) {
                $error = "You already have the data!";
                require_once('errorHandling.php');
            }
        }
        $datas[$dataName] = ["complete" => false];
        file_put_contents('data.json', json_encode($datas));
    } ?>
    <?php header('Location: index.php');
    ?>
