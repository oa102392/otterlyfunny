<?php
  include_once('db_connection.php');
  include 'getAboutInfo.php';


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
      <li class="nav-item active">
        <a class="nav-link" href="index.php">Home <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">Profile</a>
      </li>
        <li class="nav-item">
        <a class="nav-link" href="addjoke.php">Add Joke</a>
      </li>

      <li class="nav-item d-md-none">
        <a class="nav-link" href="notifications/index.html">Notifications</a>
      </li>
      <li class="nav-item d-md-none">
        <a class="nav-link" data-action="growl">Growl</a>
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
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">ï¿½</button>
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
      


<!--About Module -->


      <div class="card d-md-block d-lg-block mb-4">
        <div class="card-body">
          <h6 class="mb-3">About </h6>
          <ul class="list-unstyled list-spaced">
<?php
$AboutInformation = new aboutInfo();
$JokesContributed = $AboutInformation->getAboutInfo(1);

?>
            <li><span class="text-muted icon icon-calendar mr-3"></span>Jokes Contributed <a href="#"><?=$JokesContributed['JokesContributed']?></a>
           
          
            </li><li><span class="text-muted icon icon-home mr-3"></span>Lives in <a href="#"><?=$AboutInformation.getAboutInfo(1)['Hometown']?></a>

    
          </li></ul>
        </div>
      </div>

       <div class="card d-md-block d-lg-block mb-4">
        <div class="card-body">
          <h6 class="mb-3">Select a Joke Category</h6>
          <div data-grid="images" data-target-height="150"><div style="margin-bottom: 10px; margin-right: 10px; display: inline-block; vertical-align: bottom;">
                    <p> 
                      <ul class="list-unstyled" id= "latest_popular">
                        <li id="latest">
                          <a href="#">Latest Jokes</a>
                        </li>
                        <li>Most Popular Jokes</li>
                        <ul >
                          <li id = "popW">
                            <a href="#">past week</a>
                          </li>
                          <li id = "popM">
                            <a href="#">past month</a>
                          </li>
                          <li id = "popY">
                            <a href="#">past year</a>
                          </li>
                          <li id = "popA">
                            <a href="#">all times</a>
                          </li>
                        </ul>
                      </ul>

                    </p>
            </div><div style="margin-bottom: 10px; margin-right: 0px; display: inline-block; vertical-align: bottom;">
              <p> 
    <ul class="list-unstyled" id="categ">
        <?php
        $categoryList = getCategories();
            foreach ($categoryList as $category) {
                echo '<li id="'.$category["CategoryID"].'"><a href="#">'.$category["CategoryName"].'</a></li>';
            }
        ?>
    </ul>
        </p>
            </div></div>
        </div>
      </div>
    </div>

    <div class="col-lg-6">

      <ul class="list-group media-list media-list-stream mb-4">

        <li class="media list-group-item p-4">
          <div class="input-group">
            <form class="input-group">
              <input type="text" class="form-control" id="keyword" placeholder="Search Jokes" >
              
              <input class="btn btn-primary" type="submit" value="Search" onclick="return searchJ()">
            
            </form>
            <div class="input-group-btn">
            
            </div>
          </div>
        </li>

        <li class="media list-group-item p-4">
          
          <div class="media-body text-center">
            <span id="page_jokes"></span>


          
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



<script>
$(document).ready(function(){
 function load_jokes_from_category(id)
 {
  $.ajax({
   url:"fetch.php",
   method:"POST",
   data:{id:id},
   success:function(data)
   {
    $('#page_jokes').html(data);
   }
  });
 }

 load_jokes_from_category(4);

 $('#categ li').click(function(){
  var page_id = $(this).attr("id");
  load_jokes_from_category(page_id);
 });
 });



$(document).ready(function(){
 function load_jokes_latest_popular(id)
 {
  $.ajax({
   url:"latest_popular.php",
   method:"POST",
   data:{id:id},
   success:function(data)
   {
    $('#page_jokes').html(data);
   }
  });
 }

 $('#latest_popular li').click(function(){
  var page_id = $(this).attr("id");
  load_jokes_latest_popular(page_id);
 });
 });


function searchJ(){
      var kw = document.getElementById('keyword').value;
      $.ajax({
        type:"post",
        url: "search.php",
        data:{ 'keyword' :kw },﻿
        cache:false,
        success: function(result){
          $('#page_jokes').html(result);

        }
      })
      return false;
    }

 function upVote(id){
      $.ajax({
        type:"post",
        url: "upV.php",
        data:{  id :id },﻿
        success: function(result){
          $('#uv'+id).html(result);

        }
      })
      return false;
    }


function downVote(id){
      $.ajax({
        type:"post",
        url: "downV.php",
        data:{  id :id },﻿
        success: function(result){
          $('#dv'+id).html(result);

        }
      })
      return false;
    }


</script>