<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <?php include "head.php" ?>
    <title>Portofolio</title>
</head>
<body>

   
    <?php include "nav.php" ?>
    


    <div class="container">
        <div class="columns">

            <div class="column">
               <section id="hobbies">
                   <div class="card">

                       <header class="card-header">
                           <p class="card-header-title">My Hobbies</p>
                       </header>

                       <div class="card-content">
                           <div class="content">

                               <ul>
                                   <li>Sleeping</li>
                                   <li>Eating</li>
                                   <li>Writing Love Songs</li>

                               </ul>
                           </div>
                       </div>
                   </div>
               </section>

                <br>

                <section>
                    <div class="card">

                        <header class="card-header">
                            <p class="card-header-title">About  Me</p>
                        </header>

                        <div class="card-content">
                            <div class="content">
                                A humble student who uses Rust and React.js who should also do some more open source work.
                            </div>
                        </div>
                    </div>
                </section>
            </div>

            <div class="column">
                <section>
                    <header>
                        <h1 class="title">My Past Projects</h1>
                    </header>
                    <hr>

                    <div class="columns">
                        <div class="column">
                            <div class="card">
                                <div class="card-image">
                                    <img src="images/Rust.svg"/>
                                </div>
                                <div class="card-content">
                                    <h4><a href="https://github.com/Lapz/tox">Tox Compiler</a></h4>

                                </div>

                                <div class="tags">
                                    <span class="tag">Rust</span>
                                    <span class="tag">C</span>
                                    <span class="tag">Compiler</span>
                                    <span class="tag">Parsing</span>
                                </div>
                            </div>

                        </div>
                        <div class="column">
                            <div class="card">
                                <div class="card-image">
                                    <img src="images/React.svg"/>
                                </div>
                                <div class="card-content">
                                    <h4><a href="https://lapz.github.io/trainViewer/#/">Bus Times App</a></h4>

                                </div>

                                <div class="tags">
                                    <span class="tag">React</span>
                                    <span class="tag">CSS</span>
                                    <span class="tag">JavaScript</span>
                                    <span class="tag">Single Page Applications</span>
                                </div>
                            </div>

                        </div>
                        <div class="column">
                            <div class="card">
                                <div class="card-image">
                                    <img src="images/ClashRoyale.png"/>
                                </div>
                                <div class="card-content">
                                    <h4><a href="https://github.com/Lapz/rustyClash">Rusty Clash</a></h4>

                                </div>

                                <div class="tags">
                                    <span class="tag">Rust</span>
                                    <span class="tag">Api</span>
                                    <span class="tag">Reqwest</span>
                                    <span class="tag">Serde</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
                <hr>

                <section>
                   <header>
                       <h1 class="title">Education</h1>
                   </header>
                    <div class="content">
                        <ul>
                            <li>2018 - Queen Mary's University</li>
                            <li>2011-2018 - St Benedicts Senior School</li>
                        </ul>
                    </div>
                </section>
            </div>

            <div class="column">
                <section>
                    <div class="card">

                        <header class="card-header">
                            <p class="card-header-title">Skills</p>
                        </header>

                        <div class="card-content">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>
                                            Skill Name
                                        </th>

                                        <th>
                                            Mastery
                                        </th>

                                    </tr>

                                </thead>

                                <tbody>
                                    <tr>
                                        <td>
                                            Rust
                                        </td>
                                        <td>
                                            <progress value="75" max="100">75%</progress>
                                        </td>
                                    </tr>

                                    <tr>
                                        <td>
                                           SQL
                                        </td>
                                        <td>
                                            <progress value="75" max="100">75%</progress>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            Java
                                        </td>
                                        <td>
                                            <progress value="75" max="100">75%</progress>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            React.js
                                        </td>
                                        <td>
                                            <progress value="75" max="100">75%</progress>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            JS
                                        </td>
                                        <td>
                                            <progress value="65" max="100">65%</progress>
                                        </td>
                                    </tr>

                                    <tr>
                                        <td>
                                            Node.js
                                        </td>
                                        <td>
                                            <progress value="65" max="100">65%</progress>
                                        </td>
                                    </tr>

                                </tbody>
                            </table>
                        </div>
                    </div>
                </section>

                <br>

                <section>
                    <div class="card">

                        <header class="card-header">
                            <p class="card-header-title">Contact</p>
                        </header>
                        <div class="card-content">
                            <div class="content">
                                <a href="https://twitter.com/Leonardp28">
                                     <span class="icon">
                                        <i class="fab fa-twitter"></i>
                                    </span>
                                </a>
                                <br>
                                <a href="https://github.com/Lapz">
                                    <span class="icon">
                                        <i class="fab fa-github"></i>
                                    </span>
                                </a>
                                <br>
                                <a href="linkedin.com/in/lprattl1">
                                     <span class="icon">
                                        <i class="fab fa-linkedin"></i>
                                    </span>
                                </a>
                            </div>
                        </div>
                    </div>
                </section>
            </div>


        </div>

    </div>

    <footer class="footer">

        <div class="content has-text-centered">
            <p>A portfolio webiste built by <a href="https://github.com/lapz">Lenard Pratt</a> using <a href="https://bulma.io/">Bulma.io</a>
                &copy;
                <?php
                    echo date("Y");
                ?>
            </p>
        </div>
    </footer>
    
</body>
</html>