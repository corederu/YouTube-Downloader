from pytube import YouTube
import sys
import time

def download(url, fileName, audio=True):
    """
    Download audio/video from a youtube video
    :param url: url of the youtube video
    :param fileName: name of the file
    :param audio: True if audio, False if video
    :return: None
    """
    try :
        yt = YouTube(url)
        streams = None
        if audio:
            streams = yt.streams.filter(file_extension='mp4', only_audio=True).order_by('abr').desc()
        else:
            streams = yt.streams.filter(file_extension='mp4', audio_codec = 'mp4a.40.2').order_by('resolution').desc()

        if(len(streams) == 0):
            print("error")
            sys.exit(1)
        
        firstStream = streams.first()
        type = firstStream.mime_type.split('/')[1]
        firstStream.download(filename=str(fileName+"."+type), output_path="downloads")
    except:
        print("error")
        sys.exit(1)

def generate_unique_filename():
    """
    Generate a unique filename based on the current timestamp
    """
    try:
        timestamp = int(time.time())
        return f"file_{timestamp}"
    except:
        print("error")
        sys.exit(1)

if __name__ == "__main__":
    # Check if two keywords are provided as a command-line argument
    if len(sys.argv) < 3:
        print("error")
        sys.exit(1)
    
    # Get the audio/video from the command-line arguments
    audio = sys.argv[2] == "audio"

    # Get the url from the command-line arguments
    url = sys.argv[1]
    fileName = generate_unique_filename()
    
    # Download the audio from the first YouTube video
    download(url, str(fileName), audio)

    # Print the name of the downloaded file
    print(fileName)

