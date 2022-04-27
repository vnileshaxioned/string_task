<?php
require('code.php');
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
            if ($similar != 0) {
        ?>
        <div class="output">
            <div class="box">
                <?php
                    if ($similar != 0) {
                        $replace = array();
                        foreach ($str1 as $word_key => $word_val) {
                            $replace[] = $word_val;
                            foreach ($notequal_first as $different) {
                                if ($different == $word_val) {
                                    foreach ($str1_diff as $diff_key => $diff_val) {
                                        if ($diff_key == $word_key) {
                                            $replace[$word_key] = $diff_val;
                                        }
                                    }
                                }
                            }
                        }
                        echo "<p class='different-first'>".implode(" ",$replace)."</p>";
                    }
                ?>
            </div>
            <div class="box">
                <?php
                    if ($similar != 0) {
                        $replace = array();
                        foreach ($str2 as $word_key => $word_val) {
                            $replace[] = $word_val;
                            foreach ($notequal_second as $different) {
                                if ($different == $word_val) {
                                    foreach ($str2_diff as $diff_key => $diff_val) {
                                        if ($diff_key == $word_key) {
                                            $replace[$diff_key] = $diff_val;
                                        }
                                    }
                                }
                            }
                        }
                        echo "<p class='different-second'>".implode(" ",$replace)."</p>";
                    }
                ?>
            </div>
        </div>
        <?php
            } elseif (($i == strlen($string_first)) || ($i == strlen($string_second))) {
                echo "<p class='validate'>Both input fields are required</p>";
            } else {
                echo "<p class='identical'>The two strings are identical</p>";
            }
        ?>
    </div>
</body>
</html>