<?php

use App\Services\Page;

if (!$_SESSION["user"]) {
    \App\Services\Router::redirect("/login");
}

?>

<!DOCTYPE html>
    <html lang="en">
<?php
Page::part('head');
?>
    <body>
<?php
Page::part('navbar');
?>

        <div class="container">
            <div class="jumbotron mt-4">
                <h1 class="display-4">Hello, <?= $_SESSION["user"]["full_name"]; ?>.</h1>
                <img src="<?= $_SESSION["user"]["avatar"]; ?>" height="300" alt="avatar">
            </div>
        </div>
    </body>
</html>