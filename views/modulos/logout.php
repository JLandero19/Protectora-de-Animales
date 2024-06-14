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
unset($_SESSION['route']);
unset($_SESSION['animal_id']);
unset($_SESSION['publication_id']);

echo "<script type='text/javascript'>alert('Has cerrado sesión'); window.location = 'inicio';</script>";
?>