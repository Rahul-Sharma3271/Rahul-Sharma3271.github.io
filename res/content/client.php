<style>
    .validation:invalid {
        border: 2px solid red;
    }
</style>

<div class="side-tab-container">
    <div class="side-tab" data-toggle="modal" data-target="#loginModal">
        <div class="side-tab-icon"></div>
        <div class="side-tab-title">Login </div>
    </div>
    <div class="side-tab" data-toggle="modal" data-target="#signupModal">
        <div class="side-tab-icon"></div>
        <div class="side-tab-title">Sign Up
        </div>
    </div>
</div>

<!-- ---------------------------------Log-In------------------------------------------- -->

<div id="loginModal" class="modal fade" role="dialog">
    <div class="modal-dialog">

        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Login</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body p-3">
                <div style="display: flex; flex-direction: row;">
                    <div>
                        <form action="logindb.php" method="POST">
                            <label for="username">Username</label><br>
                            <input type="text" pattern="[a-zA-Z0-9_]{4,}" required name="username" id="validation" class="rounded-lg border p-2">
                            <p class="tooltip2">Must contain 4 characters.Upper-lowercase letters, digits and underscore(_) can be used.</p><br><br>
                            <label for="password">Password</label><br>
                            <input name="password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" type="password" class="rounded-lg border p-2" required>
                            <p class="tooltip2">Must contain atleast one digit and one upper-lowercase letter,atleast 8 digit long.</p><br><br>
                            <button class="btn btn-primary">Login</button>
                            <button class="btn btn-danger" data-dismiss="modal">Cancel</button>
                        </form><br>
                        Forgot Password? <a href="mail/index.php">Click here</a>
                    </div>
                    <div style="width:10
                    
                    0%;display: flex;align-items: center; justify-content: center;">
                        <img src="res/icons/login.png" width="200px" alt="Login">
                    </div>
                </div>


            </div>

        </div>

    </div>
</div>

<!-- --------------------------Sign-UP------------------------------ -->

<div id="signupModal" class="modal fade" role="dialog">
    <div class="modal-dialog">

        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Create New Account</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body px-5 py-3">
                Who you are? <br>
                <select class="mt-2 p-2 rounded-lg" onchange="signup_form_view(this.value)">
                    <option value="">--Select--</option>
                    <option value="student"> A Student </option>
                    <option value="mentor"> A Mentor </option>
                </select>
                <!-- ------------------------------Student-Signup---------------------------------------->

                <div id="student-signup" class="p-2 mt-3 border" style="display:none;">
                    <img src="res/icons/rregister.png" width="80px" alt="Login">
                    <form action="registerdb.php" method="POST">
                        <label for="username">Username</label><br>
                        <input type="text" pattern="[a-zA-Z0-9_]{4,}" name="username" class="rounded-lg border p-2">
                        <p class="tooltip2">Must contain 4 characters.Upper-lowercase letters, digits and underscore(_) can be used.</p>
                        <br><br>
                        <label for="email">E-Mail</label><br>
                        <input name="email" type="email" class="rounded-lg border p-2"><br><br>
                        <label for="password">Password</label><br>
                        <input name="password" type="password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" class="rounded-lg border p-2">
                        <p class="tooltip2">Must contain atleast one digit and one upper-lowercase letter,atleast 8 digit long.</p>
                        
                        <br><br>
                        <button class="btn btn-primary">Signup</button>
                        <button class="btn btn-danger" data-dismiss="modal">Cancel</button>
                    </form>
                </div>

                <!-- ---------------------------------Mentor-Signup------------------------------------ -->

                <div id="mentor-signup" class="p-2 mt-3 border" style="display:none;">
                    <form action="fileupdate_mentor.php" method="POST">
                        <label for="username">Username</label><br>
                        <input type="text" required name="username" pattern="[a-zA-Z0-9_]{4,}" id="validation" class="rounded-lg border p-2">
                        <p class="tooltip2">Must contain 4 characters.Upper-lowercase letters, digits and underscore(_) can be used.</p><br><br>
                        <label for="image" id="img">Image</label><br>
                        <input type="file" accept="image/png,image/jpeg" required name="image" id="validation" class="rounded-lg border p-2"><br><br>
                        <label for="age">Age</label><br>
                        <input type="number" required name="age" id="validation" class="rounded-lg border p-2"><br><br>
                        <label for="email">E-Mail</label><br>
                        <input name="email" type="email" class="rounded-lg border p-2"><br><br>
                        <label for="resume" id="cv">Resume</label><br>
                        <input type="file" accept="application/pdf,image/png,image/jpeg" required name="resume" id="validation" class="rounded-lg border p-2"><br><br>
                        <label for="password">Password</label><br>
                        <input name="password" type="password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" class="rounded-lg border p-2">
                        <p class="tooltip2">Must contain atleast one digit and one upper-lowercase letter,atleast 8 digit long.</p><br><br>
                    </form>
                </div>

            </div>

        </div>

    </div>
</div>