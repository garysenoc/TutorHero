<?php


if (isset($_POST['login'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $query = "SELECT * FROM users WHERE username = '$username' OR email='$username' AND password = '$password'";
    $select_users = mysqli_query($connection, $query);






    if (mysqli_num_rows($select_users) > 0) {

        $query = "SELECT * FROM users WHERE username = '$username' OR email='$username' AND password = '$password'";
        $select_user_query = mysqli_query($connection, $query);


        while ($row = mysqli_fetch_assoc($select_user_query)) {
            $userid = $row['userid'];
            $username = $row['username'];
            $firstname = $row['firstname'];
            $role = $row['role'];

            $_SESSION['userid'] = $userid;
            $_SESSION['username'] = $username;
            $_SESSION['firstname'] = $firstname;
            $_SESSION['role'] = $role;
        }


        if ($role == 'tutor') {
            echo "<script>
            Swal.fire(
              'Good job!',
              'You clicked the button!',
              'success'
            );
           location.replace('./answerquestion.php');
            </script>";
        } else {

            echo "<script>
            Swal.fire(
              'Good job!',
              'You clicked the button!',
              'success'
            );
           location.replace('../user/askaquestion.php');
            </script>";
        }

        echo "<script>
        Swal.fire(
          'Good job!',
          'You clicked the button!',
          'success'
        );
       location.replace('answerquestion.php');
        </script>";
    } else {
        echo "<script>
        Swal.fire({
            icon: 'error',
            title: 'Oops...',
            text: 'Incorrect Username / Password',
          })
        </script>";
    }
}

?>


<div id="modal2" class="modal" style="width:30%;">
    <div class="modal-content">
        <h4>Login</h4>

        <div class="row">
            <form class="col s12" method="post" action="">

                <div class="row">
                    <div class="input-field col s12">
                        <i class="material-icons prefix">account_circle</i>
                        <input id="first_name" name="username" type="text" class="validate">
                        <label for="password">Username or Email</label>
                    </div>
                </div>
                <div class="row">
                    <div class="input-field col s12">
                        <i class="material-icons prefix">lock_outline</i>
                        <input id="password" name="password" type="password" class="validate">
                        <label for="password">Password</label>
                    </div>
                </div>

        </div>
    </div>
    <div class="modal-footer">
        <a href="#!" class="modal-close waves-effect waves-green btn-flat">Cancel</a>
        <button class="btn btn-primary" type="submit" name="login">Login</button>
        </form>
    </div>
</div>