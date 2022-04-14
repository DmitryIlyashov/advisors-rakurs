<?php

function systemIsFree($conn) {
    $sql = "SELECT * FROM current_session;";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);
    
    if (($row['is_finished'] === "Y") || ((time() - $row['start_time']) > 600)) {
        return true;
    } else {
        return false;
    }
}

function blockSession($conn) {
    $sql = "UPDATE current_session SET start_time = UNIX_TIMESTAMP(), is_finished = 'N' WHERE id = 1;";
    mysqli_query($conn, $sql);
}

function unblockSession($conn) {
    $sql = "UPDATE current_session SET is_finished = 'Y' WHERE id = 1";
    mysqli_query($conn, $sql);
}

function saveQuestion($conn, $company, $person, $email, $phone, $question_text) {
    $sql = "INSERT INTO questions(question_company, question_person, question_email, question_phone, question_text) VALUES (?, ?, ?, ?, ?);";
    $stmt = mysqli_stmt_init($conn);

    if (!mysqli_stmt_prepare($stmt, $sql)) {
        header("location: ../control.php?error=stmt_failed");
        exit();    
    } 

    mysqli_stmt_bind_param($stmt, "sssss", $company, $person, $email, $phone, $question_text);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
    header("location: ?question=ok#question");
    exit();    
}

