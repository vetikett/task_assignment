<?php

require_once 'app/database.php';
require_once 'app/auth.php';
require_once 'app/user.php';

if ( isset($_POST['login']) ) {

    login($_POST['email'], $_POST['password']);

} elseif ( isset($_POST['register']) && ( $_POST['password'] == $_POST['re_password'] ) ) {

    if ( createUser($_POST['email'],$_POST['username'], $_POST['password']) ) {
        login($_POST['email'], $_POST['password']);
    }
}

?>

<html>
<head>
    <link rel="stylesheet" href="css/normalize.css"/>
    <link rel="stylesheet" href="css/main.css"/>
</head>
<body>

<?php require_once "login_header.php" ?>


    <div class="register">
        <div class="register-img">
            <img src="img/notepad_page.png" alt=""/>
        </div>
        <form method="post">
            <h3>Register</h3>
            <input type="text" name="email" placeholder="email"/>
            <input type="text" name="username" placeholder="username"/>
            <input type="password" name="password" placeholder="password"/>
            <input type="password" name="re_password" placeholder="re-password"/>
            <input type="submit" name="register" value="Register"/>
        </form>
    </div>

</body>
</html>