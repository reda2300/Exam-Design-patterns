<?php

function writeToFile($directory, $filename, $content) {
    
    if (!file_exists($directory)) {
        mkdir($directory, 0777, true);
    }
    
    file_put_contents("{$directory}/{$filename}", $content);
}
