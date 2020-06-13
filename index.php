<?php include_once "res/content/main.php"; ?>

<div style="display: flex; justify-content: center;">
    <img src="res/icons/logo.png" class="w-100" style="max-width:500px;">
</div>
<style>
    .noticeboard {
        margin: 10px 10%;
        border: 1px solid #aaa;
        border-radius: 10px;
        padding: 20px;
    }

    .notification {
        padding: 10px;
        margin: 6px;
        box-shadow: 0 0 4px 2px rgba(0, 0, 0, 0.3);
        border-radius: 6px;
    }
</style>
<div class="noticeboard">
    <h3>Notice</h3>
    <?php
    //Sample notice
    for ($i = 0; $i < 10; $i++) { ?>
        <div class="notification">

            <p>Sample Notification</p>
        </div>
    <?php } ?>
</div>

<?php
include_once "res/content/client.php";
include_once "res/content/footer.php";
?>

</body>
<!---->

</html>