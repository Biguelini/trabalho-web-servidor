<?php
    session_start();
    session_destroy();
    header('Location: /controllers/eventos.controller.php');