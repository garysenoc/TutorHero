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
                <?php

                $userid = $_GET["id"];

                $query = "SELECT * FROM users WHERE userid = '$userid'";
                $select_user = mysqli_query($connection, $query);

                while ($row = mysqli_fetch_array($select_user)) {
                    $username = $row['username'];
                    $password = $row['password'];
                    $firstname = $row['firstname'];
                    $middlename = $row['middlename'];
                    $lastname = $row['lastname'];
                    $birthdate = $row['birthdate'];
                    $role = $row['role'];
                    $bionote = $row['bionote'];
                    $phone_number = $row['phone_number'];
                    $email = $row['email'];
                }


                if (isset($_POST['update_profile'])) {
                    $username = $_POST['username'];
                    $password = $_POST['password'];
                    $firstname = $_POST['firstname'];
                    $middlename = $_POST['middlename'];
                    $lastname = $_POST['lastname'];
                    $birthdate = $_POST['birthdate'];
                    $bionote = $_POST['bionote'];
                    $phone_number = $_POST['phone_number'];
                    $email = $_POST['email'];


                    $query = "UPDATE users SET username='$username',password='$password',firstname='$firstname',middlename='$middlename',lastname='$lastname',birthdate='$birthdate',bionote='$bionote',phone_number='$phone_number',email='$email' where userid='$userid'";
                    $update_query = mysqli_query($connection, $query);
                }


                ?>





                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="card card-profile">
                                <div class="card-body">
                                    <h4 class="card-title"><?php echo $firstname . " " . $middlename . " " . $lastname ?></h4>
                                    <h6 class="card-category text-gray"><?php echo strtoupper($role) ?></h6>
                                    <p class="card-description">
                                        <?php echo $bionote; ?>
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-8">
                            <div class="card">
                                <!-- <div class="card-header card-header-primary">
                                    <h4 class="card-title">Edit Profile</h4>
                                    <p class="card-category">Complete your profile</p>
                                </div> -->
                                <div class="card-body">
                                    <form method="post" action="">
                                        <div class="row">
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label class="bmd-label-floating">Username</label>
                                                    <input type="text" class="form-control" name="username" value="<?php echo $username ?>" disabled>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label class="bmd-label-floating">Email</label>
                                                    <input type="email" class="form-control" name="email" value="<?php echo $email ?>" disabled>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label class="bmd-label-floating">Password</label>
                                                    <input type="password" class="form-control" name="password" value="<?php echo $password ?>" disabled>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label class="bmd-label-floating">First Name</label>
                                                    <input type="text" class="form-control" name="firstname" value="<?php echo $firstname ?>" disabled>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label class="bmd-label-floating">Middle Name</label>
                                                    <input type="text" class="form-control" name="middlename" value="<?php echo $middlename ?>" disabled>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label class="bmd-label-floating">Last Name</label>
                                                    <input type="text" class="form-control" name="lastname" value="<?php echo $lastname ?>" disabled>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="bmd-label-floating">Birthdate</label>
                                                    <input type="date" class="form-control" name="birthdate" value="<?php echo $birthdate ?>" disabled>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="bmd-label-floating">Phone number</label>
                                                    <input type="text" class="form-control" name="phone_number" value="<?php echo $phone_number ?>" disabled>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label>About Me</label>
                                                    <div class="form-group">
                                                        <label class="bmd-label-floating"> Bionote</label>
                                                        <textarea class="form-control" rows="5" name="bionote" value="<?php echo $bionote ?>" disabled><?php echo $bionote ?></textarea>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="clearfix"></div>
                                    </form>
                                </div>
                            </div>
                        </div>


                        <?php

                        if (isset($_POST['add_achievement'])) {
                            $name = $_POST['name'];
                            $organization = $_POST['organization'];
                            $issued_date = $_POST['issued_date'];
                            $credential_id = $_POST['credential_id'];
                            $credential_url = $_POST['credential_url'];

                            $query = "INSERT INTO user_credibility values(null,'$userid','$name','$organization','$issued_date','$credential_id','$credential_url')";
                            $add_achievement = mysqli_query($connection, $query);
                        }

                        if (isset($_POST['remove_achievement'])) {
                            $id = $_POST['id'];
                            $query = "DELETE FROM user_credibility WHERE id = '$id'";
                            $delete_query = mysqli_query($connection, $query);
                        }
                        ?>

                        <div class="col-md-6">
                            <div class="card">
                                <div class="card-header card-header-primary">
                                    <h4 class="card-title">Achievements</h4>
                                    <!-- <p class="card-category">Complete your profile</p> -->
                                </div>
                                <div class="card-body">

                                    <ul class="collection">

                                        <?php

                                        $query = "SELECT * FROM user_credibility where userid = '$userid'";
                                        $select_credibility = mysqli_query($connection, $query);

                                        while ($row = mysqli_fetch_array($select_credibility)) {
                                            $id = $row['id'];
                                            $name = $row['name'];
                                            $organization = $row['organization'];
                                            $issued_date  = $row['issued_date'];
                                            $credential_id = $row['credential_id'];
                                            $credential_url = $row['credential_url'];


                                        ?>
                                            <li class="collection-item ">
                                                <!-- <span class="title">Title</span> -->
                                                <p><?php echo $name ?> <br>
                                                    <?php echo $organization ?> <br>
                                                    <?php echo $issued_date ?> <br>
                                                    <?php echo $credential_id ?> <br>
                                                    <a href="<?php echo $credential_url ?>">See Credential </a>
                                                </p>

                                            </li>

                                        <?php  } ?>

                                    </ul>
                                </div>
                            </div>
                        </div>


                        <?php

                        if (isset($_POST['add_education'])) {
                            $schoolname = $_POST['schoolname'];
                            $degree = $_POST['degree'];
                            $field_of_study = $_POST['field_of_study'];
                            $start_year = $_POST['start_year'];
                            $end_year = $_POST['end_year'];
                            $grade = $_POST['grade'];

                            $query = "INSERT INTO user_education values(null,'$userid','$schoolname','$degree','$field_of_study','$start_year','$end_year','grade')";
                            $insert_education = mysqli_query($connection, $query);
                        }

                        ?>



                        <div class="col-md-6">
                            <div class="card">
                                <div class="card-header card-header-primary">
                                    <h4 class="card-title">Education</h4>
                                    <!-- <p class="card-category">Complete your profile</p> -->
                                </div>
                                <div class="card-body">

                                    <ul class="collection">


                                        <?php

                                        $query = "SELECT * FROM user_education where userid = '$userid'";
                                        $result = mysqli_query($connection, $query);

                                        while ($row = mysqli_fetch_array($result)) {
                                            $schoolname = $row['schoolname'];
                                            $degree = $row['degree'];
                                            $field_of_study = $row['field_of_study'];
                                            $start_year = $row['start_year'];
                                            $end_year = $row['end_year'];
                                            $grade = $row['grade'];


                                        ?>

                                            <li class="collection-item ">
                                                <!-- <span class="title">Title</span> -->
                                                <p><?php echo $schoolname ?> <br>
                                                    <?php echo $degree ?> <br>
                                                    <?php echo $field_of_study ?> <br>
                                                    <?php echo $start_year ?> - <?php echo $end_year ?><br>

                                                    <?php echo $grade ?>
                                                </p>

                                            </li>

                                        <?php  } ?>


                                    </ul>
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

        document.addEventListener('DOMContentLoaded', function() {
            var elems = document.querySelectorAll('select');
            var instances = M.FormSelect.init(elems, options);
        });

        // Or with jQuery

        $(document).ready(function() {
            $('select').formSelect();
        });
    </script>

</body>

</html>