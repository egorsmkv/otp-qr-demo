<?php

require __DIR__ . '/vendor/autoload.php';

use OTPHP\TOTP;

$secret = 'OFRGWZDDNRWTI4DOGQ4XIOLWMZSGU3I='; // it must be a Base32 encoded string
$otp = TOTP::create($secret);

$success = false;
$inCorrectAnswer = false;

if (!empty($_POST['answer'])) {
    $answer = $_POST['answer'];

    if ($otp->verify($answer)) {
        $success = true;
    } else {
        $inCorrectAnswer = true;
    }
}

?>

<h4>Check code via the app</h4>

<?php if ($inCorrectAnswer) { ?>
    <h5 style="color: red">Your answer is incorrect</h5>
<?php } else { ?>

    <?php if ($success) { ?>
        <h5 style="color: green">All is Okay</h5>
    <?php } else { ?>
        <h5 style="color: gray">You didn't check it yet</h5>
    <?php } ?>

<?php } ?>

<form action="./check_code.php" method="post">
    <label for="answer">Your answer</label>
    <br>
    <input id="answer" type="text" name="answer">
    <input type="submit" value="Send">
</form>

<hr>

<a href="./new_code.php">Scan a QR code</a>
