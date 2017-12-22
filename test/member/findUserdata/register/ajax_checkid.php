<?php

    // id 중복 검증

    include_once('../../config/database.php');

    $check_id = trim($_POST['mb_cid']);
    $check_name = trim($_POST['name']);
    $check_hp = trim($_POST['mb_hp']);
    $check_email = trim($_POST['email']);

    // id 값이 넘어오면 해당 아이디가 있는지 조회 후 true/false로 넘겨줍니다.

    if ($check_id) {
        $sql = "SELECT mb_id FROM member WHERE mb_id = '$check_id'";

        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                echo true;
            }
        } else {
            echo false;
        }
    }


    if ($check_hp) {
        $sql = "SELECT mb_id FROM member WHERE mb_name = '$check_name' AND mb_hp = '$check_hp'"; // and mb_email = '$check_email'
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                echo $row['mb_id'];
            }
        } else {
            echo false;
        }
    }

    if ($check_email) {
        $sql = "SELECT mb_id FROM member WHERE mb_name = '$check_name' AND mb_email = '$check_email'"; // and mb_email = '$check_email'
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                echo $row['mb_id'];
            }
        } else {
            echo false;
        }
    }  

    $conn->close();