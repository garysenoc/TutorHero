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
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-header card-header-primary">
                                    <h4 class="card-title ">Tutors</h4>
                                    <!-- <p class="card-category"> Here is the list of all users</p> -->
                                </div>
                                <div class="card-body">
                                    <br>
                                    <div class="row">
                                        <form class="col s12" method="POST" action="">
                                            <div class="row">

                                                <div class="input-field col s12" style="float: right">
                                                    <select required name="topic">
                                                        <option value="" selected>All</option>
                                                        <?php

                                                        $query = "SELECT * FROM subject_topics";
                                                        $select_topic = mysqli_query($connection, $query);


                                                        while ($row = mysqli_fetch_assoc($select_topic)) {
                                                            $topic1 = $row['topic'];
                                                            $id1 = $row['id'];


                                                            echo "<option value=$id1>$topic1</option>";
                                                        }
                                                        ?>

                                                    </select>
                                                    <label>Subject</label>
                                                </div>
                                                <div class="input-field col s2">
                                                    <button type="submit" class="btn btn-primary" name="search">Search</button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>





                                    <div class="row">




                                        <!-- <div class="card-footer">
                                                    <div class="stats">
                                                        <i class="material-icons">access_time</i> campaign sent 2 days ago
                                                    </div>
                                                </div> -->



                                        <?php

                                        $query = "SELECT * FROM users where role = 'tutor'";
                                        $select_users = mysqli_query($connection, $query);

                                        while ($row = mysqli_fetch_array($select_users)) {
                                            $userid = $row['userid'];
                                            $firstname = $row['firstname'];
                                            $middlename = $row['middlename'];
                                            $lastname = $row['lastname'];

                                        ?>

                                            <div class="col-md-4">
                                                <div class="card card-chart">
                                                    <!-- <div class="card-header card-header-warning">
                                                    </div> -->
                                                    <div class="card-body">
                                                        <h5 class="card-title" style="font-weight: bold;font-size:20px;"><?php echo $firstname . " " . $middlename . " " . $lastname ?></h5>

                                                        <?php
                                                        $id = $_GET['id'];
                                                        $query1 = "SELECT * FROM subject_users, users WHERE subject_users.userid = users.userid and subject_users.subjectid = '$id'";
                                                        $select_topics = mysqli_query($connection, $query1);

                                                        while ($row = mysqli_fetch_array($select_topics)) {
                                                            $tid = $row['subjectid'];


                                                            $query2 = "SELECT * FROM subject_topics WHERE id = '$tid'";
                                                            $res = mysqli_query($connection, $query2);

                                                            while ($row = mysqli_fetch_array($res)) {
                                                                $topic = $row['topic'];
                                                            }
                                                            echo " <p class='card-category'>$topic</p>";
                                                        }

                                                        ?>


                                                    </div>
                                                    <div class="card-footer"><a href="bookappointment.php?id=<?php echo $userid ?>" class="btn btn-success btn-block">Book Tutor</a></div>
                                                </div>
                                            </div>

                                        <?php } ?>




                                    </div>





                                </div>
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
        var v = document.getElementById("findtutors");
        v.className += "active";
    </script>
    <script src="jsGridScript/fetch_users.js"></script>
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
    <script src="jsGridScript/fetch_users.js"></script>
    <script src="./dist/js/materialize.js"></script>
    <script src="./dist/js/init.js"></script>
</body>

</html>