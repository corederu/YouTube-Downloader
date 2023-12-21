import os
import time

# The script must be executed by the cron daemon

"""
Delete files older than two hours from a directory
:param directory_path: path to the directory
:return: None
"""
def delete_old_files(directory_path):
    current_time = time.time()

    for filename in os.listdir(directory_path):
        file_path = os.path.join(directory_path, filename)

        # Check if the file is a regular file and not a directory
        if os.path.isfile(file_path):
            # Extract the timestamp from the filename
            try:
                timestamp = int(filename.split("_")[1].split(".")[0])
            except (ValueError, IndexError):
                # Skip files with invalid filenames
                continue
            
            # Check if the file is older than two hours
            if current_time - timestamp > 3600:  # 1 hours in seconds
                os.remove(file_path)

if __name__ == "__main__":
    # directory path
    directory_path = "downloads/"

    delete_old_files(directory_path)
