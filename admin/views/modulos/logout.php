<?php
unset($_SESSION['role_id']);
unset($_SESSION['user_id']);
unset($_SESSION['dni']);
unset($_SESSION['email']);
unset($_SESSION['name']);
unset($_SESSION['lastname']);
unset($_SESSION['tlf']);
unset($_SESSION['image']);
unset($_SESSION['profile']);

echo "<script type='text/javascript'>window.location = 'inicio';</script>";

?>