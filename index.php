<?php
require('logic.php');
?>

<!DOCTYPE html>
<html lang='en'>
<head>

    <title>Caesar Cipher</title>
    <meta charset='utf-8'>
    <link href='https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css'
          rel='stylesheet'
          integrity='sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO'
          crossorigin='anonymous'>

    <link href='/styles/style.css' rel='stylesheet'>

</head>
<body>
<div class="container-fluid">
    <div class="jumbotron">
        <h1> Caesar Cipher</h1>
        <p> The Caesar Cipher, also known as a shift cipher, is one of the oldest and simplest forms of encrypting a message. It is a type of substitution cipher where each letter in the original message is replaced with a letter corresponding to a certain number of letters shifted up or down in the alphabet. Any non alphabetic characters are not changed.</p>
        <form method='GET' action='cipher.php'>
            <div class="form-group">
                <label> Enter text to encode:

                    <textarea class="form-control"
                              rows="3"
                              name="textToEncode"
                              required
                              cols=40
                    >
                <?php if (isset($textToEncode)) {
                    echo $textToEncode;
                } ?>
                    </textarea>
                </label>
            </div>
            <div class="form-group">
                <label> Shift length:
                    <input type='number'
                           required
                           name='shiftLength'
                           min="1" max="26"
                           value=
                           '<?php if (isset($shiftLength)) {
                               echo $shiftLength;
                           } else {
                               echo '2';
                           } ?>'>
                </label>
            </div>
            <div class="checkbox">
                <label class="form-check-label"
                       for='shiftDirection'> Shift direction:
                </label>
            </div>
            <div class="checkbox">

                <input type="radio" name="shiftDirection" value="right"
                    <?php if ((isset($shiftDirection) and
                            $shiftDirection == "right") or
                        (!(isset($shiftDirection))))
                        echo 'checked' ?> > Rotate Right or Up<br>
                <input type="radio" name="shiftDirection" value="left"
                    <?php if (isset($shiftDirection) and
                        $shiftDirection == "left") echo 'checked' ?> >
                                            Rotate Left or Down<br>

            </div>

            <p>

            <div class="btn-group">
                <input type='submit' class="btn btn-primary" value='Encode'>
                <input type="reset" class="btn btn-info">
            </div>
        </form>
        <?php if (isset($errors) && $errors) : ?>

            <div class='alert alert-danger' id='validatedErrors'>
                <ul>
                    <?php foreach ($errors as $error) : ?>
                        <li><?= $error ?></li>
                    <?php endforeach; ?>
                </ul>
            </div>
        <?php elseif ($submitted): ?>

            <div id='encodedResults'>

                <?php if (isset($encodedText)): ?>
                    <div class='alert alert-primary' role='alert'>
                        Encoded String: <em><?= $encodedText ?></em>

                    </div>
                <?php endif; ?>

            </div>
        <?php endif ?>
    </div>
</div>
</body>
</html>