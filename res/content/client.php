<style>
    .side-tab-container {
        position: fixed;
        top: 40%;
        z-index: 9;
        display: flex;
        flex-direction: column;
    }

    .side-tab {
        width: 150px;
        height: 50px;
        border-radius: 0 25px 25px 0;
        padding: 5px;
        transition: 400ms;
        background-color: #060042;
        display: flex;
        flex-direction: row-reverse;
        align-items: center;
        margin: 2px;
        margin-left: -100px;
    }

    .side-tab:hover {
        margin-left: 0;
    }

    .side-tab-title {
        padding: 10px;
        color: #fff;
        font-size: 20px;
        cursor: pointer;
    }

    .side-tab-icon {
        border-radius: 50%;
        width: 40px;
        height: 40px;
        float: right;
        background-color: #fff;
    }
    .validation:invalid{
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
                            <input type="text" required name="username" id="validation" class="rounded-lg border p-2" ><br><br>
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

<div id="signupModal" class="modal fade" style="top:20%;" role="dialog">
    <div class="modal-dialog">

        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Create New Account</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>

            </div>
            <div class="modal-body px-5 py-3">
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

        </div>

    </div>
</div>