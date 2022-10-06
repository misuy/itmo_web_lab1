<?php
    include("layout_generator.php");
    $attemptId = null;
    if (isset($_GET["attemptId"])) {
        $attemptId = $_GET["attemptId"];
    }
    $layoutGenerator = new LayoutGenerator();
    $layoutGenerator->setAttemptId($attemptId);
    $layoutGenerator->generateLayout();
?>