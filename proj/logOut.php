<?php
session_start();

unset($_SESSION['login']);
unset($_SESSION['Id']);

header('location: /proj/');