<?php include('includes/header.php') ?>
<?php include('includes/db.php') ?>

<?php include("includes/registerModal.php") ?>
<?php include("includes/loginModal.php") ?>

<body>
    <?php include('includes/nav.php') ?>

    <div class="section no-pad-bot" id="index-banner">
        <div class="container">
            <br><br>
            <h1 class="header center orange-text">TutorHero</h1>
            <div class="row center">
                <h5 class="header col s12 light">A modern way of finding a solution to your Academic Problem</h5>
            </div>
            <div class="row center">
                <a href="#modal2" id="download-button" class="modal-trigger btn-large waves-effect waves-light orange">Get Started</a>
            </div>
            <br><br>

        </div>
    </div>


    <div class="container" style="height:50vh">
        <div class="section">

            <!--   Icon Section   -->
            <div class="row">
                <div class="col s12 m4">
                    <div class="icon-block">
                        <h2 class="center light-blue-text"><i class="material-icons">group</i></h2>
                        <h5 class="center">Find A Tutor</h5>

                        <p class="light">Students around the Philippines can easily find their own tutor in a matter of seconds.</p>
                    </div>
                </div>



                <!-- Modal Trigger -->


                <!-- Modal Structure -->








                <div class="col s12 m4">
                    <div class="icon-block">
                        <h2 class="center light-blue-text"><i class="material-icons">alarm
                            </i></h2>
                        <h5 class="center">Book a Review Session</h5>

                        <p class="light">Students can book an appointment with a tutor of their choice.</p>
                    </div>
                </div>

                <div class="col s12 m4">
                    <div class="icon-block">
                        <h2 class="center light-blue-text"><i class="material-icons">assignment</i></h2>
                        <h5 class="center">Ask a Question</h5>

                        <p class="light">Students can freely post their academic questions and the community will answer it.</p>
                    </div>
                </div>
            </div>

        </div>
        <br><br>
    </div>


    <?php include("includes/footer.php"); ?>

    <!--  Scripts-->
    <script src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
    <script src="./dist/js/materialize.js"></script>
    <script src="./dist/js/init.js"></script>
    <script>
        // document.addEventListener('DOMContentLoaded', function() {
        //     var elems = document.querySelectorAll('.modal');
        //     var instances = M.Modal.init(elems, options);
        // });

        // // Or with jQuery

        $(document).ready(function() {
            $('.modal').modal();
        });


        // document.addEventListener('DOMContentLoaded', function() {
        //     var elems = document.querySelectorAll('.datepicker');
        //     var instances = M.Datepicker.init(elems, options);
        // });

        // // Or with jQuery

        // $(document).ready(function() {
        //     $('.datepicker').datepicker();
        // });

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