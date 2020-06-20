<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php include_once "res/com/main.html"; ?>
    <title>ITI - Invention to Inovation</title>
</head>

<body>
    <?php include_once "res/com/header.html"; ?>
    <div style="display: flex; justify-content: center;">
        <img src="res/media/logo.png" class="w-100" style="max-width:500px;">
    </div>
    <div class="noticeboard">
        <h3>Notice</h3>
        <?php
        include_once "res/com/conn.php";
        $result = mysqli_query($conn, "SELECT * FROM `notice`");
        while ($row = mysqli_fetch_assoc($result)) {
        ?>
            <marquee><?php echo $row['notice']; ?></marquee>
        <?php
        }
        ?>
    </div>
    <div class="side-tab-container">
        <div class="side-tab">
            <div class="side-tab-icon"></div>
            <a class="side-tab-title" href="user.php">Login </a>
        </div>
        <div class="side-tab">
            <div class="side-tab-icon"></div>
            <a class="side-tab-title" href="user.php">Sign Up</a>
        </div>
    </div>
    <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m12!1m3!1d54529.335987280065!2d75.58473945652295!3d31.329067027986778!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!5e0!3m2!1sen!2sin!4v1592222699917!5m2!1sen!2sin" width="600" height="450" frameborder="0" style="border:0;margin:20px auto; max-width:90vw;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
    <?php include_once "res/com/footer.html"; ?>
    <div class="footer">
        <div><a href="user.php?action=admin">Admin Login</a><br><br></div>
        <div></div>
    </div>
</body>

</html>