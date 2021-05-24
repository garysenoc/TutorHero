<div class="sidebar" data-color="azure" data-background-color="white" data-image="../assets/img/sidebar-1.jpg">
    <!--
        Tip 1: You can change the color of the sidebar using: data-color="purple | azure | green | orange | danger"

        Tip 2: you can also add an image using data-image tag
    -->
    <div class="logo">
        <a href="" class="simple-text logo-normal">

            <?php
            echo "HELLO <b>" . $_SESSION['firstname'] . "</b>!";
            ?>
        </a>
    </div>
    <div class="sidebar-wrapper">
        <ul class="nav">
            <li class="nav-item " id="answerquestion">
                <a class="nav-link" href="./answerquestion.php">
                    <i class="material-icons">dashboard</i>
                    <p>Answer Questions</p>
                </a>
            </li>

            <li class="nav-item " id="subjects">
                <a class="nav-link active" href="./subjects.php">
                    <i class="material-icons">content_paste</i>
                    <p>My Subjects</p>
                </a>
            </li>
            <li class="nav-item " id="availabletime">
                <a class="nav-link active" href="./availabletime.php">
                    <i class="material-icons">groups</i>
                    <p>My Available Time</p>
                </a>
            </li>

            <li class="nav-item " id="chat">
                <a class="nav-link" href="./chat.php">
                    <i class="material-icons">bubble_chart</i>
                    <p>Chat</p>
                </a>
            </li>

            <li class="nav-item active-pro ">
                <a class="nav-link" href="./index.php">
                    <i class="material-icons">unarchive</i>
                    <p>Logout</p>
                </a>
            </li>
        </ul>
    </div>
</div>