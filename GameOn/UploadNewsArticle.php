<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>GameOn Upload News Article</title>
<link rel="stylesheet" type="text/css" href="UserSubscribes/view.css" media="all">
<script type="text/javascript" src="UserSubscribes/view.js"></script>



 
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="GameOn">
    <meta name="author" content="Group4">

    <title>GameOn Upload News Article</title>

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
$page_title = 'UploadNewsArticle';


// Check if the form has been submitted:
if (isset($_POST['submitted'])) {

	require_once ('mysqli_connect.php'); // Connect to the db.
		
	$errors = array(); // Initialize an error array.
	
	// Check for an ArticleHeadline:
	if (empty($_POST['ArticleHeadline'])) {
		$errors[] = 'You forgot to enter a headline.';
	} else {
		$ah = mysqli_real_escape_string($dbc, trim($_POST['ArticleHeadline']));
	}
	
	// Check for NewsArticleContent:
	if (empty($_POST['NewsArticleContent'])) {
		$errors[] = 'You forgot to enter News Article Content.';
	} else {
		$nac = mysqli_real_escape_string($dbc, trim($_POST['NewsArticleContent']));
	}
	
	if (empty($errors)) { // If everything's OK.
	
		// Upload the article to the database...
		
		// Make the query:
		$q = "INSERT INTO NewsArticles (ArticleHeadline, NewsArticleContent) VALUES ('$ah', '$nac')";		
		$r = @mysqli_query ($dbc, $q); // Run the query.
		if ($r) { // If it ran OK.
		
			// Print a message:
			echo '<h1>Thank you!</h1>
		<p>Your article has been successfully uploaded!</p><p><br /></p>';	
		
		
		} else { // If it did not run OK.
			
			// Public message:
			echo '<h1>System Error</h1>
			<p class="error">You could not upload an article due to a system error. We apologize for any inconvenience.</p>'; 
			
			// Debugging message:
			echo '<p>' . mysqli_error($dbc) . '<br /><br />Query: ' . $q . '</p>';
						
		} // End of if ($r) IF.
		
		mysqli_close($dbc); // Close the database connection.

		// Include the footer and quit the script:
		
		exit();
		
	} else { // Report the errors.
	
		echo '<h1>Error!</h1>
		<p class="error">The following error(s) occurred:<br />';
		foreach ($errors as $msg) { // Print each error.
			echo " - $msg<br />\n";
		}
		echo '</p><p>Please try again.</p><p><br /></p>';
		
	} // End of if (empty($errors)) IF.
	
	mysqli_close($dbc); // Close the database connection.

} // End of the main Submit conditional.
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
			if (!isset($_SESSION['user_id'])) { //Both can see
				
				echo '<li><a href="register.php">Register</a></li> ';
				echo '<li><a href="login.php">Sign In</a></li>';
				
				
			}
			else
			{
				if ($is_admin) { // Only admin can see
					echo '<li><a href="view_users.php">View Users</a></li>';
					echo '<li><a href="view_subscribers.php"> View Subscribers</a></li>'; //View who subscribe
					echo '<li><a href="create_newsletter.php"> Create Newsletter</a></li>'; 
					echo '<li><a href="edit_newsletter.php"> Edit Newsletter</a></li>'; 
					echo '<li><a href="preview_newsletter.php"> Preview Newsletter</a></li>'; 
					
					
				}
				//Only user can see
				echo '<li><a href="gamecatalog.php">Games Catalog</a></li>';
				echo '<li><a href="FormUserSubscribes.php">Newsletter Subscription</a></li>';
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
	
<h1><a>Upload News Articles</a></h1>
		<form id="form_1076036" class="appnitro"  method="post" action="">
					<div class="form_description">
			<h2>Upload News Articles</h2>
			<p></p>
		</div>	
		
		
		
		
							
			<ul >
<form action="UploadNewsArticle.php" method="post">
	<p>Article Headline: <input type="text" name="ArticleHeadline" style="width:75%" maxlength="200" value="<?php if (isset($_POST['ArticleHeadline'])) echo $_POST['ArticleHeadline']; ?>" /></p>
	<p>News Article Content: <input type="text" style="font-size:18pt;line-height:1;height:420px;width:95%;" maxlength="2000" name="NewsArticleContent" value="<?php if (isset($_POST['NewsArticleContent'])) echo $_POST['NewsArticleContent']; ?>" /></p>
	<p><input type="submit" name="submit" value="UploadNewsArticle" /></p>
	<input type="hidden" name="submitted" value="TRUE" />
</form>

</body>
</html>
