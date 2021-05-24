<div id="modal1" class="modal" style="width:40%;  max-height: 52%;
            overflow-y: auto; ">
    <div class="modal-content">
        <h4>Add Subject</h4>

        <form method="POST">
            <div class="row">
                <div class="input-field col s6">
                    <select required name="role">
                        <option value="" disabled selected>Choose subject</option>
                        <option value="tutor">Tutor</option>
                        <option value="tutee">Tutee</option>
                    </select>
                    <label>Subject</label>
                </div>
                <div class="input-field col s6">
                    <input type="date">
                    <label>Date</label>
                </div>
            </div>
            <div class="row">
                <div class="input-field col s6">
                    <input type="time">
                    <label>Subject</label>
                </div>
                <div class="input-field col s6">
                    <input type="time">
                    <label>Date</label>
                </div>
            </div>

    </div>
    <div class="modal-footer">
        <a href="#!" class="modal-close waves-effect waves-green btn-flat">Cancel</a>
        <button type="submit" name="submit" class="btn btn-primary">Add</button>
        </form>
    </div>
</div>