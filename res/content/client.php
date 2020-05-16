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


<div id="loginModal" class="modal fade" style="top:20%;" role="dialog">
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
                            <input type="text" required name="username" id="validation" class="rounded-lg border p-2"><br><br>
                            <label for="password">Password</label><br>
                            <input name="password" type="password" class="rounded-lg border p-2"><br><br>
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

        <div class="modal-content" style="overflow-y:scroll;">
            <div class="modal-header">
                <h4 class="modal-title">Create New Account</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body px-5 py-3">
                Who you are? <br>
                <select class="mt-2 p-2 rounded-lg" onchange="signup_form_view(this.value)">
                    <option value="">--Select--</option>
                    <option value="student">A Student</option>
                    <option value="mentor">A Mentor</option>
                </select>

                <div id="student-signup" class="p-2 mt-3 border" style="display:none;">
                    <img src="res/icons/rregister.png" width="80px" alt="Login">
                    <form action="registerdb.php" method="POST">
                        <label for="username">Username</label><br>
                        <input type="text" name="username" class="rounded-lg border p-2"><br><br>
                        <label for="email">E-Mail</label><br>
                        <input name="email" type="email" class="rounded-lg border p-2"><br><br>
                        <label for="password">Password</label><br>
                        <input name="password" type="password" class="rounded-lg border p-2">
                        <br><br>
                        <button class="btn btn-primary">Signup</button>
                        <button class="btn btn-danger" data-dismiss="modal">Cancel</button>
                    </form>
                </div>

                <div id="mentor-signup" class="p-2 mt-3 border" style="display:none;">
                    <p>Form For Mentor</p>
                </div>

            </div>

        </div>

    </div>
</div>