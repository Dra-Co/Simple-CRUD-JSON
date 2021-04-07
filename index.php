<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
    <title>Home</title>
</head>
<?php
$json = file_get_contents('data.json');
$datas = json_decode($json, true);
if (isset($_POST['error'])) {
    $error = $_POST['error'];
    echo "<script>
            alert('Error : $error')
          </script>";
}
?>
<div class="container">
    <h1 class="mt-3 mb-3">To Do!</h1>
    <div class="col">
        <form action="newdata.php" method="post">
            <input type="text" name="data_name" placeholder="Type something..." autofocus autocomplete="off">
            <button type="submit" class="btn-primary">CREATE</button>
        </form>
        <?php $i = 0; ?>
        <?php while ($i < count($datas)) {
            $i++;
        } ?>
        <div class="mt-3 mb-3">
            <b>Total : <?= $i ?></b>
        </div>
        <?php foreach ($datas as $data => $complete) : ?>
            <div class="row row-cols-2">
                <form action="check.php" method="post" style="display:inline">
                    <input type="hidden" name="data_name" value="<?= $data ?>">
                    <input type="checkbox" <?= $complete['complete'] ? 'checked' : '' ?> id="cbox_<?= $data ?>">
                    <label for="cbox_<?= $data ?>" id="l_<?= $data ?>"><?= $data ?></label>
                </form>
                <div class="d-grid gap-2 d-md-block">
                    <form action="change.php" method="post" style="display: inline;" id="form<?= $i ?>">
                        <input type="hidden" name="data_name" value="<?= $data ?>" id="old_name<?= $i ?>">
                        <input type="hidden" name="new_name" value="" id="new_name<?= $i ?>">
                        <button type="submit" class="btn btn-warning" onclick="getNewName(this)" value="<?= $i ?>">UPDATE</button>
                    </form>
                    <form action="delete.php" method="post" style="display:inline">
                        <input type="hidden" name="data_name" value="<?= $data ?>">
                        <button type="submit" class="btn btn-danger">DELETE</button>
                    </form>
                </div>
            </div>
            <br>
            <?php $i++ ?>
        <?php endforeach ?>
        <?php if ($i > 0) : ?>
            <button class="btn btn-secondary" onclick="location.href='delete.php'">DELETE ALL</button>
        <?php endif ?>
        <br>
    </div>
</div>
<script src="script.js"></script>
</body>

</html>