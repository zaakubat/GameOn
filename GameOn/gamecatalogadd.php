<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>GameOn!</title>

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

<style type="text/css">
.tg  {border-collapse:collapse;border-spacing:0;}
.tg td{font-family:Arial, sans-serif;font-size:14px;padding:20px 16px;border-style:solid;border-width:0px;overflow:hidden;word-break:normal;}
.tg th{font-family:Arial, sans-serif;font-size:14px;font-weight:normal;padding:20px 16px;border-style:solid;border-width:0px;overflow:hidden;word-break:normal;}
.tg .tg-s6z2{text-align:center}
.tg .tg-wrg0{font-size:22px;text-align:center;vertical-align:top}
.tg .tg-wv9z{font-size:22px;text-align:center}
.tg .tg-p7ly{font-weight:bold;font-size:20px;text-align:center;font-color:white}
.tg .tg-izya{font-size:18px;text-align:center}
.tg .tg-13pz{font-size:18px;text-align:center;vertical-align:top}
a:link    {color:white; background-color:transparent; text-decoration:none}
a:visited {color:pink; background-color:transparent; text-decoration:none}
a:hover   {color:white; background-color:transparent; text-decoration:underline}
a:active  {color:yellow; background-color:transparent; text-decoration:underline}

</style>

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
                <a class="navbar-brand page-scroll" href="#page-top">GameOn!</a>
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav navbar-right">
					<li>
                        <a class="page-scroll" href="#about">About</a>
                    </li>
                    <li>
                        <a class="page-scroll" href="#register">Register</a>
                    </li>
                    <li>
                        <a class="page-scroll" href="gamecatalog.php">Game Catalog</a>
                    </li>

                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container-fluid -->
    </nav>

     <section class="bg-primary" id="about">


<?php # Script 8.5 - register.php #2
include ('includes/session.php');
$page_title = 'gamecatalogadd';


// Check if the form has been submitted:
if (isset($_POST['submitted'])) {

	require_once ('mysqli_connect.php'); // Connect to the db.
		
	$errors = array(); // Initialize an error array.
	
	// Check for an title:
	if (empty($_POST['title'])) {
		$errors[] = 'You forgot to enter a Title.';
	} else {
		$ah = mysqli_real_escape_string($dbc, trim($_POST['title']));
	}
	
	// Check for genre:
	if (empty($_POST['genre'])) {
		$errors[] = 'You forgot to enter the Genre.';
	} else {
		$nac = mysqli_real_escape_string($dbc, trim($_POST['genre']));
	}
	
	if (empty($_POST['platform'])) {
		$errors[] = 'You forgot to enter the platform.';
	} else {
		$nab = mysqli_real_escape_string($dbc, trim($_POST['platform']));
	}
	if (empty($_POST['description'])) {
		$errors[] = 'You forgot to enter the Description.';
	} else {
		$nae = mysqli_real_escape_string($dbc, trim($_POST['description']));
	}
	if (empty($_POST['price'])) {
		$errors[] = 'You forgot to enter the Price.';
	} else {
		$naf = mysqli_real_escape_string($dbc, trim($_POST['price']));
	}
	if (empty($_POST['rating'])) {
		$errors[] = 'You forgot to enter the Genre.';
	} else {
		$nag = mysqli_real_escape_string($dbc, trim($_POST['rating']));
	}
	if (empty($errors)) { // If everything's OK.
	
		// Upload the article to the database...
		
		// Make the query:
		$q = "INSERT INTO game_catalog (title, genre, platform, rating, description, price) VALUES ('$ah', '$nac','$nab','$nag','$nae','$naf')";		
		$r = @mysqli_query ($dbc, $q); // Run the query.
		if ($r) { // If it ran OK.
		
			// Print a message:
			echo '<h1>Thank you!</h1>
		<p>Your game has been successfully uploaded!</p><p><br /></p>';	
		
		
		} else { // If it did not run OK.
			
			// Public message:
			echo '<h1>System Error</h1>
			<p class="error">You could not upload the game due to a system error. We apologize for any inconvenience.</p>'; 
			
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

<body id="main_body" >
	
		<form action="gamecatalogadd.php" method="post" class="appnitro" enctype="multipart/form-data" >
					<div class="form_description">
			<h2 style="font-size:300%;text-align:center">ADD GAMES TO GAME CATALOG</h2>
			<p style="font-size:180%;text-align:center">Please fill out the following information to add a game to the catalog.</p>
		</div>						
			<ul >
			

		</li>		<li id="li_2" >
		<label class="description" for="element_2">title
 </label>
		<div>
			<input id="element_2" style="color:black" name="title" class="element text medium" type="text" maxlength="255" value="<?php if (isset($_POST['title'])) echo $_POST['title']; ?>"/> 
		</div> 
		</li>		<li id="li_4" >
		<label class="description" for="element_4">genre </label>
		<div>
			<input id="element_4" style="color:black" name="genre" class="element text medium" type="text" maxlength="255" value="<?php if (isset($_POST['genre'])) echo $_POST['genre']; ?>"/> 
		</div> 
		</li>		<li id="li_5" >
		<label class="description" for="element_5">platform </label>
		<div>
			<input id="element_5" style="color:black" name="platform" class="element text medium" type="text" maxlength="255" value="<?php if (isset($_POST['platform'])) echo $_POST['platform']; ?>"/> 
		</div> 
		</li>		<li id="li_6" >
		<label class="description" for="element_6">rating </label>
		<div>
			<input id="element_6" style="color:black" name="rating" class="element text medium" type="text" maxlength="255" value="<?php if (isset($_POST['rating'])) echo $_POST['rating']; ?>"/> 
		</div> 
		</li>		<li id="li_3" >
		<label class="description" for="element_3">description </label>
		<div>
			<textarea id="element_3" style="color:black" name="description" class="element textarea medium" value="<?php if (isset($_POST['description'])) echo $_POST['description']; ?>"></textarea> 
		</div> 
		</li>		<li id="li_7" >
		<label class="description" for="element_7">price $</label>
				<span>
			<input id="element_7_1" style="color:black" name="price" class="element text currency" size="10" value="<?php if (isset($_POST['price'])) echo $_POST['price']; ?>" type="text" />	
					</span>
			 
		</li>
			
					<li class="buttons">
			    <input type="hidden" name="submitted" value="TRUE" />
			    
				<input id="submit" class="button_text" style="color:black" type="submit" name="submit" value="Submit" />
		</li>
			</ul>
		</form>	
		
	</div>
	</body>

    </section>

  



</body>

</html>
