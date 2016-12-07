<?php
include('config.php');
error_reporting(E_ALL);
ini_set('display_errors', 1);
session_start();

    function showItem($username, $upvotes, $downvotes, $url) 
    {
        echo "
        <div class='row'>
            <div class='col-md-7'>
               
               <iframe width='560' height='315' src='https://www.youtube.com/embed/".$url."' frameborder='0' allowfullscreen></iframe> 
            </div>
            <div class='col-md-5'>
                <h3>". $username ."</h3>
                <h5>Confirm</h5>
                <h5>Deny</h5>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Laudantium veniam exercitationem expedita laborum at voluptate. Labore, voluptates totam at aut nemo deserunt rem magni pariatur quos perspiciatis atque eveniet unde.</p>
            </div>
        </div>
        <hr>";
    }



$loggedin = $_SESSION['loggedin'];

$db = new mysqli($dbHost, $dbUser, $dbPass, $dbName);
if ($db->connect_error)
{
	die("Connection failed: " . $db->connect_error);
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
                    <?php
                    if($loggedin)
                    {
                        echo "
                    <li>
                        <a href=\"login_db.php?logout\">Logout</a>
                    </li>";
                    }
                    else
                    {
                        echo "<li>
                        <a href=\"login.php\">Login</a>
                    </li>";
                    }
                    ?>
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
                <h1 class="page-header">
                <?php 
                if($loggedin)
                {
                    echo "Review Hacking Reports";
                }
                else
                {
                    echo "You are not authorized.";
                }
                ?>
                </h1>
            </div>
        </div>
<?php
if($loggedin){
$query = "SELECT * FROM submissions";
if ($result = $db->query($query)) {

    /* fetch associative array */
    while ($row = $result->fetch_assoc()) {
	//echo isset($row);
	//var_dump($row);	
	showItem($row['submitter'], 0, 0, $row['url']);
    }

    /* free result set */
    $result->free();
}
}
?>
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
