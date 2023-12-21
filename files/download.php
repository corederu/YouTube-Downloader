<?php
    // if the submit button is clicked
    if (isset($_GET['url']) && isset($_GET['type'])) {
        // get the url
        $url = $_GET['url'];

        // get the type
        $type = $_GET['type'];

        // run the main.py file
        $output = shell_exec("python3 main.py $url $type");

        if ($output === null) {
            // An error occurred
            echo "error";
        } else {
            // Print the output
            echo $output;
        }
    }
?>
