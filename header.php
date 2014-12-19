<div class="header-container">
    <header class="wrapper">

        <h2>
            <?php

            if (isset($_SESSION['auth'])) {
                if (substr($_SESSION['user']->username, -1) != "s") {
                    echo $_SESSION['user']->username . "'s";
                } else {
                    echo $_SESSION['user']->username;
                }
            } else {
                echo "Tasks";
            }
            ?>
        </h2>


        <nav>
            <ul>
                <li>item</li>
                <li>item</li>
                <li>item</li>
                <li>item</li>
            </ul>
        </nav>
        <form class="logout-button" method="post">
            <input type="submit" name="logout" value="logout"/>
        </form>


    </header>
</div>