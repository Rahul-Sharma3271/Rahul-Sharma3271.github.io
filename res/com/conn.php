<?php
    $conn = mysqli_connect('localhost', 'root', '', 'ITI_new');
    if (!$conn)
        echo "<div class=\"alert alert-danger m-5\">Unable to Connect to Server.</div>";
?>