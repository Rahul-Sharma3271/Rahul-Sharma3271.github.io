<?php
		include_once "res/content/main.php";
?>
 <div id="mentor-signup" class="p-2 mt-3 border" style="display:none;">
                    <form action="fileupdate_mentor.php" method="POST">
                            <label for="username">Username</label><br>
                            <input type="text" required name="username" id="validation" class="rounded-lg border p-2"><br><br>
                            <label for="image" id="img">Image</label><br>
                            <input type="text" required name="image" id="validation" class="rounded-lg border p-2"><br><br>
                            <label for="age">Age</label><br>
                            <input type="text" required name="age" id="validation" class="rounded-lg border p-2"><br><br>
                            <label for="resume" id="cv">Resume</label><br>
                            <input type="text" required name="resume" id="validation" class="rounded-lg border p-2"><br><br>
                            <label for="password">Password</label><br>
                            <input name="password" type="password" class="rounded-lg border p-2"><br><br>
                    </form>
                </div>