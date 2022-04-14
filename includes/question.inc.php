<?php

require_once 'dbh.inc.php';
require_once 'functions.inc.php';

if (isset($_POST['submit'])) {
    $company = $_POST['company'];
    $person = $_POST['person'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $question_text = $_POST['question-text'];
    saveQuestion($conn, $company, $person, $email, $phone, $question_text);
} else {
    header("location: ../index.php");
    exit();    
}



