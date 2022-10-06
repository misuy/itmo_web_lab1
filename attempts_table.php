<table class="attempts_table" width="100%" border="1" cellpadding="0" cellspacing="0" width="100%">
    <tr class="attempts_table_header_row">
        <td>id</td>
        <td>X</td>
        <td>Y</td>
        <td>R</td>
        <td>result</td>
        <td>current server time</td>
        <td>execution time (ns)</td>
    </tr>
    <?php
        foreach ($attempts as $curAttempt) {
            if ($attempt != null) { 
                if ($curAttempt["id"] == $attempt["id"]) { echo "<tr class=\"current_attempt_table_row attempts_table_row\"><td><a href=\"/?attemptId={$curAttempt["id"]}\">{$curAttempt["id"]}</a></td><td>{$curAttempt["x"]}</td><td>{$curAttempt["y"]}</td><td>{$curAttempt["r"]}</td><td>{$curAttempt["result"]}</td><td>{$curAttempt["current_server_time"]}</td><td>{$curAttempt["execution_time"]}</td></tr>"; } 
                else { echo "<tr class=\"attempts_table_row\"><td><a href=\"/?attemptId={$curAttempt["id"]}\">{$curAttempt["id"]}</a></td><td>{$curAttempt["x"]}</td><td>{$curAttempt["y"]}</td><td>{$curAttempt["r"]}</td><td>{$curAttempt["result"]}</td><td>{$curAttempt["current_server_time"]}</td><td>{$curAttempt["execution_time"]}</td></tr>"; }
            }
            else { echo "<tr class=\"attempts_table_row\"><td><a href=\"/?attemptId={$curAttempt["id"]}\">{$curAttempt["id"]}</a></td><td>{$curAttempt["x"]}</td><td>{$curAttempt["y"]}</td><td>{$curAttempt["r"]}</td><td>{$curAttempt["result"]}</td><td>{$curAttempt["current_server_time"]}</td><td>{$curAttempt["execution_time"]}</td></tr>"; }
        }
    ?>
</table>