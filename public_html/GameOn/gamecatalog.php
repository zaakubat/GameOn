<?php # Script 3.4 - index.php
include ('includes/session.php');
?>


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
					echo '<Li><a href="gamecatalogadd.php"> Create Game Catalog Entry</a></Li>';
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
				echo '<li><a href="gamecatalog.php">Game Catalog</a></li>';
				echo '<li><a href="view_news_articles.php"> Recent News</a></li>';
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

     <section class="bg-primary" id="about">
        <div class="container">
            <div class="row">
                <table class="tg">
  <tr>
    <th class="tg-s6z2">      </th>
    <th class="tg-wv9z">Title</th>
    <th class="tg-wv9z">Genre</th>
    <th class="tg-wv9z">Platform</th>
    <th class="tg-wv9z">Rating</th>
    <th class="tg-wv9z">Description<br></th>
    <th class="tg-wrg0">Price</th>
  </tr>
  <tr>
    <td class="tg-s6z2">1.</td>
    <td class="tg-p7ly"> <a href="http://cs.neiu.edu/~fsef15g4/GameOn/csgo.php"><b>Counter Strike : Global Offensive </b> <br> <img src="images/csgo.jpg" alt="csgo" height="150" width="250"></a></td>
    <td class="tg-izya">FPS</td>
    <td class="tg-izya">PC</td>
    <td class="tg-izya">4.5/5</td>
    <td class="tg-izya">Online FPS Shooting game in which players <br>can take part in two different teams and compete.<br>Whoever reaches a certain amount of round wins<br>the whole match.</td>
    <td class="tg-13pz">$50</td>
  </tr>
  <tr>
    <td class="tg-s6z2">2.</td>
    <td class="tg-p7ly"><a href="http://cs.neiu.edu/~fsef15g4/GameOn/nfs.php"><b>Need For Speed </b> <br> <img src="images/nfs.jpg" alt="nfs" height="150" width="250"></a></td>
    <td class="tg-izya">Racing</td>
    <td class="tg-izya">XBOX/PS4/PC</td>
    <td class="tg-izya">4.2/5</td>
    <td class="tg-izya">Racing game which includes players driving their<br>own customized cars. They can modify cars and <br>take them online to race other real world users.</td>
    <td class="tg-13pz">$40</td>
  </tr>
  <tr>
    <td class="tg-s6z2">3.</td>
    <td class="tg-p7ly"><a href="http://cs.neiu.edu/~fsef15g4/GameOn/fallout.php"><b>Fallout 4 </b><br><img src="images/fallout4.jpg" alt="fallout4" height="150" width="250"></a></td>
    <td class="tg-izya">ARP</td>
    <td class="tg-izya">XBOX/PS4/PC</td>
    <td class="tg-izya">4.9/5</td>
    <td class="tg-izya">Fallout 4 is set in a post-apocalyptic Boston in the<br>year 2287, 210 years after a devastating nuclear <br>war, in which the player character emerges from<br>an underground bunker known as a Vault.</td>
    <td class="tg-13pz">$60</td>
  </tr>
  <tr>
    <td class="tg-s6z2">4.</td>
    <td class="tg-p7ly"><a href="http://cs.neiu.edu/~fsef15g4/GameOn/dota.php"><b> Dota 2 </b><br> <img src="images/dota2.jpg" alt="dota2" height="150" width="250"></a></td>
    <td class="tg-izya">MOBA</td>
    <td class="tg-izya">PC</td>
    <td class="tg-izya">4.5/5</td>
    <td class="tg-izya">Dota 2 is played in matches between two five-player<br>teams, each of which occupies a stronghold in a <br>corner of the playing field. A team wins by destroying <br>the other side's "Ancient" building, located within <br>the opposing stronghold.</td>
    <td class="tg-13pz">$35</td>
  </tr>
  <tr>
    <td class="tg-s6z2">5.</td>
    <td class="tg-p7ly"><a href="http://cs.neiu.edu/~fsef15g4/GameOn/arma.php"><b>ARMA 2 </b><br> <img src="images/arma2.jpg" alt="arma2" height="150" width="250"></a></td>
    <td class="tg-izya">FPS</td>
    <td class="tg-izya">PC</td>
    <td class="tg-izya">4/5</td>
    <td class="tg-izya">ARMA 2 is a tactical shooter focused primarily on <br>infantry combat, but significant vehicular and <br>aerial combat elements are present. The player <br>is able to command AI squad members which <br>adds a real-time strategy element to the game.</td>
    <td class="tg-13pz">$13</td>
  </tr>
</table>
            </div>
        </div>
    </section>

  





    <!-- jQuery -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

    <!-- Plugin JavaScript -->
    <script src="js/jquery.easing.min.js"></script>
    <script src="js/jquery.fittext.js"></script>
    <script src="js/wow.min.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="js/creative.js"></script>

</body>

</html>
