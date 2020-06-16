<?php
session_start();
error_reporting(0);
if (isset($_SESSION['logged']) && $_SESSION["logged"] == "student")
    header("location: students/");
if (isset($_SESSION['logged']) && $_SESSION["logged"] == "teacher")
    header("location: teachers/");
if (isset($_SESSION['logged']) && $_SESSION["logged"] == "admin")
    header("location: admin/");
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ITI - Invention to Inovation</title>
    <style>
        .wrapper {
            min-height: 100vh;
            width: 100%;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .hidden-inp {
            opacity: 0;
            width: 0;
            height: 0;
        }
    </style>
    <?php include_once "res/com/main.html"; ?>
</head>

<body>
    <?php
    include_once "res/com/header.html";
    include_once "res/com/conn.php";
    ?>

    <?php
    $exe = "view(['student-login'])";
    if (array_key_exists("student-login", $_POST)) {
        $username = $_POST['username'];
        if (mysqli_num_rows(mysqli_query($conn, "SELECT `username` FROM `students` WHERE username='$username'")) < 1) {
            echo '<div class="alert alert-warning m-4">No User Found</div>';
        } else {
            if (mysqli_fetch_assoc(mysqli_query($conn, "SELECT `password` FROM `students` WHERE username='$username'"))['password'] == hash("sha256", $_POST['password'])) {

                $_SESSION["logged"] = "student";
                $_SESSION["username"] = $username;
                header("location: students/");
            } else
                echo '<div class="alert alert-danger m-4">Wrong Password</div>';
        }
        $exe = "view(['student-login'])";
    } else if (array_key_exists("teacher-login", $_POST)) {
        $username = $_POST['username'];
        if (mysqli_num_rows(mysqli_query($conn, "SELECT `username` FROM `teachers` WHERE username='$username'")) < 1) {
            echo '<div class="alert alert-warning m-4">No User Found</div>';
        } else {
            if (mysqli_fetch_assoc(mysqli_query($conn, "SELECT `password` FROM `teachers` WHERE username='$username'"))['password'] == hash("sha256", $_POST['password'])) {

                $_SESSION["logged"] = "teacher";
                $_SESSION["username"] = $username;
                header("location: teachers/");
            } else
                echo '<div class="alert alert-danger m-4">Wrong Password</div>';
        }
        $exe = "view(['teacher-login'])";
    } else if (array_key_exists("student-signup", $_POST)) {
        $username = $_POST['username'];
        if (mysqli_num_rows(mysqli_query($conn, "SELECT `username` FROM `students` WHERE username='$username'")) > 0) {
            echo '<div class="alert alert-warning m-4">Username Already Taken. Try Another</div>';
        } else {
            $name = $_POST["name"];
            $email = $_POST["email"];
            $contact = $_POST["contact"];
            $password = hash("sha256", $_POST['password']);
            if (mysqli_query($conn, "INSERT INTO `students`(`username`,`password`,`email`,`name`,`phone`) VALUES('$username','$password','$email','$name','$contact')"))
                echo '<div class="alert alert-success m-4"> Account Created Successfully.</div>';
            else
                echo '<div class="alert alert-danger m-4">Something went wrong.</div>';
        }
        $exe = "view(['student-signup'])";
    } else if (array_key_exists("teacher-signup", $_POST)) {
        $username = $_POST['username'];
        if (mysqli_num_rows(mysqli_query($conn, "SELECT `username` FROM `teachers` WHERE username='$username'")) > 0) {
            echo '<div class="alert alert-warning m-4">Username Already Taken. Try Another</div>';
        } else {
            $submit = true;
            if (pathinfo($_FILES['image']['name'], PATHINFO_EXTENSION) !== 'jpg'){
                echo '<div class="alert alert-danger m-4">Uploaded Image must be a JPG file.</div>';
                $submit = false;
            }
            if (pathinfo($_FILES['resume']['name'], PATHINFO_EXTENSION) !== 'pdf'){
                echo '<div class="alert alert-danger m-4">Uploaded Resume must be a PDF file.</div>';
                $submit = false;
            }
            if ($submit == true) {
                $name = $_POST["name"];
                $email = $_POST["email"];
                $contact = $_POST["contact"];
                $age = $_POST["age"];
                $password = hash("sha256", $_POST['password']);
                if (move_uploaded_file($_FILES['image']['tmp_name'], "teachers/images/" . $username . ".jpg") && move_uploaded_file($_FILES['resume']['tmp_name'], "teachers/resumes/" . $username . ".pdf") && mysqli_query($conn, "INSERT INTO `teachers`(`username`,`password`,`name`,`email`,`phone`,`age`) VALUES('$username','$password','$name','$email','$contact','$age')"))
                    echo '<div class="alert alert-success m-4"> Account Created Successfully.</div>';
                else
                    echo '<div class="alert alert-danger m-4">Something went wrong.</div>';
            }
        }
        $exe = "view(['teacher-signup'])";
    } else if (array_key_exists("student-forgot", $_POST)) {
        $username = $_POST['username'];
        if (mysqli_num_rows(mysqli_query($conn, "SELECT `username` FROM `students` WHERE username='$username'")) < 1) {
            echo '<div class="alert alert-warning m-4">No User Found</div>';
            $exe = "view(['student-forgot'])";
        } else {
            $_SESSION["vc"] = $vc = rand(100000, 999999);
            $_SESSION['username'] = $username;
            include_once "res/com/mail.php";
            if (send_mail(mysqli_fetch_assoc(mysqli_query($conn, "SELECT `email` FROM `students` WHERE username='$username'"))["email"], "Password Recovery - ITI.com", "Dear user,<br>Your OTP is:<h2>" . $vc . "</h2>Thanks,<br>ITI Team")) {
                echo '<div class="alert alert-success m-4">Verification Code has been sent to your Email Address</div>';
                $exe = 'view(["student-submit-reset"])';
            } else {
                echo '<div class="alert alert-danger m-4">Something went Wrong.</div>';
                $exe = "view(['student-forgot'])";
            }
        }
    } else if (array_key_exists("teacher-forgot", $_POST)) {
        $username = $_POST['username'];
        if (mysqli_num_rows(mysqli_query($conn, "SELECT `username` FROM `teachers` WHERE username='$username'")) < 1) {
            echo '<div class="alert alert-warning m-4">No User Found</div>';
            $exe = "view(['teacher-forgot'])";
        } else {

            $_SESSION["vc"] = $vc = rand(100000, 999999);
            $_SESSION['username'] = $username;
            include_once "res/com/mail.php";
            if (send_mail(mysqli_fetch_assoc(mysqli_query($conn, "SELECT `email` FROM `teachers` WHERE username='$username'"))["email"], "Password Recovery - ITI.com", "Dear user,<br>Your OTP is:<h2>" . $vc . "</h2>Thanks,<br>ITI Team")) {
                echo '<div class="alert alert-success m-4">Verification Code has been sent to your Email Address</div>';
                $exe = 'view(["teacher-submit-reset"])';
            } else{
                echo '<div class="alert alert-danger m-4">Something went Wrong.</div>';
                $exe = "view(['teacher-forgot'])";
            }
        }
    } else if (array_key_exists("student-submit-reset", $_POST)) {
        if ($_POST["otp"] == $_SESSION["vc"]) {
            $password = hash("sha256", $_POST["password"]);
            if (mysqli_query($conn, "UPDATE `students` SET `password`='$password'")){
                echo '<div class="alert alert-success m-4">Password Changed Successfully.</div>';
                $exe = "view(['student-login'])";
            }
            else {
                echo '<div class="alert alert-danger m-4">Something went wrong.</div>';
                $exe = "view(['student-submit-reset'])";
            }
        } else {
            echo '<div class="alert alert-danger m-4">Wrong Verification Code</div>';
            $exe = "view(['student-submit-reset'])";
        }
    } else if (array_key_exists("teacher-submit-reset", $_POST)) {
        if ($_POST["otp"] == $_SESSION["vc"]) {
            $password = hash("sha256", $_POST["password"]);
            if (mysqli_query($conn, "UPDATE `teachers` SET `password`='$password'")) {
                echo '<div class="alert alert-success m-4">Password Changed Successfully.</div>';
                $exe = "view(['teacher-login'])";
            } else {
                echo '<div class="alert alert-danger m-4">Something went wrong.</div>';
                $exe = "view(['teacher-submit-reset'])";
            }
        } else {
            echo '<div class="alert alert-danger m-4">Wrong Verification Code</div>';
            $exe = "view(['teacher-submit-reset'])";
        }
    } else if (array_key_exists("admin", $_POST)) {
        error_reporting(0);
        $username = $_POST['username'];
        if (mysqli_fetch_assoc(mysqli_query($conn, "SELECT `password` FROM `admin` where `username`='$username'"))['password'] == hash("sha256",$_POST['password'])) {
            $_SESSION['logged'] = 'admin';
            $_SESSION['username'] = $username;
            header("location: admin/");
        } else
            echo '<div class="alert alert-danger m-4">Either Username or Password was Incorrect</div>';
        $exe = "view(['admin'])";
    }
    ?>

    </div>
    <div class="wrapper">
        <div class="view" id="student-login">
            <div class="btn-group" style="width: 100%;">
                <button class="btn btn-success">Student</button>
                <button class="btn btn-light" onclick="view(['teacher-login'])">Teacher</button>
            </div>
            <br><br>
            <h4>Student Login</h4>
            <form method="POST">
                Username <br>
                <input type="text" name="username" class="rounded-lg border p-2" required><br><br>
                Password <br>
                <input name="password" type="password" class="rounded-lg border p-2" required><br><br>
                <button class="btn btn-primary w-100" name="student-login" type="submit">Login</button>
            </form><br>
            <a href="javascript:view(['student-forgot'])">Forgot Password</a>. <br>
            <a href="javascript:view(['student-signup'])">Create Account</a>.
        </div>

        <div class="view" id="teacher-login">
            <div class="btn-group" style="width: 100%;">
                <button class="btn btn-light" onclick="view(['student-login'])">Student</button>
                <button class="btn btn-success">Teacher</button>
            </div>
            <br><br>
            <h4>Teacher Login</h4>
            <form method="POST">
                Username<br>
                <input type="text" name="username" class="rounded-lg border p-2" required><br><br>
                Password<br>
                <input name="password" type="password" class="rounded-lg border p-2" required><br><br>
                <button class="btn btn-primary w-100" name="teacher-login" type="submit">Login</button>
            </form><br>
            <a href="javascript:view(['teacher-forgot'])">Forgot Password</a>. <br>
            <a href="javascript:view(['teacher-signup'])">Create Account</a>.
        </div>

        <div class="view" id="teacher-signup">
            <div class="btn-group" style="width: 100%;">
                <button class="btn btn-light" onclick="view(['student-signup'])">Student</button>
                <button class="btn btn-success">Teacher</button>
            </div>
            <br><br>
            <h4>Create Teacher Account</h4>
            <form method="POST" enctype="multipart/form-data">
                Username<br>
                <input type="text" required name="username" pattern="[a-zA-Z0-9_]{4,}" class="rounded-lg border p-2 w-100">
                <p class="tooltip2">Must contain 4 characters.Upper-lowercase letters, digits and underscore(_) can be used.</p><br><br>
                Name<br>
                <input type="text" name="name" class="rounded-lg border p-2 w-100" required><br><br>
                Image<br>
                <input type="file" accept="image/png,image/jpeg" required name="image" id="image" class="rounded-lg border p-2 hidden-inp">
                <label for="image" class="btn btn-secondary w-100">Upload Image</label><br><br>
                Age<br>
                <input type="number" required name="age" class="rounded-lg border p-2 w-100"><br><br>
                E-Mail<br>
                <input name="email" type="email" class="rounded-lg border p-2 w-100" required><br><br>
                Contact No.<br>
                <input type="tel" pattern="^[0-9]{10}$" maxlength="10" name="contact" class="rounded-lg border p-2 w-100" required><br><br>
                Resume<br>
                <input type="file" accept="application/pdf,image/png,image/jpeg" required name="resume" id="resume" class="rounded-lg border p-2 hidden-inp">
                <label for="resume" class="btn btn-secondary w-100">Upload Resume</label><br><br>
                Password<br>
                <input name="password" type="password" required pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" class="rounded-lg border p-2 w-100">
                <p class="tooltip2">Must contain atleast one digit and one upper-lowercase letter,atleast 8 digit long.</p><br><br>
                <button class="btn btn-primary w-100" type="submit" name="teacher-signup">Signup</button>
            </form><br>
            <a href="javascript:view(['teacher-login'])">Login here</a>
        </div>

        <div class="view" id="student-signup">
            <div class="btn-group" style="width: 100%;">
                <button class="btn btn-success">Student</button>
                <button class="btn btn-light" onclick="view(['teacher-signup'])">Teacher</button>
            </div>
            <br><br>
            <h4>Create Student Account</h4>
            <form method="POST">
                Username<br>
                <input type="text" pattern="[a-zA-Z0-9_]{4,}" name="username" class="rounded-lg border p-2 w-100" required>
                <p class="tooltip2">Must contain 4 characters.Upper-lowercase letters, digits and underscore(_) can be used.</p>
                <br><br>
                Name<br>
                <input type="text" name="name" class="rounded-lg border p-2 w-100" required><br><br>
                E-Mail<br>
                <input name="email" type="email" class="rounded-lg border p-2 w-100" required><br><br>
                Contact No.<br>
                <input type="tel" pattern="^[0-9]{10}$" maxlength="10" name="contact" class="rounded-lg border p-2 w-100" required><br><br>
                Password<br>
                <input name="password" type="password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" class="rounded-lg border p-2 w-100" required>
                <p class="tooltip2">Must contain atleast one digit and one upper-lowercase letter,atleast 8 digit long.</p>
                <br><br>
                <button class="btn btn-primary w-100" type="submit" name="student-signup">Signup</button>
            </form><br>
            <a href="javascript:view(['student-login'])">Login here</a>
        </div>

        <div class="view" id="student-forgot">
            <div class="btn-group" style="width: 100%;">
                <button class="btn btn-success">Student</button>
                <button class="btn btn-light" onclick="view(['teacher-forgot'])">Teacher</button>
            </div>
            <br><br>
            <h4>Reset Password</h4>
            <form method="post">
                Username <br>
                <input class="rounded-lg border p-2" type="text" name="username" id="username"><br><br>
                <button type="submit" class="btn btn-primary w-100" name="student-forgot">Send Verification Code</button>
            </form>
            <br><br>
            <a href="javascript:view(['student-login'])">Back</a>
        </div>

        <div class="view" id="teacher-forgot">
            <div class="btn-group" style="width: 100%;">
                <button class="btn btn-light" onclick="view(['student-forgot'])">Student</button>
                <button class="btn btn-success">Teacher</button>
            </div>
            <br><br>
            <h4>Reset Password</h4>
            <form method="post">
                Username <br>
                <input class="rounded-lg p-2 border" type="text" name="username" id="username"><br><br>
                <button type="submit" class="btn btn-primary w-100" name="teacher-forgot">Send Verification Code</button>
            </form>
            <br><br>
            <a href="javascript:view(['teacher-login'])">Back</a>
        </div>

        <div class="view" id="student-submit-reset">
            <h4>Reset Password</h4>
            <form method="post">
                Verification Code <br>
                <input type="number" class="border rounded-lg p-2 w-100" name="otp" id="otp" minlength="6" maxlength="6" required><br><br>
                New Password <br>
                <input name="password" type="password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" class="rounded-lg border p-2 w-100" required>
                <p class="tooltip2">Must contain atleast one digit and one upper-lowercase letter,atleast 8 digit long.</p>
                <br><br>
                <button type="submit" class="btn btn-primary w-100" name="student-submit-reset">Done</button>
            </form>
            <br><br>
            <a href="javascript:view(['student-forgot'])">Back</a>
        </div>

        <div class="view" id="teacher-submit-reset">
            <h4>Reset Password</h4>
            <form method="post">
                Verification Code <br>
                <input type="number" class="border rounded-lg p-2 w-100" name="otp" id="otp" minlength="6" maxlength="6" required><br><br>
                New Password <br>
                <input name="password" type="password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" class="rounded-lg border p-2 w-100" required>
                <p class="tooltip2">Must contain atleast one digit and one upper-lowercase letter,atleast 8 digit long.</p>
                <br><br>
                <button type="submit" class="btn btn-primary w-100" name="teacher-submit-reset">Done</button>
            </form>
            <br><br>
            <a href="javascript:view(['teacher-forgot'])">Back</a>
        </div>

        <div class="view" id="admin">
            <h4>Admin Login</h4>
            <form method="POST">
                Username <br>
                <input type="text" name="username" class="rounded-lg border p-2" required><br><br>
                Password <br>
                <input name="password" type="password" class="rounded-lg border p-2" required><br><br>
                <button class="btn btn-primary w-100" name="admin" type="submit">Login</button>
            </form>
        </div>

    </div>

    <script src="res/js/main.js"></script>

    <?php
    include_once "res/com/footer.html";
    
    if ($_GET['action'] == 'admin')
        $exe = "view(['admin'])";
    ?>
    <script>
view(['student-login']);
        <?php echo $exe; ?>
    </script>
</body>

</html>
