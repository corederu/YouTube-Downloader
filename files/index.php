<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Youtube Downloader</title>
    <link rel="stylesheet" href="index.css">
    <meta name="viewport" content="width=device-width"/>
</head>

<body>

    <!-- a box with the title -->
    <div class="titleDiv">
        <h1 onclick="window.location.href='index.php'">Youtube Downloader</h1>
    </div>

    <!-- a box to write a url -->
    <div id="urlDiv" class="urlDiv">
        <input type="text" name="url" placeholder="Enter a URL" class="url">
        <!-- select bewteen audio and video -->
        <select name="type" class="type">
            <option value="audio">Audio</option>
            <option value="video">Video</option>
        </select>
        <input class="submit" type="submit" name="submit" value="Submit" onclick="download()">
    </div>

    <!-- a box with the waiting message -->
    <div class="waitingDiv" id="waitingDiv">
        <p><strong>Holding our breath until the server spills the beans...</strong></p>
        <img src="loading.gif" alt="loading" class="loading">
    </div>


    <!-- a box with the output button -->
    <div class="downloadDiv" id="downloadDiv" show>
        <p><strong>Hooray ! Your download is ready, served with a sprinkle of digital fairy dust !</strong></p>
        <a class="downloadBut" href="" >Download</a>
    </div>

    <!-- a box with the error message -->
    <div class="errorDiv" id="errorDiv">
        <p><strong>Oops ! Something went wrong. Maybe the URL took a coffee break ?</strong></p>
    </div>
    
    <!-- run the script when the button is clicked -->
    <script>

        // if we press enter in the input box, then run the download function
        document.getElementsByClassName("url")[0].addEventListener("keyup", function(event) {
            if (event.keyCode === 13) {
                event.preventDefault();
                download();
            }
        });

        // function to download the file
        function download() {
            // get the text in the input box
            var url = document.getElementsByClassName("url")[0].value;

            // get the value of the select box
            var type = document.getElementsByClassName("type")[0].value;

            // prepare the url for a get request
            var link = "download.php?url=" + url + "&type=" + type;

            const Http = new XMLHttpRequest();
            Http.open("GET", link);
            Http.send();

            // hide the input box
            var urlDiv = document.getElementById('urlDiv').style.display = "none";

            // show the waiting message
            var urlDiv = document.getElementById('waitingDiv').style.display = "flex";

            Http.onreadystatechange = (e) => {
                var rep = Http.responseText;

                // remove the space at the end of the response
                rep = rep.trim();

                if(rep === "") {
                    // if the response is empty we have to wait
                    return;
                }

                // if the response is "error", then an error occurred
                if (rep === "error") {
                    // show the error message
                    var errorDiv = document.getElementById('errorDiv').style.display = "block";

                    // hide the waiting message
                    var urlDiv = document.getElementById('waitingDiv').style.display = "none";
                } else {
                    // if the response is not "error", then the id was returned

                    // show the download button
                    var downloadDiv = document.getElementById('downloadDiv').style.display = "flex";
                    
                    // set the href and download of the download button
                    var downloadLink = document.getElementsByTagName("a")[0].href = "downloads/"+rep+".mp4";
                    var downloadLink = document.getElementsByTagName("a")[0].download = rep+".mp4";

                    // hide the waiting message
                    var urlDiv = document.getElementById('waitingDiv').style.display = "none";
                    
                }
            }
        }
    </script>
</body>

</html>
