# YouTube-Downloader

⚠️ See the Usage section before using the project.

## Description

This is a simple YouTube downloader that allows you to download videos and audio from YouTube.

![Demo](illustartion.gif)

## Requirements

- [Python](https://www.python.org)
- [PHP](https://www.php.net)
- [Pytube](https://pytube.io/)

## Files explanation

The files of the project are in the files folder.

- **index.php**: This is the front-end of the project. It contains the form that allows you to download the video or audio. It uses javascript to validate the form and navigate through the download process.

- **index.css**: This is the css file of the project. It contains the styles of the front-end.

- **download.php**: This is the back-end of the project. It contains the code that allows you to download the video or audio. It send the data to the python script and then it returns the file to the user. This file is wake up by the index.php file when the user submits the form.

- **main.py**: This is the python script that allows you to download the video or audio. It uses the pytube library to download the video or audio.

- **cron.py**: This is the file that allows you to delete the files that are older than 1 hour. It must be executed every hour.

- download: This is the folder where the files are downloaded. The cron.py file deletes the files that are older than 1 hour in this folder.

## Usage ⚠️

Before using the project you must be sure that Youtube company allows you to download the video or audio from Youtube

As described in the terms of use as of December 21, 2023:

You are not authorized to:

- access, reproduce, download, distribute, transmit, broadcast, display, sell, license, alter, modify, or otherwise use any or all of the Service or Content except: (a) as explicitly permitted by the Service; (b) with prior written consent from YouTube and, if applicable, the rights holders; or (c) in accordance with applicable law.

You can check it in the [Youtube Terms of Service](https://www.youtube.com/t/terms).


