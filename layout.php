<!DOCTYPE html>
<html>
    <head>
        <title>Lab1</title>
        <script src="https://cdn.anychart.com/releases/8.11.0/js/graphics.min.js"></script>
        <script type="text/javascript" src="js/drawers.js"></script>
        <script type="text/javascript" src="js/validators.js"></script>
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Roboto:ital@0;1&display=swap" rel="stylesheet">
        
        <style>
            /* 
                first-color: rgb(234, 212, 152); (light)
                second-color: rgb(111, 66, 114); (dark)
            */
            body {
                font-family: Roboto;
                font-weight: normal;
                color: rgb(234, 212, 152);
                background-color: rgb(111, 66, 114);
                margin: 0px;
                padding: 0px;
            }

            .header_row {
                color: rgb(111, 66, 114);
                background-color: rgb(234, 212, 152);
                height: 50px;
                font-size: large;
                font-weight: 500;
            }

            #graph {
                width: 90%;
                height: 90%;
                margin: 5%;
            }

            .holder {
                vertical-align: middle;
                text-align: center;
            }

            .header_holder {
                width: 33.3%;
            }

            .graph_holder {
                width: 50%;
                height: 500px;
            }

            .selectors_table {
                border-spacing: 15px;
                max-width: 230px;
                margin-left: auto;
                margin-right: auto;
            }

            input[type="text"] {
                background-color: rgb(111, 66, 114);
                color: rgb(234, 212, 152);
                border: 1px solid rgb(234, 212, 152);
            }

            input[type="text"]:focus {
                background-color: rgb(234, 212, 152);
                color: rgb(111, 66, 114);
                outline: none;
            }

            input[type="radio"] {
                display: none;
            }

            input[type="radio"]+label {
                display: inline-block;
                width: 21px;
                height: 21px;
                cursor: pointer;
                border: 1px solid rgb(234, 212, 152);
                border-radius: 0px;
                user-select: none;
                text-align: center;
                vertical-align: middle;
            }

            input[type="radio"]+label:hover {
                background-color: rgb(234, 212, 152);
                color:rgb(111, 66, 114);
            }

            input[type="radio"]:checked+label {
                background-color: rgb(234, 212, 152);
                color:rgb(111, 66, 114);
            }

            input[type="submit"] {
                color:rgb(111, 66, 114);
                border: 1px solid rgb(234, 212, 152);
                outline: none;
            }

            .attempts_table {
                border: 1px solid rgb(234, 212, 152);
                border-collapse: collapse;
            }

            .attempts_table_row > *, .current_attempt_table_row > *, .attempts_table_header_row > * {
                width: 14.28%;
                text-align: center;
            }

            .attempts_table_row a {
                color: rgb(234, 212, 152);
            }

            .attempts_table_row:hover a {
                color: rgb(111, 66, 114);
            }

            .attempts_table_row:hover {
                background-color: rgba(234, 212, 152, 0.75);
                color: rgb(111, 66, 114);
            }

            .current_attempt_table_row {
                background-color: rgba(234, 212, 152, 0.5);
            }   

            a {
                display: block;
                width: 100%;
                height: 100%;
                text-decoration: none;
                color: black;
            }

        </style>
    </head>
    <body>
        <table class="layout_table" cellpadding="0" cellspacing="0" width="100%">
            <tr class="header_row">
                <td>
                    <table class="header_table" cellpadding="0" cellspacing="0" width="100%">
                        <tr>
                            <td class="holder header_holder name_holder">
                                Передрий Михаил Сергеевич
                            </td>

                            <td class="holder header_holder group_id_holder">
                                P32102
                            </td>

                            <td class="holder header_holder var_id_holder">
                                1610
                            </td>
                        </tr>
                    </table>
                </td>
            </tr>

            <tr class="graph_and_selectors_row">
                <td>
                    <table class="graph_and_selectors_table" cellpadding="0" cellspacing="0" width="100%">
                        <tr>
                            <td class="holder graph_holder" width="50%">
                                <div class="graph" id="graph"></div>
                            </td>
                            <td class="holder selectors_holder" width="50%">
                                <form id="xyr_form" method="POST" action="add_attempt.php">
                                    <table class="selectors_table" cellpadding="0" cellspacing="0" width="100%">
                                        <tr class="x_selector_row">
                                            <td>
                                                <table class="x_selector_table" cellpadding="0" cellspacing="0" width="100%">
                                                    <tr>
                                                        <td>
                                                            <div id="x_label">X:</div>
                                                        </td>
                                                        <td>
                                                            <input type="radio" id="x_-3" name="x" value="-3" onchange="validateX()">
                                                            <label for="x_-3">-3</label>
                                                        </td>
                                                        <td>
                                                            <input type="radio" id="x_-2" name="x" value="-2" onchange="validateX()">
                                                            <label for="x_-2">-2</label>
                                                        </td>
                                                        <td>
                                                            <input type="radio" id="x_-1" name="x" value="-1" onchange="validateX()">
                                                            <label for="x_-1">-1</label>
                                                        </td>
                                                        <td>
                                                            <input type="radio" id="x_0" name="x" value="0" onchange="validateX()">
                                                            <label for="x_0">0</label>
                                                        </td>
                                                        <td>
                                                            <input type="radio" id="x_2" name="x" value="2" onchange="validateX()">
                                                            <label for="x_2">2</label>
                                                        </td>
                                                        <td>
                                                            <input type="radio" id="x_3" name="x" value="3" onchange="validateX()">
                                                            <label for="x_3">3</label>
                                                        </td>
                                                        <td>
                                                            <input type="radio" id="x_4" name="x" value="4" onchange="validateX()">
                                                            <label for="x_4">4</label>
                                                        </td>
                                                        <td>
                                                            <input type="radio" id="x_5" name="x" value="5" onchange="validateX()">
                                                            <label for="x_5">5</label>
                                                        </td>
                                                    </tr>
                                                </table>
                                            </td>
                                        </tr>

                                        <tr class="y_selector_row">
                                            <td>
                                                <table class="y_selector_table" cellpadding="0" cellspacing="0" width="100%">
                                                    <td>
                                                        <div id="y_label">Y:</div>
                                                    </td>
                                                    <td>
                                                        <input type="text" id="y_selector" name="y" onchange="validateY()">
                                                    </td>
                                                </table>
                                            </td>
                                        </tr>

                                        <tr class="r_selector_row">
                                            <td>
                                                <table class="r_selector_table" cellpadding="0" cellspacing="0" width="100%">
                                                    <tr>
                                                        <td>
                                                            <div id="r_label">R:</div>
                                                        </td>
                                                        <td>
                                                            <input type="radio" id="r_1" name="r" value="1" onchange="validateR()">
                                                            <label for="r_1">1</label>
                                                        </td>
                                                        <td>
                                                            <input type="radio" id="r_1.5" name="r" value="1.5" onchange="validateR()">
                                                            <label for="r_1.5">1.5</label>
                                                        </td>
                                                        <td>
                                                            <input type="radio" id="r_2" name="r" value="2" onchange="validateR()">
                                                            <label for="r_2">2</label>
                                                        </td>
                                                        <td>
                                                            <input type="radio" id="r_2.5" name="r" value="2.5" onchange="validateR()">
                                                            <label for="r_2.5">2.5</label>
                                                        </td>
                                                        <td>
                                                            <input type="radio" id="r_3" name="r" value="3" onchange="validateR()">
                                                            <label for="r_3">3</label>
                                                        </td>
                                                    </tr>
                                                </table>
                                            </td>
                                        </tr>

                                        <tr class="submit_button_row">
                                            <td>
                                                <input type="submit" id="submit_button">
                                            </td>
                                        </tr>
                                    </table>
                                </form>
                            </td>
                        </tr>
                    </table>
                </td>
            </tr>

            <tr class="row_for_attempts_table">
                <td>
                    <?php include($attemptsTable) ?>
                </td>
            </tr>

        </table>

        <script>
            const okColor = "rgba(234, 212, 152, 1)"
            const transparentOkColor = "rgba(234, 212, 152, 0.5)"
            const secondOkColor = "rgba(111, 66, 114, 1)"
            validateX()
            validateY()
            validateR()
            setButtonColor()
        </script>

        <script>
            const stage = acgraph.create("graph")
            const graphColor = "rgba(234, 212, 152, 1)"
            const transparentGraphColor = "rgba(234, 212, 152, 0.5)"
            const secondColor = "rgba(111, 66, 114, 1)"
            var attempt = NaN
            <?php include($graph) ?>
            plotGraph()
            window.onresize = plotGraph
        </script>
    </body>
</html>