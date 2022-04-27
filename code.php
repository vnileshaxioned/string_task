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
    $equal_first = array();
    $equal_second = array();
    // if $similar is equal to zero both the inputs are same
    if ($similar == 0) {
        // echo "accurate";
    } else {
        foreach ($str1 as $str1_key => $str1_val) {
            foreach ($str2 as $str2_key => $str2_val) {
                if ($str1_val == $str2_val) {
                    if ($str1_key != $str2_key) {
                        if ($str1_key > $str2_key) {
                            $eq_first[$str1_key] = $str2[$str2_key];
                            foreach ($eq_first as $e_key => $e_val) {
                                if ($str1_key == $e_key) {
                                    $equal_first[$str1_key] = $str1_val;
                                }
                            }
                        }
                        if ($str2_key < $str1_key) {
                            $eq_second[$str2_key] = $str1[$str1_key];
                            foreach ($eq_second as $e_key => $e_val) {
                                if ($str2_key == $e_key) {
                                    $equal_second[$str2_key] = $str2_val;
                                }
                            }
                        }
                    }
                }
            }
        }
    
        foreach ($str1 as $str1_key => $str1_val) {
            foreach ($str2 as $str2_key => $str2_val) {
                if ($str1_key == $str2_key) {
                    if ($str1_val != $str2_val) {
                        // echo $str1_val." ".$str2_val."<br>";
                        $notequal_first[$str1_key] = $str1_val; // different value of string first store in array
                        $notequal_second[$str2_key] = $str2_val; // different value of string second store in same array
                    }
                }
            }
        }
    }



    // for string first
    $str1_diff = array();
    for ($i = 0; $i <= count($notequal_first); $i++) {
        if ($notequal_first[$i] != $equal_first[$i]) {
            $str1_diff[$i] = "<span class='word-diff-first'>".$notequal_first[$i]."</span>";
            // echo $notequal_first[$i];
        }
    }

    // for string second
    $str2_diff = array();
    for ($i = 0; $i <= count($notequal_second); $i++) {
        if ($notequal_second[$i] != $equal_second[$i]) {
            $str2_diff[$i] = "<span class='word-diff-second'>".$notequal_second[$i]."</span>";
        }
    }

}

?>