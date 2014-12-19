<?php


session_start();
function login($email, $password) {

    $db = new PDO('mysql:host=localhost;dbname=task_assignment', 'root', '');
    $stm = $db->prepare("SELECT * FROM users WHERE email = :email");
    $stm->bindParam(':email', $email, PDO::PARAM_STR);

    $stm->execute();

    $row = $stm->fetchObject();
    var_dump(password_verify($password, $row->password));
    if (password_verify($password, $row->password)) {
        $_SESSION['auth'] = true;
        $_SESSION['user'] = $row;
        header('location: index.php');
    }
}

function logout() {
    session_destroy();
    header('location: index.php');
}