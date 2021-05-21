<?php include("./includes/header.php") ?>

<body class="">
    <div class="wrapper ">
        <?php include("./includes/sidebar.php") ?>
        <div class="main-panel">
            <!-- Navbar -->
            <?php include("./includes/nav.php") ?>
            <!-- End Navbar -->
            <div class="content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-header card-header-primary">
                                    <h4 class="card-title ">Subjects Table</h4>
                                    <p class="card-category"> Here is the list of all subjects</p>
                                </div>
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <div class="table-responsive">
                                            <div id="grid_table"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
            <?php include("./includes/footer.php") ?>
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

                <!-- <li class="header-title">Want more components?</li>
            <li class="button-container">
                <a href="https://www.creative-tim.com/product/material-dashboard-pro" target="_blank" class="btn btn-warning btn-block">
                  Get the pro version
                </a>
            </li> -->


            </ul>
        </div>
    </div>
    <!--   Core JS Files   -->
    <?php include("./includes/corejs.php") ?>



    <script>
        var v = document.getElementById("subjects");
        v.className += " active";
    </script>

    <script src="jsGridScript/fetch_subjects.js"></script>


</body>

</html>