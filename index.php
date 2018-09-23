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
        <p> The Caesar Cipher, also known as a shift cipher, is one of the oldest and simplest forms of encrypting a message. It is a type of substitution cipher where each letter in the original message is replaced with a letter corresponding to a certain number of letters shifted up or down in the alphabet.</p>
        <form method='GET' action='cipher.php'>
            <div class="form-group">
                <label> Enter a text to encode </label>

         <textarea class="form-control" rows="4" cols="50" name='textToEncode' placeholder="Describe yourself here...">

         </textarea>
            </div>

            <div class="form-group">

                <label> Shift length:

                    <input type='text' maxlength="2" size="2" name='shiftLength' value='2'>
                </label>
            </div>

            <div class="checkbox">
                <label class="form-check-label" for='shiftDirection'> Shift direction:</label>
            </div>
            <div class="checkbox">

                <input type="radio" name="shiftDirection" value="right" checked> Rotate Right or Up<br>
                <input type="radio" name="shiftDirection" value="left"> Rotate Left or Down<br>

            </div>

            <p>

            <div class="btn-group">
                <input type='submit' class="btn btn-primary" value='Encode'>
                <input type="reset" class="btn btn-info">
            </div>
        </form>
    </div>
</div>
</body>
</html>