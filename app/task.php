<?php

function listTasks() {
    $db = new PDO('mysql:host=localhost;dbname=task_assignment', 'root', '');
    $currentUserID = $_SESSION['user']->id;
    $stm = $db->prepare("SELECT tasks.* FROM tasks
                        JOIN users ON (tasks.user_id = users.id)
                       WHERE tasks.user_id = :userID");
    $stm->bindParam(':userID', $currentUserID, PDO::PARAM_INT);
    $stm->execute();

    return $stm->fetchAll(PDO::FETCH_OBJ);
}

function createTask($task, $user_id) {
    $db = new PDO('mysql:host=localhost;dbname=task_assignment', 'root', '');
    $stm = $db->prepare('INSERT INTO tasks (task, user_id)
                        VALUES (:task, :user_id)');
    $stm->bindParam(':task', $task, PDO::PARAM_STR);
    $stm->bindParam(':user_id', $user_id, PDO::PARAM_INT);
    $stm->execute();
}



function updateTask() {

}

function deleteTask() {

}

function getTask() {

}