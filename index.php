<!-- Pat Ausman -->
<!-- index.html Fall 2018 -->
<!-- Main web page for CaesarCipher application -->

<!-- declare required files -->
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

        <!-- form to get the parameters to encode by-->
        <form method='GET' action='cipher.php'>
            <div class='container bg-light'>

                <div class="form-group">
                    <label> Enter text to encode:
                        <textarea class="form-control"
                                  rows="3"
                                  name="textToEncode"
                                  required
                                  cols=60
                        ><?= isset($textToEncode) ?
                                sanitize($textToEncode) : 'Secret Message' ?></textarea>
                    </label>
                </div>

                <div class="form-group">
                    <label for='shiftLength'> Shift length:
                        <input type='number' required name='shiftLength' min="1" max="26"
                               value= <?= isset($shiftLength) ? $shiftLength : '2' ?>>
                    </label>
                </div>

                <div class="checkbox">
                    <label class="form-check-label"> Shift direction:</label>
                </div>

                <div class="checkbox">
                    <input type="radio" name="shiftDirection" value="right"
                        <?= (!isset($shiftDirection) or $shiftDirection == 'right') ?
                            'checked' : '' ?>> Rotate Right or Up<br>
                    <input type="radio" name="shiftDirection" value="left"
                        <?= (isset($shiftDirection) && $shiftDirection == 'left') ?
                            'checked' : '' ?>> Rotate Left or Down<br>
                </div>

                <input type='submit'
                       class="btn btn-primary"
                       id='theButton'
                       value='Encode'>

            </div>
        </form>

        <!-- output area for errors and encoded text-->
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
                        Encoded String: <em><?= sanitize($encodedText) ?></em>
                    </div>
                <?php endif; ?>
            </div>
        <?php endif ?>
    </div>
</div>
</body>
</html>