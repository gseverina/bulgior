<?php
if ($handle = opendir('./pdf')) {
    echo "Directory handle: $handle\n";
    echo "Entries:\n";

    $a = array();
    $i = 0;
    while (false !== ($entry = readdir($handle))) {
        echo "$entry\n";
        if(stripos($entry,".pdf")) {
            $a[$i++]= $entry;
        }
    }

    closedir($handle);

    print_r($a);
}
?>
