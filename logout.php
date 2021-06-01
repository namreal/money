<?php
    setcookie('email', '', time()-1);
    setcookie('pass', '', time()-1);
    header('Location: /login.php');
?>