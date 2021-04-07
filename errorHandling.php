<form action="index.php" method="post" id="form">
    <input type="hidden" name="error" value="<?= $error ?>">
</form>
<?php if ($error) : ?>
    <script>
        const getError = () => {
            document.getElementById('form').submit();
        }
        getError();
    </script>
<?php
    die;
endif;
