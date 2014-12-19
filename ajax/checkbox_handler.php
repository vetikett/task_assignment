<?php

function setTaskStatus($checked, $id) {
    $db = new PDO('mysql:host=localhost;dbname=task_assignment', 'root', '');
    $stm = $db->prepare('UPDATE tasks SET checked = :checked WHERE id = :id');
    $stm->bindParam(':checked', $checked, PDO::PARAM_STR);
    $stm->bindParam(':id', $id, PDO::PARAM_INT);
    $stm->execute();
}

if ( isset($_POST['checked']) ) {
    setTaskStatus($_POST['checked'], $_POST['taskID']);
}

$hej = "baaaaam";