<?php
session_start();

if (!isset($_SESSION['logged']))
    header("location: ../user.php");

if ($_SESSION["logged"] !== "student")
    header("location: ../user.php");

include_once "../res/com/conn.php";

$username = $_SESSION["username"];
$data = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM `students` WHERE username='$username'"));

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <base href="../">
    <?php include_once "../res/com/main.html"; ?>
    <title><?php echo $data['name']; ?> - Student</title>
    <style>
        .view {
            margin: 20px 10%;
        }
    </style>
</head>

<body>
    <?php
    include_once "../res/com/header.html";
    $exe = "view(['profile'])";
    if (array_key_exists("logout", $_POST)) {
        session_destroy();
        header("location: ../user.php");
    } else if (array_key_exists("update-profile", $_POST)) {
        $upload = true;
        if (is_uploaded_file($_FILES['image']['tmp_name'])) {
            if (pathinfo($_FILES['image']['name'], PATHINFO_EXTENSION) !== 'jpg')
                echo '<div class="alert alert-danger m-4">Uploaded Image must be a JPG file.</div>';
            else {
                if (move_uploaded_file($_FILES['image']['tmp_name'], "images/" . $username . ".jpg")) $upload = true;
                else $upload = false;
            }
        }
        $name = $_POST["name"];
        $email = $_POST["email"];
        $contact = $_POST["contact"];
        $user = $data['username'];
        if ($upload && mysqli_query($conn, "UPDATE `students` SET`name`='$name',`email`='$email',`phone`='$contact' WHERE `username`='$user'"))
            echo '<div class="alert alert-success m-4">Changed Successfully.<a href="teachers/">Refresh</a> to take effect.</div>';
        else
            echo '<div class="alert alert-danger m-4">Something went wrong.</div>';
        $exe = "view(['edit-profile'])";
    } else if (array_key_exists("remove-img", $_POST)) {
        if (unlink("images/" . $data['username'] . ".jpg")) echo "<div class=\"alert alert-success m-4\">Profile Picture Removed.</div>";
        else echo "<div class=\"alert alert-danger m-4\">Something went wrong.</div>";
    }
    ?>
    <div class="view" id="profile">
        <div class="profile-card" style="box-shadow: none;margin:20px 0;">
            <div class="profile-img" style="background-image:url('students/images/<?php if (file_exists('images/' . $data['username'] . '.jpg')) echo $data['username'] . '.jpg';else echo 'default.jpg'; ?>');"></div>
            <div>
                <h3><?php echo $data['name']; ?></h3>
                <form class="d-inline m-1" method="post">
                    <button class="btn btn-danger mr-3" name="logout">Logout</button>
                </form>
                <div class="btn-group m-1">
                    <button class="btn btn-success" onclick="view(['edit-profile'])">Edit Profile</button>
                    <button class="btn btn-success" onclick="view(['analytics'])">Results</button>
                </div>
                <br><br>
                <div style="font-size: 17px;">
                    Username: <b><?php echo $data['username']; ?></b> <br>
                    Email: <b><?php echo $data['email']; ?></b><br>
                    Phone No.: <b><?php echo $data['phone']; ?></b><br><br>
                </div>
            </div>
        </div>
    </div>

    <div class="view" id="edit-profile">
        <button class="btn btn-primary float-right" onclick="view(['profile'])">Back to Profile</button>
        <br><br>
        <div class="d-flex justify-content-center">
            <form method="POST" enctype="multipart/form-data" style="min-width:300px;">
                <h3 class="text-center">Edit Profile</h3>
                <div class="profile-img" style="background-image:url('students/images/<?php if (file_exists('images/' . $data['username'] . '.jpg')) echo $data['username'] . '.jpg';else echo 'default.jpg'; ?>');margin:10px auto;"></div>
                <input type="file" accept="image/png,image/jpeg" name="image" id="image" class="rounded-lg border p-2" hidden>
                <div class="btn-group w-100">
                    <label for="image" class="btn btn-success">Change</label>
                    <label for="remove-img" class="btn btn-danger">Remove</label>
                </div>
                <button id="remove-img" name="remove-img" hidden>Remove</button>
                Name<br>
                <input type="text" name="name" class="rounded-lg border p-2 w-100" value="<?php echo $data['name']; ?>" required><br>
                E-Mail<br>
                <input name="email" type="email" class="rounded-lg border p-2 w-100" value="<?php echo $data['email']; ?>" required><br><br>
                Contact No.<br>
                <input type="tel" pattern="^[0-9]{10}$" maxlength="10" name="contact" value="<?php echo $data['phone']; ?>" class="rounded-lg border p-2 w-100" required><br><br>
                <input class="btn btn-primary w-100" type="submit" name="update-profile" value="Done">
            </form><br>
        </div>
    </div>

    <div id="analytics" class="p-4 view">
        <button class="btn btn-primary float-right" onclick="view(['profile'])">Back to Profile</button>
        <br><br>
        <h4>Your Results</h4>
        <div style="max-width: 100%;overflow:auto;">
            <table>
                <th>Test Id</th>
                <th>Date</th>
                <th>Student</th>
                <th>Teacher</th>
                <th>Marks</th>
                <th>Attendance</th>
                <?php
                $student = $data['username'];
                $result = mysqli_query($conn, "SELECT * FROM `test` WHERE `student`='$student'");
                while ($row = mysqli_fetch_assoc($result)) {
                ?>
                    <tr>
                        <td><?php echo $row['id'];
                            ?></td>
                        <td><?php echo $row['date'];
                            ?></td>
                        <td><?php echo $row['student'];
                            ?></td>
                        <td><?php echo $row['teacher'];
                            ?></td>
                        <td><?php echo $row['marks'];
                            ?></td>
                        <td><?php echo $row['attendance'];
                            ?></td>
                    </tr>
                <?php } ?>
            </table>
        </div>

    </div>


    <?php include_once "../res/com/footer.html" ?>

    <script src="res/js/main.js"></script>
    <script>
        <?php echo $exe; ?>
    </script>
</body>

</html>