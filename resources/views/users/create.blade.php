<div class="user-create-container">
    <div id="user-create" class="modal">
        <div class="modal-content">
            <span class="close">&times;</span>

            <h1>Create new user</h1>
            <form action="/user" method="POST">
                @csrf
                <input required class="form-input" type="text" name="name" placeholder="Name">

                <div class="form-double-input">
                    <input required class="form-double-item" type="email" name="email" placeholder="Email">

                    <input class="form-double-item" id="b_day" placeholder="Birthday" type="date" name="b_day" required
                        autocomplete="b_day">
                </div>

                <div class="form-double-input">
                    <input required class="form-double-item" type="password" name="password" placeholder="Password"
                        required>

                    <input class="form-double-item" id="password-confirm" placeholder="Password confirmation"
                        type="password" name="password_confirmation" required>
                </div>

                <select class="form-input" name="country">
                    <option value="Portugal">Portugal</option>
                    <option value="US">US</option>
                    <option value="Spain">Spain</option>
                    <option value="France">France</option>
                </select>

                <div class="form-double-input">
                    <div class="radio-button" >
                        <div>
                            <input type="radio" name="gender" value="1"> Male
                        </div>

                        <div>
                            <input type="radio" name="gender" value="0"> Female
                        </div>
                    </div>

                    <div class="radio-button">
                        <div>
                            <input type="radio" name="role" value="admin"> Admin
                        </div>

                        <div>
                            <input type="radio" name="role" value="normal"> Normal
                        </div>
                    </div>
                </div>




                <input class="submit-button" type="submit" value="create">
            </form>
        </div>
    </div>
</div>