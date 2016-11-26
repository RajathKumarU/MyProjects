<?php

$starNumber=1.5;
    for($x=1;$x<=$starNumber;$x++) {
        echo '<img src="images/fullstar.png"  width="20"
							height="20" />';
    }
    if (strpos($starNumber,'.')) {
        echo '<img src="images/halfstar.png"  width="20"
							height="20" />';
        $x++;
    }
    while ($x<=5) {
        echo '<img src="images/blankstart.png"  width="20"
							height="20" />';
        $x++;
    }
?>