<?php
require('config.php');
session_start();


$db = new mysqli($dbHost, $dbUser, $dbPass, $dbName);

if ($db->connect_error)
{
	die("Connection failed: " . $db->connect_error);
}
$query = "INSERT INTO submissions (url, submitter) VALUES(?, ?)";


if(isset($_GET['username']))
{
	$stmt = $db->prepare($query);
	$stmt->bind_param("ss", $_GET['url'], $_GET['username']);
	if(!$stmt->execute())
	{
		die("FAIL");
	}
}
?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>HackerTracker</title>

    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="css/1-col-portfolio.css" rel="stylesheet">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>


    <!-- Navigation -->
    <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="#">HackerTracker</a>
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav">
                    <li>
                        <a href="index.php">Submit</a>
                    </li>
                    <li>
                        <a href="review.php">Review</a>
                    </li>
                    <li>
                        <a href="login.php">Login</a>
                    </li>
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>


    <!-- Page Content -->
    <div class="container">

        <!-- Page Heading -->
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">HackerTracker
                    <small>Report Users Hacking</small>
                </h1>
            </div>
        </div>
        
        <form action="index.php" type="get">
            <div class="form-group">
                <label for="username">Accused Username</label>
                <input name="username" type="text" class="form-control" id="username" placeholder="Username">
            </div>
            <div class="form-group">
                <label for="video">YouTube Video ID</label>
                <input name="url" type="text" class="form-control" id="video" placeholder="Youtube">
                <span id="helpBlock" class="help-block">
                Please only submit the Youtube Video ID. See <a href="https://docs.joeworkman.net/rapidweaver/stacks/youtube/video-id">this page</a>
                 for more information.
                </span>
            </div>
            <button type="submit" class="btn btn-default">Submit</button>
        </form>

        <!-- Footer -->
        <footer>
            <div class="row">
                <div class="col-lg-12">
                    <p>Copyright &copy; Sinn Development 2016</p>
                </div>
            </div>
            <!-- /.row -->
        </footer>

    </div>
    <!-- /.container -->

    <!-- jQuery -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

</body>

</html>
