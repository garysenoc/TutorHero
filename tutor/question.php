<?php include("./includes1/header.php") ?>
<?php include("./includes1/db.php") ?>

<body class="">
    <div class="wrapper ">
        <?php include("./includes1/sidebar.php") ?>
        <div class="main-panel">
            <!-- Navbar -->
            <?php include("./includes1/nav.php") ?>
            <!-- End Navbar -->
            <div class="content">
                <div class="container-fluid ">



                    <div class="row">

                        <?php
                        $post_id = $_GET["id"];

                        $query = "SELECT * FROM posts where postid= '$post_id'";
                        $select_question = mysqli_query($connection, $query);


                        while ($row = mysqli_fetch_assoc($select_question)) {
                            $postid = $row['postid'];
                            $title = $row['title'];
                            $post_date = $row['post_date'];
                            $post_time = $row['post_time'];
                            $description = $row['description'];
                        }

                        ?>







                        <div class="col-md-3"></div>
                        <div class="col-md-6">
                            <div class="card ">
                                <div class="card-content">
                                    <span class="card-title"><?php echo $title ?></span>
                                    <div class="stats" style="display:inline-block;margin-bottom:10px;">
                                        <!-- <i class="material-icons" style="display:inline-block">access_time</i> -->
                                        <p style="display:inline-block"><?php echo $post_date . ", " . $post_time ?></p>
                                    </div>

                                    <p><?php echo $description ?></p>

                                </div>
                                <hr>

                                <div class="card-footer" style="height:3px;">

                                    <div class="stats">
                                        <p style="font-weight: bold"> <b>Comments</b> </p>
                                    </div>
                                </div>

                                <ul class="collection" margin-top="-20px">

                                    <?php

                                    $query = "SELECT * FROM post_user_answers where postid= '$post_id'";
                                    $select_comments = mysqli_query($connection, $query);


                                    while ($row = mysqli_fetch_assoc($select_comments)) {
                                        $answer = $row['answer'];
                                        $date = $row['date'];
                                        $time = $row['time'];
                                        $username = $row['username'];


                                    ?>

                                        <li class="collection-item">
                                            <span style="font-size:13px;color:black;" class="title"><?php echo $username ?></span>
                                            <p style="font-size:10px"><?php echo $date . ", " . $time ?></p>
                                            <p> <?php echo $answer ?> </p>

                                        </li>

                                    <?php } ?>



                                </ul>

                                <!-- <div class="card-action">
                                        <a href="#">This is a link</a>
                                        <a href="#">This is a link</a>
                                    </div> -->


                                <?php

                                if (isset($_POST['submit'])) {

                                    $comment = $_POST['comment1'];
                                    $usid = $_SESSION['userid'];
                                    $date = date("M d, Y");
                                    $time = date("h:i:s a");
                                    $username = $_SESSION['username'];

                                    $query = "INSERT INTO post_user_answers (postid,userid,answer,date,time,username) values('$post_id','$usid','$comment','$date', '$time','$username')";
                                    $insert_comment = mysqli_query($connection, $query);

                                    echo "<script>window.location.href = window.location.href;</script>";
                                }

                                ?>

                                <div class="row" style="width:100%">
                                    <form class="col s12" method="POST" action="">
                                        <div class="row">
                                            <div class="input-field col s12">
                                                <textarea id="textarea1" name="comment1" class="materialize-textarea" placeholder="Write a comment" required></textarea>
                                                <label for="textarea1">Write a comment</label>
                                            </div>
                                        </div>
                                        <button class="btn btn-primary pull-right" type="submit" name="submit">Comment</button>
                                    </form>
                                </div>
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
            var v = document.getElementById("myquestions");
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