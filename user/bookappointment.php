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

                                    <?php
                                    $gid = $_GET['id'];
                                    $query = "SELECT * FROM users where userid = '$gid'";
                                    $select_tutor = mysqli_query($connection, $query);
                                    while ($row = mysqli_fetch_assoc($select_tutor)) {

                                        $firstname = $row['firstname'];
                                        $middlename = $row['middlename'];
                                        $lastname = $row['lastname'];
                                    }

                                    ?>



                                    <h4 class="card-title "><?php echo $firstname . " " . $lastname ?>'s Schedule</h4>
                                    <!-- <p class="card-category"> Here is the list of all users</p> -->
                                </div>
                                <div class="card-body">
                                    <br>
                                    <div class="row">

                                        <div class="col-md-12">



                                            <!-- <a href="#modal1" class="btn btn-success pull-right modal-trigger"> Add Available Time</a> -->
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <?php
                                            if (isset($_POST['delete'])) {
                                                $id = $_POST['id'];
                                                $query = "DELETE FROM users_available_time where id = '$id'";
                                                $delete_available = mysqli_query($connection, $query);
                                            }

                                            ?>
                                            <table>
                                                <thead>
                                                    <tr>
                                                        <th>Date</th>
                                                        <th>Time Start</th>
                                                        <th>Time End</th>

                                                        <th>Topic</th>
                                                    </tr>
                                                </thead>

                                                <tbody>


                                                    <?php
                                                    $userid = $_GET['id'];
                                                    $query = "SELECT * FROM users_available_time WHERE userid = '$userid'";
                                                    $result = mysqli_query($connection, $query);

                                                    while ($row = mysqli_fetch_assoc($result)) {
                                                        $id = $row['id'];
                                                        $date = $row['date'];
                                                        $timestart = $row['timestart'];
                                                        $timeend = $row['timeend'];
                                                        $subject = $row['subject'];
                                                        $userid = $row['userid'];
                                                    ?>
                                                        <tr>
                                                            <td><?php echo $date; ?></td>
                                                            <td><?php echo $timestart; ?></td>
                                                            <td><?php echo $timeend; ?></td>
                                                            <td>
                                                                <?php
                                                                $query1 = "SELECT * FROM subject_topics where id = '$subject'";
                                                                $select_topic = mysqli_query($connection, $query1);

                                                                while ($row = mysqli_fetch_array($select_topic)) {
                                                                    $topic = $row['topic'];
                                                                }
                                                                echo $topic;
                                                                ?>

                                                            </td>
                                                            <td>



                                                                <form action="" method="post">
                                                                    <input type="hidden" name="date" value="<?php echo $date; ?>">
                                                                    <input type="hidden" name="timestart" value="<?php echo $timestart; ?>">
                                                                    <input type="hidden" name="timeend" value="<?php echo $timeend; ?>">
                                                                    <input type="hidden" name="topic" value="<?php echo $subject; ?>">
                                                                    <input type="hidden" name="id" value="<?php echo $userid ?>">
                                                                    <button type="submit" class='btn btn-success' name='book'>Book </button>
                                                            </td>
                                                            </form>
                                                        </tr>

                                                    <?php } ?>

                                                    <?php

                                                    if (isset($_POST['book'])) {
                                                        $date = $_POST['date'];
                                                        $timestart = $_POST['timestart'];
                                                        $timeend = $_POST['timeend'];
                                                        $topic = $_POST['topic'];
                                                        $userid = $_POST['id'];
                                                        $this_user = $_SESSION['userid'];
                                                        $query = "INSERT INTO appointments values(null,now(),'$date','$timestart','$timeend','$topic','$userid','$this_user')";
                                                        $insert_appointment = mysqli_query($connection, $query);

                                                        echo "<script>location.replace('./appointments.php');</script>";
                                                    }

                                                    ?>


                                                </tbody>
                                            </table>

                                        </div>



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
        var v = document.getElementById("availabletime");
        v.className += "active";
    </script>

    <script src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
    <script src="./dist/js/materialize.js"></script>
    <script src="./dist/js/init.js"></script>
    <script>
        // document.addEventListener('DOMContentLoaded', function() {
        //     var elems = document.querySelectorAll('.modal');
        //     var instances = M.Modal.init(elems, options);
        // });

        // // Or with jQuery

        // Or with jQuery

        document.addEventListener('DOMContentLoaded', function() {
            var elems = document.querySelectorAll('.modal');
            var instances = M.Modal.init(elems, options);
        });

        // Or with jQuery

        $(document).ready(function() {
            $('.modal').modal();
        });

        document.addEventListener('DOMContentLoaded', function() {
            var elems = document.querySelectorAll('select');
            var instances = M.FormSelect.init(elems, options);
        });

        // Or with jQuery

        $(document).ready(function() {
            $('select').formSelect();
        });

        // document.addEventListener('DOMContentLoaded', function() {
        //     var elems = document.querySelectorAll('select');
        //     var instances = M.FormSelect.init(elems, options);
        // });

        // // Or with jQuery

        // $(document).ready(function() {
        //     $('select').formSelect();
        // });
    </script>

</body>

</html>