<?php

require_once 'dbh.inc.php';
require_once 'functions.inc.php';

session_start();
session_unset();
session_destroy();
unblockSession($conn);

header("location: ../index.php");
exit();
