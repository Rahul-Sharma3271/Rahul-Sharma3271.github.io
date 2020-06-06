<?php
include_once "res/content/main.php";
?>
<div id="mentor-signup" class="p-2 mt-3 border" style="display:none;">
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