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
    $eqfirst = array();
    $eqsecond = array();
    // if $similar is equal to zero both the inputs are same
    if (($i == strlen($string_first)) || ($i == strlen($string_second))) {
        $msg = "<p class='validate'>Both fields are required</p>";
    } elseif ($similar == 0) {
        $msg = "<p class='identical'>The two strings are identical</p>";
    } else {
        if ($similar != 0) {
            foreach ($str1 as $s1key => $s1val) {
                foreach ($str2 as $s2key => $s2val) {
                    if ($s1val == $s2val) {
                        if ($s1key == $s2key) {
                            $eqfirst[$s1key] = $s1val;
                            $eqsecond[$s2key] = $s2val;
                        }
                        if ($s1key > $s2key) {
                            $eq[$s2key+1] = $s2val;
                            foreach ($eq as $eqkey => $eqval) {
                                if ($eqkey == $s1key) {
                                    $eqfirst[$eqkey] = $s1val;
                                }
                            }
                        }
                        if ($s1key < $s2key) {
                            $eqsec[$s1key+1] = $s1val;
                            foreach ($eqsec as $eqkey => $eqval) {
                                if ($eqkey == $s2key) {
                                    $eqsecond[$eqkey] = $s2val;
                                }
                            }
                        }
                    }
                }
            }
            // not equal
            
            for ($i = 0; $i < count($str1); $i++) {
                if ($str1[$i] != $eqfirst[$i]) {
                    $notequal_first[$i] = "<span class='word-diff-first'>".$str1[$i]."</span>";
                }
            }
            
            for ($i = 0; $i < count($str2); $i++) {
                if ($str2[$i] != $eqsecond[$i]) {
                    $notequal_second[$i] = "<span class='word-diff-second'>".$str2[$i]."</span>";
                }
            }
        }
    }
}

?>