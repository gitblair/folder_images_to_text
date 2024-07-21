<?php
// Define the folder containing the images

// EDIT THIS PATH
$folderPath = '/Applications/MAMP/htdocs/folder/images/';

// Define the output file
$outputFile = 'image_links.txt';

// Open the folder
if ($handle = opendir($folderPath)) {
    // Open the output file for writing
    $fileHandle = fopen($outputFile, 'w');

    if ($fileHandle) {
        // Iterate over the files in the folder
        while (false !== ($file = readdir($handle))) {
            // Skip '.' and '..' entries
            if ($file != "." && $file != "..") {
                // Generate the HTML <img> tag
				
				//EDIT THIS HTML TO YOUR NEEDS
                $imgTag = '<img src="images/' . htmlspecialchars($file) . '" class="img-fluid rounded" style="text-align:center; width:100px;" alt="...">' . PHP_EOL;
                // Write the tag to the file
                fwrite($fileHandle, $imgTag);
            }
        }
        // Close the output file
        fclose($fileHandle);
        echo "Image links have been saved to $outputFile.";
    } else {
        echo "Unable to open the output file.";
    }
    // Close the folder
    closedir($handle);
} else {
    echo "Unable to open the folder.";
}
?>
