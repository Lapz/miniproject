<nav class="navbar">
    <div class="navbar-brand">
        <a class="navbar-item" href="index.php">Lenard Pratt's Portfolio
        </a>
    </div>

    <div class="navbar-menu">

        <div class="navbar-start">
            <a class="navbar-item" href="index.php">Home</a>
            <a class="navbar-item" href="blog.php">Blog</a>
        </div>

        <?php
            session_start();

            if (isset($_SESSION["user"])) {
                echo "<div class='navbar-end'>";

                echo "<a class='navbar-item' href='logout.php'>Logout</a>";
                echo "</div>";
            }


        ?>

    </div>
</nav>

