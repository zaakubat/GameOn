<link rel="stylesheet" type="text/css" href="UserSubscribes/view.css" media="all">
<script type="text/javascript" src="UserSubscribes/view.js"></script>


   <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="GameOn">
    <meta name="author" content="Group4">
  <title>GameOn Log In</title>

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

<?php 
include ('includes/session.php');
$page_title = 'Sign In';
$errors = "";

if (isset($_POST['submitted'])) {

    require_once ('login_functions.inc.php');
    require_once ('mysqli_connect.php');
    list ($check, $data) = check_login($dbc, $_POST['email'], $_POST['pass']);

    if ($check) { // OK!
            session_save_path('');
            // Set the session data:.
            $_SESSION['user_id'] = $data['user_id'];
            $_SESSION['first_name'] = $data['first_name'];
            $_SESSION['last_name'] = $data['last_name'];
            $_SESSION['user_type_id'] = $data['user_type_id'];

            // Store the HTTP_USER_AGENT:
            $_SESSION['agent'] = md5($_SERVER['HTTP_USER_AGENT']);

            // Redirect:
            $url = absolute_url ('index.php');
            header("Location: $url");
            exit();

    } else { // Unsuccessful!
		$errors = $data;
    }

    mysqli_close($dbc);	    
} // End of the main submit conditional.

include ('includes/header.php');









// Print any error messages, if they exist:
if (!empty($errors)) {
	echo '<div class="alert alert-danger">
				<strong>Error signing in.</strong><br />
	The following error(s) occurred:<br />';
	foreach ($errors as $msg) {
		echo " - $msg<br />\n";
		}
	echo '</p><p>Please try again.</p></div>';
}     
?>
<body>
	<div>
		<br>
		<br>
		<br>
	<form class="form-signin" role="form" action="login.php" method="post">
    <h2 class="form-signin-heading">Please sign in</h2>
    <input type="normal" class="form-control" placeholder="Email address" required autofocus name="email" value="<?php if (isset($_POST['email'])) echo $_POST['email']; ?>">
    <input type="password" class="form-control" placeholder="Password" required name="pass">
    <label class="checkbox">
      <input type="checkbox" value="remember-me"> Remember me
    </label>
    <button class="btn btn-sm btn-primary" type="submit" name="submit">Sign in</button>
    <input type="hidden" name="submitted" value="TRUE" />
</form>
</div>
</body>

<?php
include ('includes/footer.html');
?>


<body id="page-top">
<br>
<br>
<br>

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
					echo '<li><a href="preview_newsletter.php"> Preview Newsletter</a></li>';
					
					echo '<li><a href="under_construction.php"> Edit Catalog Entry</a></li>';
					echo '<li><a href="under_construction.php"> Edit News Article</a></li>';
					echo '<li><a href="under_construction.php"> Edit Newsletter</a></li>'; 
					
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
 </html>

