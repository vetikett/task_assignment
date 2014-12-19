<?php



function createUser($email, $username, $password) {
    $db = new PDO('mysql:host=localhost;dbname=task_assignment', 'root', '');

    $hashedPassword = password_hash($password, PASSWORD_BCRYPT);
    $stm = $db->prepare("INSERT INTO users (email, username, password) VALUES (:email, :username, :password)");
    $stm->bindParam(':email', $email, PDO::PARAM_STR );
    $stm->bindParam(':username', $username, PDO::PARAM_STR );
    $stm->bindParam(':password', $hashedPassword, PDO::PARAM_STR );
    return $stm->execute();
}

function getUser() {
    return $_SESSION['user'];
}

function updateUser() {
    $db = new PDO('mysql:host=localhost;dbname=task_assignment', 'root', '');
}

function deleteUser() {
    $db = new PDO('mysql:host=localhost;dbname=task_assignment', 'root', '');
}