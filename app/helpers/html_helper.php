<?php

function readable_text($string)
{
    if (!isset($string)) return;
    echo htmlspecialchars($string, ENT_QUOTES);
}

function redirect($url)
{
    header("Location: " . $url);
    exit();
}

//Gets a declared variable from an object and converts it into an array.
function object_to_array($obj)
{
    if (is_array($obj)) {
        return $obj;
    }
    if (!is_object($obj)) {
        return false;
    }
    $array = array();
    foreach ( $obj as $key => $value ) {
        $array[$key] = $value;
    }
    return $array;
}