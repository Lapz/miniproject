<nav class="navbar is-dark" role="navigation" aria-label="main navigation">
            <div class="navbar-brand">
                <a class="navbar-item" href="/">
                    <b>Lenard Pratt's Portfolio</b>
                </a>

                <a id="nav-close" role="button" class="navbar-burger burger" aria-label="menu" aria-expanded="false" data-target="navbarBasicExample">
                    <span aria-hidden="true"></span>
                    <span aria-hidden="true"></span>
                    <span aria-hidden="true"></span>
                </a>
            </div>

            <div id="nav-menu" class="navbar-menu">
                <div class="navbar-start">
                    <a class="navbar-item" href="index.php">
                        Home
                    </a>

                    <a class="navbar-item" href="blog.php">
                        Blog
                    </a>
                </div>

                <div class="navbar-end">
                    <div class="navbar-item">
                        <div class="buttons">
                            <?php
                                if (isset($_SESSION['user'])) {
                                    echo "<a class=\"button is-light\" href=\"logout.php\">Logout</a>";
                                }else {
                                    echo "<a class=\"button is-light\" href=\"login.php\">Log in</a>";
                                }
                            ?>
                        </div>
                    </div>
                </div>
            </div>
        </nav>
        <br>
        <br>