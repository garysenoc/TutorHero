<?php


if (isset($_POST['submit'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $firstname = $_POST['firstname'];
    $middlename = $_POST['middlename'];
    $lastname = $_POST['lastname'];
    $birthday = $_POST['birthday'];
    $role = $_POST['role'];
    $phone = $_POST['phone'];
    $email = $_POST['email'];


    $query = "INSERT INTO users values(null,'$username','$password','$firstname','$middlename','$lastname','$birthday','$role','','$phone','$email')";
    $create_user_query = mysqli_query($connection, $query);
    echo "<script>alert('Your account has been created')</script>";
}

?>


<div id="modal1" class="modal" style="width:40%; height:300%;">
    <div class="modal-content">
        <h4>Register</h4>

        <div class="row">
            <form class="col s12" method="POST">
                <div class="row">
                    <div class="input-field col s6">
                        <i class="material-icons prefix">account_circle</i>
                        <input id="last_name" type="text" class="validate" name="username" required>
                        <label for="last_name">Username</label>
                    </div>
                    <div class="input-field col s6">
                        <i class="material-icons prefix">lock_outline</i>
                        <input id="last_name" type="password" class="validate" name="password" required>
                        <label for="last_name">Password</label>
                    </div>
                </div>
                <div class="row">
                    <div class="input-field col s4">
                        <input id="password" type="text" class="validate" name="firstname" required>
                        <label for="password">Firstname</label>
                    </div>
                    <div class="input-field col s4">
                        <input id="password" type="text" class="validate" name="middlename">
                        <label for="password">Middlename</label>
                    </div>
                    <div class="input-field col s4">
                        <input id="password" type="text" class="validate" name="lastname" required>
                        <label for="password">Lastname</label>
                    </div>
                </div>
                <div class="row">
                    <div class="input-field col s6">
                        <input type="date" id="birthday" name="birthday" required>
                        <label for="password">Birthdate</label>
                    </div>
                    <div class="input-field col s6">
                        <select required name="role">
                            <option value="" disabled selected>Choose your role</option>
                            <option value="tutor">Tutor</option>
                            <option value="tutee">Tutee</option>
                        </select>
                        <label>Role</label>
                    </div>
                </div>
                <div class="row">
                    <div class="input-field col s6">
                        <i class="material-icons prefix">local_phone</i>
                        <input id="password" type="text" name="phone" class="validate">
                        <label for="password">Phone</label>
                    </div>
                    <div class="input-field col s6">
                        <i class="material-icons prefix">email</i>
                        <input id="email" type="email" name="email" class="validate">
                        <label for="password">Email</label>
                    </div>
                </div>

        </div>
    </div>
    <div class="modal-footer">
        <a href="#!" class="modal-close waves-effect waves-green btn-flat">Cancel</a>
        <button type="submit" name="submit" class="btn btn-primary">Register</button>
        </form>
    </div>
</div>