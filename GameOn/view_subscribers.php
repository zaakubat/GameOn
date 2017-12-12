<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>SubscribesForm</title>
<link rel="stylesheet" type="text/css" href="UserSubscribes/view.css" media="all">
<script type="text/javascript" src="UserSubscribes/view.js"></script>


   <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="GameOn">
    <meta name="author" content="Group4">
  <title>GameOn View Subscribers</title>

    <!-- Bootstrap Core CSS -->
    <link rel="stylesheet" href="css/bootstrap.min.css" type="text/css">

    <!-- Custom Fonts -->
    <link href='http://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Merriweather:400,300,300italic,400italic,700,700italic,900,900italic' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="font-awesome/css/font-awesome.min.css" type="text/css">

    <!-- Plugin CSS -->
    <link rel="stylesheet" href="css/animate.min.css" type="text/css">

    <!-- Custom CSS -->
    <link rel="stylesheet" href="css/creative.css" type="text/css">

</head>



<body id="page-top">

    <nav id="mainNav" class="navbar navbar-default navbar-fixed-top">
        <div class="container-fluid">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand page-scroll" href="#page-top"></a>
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav navbar-right">
				<li><a href="index.php">Home</a></li>
                
				<?php 
			
			include ('includes/session.php');
			if (!isset($_SESSION['user_id'])) { //Both can see... Home Page
				
				echo '<li><a href="register.php">Register</a></li> ';
				echo '<li><a href="login.php">Sign In</a></li>';
				
				
			}
			else
			{
				if ($is_admin) { // Only admin can see
					echo '<Li><a href="under_construction.php"> Create Catalog Entry</a></Li>';
					echo '<Li><a href="UploadNewsArticle.php"> Create News Article</a></Li>';
					echo '<li><a href="create_newsletter.php"> Create Newsletter</a></li>';
					
					echo '<li><a href="under_construction.php"> Edit Catalog Entry</a></li>';
					echo '<li><a href="under_construction.php"> Edit News Article</a></li>';
					echo '<li><a href="edit_newsletter.php"> Edit Newsletter</a></li>'; 
					
					echo '<li><a href="view_subscribers.php"> View Subscribers</a></li>';
					echo '<li><a href="view_users.php">View Users</a></li>';
					 //View who subscribe
					 
					
					
					
					
				}
				//Both can see
				echo '<li><a href="gamecatalog.php">Games Catalog</a></li>';
				echo '<li><a href="view_news_articles.php"> Recent News</a></li>';
				echo '<li><a href="formUserSubscribes.php">Newsletter Subscription</a></li>';
				echo '<li><a href="password.php">Change Password</a></li>';
				echo '<li><a href="logout.php">Log Out</a></li>';
				
			}
			?>
            
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container-fluid -->
    </nav>
 </body>
 <body>
	 <br>
	 <br>
	 <br>
 <div>
 <?php # Script 8.6 - view_users.php #2
include ('includes/session.php');
// This script retrieves all the records from the users table.

$page_title = 'View the Current Newsletter Subscribers';


// Page header:
echo '<h1>Registered Subscribers</h1>';

require_once ('mysqli_connect.php'); // Connect to the db.
		
// Make the query:
$q = "SELECT CONCAT(last_name, ', ', first_name) AS name, DATE_FORMAT(date, '%M %d, %Y') AS dr FROM user_subscribes ORDER BY date ASC";		
$r = @\mysqli_query($dbc, $q); // Run the query.

// Count the number of returned rows:
$num = mysqli_num_rows($r);

if ($num > 0) { // If it ran OK, display the records.

	// Print how many users there are:
	echo "<p>There are currently $num registered subscribers.</p>\n";

	// Table header.
	echo '<table align="center" cellspacing="3" cellpadding="3" width="75%">
	<tr><td align="left"><b>Name</b></td><td align="left"><b>Date Registered</b></td></tr>
';
	
	// Fetch and print all the records:
	while ($row = mysqli_fetch_array($r, MYSQLI_ASSOC)) {
		echo '<tr><td align="left">' . $row['name'] . '</td><td align="left">' . $row['dr'] . '</td></tr>
		';
	}

	echo '</table>'; // Close the table.
	
	mysqli_free_result ($r); // Free up the resources.	

} else { // If no records were returned.

	echo '<p class="error">There are currently no registered subscribers.</p>';

}

mysqli_close($dbc); // Close the database connection.


?>
 </div>
 </body>
</html>

