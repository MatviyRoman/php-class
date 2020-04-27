<?php
$string1 = str_repeat('x', 100);
$string2 = str_repeat('y', 100);
$string3 = str_repeat('z', 100);

$mark = microtime(true);

for ($i = 0; $i < 2000; $i++) {

    ob_start();
    for ($j = 0; $j < 2000; $j++) {
        print $string1 . $string2 . $string3;
    }

    ob_get_clean();

}

echo microtime(true) - $mark;