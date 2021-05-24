<?php

if (isset($_POST['add_time'])) {
    $topic = $_POST['topic'];
    $date = $_POST['date'];
    $timeend = $_POST['timeend'];
    $timestart = $_POST['timestart'];
    $userid = $_SESSION['userid'];

    $query = "INSERT INTO users_available_time VALUES(null,'$topic','$date','$timestart','$timeend','$userid')";
    $insert_available_time = mysqli_query($connection, $query);

    echo "<script>alert('You have successfully added new available time')</script>";
}

?>




<div id="modal1" class="modal" style="width:40%;  max-height: 52%;
            overflow-y: auto; ">
    <div class="modal-content">
        <h4>Add Available Time</h4>

        <form method="POST" action="">
            <div class="row">
                <div class="input-field col s6">
                    <select required name="topic">


                        <option value="" disabled selected>Choose subject</option>
                        <?php
                        $query = "SELECT * FROM subject_topics";
                        $result = mysqli_query($connection, $query);

                        while ($row = mysqli_fetch_array($result)) {
                            $subjectid = $row['id'];
                            $topic = $row['topic'];
                            echo "<option value='$subjectid'>$topic</option>";
                        }
                        ?>
                    </select>
                    <label>Subject</label>
                </div>
                <div class="input-field col s6">
                    <input type="date" name="date">
                    <label>Date</label>
                </div>
            </div>
            <div class="row">
                <div class="input-field col s6">
                    <input type="time" name="timestart">
                    <label>Time Start</label>
                </div>
                <div class="input-field col s6">
                    <input type="time" name="timeend">
                    <label>Time end</label>
                </div>
            </div>

    </div>
    <div class="modal-footer">
        <a href="#!" class="modal-close waves-effect waves-green btn-flat">Cancel</a>
        <button type="submit" name="add_time" class="btn btn-primary">Add</button>
        </form>
    </div>
</div>