<?php
session_start();

if (!isset($_SESSION['logged']))
    header("location: ../user.php");

if ($_SESSION["logged"] !== "teacher")
    header("location: ../user.php");

include_once "../res/com/conn.php";

$username = $_SESSION["username"];
$data = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM `teachers` WHERE username='$username'"));

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <base href="../">
    <?php include_once "../res/com/main.html"; ?>
    <title><?php echo $data['name']; ?> - Teacher</title>
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
        $age = $_POST["age"];
        $user = $data['username'];
        if ($upload && mysqli_query($conn, "UPDATE `teachers` SET`name`='$name',`email`='$email',`phone`='$contact',`age`='$age' WHERE `username`='$user'"))
            echo '<div class="alert alert-success m-4">Changed Successfully.<a href="teachers/">Refresh</a> to take effect.</div>';
        else
            echo '<div class="alert alert-danger m-4">Something went wrong.</div>';
        $exe = "view(['edit-profile'])";
    } else if (array_key_exists("add-result", $_POST)) {
        $date = $_POST['date'];
        $student = $_POST['student'];
        $marks = $_POST['marks'];
        $attendance = $_POST['attendance'];
        $teacher = $data['username'];
        if(mysqli_query($conn,"INSERT INTO `test`(`date`,`teacher`,`student`,`marks`,`attendance`) VALUES('$date','$teacher','$student','$marks','$attendance')")) echo "<div class=\"alert alert-success m-4\">Result Added</div>";
        else echo '<div class="alert alert-danger m-4">Something went wrong</div>';
        $exe = "view(['analytics'])";
    } else if (array_key_exists("remove-result", $_POST)) {
        $id = $_POST['id'];
        if (!mysqli_query($conn, "DELETE FROM `test` WHERE `id`='$id'")) echo '<div class="alert alert-danger m-4">Something went wrong</div>';
        $exe = "view(['analytics'])";
    }  else if (array_key_exists("update-marks", $_POST)) {
        $id = $_POST['id'];
        $marks = $_POST['marks'];
        if (!mysqli_query($conn, "UPDATE `test` SET `marks`='$marks' WHERE `id`='$id'")) echo '<div class="alert alert-danger m-4">Something went wrong</div>';
        $exe = "view(['analytics'])";
    }
    ?>
    <div class="view" id="profile">
        <div class="profile-card" style="box-shadow: none;margin:20px 0;">
            <div class="profile-img" style="background-image:url('teachers/images/<?php echo $data['username']; ?>.jpg');"></div>
            <div>
                <h3><?php echo $data['name']; ?></h3>
                <form class="d-inline m-1" method="post">
                    <button class="btn btn-danger mr-3" name="logout">Logout</button>
                </form>
                <div class="btn-group m-1">
                    <button class="btn btn-success" onclick="view(['edit-profile'])">Edit Profile</button>
                    <button class="btn btn-success" onclick="view(['analytics'])">Analytics</button>
                </div>
                <br><br>
                <div style="font-size: 17px;">
                    <b>Status: <?php if ($data['approved']) echo "<span class='text-success'>Approved</span>";
                                else echo "<span class='text-danger'>Pending</span>"; ?></b><br>
                    Username: <b><?php echo $data['username']; ?></b> <br>
                    Email: <b><?php echo $data['email']; ?></b><br>
                    Age: <b><?php echo $data['age']; ?></b><br>
                    Phone No.: <b><?php echo $data['phone']; ?></b><br><br>
                </div>
            </div>
        </div>
    </div>

    <div class="view" id="edit-profile">
        <button class="btn btn-primary float-right" onclick="view(['profile'])">Back to Profile</button>
        <br><br>
        <?php if ($data["approved"]) { ?>
            <div class="d-flex justify-content-center">
                <form method="POST" enctype="multipart/form-data" style="min-width:300px;">
                    <h3 class="text-center">Edit Profile</h3>
                    <div class="profile-img" style="background-image:url('teachers/images/<?php echo $data['username']; ?>.jpg');margin:10px auto;"></div>
                    <input type="file" accept="image/png,image/jpeg" name="image" id="image" class="rounded-lg border p-2" hidden>
                    <label for="image" class="btn btn-success w-100">Change Image</label><br>
                    Name<br>
                    <input type="text" name="name" class="rounded-lg border p-2 w-100" value="<?php echo $data['name']; ?>" required><br>
                    Age<br>
                    <input type="number" required name="age" class="rounded-lg border p-2 w-100" value="<?php echo $data['age']; ?>"><br><br>
                    E-Mail<br>
                    <input name="email" type="email" class="rounded-lg border p-2 w-100" value="<?php echo $data['email']; ?>" required><br><br>
                    Contact No.<br>
                    <input type="tel" pattern="^[0-9]{10}$" maxlength="10" name="contact" value="<?php echo $data['phone']; ?>" class="rounded-lg border p-2 w-100" required><br><br>
                    <input class="btn btn-primary w-100" type="submit" name="update-profile" value="Done">
                </form><br>
            </div>
        <?php } else echo "<h4>Only approved Teachers can do this action</h4 >"; ?>
    </div>

    <div id="analytics" class="p-4 view">
        <button class="btn btn-primary float-right" onclick="view(['profile'])">Back to Profile</button>
        <br><br>
        <?php if ($data["approved"]) { ?>
            <h3>Analytics</h3>
            <br>
            <form method="post">
                <h4>Add Marks</h4>
                <div class="d-flex flex-wrap border p-2">
                    <div class="m-2">
                        Date <br> <input type="date" name="date" required>
                    </div>
                    <div class="m-2">
                        Teacher Username <br> <input type="text" value="<?php echo $data['username'] ?>" disabled>
                    </div>
                    <div class="m-2">
                        Student Username <br> <input name="student" type="text" required>
                    </div>
                    <div class="m-2">
                        Marks <br> <input name="marks" type="text" required>
                    </div>
                    <div class="m-2">
                        Attendance <br> <select name="attendance" class="p-1">
                            <option value="Present">Present</option>
                            <option value="Absent">Absent</option>
                        </select>
                    </div>
                    <div class="d-flex align-items-end">
                        <button type="submit" class="btn btn-success my-2" name="add-result">Add Result</button>
                    </div>
                </div>
            </form>
            <br>
            <h4>All Your Marks</h4>
            <div style="max-width: 100%;overflow:auto;">
                <table>
                    <th>Test Id</th>
                    <th>Date</th>
                    <th>Student</th>
                    <th>Teacher</th>
                    <th>Marks</th>
                    <th>Attendance</th>
                    <th>Action</th>
                    <?php
                    $teacher = $data['username'];
                    $result = mysqli_query($conn, "SELECT * FROM `test` WHERE `teacher`='$teacher'");
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
                            <td>
                                <form method="post">
                                    <input type="text" style="width:80px;" name="marks" value="<?php echo $row['marks']; ?>">
                                    <input type="text" name="id" hidden value="<?php echo $row['id']; ?>">
                                    <button class="btn btn-primary btn-sm my-1" name="update-marks">Modify</button>
                                </form>
                            </td>
                            <td><?php echo $row['attendance'];
                                ?></td>
                            <td>
                                <form method="post">
                                    <input type="text" name="id" hidden value="<?php echo $row['id']; ?>">
                                    <button class="btn btn-danger btn-sm w-100" name="remove-result">Delete</button>
                                </form>
                            </td>
                        </tr>
                    <?php } ?>
                </table>
            </div>
        <?php } else echo "<h4>Only approved Teachers can do this action.</h4>"; ?>

    </div>


    <?php include_once "../res/com/footer.html" ?>

    <script src="res/js/main.js"></script>
    <script>
        <?php echo $exe; ?>
    </script>
</body>

</html>