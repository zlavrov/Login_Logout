<?php

use App\Services\Page;

if ($_SESSION["user"]) {
    \App\Services\Router::redirect("/profile");
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
            <h2 class="mt-4">Sign In</h2>
            <form class="mt-4" action="/auth/login" method="POST">
                <div class="form-group">
                    <label for="exampleInputEmail1" class="form-label">Email address</label>
                    <input type="email" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1" class="form-label">Password</label>
                    <input type="password" name="password" class="form-control" id="exampleInputPassword1">
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </body>
</html>