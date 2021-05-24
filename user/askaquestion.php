<?php include("./includes1/header.php") ?>
<?php include("./includes1/db.php") ?>


<?php



if (isset($_POST['submit'])) {
    $description = $_POST['description'];
    $title = $_POST['title'];
    $topic = $_POST['topic'];


    $date = date("M d, Y");
    $time = date("h:i:s a");
    $username = $_SESSION['username'];


    $query = "INSERT INTO posts (description, title,subjectTopic,post_date,post_time,isSolved,userid) VALUES ('$description', '$title', '$topic','$date','$time',0,'$username')";
    $insert_post = mysqli_query($connection, $query);
    echo '<script>alert("You have successfully posted a new question")</script>';
}

?>


<body class="">
    <div class="wrapper ">
        <?php include("./includes1/sidebar.php") ?>
        <div class="main-panel">
            <!-- Navbar -->
            <?php include("./includes1/nav.php") ?>
            <!-- End Navbar -->
            <div class="content">
                <div class="container-fluid ">
                    <div class="row ">
                        <div class="col-md-3"></div>
                        <div class="col-md-6">
                            <div class="card">
                                <form action="" method="post">
                                    <div class="card-header card-header-primary">
                                        <h4 class="card-title center-align">Ask a Question</h4>
                                        <!-- <p class="card-category"> Here is the list of all users</p> -->
                                    </div>
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <!-- <label>Ask a Question</label> -->
                                                <div class="input-field col s12">
                                                    <label class="bmd-label-floating"> What do you want to ask?</label>
                                                    <textarea class="form-control" rows="5" name="description" required></textarea>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="input-field col s6">

                                                <input id="last_name" type="text" class="validate" name="title" required>
                                                <label for="last_name">Title </label>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="input-field col s12">
                                                <select required name="topic">
                                                    <option value="" disabled selected>Choose a Topic</option>


                                                    <?php

                                                    $query = "SELECT * FROM subject_topics";
                                                    $select_all_topic = mysqli_query($connection, $query);


                                                    while ($row = mysqli_fetch_assoc($select_all_topic)) {
                                                        $subject_name = $row['topic'];
                                                        $id = $row['id'];
                                                        echo "<option value='" . $subject_name . "'> " . $subject_name . "</option>";
                                                    }

                                                    ?>




                                                </select>
                                                <label>Subject Topic</label>
                                            </div>
                                        </div>

                                        <div class="card-footer">
                                            <button type="submit" name="submit" class="btn btn-info pull-right btn-block">Post</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>












                </div>
                <?php include("./includes1/footer.php") ?>
            </div>
        </div>
        <div class="fixed-plugin">
            <div class="dropdown show-dropdown">
                <a href="#" data-toggle="dropdown">
                    <i class="fa fa-cog fa-2x"> </i>
                </a>
                <ul class="dropdown-menu">
                    <li class="header-title"> Sidebar Filters</li>
                    <li class="adjustments-line">
                        <a href="javascript:void(0)" class="switch-trigger active-color">
                            <div class="badge-colors ml-auto mr-auto">
                                <span class="badge filter badge-purple" data-color="purple"></span>
                                <span class="badge filter badge-azure" data-color="azure"></span>
                                <span class="badge filter badge-green" data-color="green"></span>
                                <span class="badge filter badge-warning" data-color="orange"></span>
                                <span class="badge filter badge-danger" data-color="danger"></span>
                                <span class="badge filter badge-rose active" data-color="rose"></span>
                            </div>
                            <div class="clearfix"></div>
                        </a>
                    </li>
                    <li class="header-title">Images</li>
                    <li class="active">
                        <a class="img-holder switch-trigger" href="javascript:void(0)">
                            <img src="../assets/img/sidebar-1.jpg" alt="">
                        </a>
                    </li>
                    <li>
                        <a class="img-holder switch-trigger" href="javascript:void(0)">
                            <img src="../assets/img/sidebar-2.jpg" alt="">
                        </a>
                    </li>
                    <li>
                        <a class="img-holder switch-trigger" href="javascript:void(0)">
                            <img src="../assets/img/sidebar-3.jpg" alt="">
                        </a>
                    </li>
                    <li>
                        <a class="img-holder switch-trigger" href="javascript:void(0)">
                            <img src="../assets/img/sidebar-4.jpg" alt="">
                        </a>
                    </li>
                    <li class="button-container">
                        <a href="https://www.creative-tim.com/product/material-dashboard" target="_blank" class="btn btn-primary btn-block">Free Download</a>
                    </li>
                    <!-- <li class="header-title">Want more components?</li>
            <li class="button-container">
                <a href="https://www.creative-tim.com/product/material-dashboard-pro" target="_blank" class="btn btn-warning btn-block">
                  Get the pro version
                </a>
            </li> -->
                    <li class="button-container">
                        <a href="https://demos.creative-tim.com/material-dashboard/docs/2.1/getting-started/introduction.html" target="_blank" class="btn btn-default btn-block">
                            View Documentation
                        </a>
                    </li>
                    <li class="button-container github-star">
                        <a class="github-button" href="https://github.com/creativetimofficial/material-dashboard" data-icon="octicon-star" data-size="large" data-show-count="true" aria-label="Star ntkme/github-buttons on GitHub">Star</a>
                    </li>
                    <li class="header-title">Thank you for 95 shares!</li>
                    <li class="button-container text-center">
                        <button id="twitter" class="btn btn-round btn-twitter"><i class="fa fa-twitter"></i> &middot; 45</button>
                        <button id="facebook" class="btn btn-round btn-facebook"><i class="fa fa-facebook-f"></i> &middot; 50</button>
                        <br>
                        <br>
                    </li>
                </ul>
            </div>
        </div>
        <!--   Core JS Files   -->
        <?php include("./includes1/corejs.php") ?>



        <script>
            var v = document.getElementById("askaquestion");
            v.className += "active";
        </script>
        <script src="jsGridScript/fetch_users.js"></script>
        <script src="./dist/js/materialize.js"></script>
        <script src="./dist/js/init.js"></script>
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                var elems = document.querySelectorAll('.modal');
                var instances = M.Modal.init(elems, options);
            });

            // Or with jQuery

            $(document).ready(function() {
                $('.modal').modal();
            });


            document.addEventListener('DOMContentLoaded', function() {
                var elems = document.querySelectorAll('.datepicker');
                var instances = M.Datepicker.init(elems, options);
            });

            // Or with jQuery

            $(document).ready(function() {
                $('.datepicker').datepicker();
            });

            document.addEventListener('DOMContentLoaded', function() {
                var elems = document.querySelectorAll('select');
                var instances = M.FormSelect.init(elems, options);
            });

            // Or with jQuery

            $(document).ready(function() {
                $('select').formSelect();
            });


            function posted() {
                Swal.fire(
                    'Good job!',
                    'You have posted a question. Please wait for a while until someone answered your question. Thank you.',
                    'success'
                )
            }
        </script>
</body>

</html>