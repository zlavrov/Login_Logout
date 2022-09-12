<?php

namespace App\Controllers;

use App\Services\Router;

class Auth {

    public function login($data) {

        $email = $data["email"];
        $password = $data["password"];

        $user = \R::findOne('users', 'email = ?', [$email]);

        if (!$user) {
            die("Пользователь не найден");
        }

        if (password_verify($password, $user->password)) {
            session_start();
            $_SESSION["user"] = [
                "id" => $user->id,
                "full_name" => $user->full_name,
                "username" => $user->username,
                "group" => $user->group,
                "email" => $user->email,
                "avatar" => $user->avatar
            ];
            Router::redirect("/profile");
        } else {
            die("Не правильный логин или пароль");
        }
    }

    public function register($data, $files) {

        /*
         * Тут добавить валидацию полей 
         */

        $email = $data["email"];
        $username = $data["username"];
        $full_neme = $data["full_neme"];
        $password = $data["password"];
        $password_confirm = $data["password_confirm"];

        if ($password !== $password_confirm) {
            Router::error("500");
            die();
        }

        $avatar = $files['avatar'];

        $filename = time() . '_' . $avatar["name"];
        $path = "uploads/avatars/" . $filename;
        if(move_uploaded_file($avatar["tmp_name"], $path)) {
            $user = \R::dispense('users');
            $user->email = $email;
            $user->username = $username;
            $user->full_name = $full_neme;
            /*
             * 1 - пользователь
             * 2 - админ
             */
            $user->group = 1;
            $user->avatar = "/" . $path;
            $user->password = password_hash($password, PASSWORD_DEFAULT);
            \R::store($user);
            Router::redirect('/login');

        } else {
            Router::error("500");
        }
    }

    public function logout() {
        unset($_SESSION["user"]);
        Router::redirect("/login");
    }
}

?>