<?php
$message = "";

$user = new UserController();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    if (isset($_POST['delete'])) {
        $message = $user->ctrDeleteItem("users", $_POST['user_id']);
    }

}

$users = $user->ctrAll("role_users");
// var_dump($users);

include("views/partials/users.view.php");
?>