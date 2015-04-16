<?php
// URL
// Needs to be the homepage of the Server Stats
// This probably only works on Icecast 2.3.2
// You can try it elsewhere
// THIS WON'T WORK ON SHOUTCAST OF ANY KIND
//  ICECAST 2 ONLY!!!
$url = "http://198.100.144.46:8000/";

// Open the URL
$file = fopen ($url, "r");

// Error handling
if (!$file) {
    echo "<p>Unable to open remote file.\n";
    exit;
}

// Hacky way of making this work but it works...right?
$bleh = false;

// Step through the file, and make magic happen
while (!feof ($file)) {

    $line = fgets ($file, 1024);
	
	// Now that our hacky boolean is true, this will
	// execute. This takes the line we actually are
	// looking for and cuts all the crap. Then it
	// formats it into a nice two key JSON array and
	// echos it
    if ($bleh) {
        $line = str_replace("<td class=\"streamdata\">", "", $line);
        $line = str_replace("</td>\n", "", $line);
        list($artist, $title) = explode(" - ", $line);
        $out = ["title" => $title, "artist" => $artist,];
        echo json_encode($out);
        $bleh = false;
    }

	// This is why it's rather hacky. We're finding the line
	// before the one we want, then marking a variable true
	// so then we actually manipulate the line we want
    if ($line == "<td>Current Song:</td>\n") {
        $bleh = true;
    }

}

fclose($file);
?>