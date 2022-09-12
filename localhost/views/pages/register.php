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
            <form class="mt-4" action="/auth/register" method="POST" enctype="multipart/form-data">
                <div class="form-group">
                    <label for="exampleInputEmail1" class="form-label">Email address</label>
                    <input type="email" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                </div>
                <div class="form-group">
                    <label for="username" class="form-label">Username</label>
                    <input type="text" name="username" class="form-control" id="username">
                </div>
                <div class="form-group">
                    <label for="full_neme" class="form-label">Full_neme</label>
                    <input type="text" name="full_neme" class="form-control" id="full_neme">
                </div>
                <div class="form-group">
                    <label for="avatar" class="form-label">User Avatar</label>
                    <input type="file" name="avatar" class="form-control" id="avatar">
                </div>
                <div class="form-group">
                    <label for="password" class="form-label">Password</label>
                    <input type="password" name="password" class="form-control" id="password">
                </div>
                <div class="form-group">
                    <label for="assword_confirm" class="form-label">Password Confirmation</label>
                    <input type="password" name="password_confirm" class="form-control" id="password_confirm">
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </body>
</html>