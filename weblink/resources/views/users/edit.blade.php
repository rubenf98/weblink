<div class="user-edit-container">
    <div id="user-edit" class="modal">
        <div class="modal-content">
            <span class="closeUserEdit">&times;</span>

            <h1>Edit user</h1>
            <form id="user-edit-form" method="POST" enctype="multipart/form-data">
                @method('PUT')
                @csrf

                <input id="user-edit-name" required class="form-input" type="text" name="name" placeholder="Name">

                <div class="form-double-input">
                    <input id="user-edit-email" required class="form-double-item" type="email" name="email" placeholder="Email">

                    <input id="user-edit-b_day" class="form-double-item" id="b_day" placeholder="Birthday" type="date" name="b_day" required
                        autocomplete="b_day">
                </div>

                <select id="user-edit-country" class="form-input" name="country">
                    <option value="Portugal">Portugal</option>
                    <option value="US">US</option>
                    <option value="Spain">Spain</option>
                    <option value="France">France</option>
                </select>

                <div class="form-double-input">
                    <div class="radio-button" >
                        <div>
                            <input id="user-edit-gender-male" type="radio" name="gender" value="1"> Male
                        </div>

                        <div>
                            <input id="user-edit-gender-female" type="radio" name="gender" value="0"> Female
                        </div>
                    </div>

                    <div class="radio-button">
                        <div>
                            <input id="user-edit-role-admin" type="radio" name="role" value="admin"> Admin
                        </div>

                        <div>
                            <input id="user-edit-role-normal" type="radio" name="role" value="normal"> Normal
                        </div>
                    </div>
                </div>

                <input class="submit-button" type="submit" value="update">
            </form>
        </div>
    </div>
</div>