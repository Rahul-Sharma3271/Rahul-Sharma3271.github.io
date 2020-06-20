<?php
session_start();
if (!isset($_SESSION['logged']))
    header("location: ../");
if ($_SESSION["logged"] !== "admin")
    header("location: ../");
include_once "../res/com/conn.php";
$username = $_SESSION["username"];
$data = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM `admin` WHERE username='$username'"));
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <base href="../">
    <?php include_once "../res/com/main.html"; ?>
    <title><?php echo $data['name']; ?> - Admin</title>
    <style>
        .view {
            margin: 20px 10%;
        }
    </style>
</head>

<body>
    <?php
    $exe = "";
    include_once "../res/com/header.html";
    include_once "../res/com/conn.php";
    if (array_key_exists("logout", $_POST)) {
        session_destroy();
        header("location: ../");
    }
    if (array_key_exists("remove-notice", $_POST)) {
        $id = $_POST['id'];
        if (!mysqli_query($conn, "DELETE FROM `notice` WHERE `id`='$id'")) echo '<div class="alert alert-danger m-4">Something went wrong</div>';
    } else if (array_key_exists("add-notice", $_POST)) {
        $notice = $_POST['notice'];
        if (!mysqli_query($conn, "INSERT INTO `notice`(`notice`) VALUE('$notice')")) echo '<div class="alert alert-danger m-4">Something went wrong</div>';
    } else if (array_key_exists("remove-about", $_POST)) {
        $id = $_POST['id'];
        if (!mysqli_query($conn, "DELETE FROM `about` WHERE `id`='$id'"))
            echo '<div class="alert alert-danger m-4">Something went wrong</div>';
        $exe = "view(['about']);";
    } else if (array_key_exists("add-about", $_POST)) {
        $heading = $_POST['heading'];
        $text = $_POST['text'];
        if (is_uploaded_file($_FILES['image']['tmp_name'])) {
            $image = $_FILES['image']['name'];
            if (mysqli_query($conn, "INSERT INTO `about`(`heading`,`text`,`image`) VALUE('$heading','$text','$image')") && move_uploaded_file($_FILES['image']['tmp_name'], "about/images/" . $image))
                echo "";
            else echo '<div class="alert alert-danger m-4">Something went wrong</div>';
        } else {
            if (mysqli_query($conn, "INSERT INTO `about`(`heading`,`text`,`image`) VALUE('$heading','$text','default.jpg')"))
                echo "";
            else echo '<div class="alert alert-danger m-4">Something went wrong</div>';
        }
        $exe = "view(['about']);";
    } else if (array_key_exists("approve-teacher", $_POST)) {
        $id = $_POST['id'];
        if (!mysqli_query($conn, "UPDATE `teachers` SET `approved`=1 WHERE `id`='$id'"))
            echo '<div class="alert alert-danger m-4">Something went wrong</div>';
        $exe = "view(['teachers']);";
    } else if (array_key_exists("disapprove-teacher", $_POST)) {
        $id = $_POST['id'];
        if (!mysqli_query($conn, "UPDATE `teachers` SET `approved`=0  WHERE `id`='$id'"))
            echo '<div class="alert alert-danger m-4">Something went wrong</div>';
        $exe = "view(['teachers']);";
    } else if (array_key_exists("remove-course", $_POST)) {
        $id = $_POST['id'];
        if (!mysqli_query($conn, "DELETE FROM `courses` WHERE `id`='$id'")) echo '<div class="alert alert-danger m-4">Something went wrong</div>';
        $exe = "view(['courses'])";
    } else if (array_key_exists("add-course", $_POST)) {
        $name = $_POST['name'];
        $teacher = $_POST['teacher'];
        if (!mysqli_query($conn, "INSERT INTO `courses`(`name`,`teacher`) VALUE('$name','$teacher')")) echo '<div class="alert alert-danger m-4">Something went wrong</div>';
        $exe = "view(['courses'])";
    }
    ?>

    <div style="margin:20px 10%;">
        <span class="h3"><?php echo $data["name"]; ?></span>
        <form class="float-right" method="post">
            <button class="btn btn-primary">Refresh</button>
            <button class="btn btn-danger" name="logout">Logout</button>
        </form><br><br>
        Username: <b><?php echo $data['username']; ?></b>
        <hr>
    </div>
    <div class="view" id="notice">
        <div class="btn-group">
            <button class="btn btn-success">Notice</button>
            <button class="btn btn-light" onclick="view(['about'])">About</button>
            <button class="btn btn-light" onclick="view(['teachers'])">Teachers</button>
            <button class="btn btn-light" onclick="view(['courses'])">Courses</button>
            <button class="btn btn-light" onclick="view(['payment'])">Payment</button>
        </div><br><br>
        <h3>Add Notice</h3>
        <form method="post">
            <textarea type="text" name="notice" id="notice" rows="2" class="border rounded-lg w-100"></textarea><br>
            <button type="submit" class="btn btn-sm btn-success" name="add-notice">Add Notice</button>
        </form>
        <hr>
        <h3>All Notices</h3>
        <?php
        $result = mysqli_query($conn, "SELECT * FROM `notice`");
        while ($row = mysqli_fetch_assoc($result)) {
        ?>
            <form method="post" class="border p-2 m-1">
                <?php echo "<b>" . $row['id'] . ".</b> &nbsp&nbsp" . $row['notice']; ?>
                <input type="text" name="id" id="id" value="<?php echo $row['id']; ?>" hidden>
                <button type="submit" name="remove-notice" class="btn btn-sm btn-danger float-right" style="margin-top: -3px;">Remove</button>
            </form>
        <?php
        }
        ?>
    </div>
    <div class="view" id="about">
        <div class="btn-group">
            <button class="btn btn-light" onclick="view(['notice'])">Notice</button>
            <button class="btn btn-success">About</button>
            <button class="btn btn-light" onclick="view(['teachers'])">Teachers</button>
            <button class="btn btn-light" onclick="view(['courses'])">Courses</button>
            <button class="btn btn-light" onclick="view(['payment'])">Payment</button>
        </div><br><br>
        <h3>Add Card</h3>
        <form method="post" class="about-card" style="margin:20px 0;" enctype="multipart/form-data">
            <label class="bg-secondary text-light about-img d-flex justify-content-center align-items-center" style="width:160px;height:160px;" for="image">Add Image</label>
            <input type="file" accept="image/jpg" name="image" id="image" hidden><br>
            Heading <br>
            <input type="text" name="heading" class="border rounded-lg p-2 w-100"><br><br>
            Text <br>
            <textarea type="text" name="text" rows="4" class="border rounded-lg w-100"></textarea><br>
            <button type="submit" class="btn btn-success" name="add-about">Add Card</button>
        </form>
        <br><br>
        <h3>All Cards</h3>
        <?php
        $result = mysqli_query($conn, "SELECT * FROM `about`");
        while ($row = mysqli_fetch_assoc($result)) {
        ?>
            <form method="post" class="about-card" style="margin:20px 0;">
                <img class="about-img" src="admin/about/images/<?php echo $row["image"]; ?>">
                <div>
                    <h3><?php echo $row['heading']; ?></h3>
                    <p><?php echo $row['text']; ?></p>
                </div>
                <input type="text" name="id" value="<?php echo $row['id']; ?>" hidden>
                <br>
                <button class="btn btn-danger" type="submit" name="remove-about">Remove</button>
            </form>
        <?php
        }
        ?>
    </div>
    <div class="view" id="teachers">
        <div class="btn-group">
            <button class="btn btn-light" onclick="view(['notice'])">Notice</button>
            <button class="btn btn-light" onclick="view(['about'])">About</button>
            <button class="btn btn-success">Teachers</button>
            <button class="btn btn-light" onclick="view(['courses'])">Courses</button>
            <button class="btn btn-light" onclick="view(['payment'])">Payment</button>
        </div><br><br>
        <h3>Teachers</h3>
        <br>
        <h4>Pending</h4>
        <?php
        $result = mysqli_query($conn, "SELECT * FROM `teachers` WHERE `approved`= 0");
        if (mysqli_num_rows($result) == 0) echo "<div class=\"alert alert-success\">No Pending Approval.</div>";
        while ($row = mysqli_fetch_assoc($result)) {
        ?>
            <form method="post">
                <div class="profile-card" style="margin:20px 0;">
                    <div class="profile-img" style="background-image:url('teachers/images/<?php echo $row['username']; ?>.jpg');"></div>
                    <div>
                        <h3><?php echo $row['name']; ?></h3>
                        Username: <b><?php echo $row['username']; ?></b> <br>
                        Email: <b><?php echo $row['email']; ?></b><br>
                        Age: <b><?php echo $row['age']; ?></b><br>
                        Phone No.: <b><?php echo $row['phone']; ?></b><br><br>
                        <a href="teachers/resumes/<?php echo $row['username']; ?>.pdf" class="btn btn-primary">View Resume</a>
                        <input type="text" name="id" value="<?php echo $row['id']; ?>" hidden>
                        <button class="btn btn-success" type="submit" name="approve-teacher">Approve</button>
                    </div>
                </div>
            </form>
        <?php
        }
        ?>
        <br><br>
        <h4>Approved</h4>
        <?php
        $result = mysqli_query($conn, "SELECT * FROM `teachers` WHERE `approved`= 1");
        if (mysqli_num_rows($result) == 0) echo  "<div class=\"alert alert-success\">No Approved Teacher.</div>";
        while ($row = mysqli_fetch_assoc($result)) {
        ?>
            <form method="post">
                <div class="profile-card" style="margin:20px 0;">
                    <div class="profile-img" style="background-image:url('teachers/images/<?php echo $row['username']; ?>.jpg');"></div>
                    <div>
                        <h3><?php echo $row['name']; ?></h3>
                        Username: <b><?php echo $row['username']; ?></b> <br>
                        Email: <b><?php echo $row['email']; ?></b><br>
                        Phone No.: <b><?php echo $row['phone']; ?></b><br><br>
                        <a href="teachers/resumes/<?php echo $row['username']; ?>.pdf" class="btn btn-primary">View Resume</a>
                        <input type="text" name="id" value="<?php echo $row['id']; ?>" hidden>
                        <button class="btn btn-danger" type="submit" name="disapprove-teacher">Disapprove</button>
                    </div>
                </div>
            </form>
        <?php
        }
        ?>
    </div>
    <div class="view" id="courses">
        <div class="btn-group">
            <button class="btn btn-light" onclick="view(['notice'])">Notice</button>
            <button class="btn btn-light" onclick="view(['about'])">About</button>
            <button class="btn btn-light" onclick="view(['teachers'])">Teachers</button>
            <button class="btn btn-success">Courses</button>
            <button class="btn btn-light" onclick="view(['payment'])">Payment</button>
        </div><br><br>
        <h3>Add Course</h3>
        <form method="post">
            <div class="d-flex flex-wrap border p-2">
                <div class="m-2">
                    Course Name <br>
                    <input type="text" name="name" id="name" class="p-1">
                </div>
                <div class="m-2">
                    Teacher Name <br>
                    <input type="text" name="teacher" id="teacher" class="p-1">
                </div>
                <div class="d-flex align-items-end">
                    <button type="submit" class="btn btn-success my-2" name="add-course">Add Course</button>
                </div>
            </div>
        </form>
        <hr>
        <h3>All Courses</h3>
        <table>
            <th>Course</th>
            <th>Teacher Name</th>
            <th>Action</th>
            <?php
            $result = mysqli_query($conn, "SELECT * FROM `courses`");
            while ($row = mysqli_fetch_assoc($result)) {
            ?> <tr>
                    <td><?php echo $row["name"]; ?></td>
                    <td><?php echo $row["teacher"]; ?></td>
                    <td>
                        <form method="post">
                            <input type="text" name="id" id="id" value="<?php echo $row['id']; ?>" hidden>
                            <button type="submit" name="remove-course" class="btn btn-sm btn-danger">Remove</button>
                        </form>
                    </td>
                </tr>
            <?php
            }
            ?>
        </table>
    </div>
    <div class="view" id="payment">
        <div class="btn-group">
            <button class="btn btn-light" onclick="view(['notice'])">Notice</button>
            <button class="btn btn-light" onclick="view(['about'])">About</button>
            <button class="btn btn-light" onclick="view(['teachers'])">Teachers</button>
            <button class="btn btn-light" onclick="view(['courses'])">Courses</button>
            <button class="btn btn-success">Payments</button>
        </div><br><br>
        <h3>Payments</h3>
        <table>
            <th>Teacher</th>
            <th>Transaction ID</th>
            <th>Amount</th>
            <th>Time</th>
            <th>Date</th>
            <?php
            $result = mysqli_query($conn, "SELECT * FROM `transactions`");
            while ($row = mysqli_fetch_assoc($result)) {
            ?> <tr>
                    <td><?php echo $row["teacher"]; ?></td>
                    <td><?php echo $row["tid"]; ?></td>
                    <td><?php echo $row["amount"]; ?></td>
                    <td><?php echo $row["time"]; ?></td>
                    <td><?php echo $row["date"]; ?></td>
                </tr>
            <?php
            }
            ?>
        </table>
    </div>
    <?php include_once "../res/com/footer.html" ?>
    <script src="res/js/main.js"></script>
    <script>
        view(['notice']);
        <?php echo $exe; ?>
    </script>
</body>

</html>