<?php

if (isset($_POST['submit'])) {
    $subject = $_POST['subject'];
    $userid = $_SESSION['userid'];

    $query = "INSERT INTO subject_users (subjectid,userid) values('$subject','$userid')";
    $insert_subject = mysqli_query($connection, $query);

    $query1 = "SELECT * FROM subject_topics WHERE id = '$subject'";
    $get_subject = mysqli_query($connection, $query1);


    while ($row = mysqli_fetch_array($get_subject)) {
        $the_id = $row['subjectid'];
    }
    $query2 = "UPDATE subjects SET no_of_tutors = no_of_tutors + 1 WHERE subjectid = '$the_id'";
    mysqli_query($connection, $query2);

    echo "<script>alert('you have successfully added a subject')</script>";
}

?>


<div id="modal1" class="modal" style="width:40%; ">
    <div class="modal-content">
        <h4>Add Subject</h4>

        <form method="POST">
            <div class="row">
                <div class="input-field col s12">
                    <select required name="subject">
                        <option value="" disabled selected>Choose subject</option>
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
            </div>

    </div>
    <div class="modal-footer">
        <a href="#!" class="modal-close waves-effect waves-green btn-flat">Cancel</a>
        <button type="submit" name="submit" class="btn btn-primary">Add</button>
        </form>
    </div>
</div>