<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">

<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

<link rel="stylesheet" href="materialize/css/style.css"/>
<link rel="stylesheet" href="materialize/css/materialize.css"/>
<link rel="stylesheet" href="materialize/css/materialize.min.css"/>

</head>


<body>
  <nav class="light-blue lighten-1" role="navigation">
    <div class="nav-wrapper container">
      <a id="logo-container" href="index.php" class="brand-logo left">
          <a href="images/logo.jpg"><img src="images/logo.jpg" style="width: 114px; &quot;"></a> 
      </a>
        <ul class="right hide-on-med-and-down">
          <li><a href="app.php">App</a></li>
          <li><a href="about.php">About Us</a></li>
          <li><a href="submit.php">Submit</a></li>

        </ul>


        <ul id="nav-mobile" class="side-nav">
          <li><a href="app.php">App</a></li>
          <li><a href="about.php">About Us</a></li>
          <li><a href="submit.php">Submit</a></li>

        </ul>
        <a href="#" data-activates="nav-mobile" class="button-collapse"><i class="material-icons">menu</i></a>
    </div>
  </nav>


{block name = body}{/block}
{block name = contenuto}{/block}

<footer class="page-footer">
  <div class="footer-copyright">
    <div class="container">
    © 2014 Copyright Text
    <a class="grey-text text-lighten-4 right" href="#!">More Links</a>
    </div>
  </div>
</footer>

<script src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
<script type="text/javascript" src="materialize/js/materialize.js"></script>
<script type="text/javascript" src="materialize/js/materialize.min.js"></script>
<script type="text/javascript" src="materialize/js/init.js"></script>
<script type="text/javascript" src="materialize/js/style.js"></script>

</body>
</html>
