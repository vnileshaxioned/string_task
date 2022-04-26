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

    $notequal = array();
    // if $similar is equal to zero both the inputs are same
    if ($similar == 0) {
        // echo "accurate";
    } else {
        foreach ($str1 as $str1_key => $str1_val) {
            foreach ($str2 as $str2_key => $str2_val) {
                if ($str1_key == $str2_key) {
                    if ($str1_val != $str2_val) {
                        $notequal[] = $str1_val; // different value of string first store in array
                        $notequal[] = $str2_val; // different value of string second store in same array
                    }
                }
            }
        }
    }

    // for string first
    $str1_diff = array();
    foreach ($notequal as $different) {
        foreach ($str1 as $word_key => $word_val) {
            if ($different == $word_val) {
                $str1_diff[$word_key] = "<span class='word-diff'>$different</span>"; // seperate the string first with dark color
            }
        }
    }

    // for string second
    $str2_diff = array();
    foreach ($notequal as $different) {
        foreach ($str2 as $word_key => $word_val) {
            if ($different == $word_val) {
                $str2_diff[$word_key] = "<span class='word-diff'>$different</span>"; // seperate the string second with dark color
            }
        }
    }
    
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>String Compare</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <div class="container">
        <div class="form">
            <div class="form-body">
                <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
                    <div class="form-group">
                        <div class="control-form">
                            <textarea name="string_first" cols="30" rows="10" class="user-input" 
                            placeholder="Original String"><?php echo $string_first; ?></textarea>
                        </div>
                        <div class="control-form">
                            <textarea name="string_second" cols="30" rows="10" class="user-input" 
                            placeholder="Changed String"><?php echo $string_second; ?></textarea>
                        </div>
                    </div>
                    <button type="submit" class="btn">Find Difference</button>
                </form>
            </div>
        </div>
        <?php
            if ($i != strlen($string_first) && $i != strlen($string_second)) {
        ?>
        <div class="output">
            <div class="box">
                <?php
                    if ($similar == 0) {
                        echo "<p class='accurate'>".$string_first."<p>";
                    } else {
                        $replace = array();
                        foreach ($str1 as $word_key => $word_val) {
                            $replace[] = $word_val;
                            foreach ($notequal as $different) {
                                if ($different == $word_val) {
                                    foreach ($str1_diff as $diff_key => $diff_val) {
                                        if ($diff_key == $word_key) {
                                            $replace[$diff_key] = $diff_val;
                                        }
                                    }
                                }
                            }
                        }
                        echo "<p class='different'>".implode(" ",$replace)."</p>";
                    }
                ?>
            </div>
            <div class="box">
                <?php
                    if ($similar == 0) {
                        echo "<p class='accurate'>".$string_second."<p>";
                    } else {
                        $replace = array();
                        foreach ($str2 as $word_key => $word_val) {
                            $replace[] = $word_val;
                            foreach ($notequal as $different) {
                                if ($different == $word_val) {
                                    foreach ($str2_diff as $diff_key => $diff_val) {
                                        if ($diff_key == $word_key) {
                                            $replace[$diff_key] = $diff_val;
                                        }
                                    }
                                }
                            }
                        }
                        echo "<p class='different'>".implode(" ",$replace)."</p>";
                    }
                ?>
            </div>
        </div>
        <?php } ?>
    </div>
</body>
</html>