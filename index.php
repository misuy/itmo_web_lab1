<?php
    include("layout_generator.php");
    $attemptId = $_GET["attemptId"];
    $layoutGenerator = new LayoutGenerator();
    $layoutGenerator->setAttemptId($attemptId);
    $layoutGenerator->generateLayout();
?>