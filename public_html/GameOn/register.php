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
  <title>GameOn Register</title>

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

<?php # Script 8.5 - register.php #2
include ('includes/session.php');

$page_title = 'Register';

	
				
				
require_once ('mysqli_connect.php'); // Connect to the db.

// Check if the form has been submitted:
if (isset($_POST['submitted'])) {

    $errors = array(); // Initialize an error array.

    // Check for a first name:
    if (empty($_POST['first_name'])) {
            $errors[] = 'You forgot to enter your first name.';
    } else {
            $fn = mysqli_real_escape_string($dbc, trim($_POST['first_name']));
    }

    // Check for a last name:
    if (empty($_POST['last_name'])) {
            $errors[] = 'You forgot to enter your last name.';
    } else {
            $ln = mysqli_real_escape_string($dbc, trim($_POST['last_name']));
    }

    // Check for an email address:
    if (empty($_POST['email'])) {
            $errors[] = 'You forgot to enter your email address.';
    } else {
            $e = mysqli_real_escape_string($dbc, trim($_POST['email']));
    }

    // Check for a password and match against the confirmed password:
    if (!empty($_POST['pass1'])) {
            if ($_POST['pass1'] != $_POST['pass2']) {
                    $errors[] = 'Your password did not match the confirmed password.';
            } else {
                    $p = mysqli_real_escape_string($dbc, trim($_POST['pass1']));
            }
    } else {
            $errors[] = 'You forgot to enter your password.';
    }

    if (empty($errors)) { // If everything's OK.
        $t = ($_POST['type_id']);
        
        // Register the user in the database...

        // Make the query:
        $q = "INSERT INTO users (user_type_id, first_name, last_name, email, pass, registration_date) VALUES ($t, '$fn', '$ln', '$e', SHA1('$p'), NOW() )";		
        $r = @mysqli_query ($dbc, $q); // Run the query.
        if ($r) { // If it ran OK.

                // Print a message:
                echo '<h1>Thank you!</h1>
        <p>You are now registered!</p><p><br /></p>';	

        } else { // If it did not run OK.

                // Public message:
                echo '<h1>System Error</h1>
                <p class="error">You could not be registered due to a system error. We apologize for any inconvenience.</p>'; 

                // Debugging message:
                echo '<p>' . mysqli_error($dbc) . '<br /><br />Query: ' . $q . '</p>';

        } // End of if ($r) IF.

        mysqli_close($dbc); // Close the database connection.

        
         
        exit();

    } else { // Report the errors.

            echo '<h1>Error!</h1>
            <p class="error">The following error(s) occurred:<br />';
            foreach ($errors as $msg) { // Print each error.
                    echo " - $msg<br />\n";
            }
            echo '</p><p>Please try again.</p><p><br /></p>';

    } // End of if (empty($errors)) IF.
	
} 

$types = array();

// Make the query:
$q = "SELECT user_type_id, type_name FROM user_types ORDER BY type_name ASC";		

$result = mysqli_query($dbc, $q); // Run the query.

// Count the number of returned rows:
$num = mysqli_num_rows($result);

if ($num > 0) { // If it ran OK, display the records.
       
    while ($row = mysqli_fetch_assoc($result)) {
        $types[] = $row;
    }

    mysqli_free_result ($result); // Free up the resources.	
}

mysqli_close($dbc); // Close the database connection.
?>

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
    <body id="form">
		<img id="top" src="UserSubscribes/top.png" alt="">
		<div id="form_container">
			<br>
			<br>
			<br>
			<br>
			<br>
			
		<h1><a>Register</a></h1>	
			
		<form class="form-signin" role="form" action="register.php" method="post">
    
    <p>User Type: <select name="type_id">
    <?php
    foreach ($types as $type) {
		if (!isset($_SESSION['user_id'])) { //Both can see
			echo "<option value=\"" . 1 . "\">". Customer . "</option>\n";
		}
		else 
		{
			if ($is_admin) {
				echo "<option value=\"" . $type['user_type_id']. "\">" . $type['type_name'] . "</option>\n";
			}
			else{
		
		//Only user can see
			echo "<option value=\"" . 1 . "\">" . Customer . " </option>\n";
			}
		}
    }
    ?>
        </select></p>
    <p>First Name: <input type="normal" class="form-control" placeholder="Your first name" required autofocus name="first_name" maxlength="40" value="<?php if (isset($_POST['first_name'])) echo $_POST['first_name']; ?>" /></p>
    <p>Last Name: <input type="normal" class="form-control" placeholder="Your last name" required name="last_name" maxlength="40" value="<?php if (isset($_POST['last_name'])) echo $_POST['last_name']; ?>" /></p>
    <p>Email Address: <input type="normal" class="form-control" placeholder="Email address" required name="email" maxlength="80" value="<?php if (isset($_POST['email'])) echo $_POST['email']; ?>"  /> </p>
    <p>Password: <input type="password" class="form-control" placeholder="Password" required name="pass1" maxlength="20" /></p>
    <p>Confirm Password: <input type="password" class="form-control" placeholder="Password" required name="pass2" maxlength="20" /></p>
    <p><button type="submit" name="submit" class="btn btn-sm btn-primary" />Register</button></p>
    <input type="hidden" name="submitted" value="TRUE" />
    
    </div>
</form>
</body>

