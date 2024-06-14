<?php
$message = "";

if (isset($_GET['user_id']) && $_GET['user_id'] > 0) {
    $_SESSION['user_id'] = $_GET['user_id'];
}

$user = new UserController();
$data = $user->ctrOneWhere('role_users', "user_id", $_SESSION['user_id']);

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    
    $message = $user->ctrUpdateItem($_POST);
    // var_dump($_FILES);

}

include("views/partials/edit-user.view.php");
?>