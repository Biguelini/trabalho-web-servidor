<?php
    session_start();
    session_destroy();
    header('Location: /trabalho-web-servidor/controllers/login.controller.php');