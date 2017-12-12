
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>GameOn Password Change</title>

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

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

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


<?php # Script 8.7 - password.php
include ('includes/session.php');

// This page lets a user change their password.

$page_title = 'Change Your Password';


// Check if the form has been submitted:
if (isset($_POST['submitted'])) {

	require_once ('mysqli_connect.php'); // Connect to the db.
		
	$errors = array(); // Initialize an error array.
	
	// Check for an user:
	if (!isset($_SESSION['user_id'])) {
		$errors[] = 'You must be first signed in to change your password.';
	} else {
		$e = $_SESSION['user_id'];
	}
	        
	// Check for the current password:
	if (empty($_POST['pass'])) {
		$errors[] = 'You forgot to enter your current password.';
	} else {
		$p = mysqli_real_escape_string($dbc, trim($_POST['pass']));
	}

	// Check for a new password and match 
	// against the confirmed password:
	if (!empty($_POST['pass1'])) {
		if ($_POST['pass1'] != $_POST['pass2']) {
			$errors[] = 'Your new password did not match the confirmed password.';
		} else {
			$np = mysqli_real_escape_string($dbc, trim($_POST['pass1']));
		}
	} else {
		$errors[] = 'You forgot to enter your new password.';
	}
	
	if (empty($errors)) { // If everything's OK.
	
		// Check that they've entered the right email address/password combination:
		$q = "SELECT user_id FROM users WHERE (user_id=$e AND pass=SHA1('$p') )";
		$r = @mysqli_query($dbc, $q);
		$num = @mysqli_num_rows($r);
		if ($num == 1) { // Match was made.
		
			// Get the user_id:
			$row = mysqli_fetch_array($r, MYSQLI_NUM);

			// Make the UPDATE query:
			$q = "UPDATE users SET pass=SHA1('$np') WHERE user_id=$row[0]";		
			$r = @mysqli_query($dbc, $q);
			
			if (mysqli_affected_rows($dbc) == 1) { // If it ran OK.
			
				// Print a message.
				echo '<h1>Thank you!</h1>
				<p>Your password has been updated.</p><p><br /></p>';	
			
			} else { // If it did not run OK.
			
				// Public message:
				echo '<h1>System Error</h1>
				<p class="error">Your password could not be changed due to a system error. We apologize for any inconvenience.</p>'; 
				
				// Debugging message:
				echo '<p>' . mysqli_error($dbc) . '<br /><br />Query: ' . $q . '</p>';
				
			}

			// Include the footer and quit the script (to not show the form).
			include ('includes/footer.html'); 
			exit();
				
		} else { // Invalid email address/password combination.
			echo '<h1>Error!</h1>
			<p class="error">The email address and password do not match those on file.</p>';
		}
		
	} else { // Report the errors.
	
		// Print any error messages, if they exist:
                if (!empty($errors)) {
                    echo '<div class="alert alert-danger">
                            <strong>Error changing password.</strong><br />
                    The following error(s) occurred:<br />';
                    foreach ($errors as $msg) {
                            echo " - $msg<br />\n";
                    }
                    echo '</p><p>Please try again.</p></div>';
                }
		
	} // End of if (empty($errors)) IF.

	mysqli_close($dbc); // Close the database connection.
		
}
?>

<body id="form">
	<img id="top" src="UserSubscribes/top.png" alt="">
	<div id="form_container">
		<br>
		<br>
		<br>
		<br>
	

		<form id="form_1076036" class="appnitro"  method="post" action="">
					<div class="form_description">
		
			<p></p>
		</div>	
		
		
		
		
							
			<ul >

<form class="form-signin" role="form" action="password.php" method="post">
	<br>
	<br>
	<br>
	<br>
    <h2 class="form-signin-heading">Change Your Password</h2>
    <input type="password" class="form-control" style="width:75%" placeholder="Current Password" required name="pass">
    <input type="password" class="form-control" style="width:75%" placeholder="New Password" required name="pass1">
    <input type="password" class="form-control" style="width:75%" placeholder="New Password" required name="pass2">
    <br>
    <button class="btn btn-sm btn-primary" type="submit" name="submit">Change Password</button>
    <input type="hidden" name="submitted" value="TRUE" />
</form>

</body>
</html>
