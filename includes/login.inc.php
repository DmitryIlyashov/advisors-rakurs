<?php

require_once 'dbh.inc.php';
require_once 'functions.inc.php';

if (systemIsFree($conn) === false) {
    header("location: ../index.php?error=systemisnotfree");
    exit();
} else {
    session_start();
    blockSession($conn);
    $_SESSION["creation_time"] = time();
    header("location: ../control.php");
    exit();
}
