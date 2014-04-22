<?php
/*session_start();
header("Content-Type: text/html; charest='utf-8'");

$answers = array("good", "normal", "bad", "worth");

if (!isset($_SESSION['name']) && !isset($_POST['answer'])) {
    
    $q = 0;
    echo "do the test";

} else {

    $_SESSION['name'] = "viktor";

    echo $_SESSION['name']."<br/>";

    switch ($_POST['answer']) {
        case '0':
            echo "good answer";
            break;
        case '1':
            echo "normal answer";
            break;
        case '2':
            echo "bad answer";
            break;
        case '3':
            echo "worth answer";
            break;
    }
}
?>
<form action="<?= $_SERVER['PHP_SELF']?>" method="POST">

    <input type="text" name="answer">

    <input type="submit" names="submit" value="go">

</form>*/