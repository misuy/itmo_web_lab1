<?php 
    function checkAttempt($x, $y, $r) {
        if (($x >= 0) & ($y >= 0)) { return(checkQuadrant1($x, $y, $r)); }
        else if (($x < 0) & ($y > 0)) { return(checkQuadrant2($x, $y, $r)); }
        else if (($x < 0) & ($y <= 0)) { return(checkQuadrant3($x, $y, $r)); }
        else { return(checkQuadrant4($x, $y, $r)); }
    }

    function checkQuadrant1($x, $y, $r) {
        $result = "miss";
        if (($x <= $r) & ($y <= $r/2)) { $result = "OK"; }
        return($result);
    }

    function checkQuadrant2($x, $y, $r) {
        $result = "miss";
        return($result);
    }

    function checkQuadrant3($x, $y, $r) {
        $result = "miss";
        if ($y >= (-2*$x - $r)) { $result = "OK"; } # y = -2x - r
        return($result);
    }

    function checkQuadrant4($x, $y, $r) {
        $result = "miss";
        if (sqrt(pow($x, 2) + pow($y, 2)) <= $r) { $result = "OK"; }
        return($result);
    }
?>