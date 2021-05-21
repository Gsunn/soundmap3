<?php 
    session_start();

    include('includes/funciones.php');

    $_SESSION = []; // vacia $_SESSION
    $newToken = generateFormToken('formLog');   

?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>login form</title>
    <!--<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/meyer-reset/2.0/reset.min.css">-->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/styleLogin.css">
    <!--
  <script src="https://cdnjs.cloudflare.com/ajax/libs/prefixfree/1.0.7/prefixfree.min.js"></script>
-->
</head>

<body>

    <div class="login">
        <div class="login-header">
            <span class="text">LOGIN</span>
            <span class="loader"></span>
        </div>
        <form class="login-form" action="./" 
              role="form" method="post" id="formLog">
            <input class="login-input" type="text" 
                   placeholder="Nick" name="nick" id="nick" 
                   required /> 
            <input class="login-input" type="password" 
                   placeholder="Password" name="pass" id="pass" 
                   required />
            <input class="login-input" type="hidden" 
                   id="token" name="token" 
                   value="<?php echo $newToken; ?>">
            <button class="login-btn" type="submit" id="login">login</button>
        </form>
    </div>

    <script src='js/jquery-3.2.0.min.js'></script>
    <script src="js/index.js" defer async></script>
    <script src="js/notify.min.js" defer async></script>
 
</body>

</html>
