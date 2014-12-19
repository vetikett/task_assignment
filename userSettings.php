<?php
if(isset($_POST['create'])) {

    $password = password_hash($_POST['password'], PASSWORD_BCRYPT);
    $stm = $db->prepare("INSERT INTO users (email, password) VALUES (:email, :password)");
    $stm->bindParam(':email', $_POST['email'], PDO::PARAM_STR );
    $stm->bindParam(':password', $password, PDO::PARAM_STR );
    $stm->execute();

    $result_create = "User created named " . $_POST['email'];

}elseif(isset($_GET['get'])) {

    getUser($_GET['email']);

}elseif(isset($_POST['update'])) {

    $password = password_hash($_POST['password'], PASSWORD_BCRYPT);
    $stm = $db->prepare("UPDATE users SET email = :email, password = :password WHERE (id = :id)");
    $stm->bindParam(':id', $_POST['id'], PDO::PARAM_INT );
    $stm->bindParam(':email', $_POST['email'], PDO::PARAM_STR );
    $stm->bindParam(':password', $password, PDO::PARAM_STR );
    $stm->execute();

    $result_update = "User with id " . $_POST['id'] . " has changed their <br>email to: " .
        $_POST['email'] . "<br>and password to: " . $password;

}elseif(isset($_POST['delete'])) {
    $stm = $db->prepare("DELETE FROM users WHERE email = :email");
    $stm->bindParam(':email', $_POST['email'], PDO::PARAM_STR);
    $stm->execute();
    $result_delete = "User with email: " . $_POST['email'] . " is Deleted";
}

?>

<form method="post" accept-charset="utf-8">
    <h2>Create User</h2>
    <label for="email">Username</label>
    <input type="text" name="email" placeholder="Enter Username">

    <label for="password">Password</label>
    <input type="text" name="password" placeholder="Choose Password">

    <input type="submit" name="create" value="Create User">

    <div>
        <p><?php /*echo isset($result_create) ? $result_create : "" */?></p>
    </div>

</form>

<form  method="get" accept-charset="utf-8">
    <h2>Get User Id</h2>
    <label for="email">Username</label>
    <input type="text" name="email" placeholder="Enter Username">

    <input type="submit" name="get" value="Get User">

    <div>
        <p><?php /*echo isset($result_get) ? $result_get : "" */?></p>
    </div>

</form>

<form  method="post" accept-charset="utf-8">
    <h2>Update User</h2>

    <label for="email">Id</label>
    <input type="text" name="id" placeholder="Select Id">

    <label for="email">New Username</label>
    <input type="text" name="email" placeholder="Enter Username">

    <label for="password">New Password</label>
    <input type="text" name="password" placeholder="Choose Password">

    <input type="submit" name="update" value="Update User">

    <div>
        <p><?php /*echo isset($result_update) ? $result_update : "" */?></p>
    </div>
</form>

<form  method="post" accept-charset="utf-8">
    <h2>Delete User</h2>
    <label for="email">Username</label>
    <input type="text" name="email" placeholder="Enter Username">

    <input type="submit" name="delete" value="Delete User">

    <div>
        <p><?php /*echo isset($result_delete) ? $result_delete : "" */?></p>
    </div>
</form>
