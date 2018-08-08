<?php

require 'db_connection.php';
$dbConn = getDatabaseConnection();

function getCategories() {
global $dbConn;
$sql = "SELECT CategoryID, CategoryName FROM JokeCategories ORDER BY CategoryName";
$stmt = $dbConn -> prepare($sql);
$stmt -> execute();
return $stmt -> fetchAll();
}


if (isset($_POST['add'])) {//checks whether the "Add" button was clicked

$sql = "INSERT INTO Jokes
(CategoryID, Joke)
VALUES
(:CategoryID, :Joke)";
$stmt = $dbConn -> prepare($sql);
$stmt -> execute(array(":CategoryID" => $_POST['CategoryID'], ":Joke" => $_POST['Joke']));
echo "<br>";
echo "Joke added successfully!";
}
?>

<html lang="en"><head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="keywords" content="">
    <meta name="author" content="">

    <title>
      
        Otterly Hilarious
      
    </title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

    <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,300,600" rel="stylesheet" type="text/css">
    <link href="assets/css/toolkit.css" rel="stylesheet">
    
    <link href="assets/css/application.css" rel="stylesheet">

    <style>
      /* note: this is a hack for ios iframe for bootstrap themes shopify page */
      /* this chunk of css is not part of the toolkit :) */
      body {
        width: 1px;
        min-width: 100%;
        *width: 100%;
      }
    </style>

  </head>


<body class="with-top-navbar">
  


<div class="growl" id="app-growl"></div>

<nav class="navbar navbar-expand-md fixed-top navbar-dark bg-primary app-navbar">

  <a class="navbar-brand" href="index.php">
    <img src="assets/img/otterlogowhite.png" alt="brand" height="25">
  </a>

  <button class="navbar-toggler navbar-toggler-right d-md-none" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarResponsive">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item">
        <a class="nav-link" href="index.php">Home </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">Profile</a>
      </li>
        <li class="nav-item active">
        <a class="nav-link" href="addjoke.php">Add Joke<span class="sr-only">(current)</span></a>
      </li>

      <li class="nav-item d-md-none">
        <a class="nav-link" href="login/index.html">Logout</a>
      </li>

    </ul>

    
    <ul id="#js-popoverContent" class="nav navbar-nav float-right mr-0 d-none d-md-flex">
      <li class="nav-item">
       
      </li>
      <li class="nav-item ml-2">
        <button class="btn btn-default navbar-btn navbar-btn-avatar" data-toggle="popover" data-original-title="" title="">
          <img class="rounded-circle" src="assets/img/avatar-dhg.png">
        </button>
      </li>
    </ul>

    <ul class="nav navbar-nav d-none" id="js-popoverContent">
      
      <li class="nav-item"><a class="nav-link" href="login/index.html">Logout</a></li>
    </ul>
  </div>
</nav>


<div class="modal fade" id="userModal" tabindex="-1" role="dialog" aria-labelledby="userModal" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Users</h4>
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">�</button>
      </div>

      <div class="modal-body p-0">
        <div class="modal-body-scroller">
          <ul class="media-list media-list-users list-group">
            <li class="list-group-item">
              <div class="media w-100">
                <img class="media-object d-flex align-self-start mr-3" src="assets/img/avatar-fat.jpg">
                <div class="media-body">
                  <button class="btn btn-secondary btn-sm float-right">
                    <span class="glyphicon glyphicon-user"></span> Follow
                  </button>
                  <strong>Jacob Thornton</strong>
                  <p>@fat - San Francisco</p>
                </div>
              </div>
            </li>
            <li class="list-group-item">
              <div class="media w-100">
                <img class="media-object d-flex align-self-start mr-3" src="assets/img/avatar-dhg.png">
                <div class="media-body">
                  <button class="btn btn-secondary btn-sm float-right">
                    <span class="glyphicon glyphicon-user"></span> Follow
                  </button>
                  <strong>Dave Gamache</strong>
                  <p>@dhg - Palo Alto</p>
                </div>
              </div>
            </li>
            <li class="list-group-item">
              <div class="media w-100">
                <img class="media-object d-flex align-self-start mr-3" src="assets/img/avatar-mdo.png">
                <div class="media-body">
                  <button class="btn btn-secondary btn-sm float-right">
                    <span class="glyphicon glyphicon-user"></span> Follow
                  </button>
                  <strong>Mark Otto</strong>
                  <p>@mdo - San Francisco</p>
                </div>
              </div>
            </li>
          </ul>
        </div>
      </div>
    </div>
  </div>
</div>


<div class="container pt-4 pb-5">
  <div class="row">
    <div class="col-lg-3">
      


      <div class="media-body text-center">
        <div class="card-body">
          <h6 class="mb-3">Add a joke </h6>
          <p> <form method='post'>
              <textarea name="Joke" rows="15" cols="60" placeholder="Enter joke"></textarea><br />
              <br>
              Joke Category:
              <select name="CategoryID">
              <option disabled selected value> -select- </option>
              <?php $categoryList = getCategories();
              foreach ($categoryList as $category) {
              echo "<option value='" . $category['CategoryID'] . "'>" . $category['CategoryName'] . "</option>";
              }
              ?>
              </select>
              <input class="btn btn-primary" type="submit" name="add" value="Add joke"/>
            </form> </p>
          
        </div>
      </div>

    </div>
          
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/js/popper.min.js"></script>
    <script src="assets/js/chart.js"></script>
    <script src="assets/js/toolkit.js"></script>
    <script src="assets/js/application.js"></script>
    <script>
      // execute/clear BS loaders for docs
      $(function(){while(window.BS&&window.BS.loader&&window.BS.loader.length){(window.BS.loader.pop())()}})
    </script>
  


</body></html>

