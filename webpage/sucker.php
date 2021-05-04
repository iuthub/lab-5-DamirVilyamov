<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <title>Buy Your Way to a Better Education!</title>
    <link href="buyagrade.css" type="text/css" rel="stylesheet"/>
</head>
<?php
$name = isset($_REQUEST["name"]) && !empty($_REQUEST["name"]) ? $_REQUEST["name"] : null;
$section = isset($_REQUEST["section"]) && !empty($_REQUEST["section"]) ? $_REQUEST["section"] : null;
$cardNumber = isset($_REQUEST["cardNumber"]) && !empty($_REQUEST["cardNumber"]) ? $_REQUEST["cardNumber"] : null;
$cardType = isset($_REQUEST["cardType"]) && !empty($_REQUEST["cardType"]) ? $_REQUEST["cardType"] : null;
?>

<body>
<?php if ($name == null or $section == null or $cardNumber == null or $cardType == null) {
    ?>
    <h1>Sorry</h1>

    <p>You didn't fill the form completely. <a href="buyagrade.html">Try again?</a></p>
    <?php
} else {
    $fileContent = "$name;$section;$cardNumber;$cardType\n";
    $fileName = "suckers.txt";
    file_put_contents($fileName, $fileContent, FILE_APPEND);
    ?>
    <h1>Thanks, sucker!</h1>

    <p>Your information has been recorded.</p>
    <dl>
        <dt>Name</dt>
        <dd><?= $name ?></dd>

        <dt>Section</dt>
        <dd><?= $section ?></dd>

        <dt>Credit Card</dt>
        <dd><?= "$cardNumber ($cardType)" ?></dd>
        <br/>

        <dt>Here are all the suckers who have submitted here</dt>
        <br/>
        <dd><?= file_get_contents($fileName) ?></dd>
    </dl>
<?php } ?>
</body>
</html>  