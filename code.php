<?php

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $string_first = $_POST['string_first'];
    $string_second = $_POST['string_second'];

    $i = 0;
    // compare both string
    $similar = strcmp($string_first, $string_second);

    // convert to array
    $str1 = explode(" ", $string_first);
    $str2 = explode(" ", $string_second);

    $notequal_first = array();
    $notequal_second = array();
    // if $similar is equal to zero both the inputs are same
    if ($similar == 0) {
        // echo "accurate";
    } else {
        foreach ($str1 as $str1_key => $str1_val) {
            foreach ($str2 as $str2_key => $str2_val) {
                if ($str1_key == $str2_key) {
                    if ($str1_val != $str2_val) {
                        $notequal_first[$str1_key] = $str1_val; // different value of string first store in array
                        $notequal_second[$str2_key] = $str2_val; // different value of string second store in same array
                    }
                }
            }
        }
    }

    // for string first
    $str1_diff = array();
    foreach ($notequal_first as $diff_key => $different) {
        foreach ($str1 as $word_key => $word_val) {
            if ($diff_key == $word_key) {
                $str1_diff[$word_key] = "<span class='word-diff-first'>$different</span>"; // seperate the string first with dark color
            }
        }
    }

    // for string second
    $str2_diff = array();
    foreach ($notequal_second as $diff_key => $different) {
        foreach ($str2 as $word_key => $word_val) {
            if ($diff_key == $word_key) {
                $str2_diff[$word_key] = "<span class='word-diff-second'>$different</span>"; // seperate the string second with dark color
            }
        }
    }
    
}

?>