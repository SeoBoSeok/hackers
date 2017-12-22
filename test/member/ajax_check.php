<?php

    include_once('../config/database.php');

    $check_id = trim($_POST['fp_mb_id']);
    $check_name = trim($_POST['fp_mb_name']);
    $check_hp = trim($_POST['mb_hp']);
    $check_email = trim($_POST['find_email']);

    // id 값이 넘어오면 해당 아이디가 있는지 조회 후 true/false로 넘겨줍니다.

    $sql = "SELECT mb_id FROM member WHERE";

    switch ($_POST['mode']) {
        case 'find_id_hp':
            $sql .= " mb_name = '$check_name' AND mb_hp = '$check_hp'";
            $_SESSION['auth_code'] = 123456;
            break;
        case 'find_id_email':
            $sql .= " mb_name = '$check_name' AND mb_email = '$check_email'";
            $_SESSION['auth_code'] = 1234567;
            break;
        case 'find_pass_hp':
            $sql .= " mb_id = '$check_id' AND mb_name = '$check_name' AND mb_hp = '$check_hp'";
            $_SESSION['auth_code'] = 123456;
            break;
        case 'find_pass_email':
            $sql .= " mb_id = '$check_id' AND mb_name = '$check_name' AND mb_email = '$check_email'";
            $_SESSION['auth_code'] = 1234567;
            break;
        default:
            $sql .= " mb_id = '$check_id'";
            break;
    }

    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            echo $_SESSION['auth_code'];
        }
    } else {
        echo false;
    }

    $conn->close();