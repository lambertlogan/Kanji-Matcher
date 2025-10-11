<!DOCTYPE html>
<?php
	require("functions.php");
	$response = null;
	if(isset($_POST["submit"])){
		$response = storeMessage($_POST["comment"]);
	}
	
	$new_array = [];
	
	if(file_exists("comments.json")){
		$comment_data = file_get_contents("comments.json");
		$comment_array = json_decode($comment_data, true);
	}
	if (isset($_POST["delete2"])) {
		$delete = trim($_POST["delete2"] ?? "");

		$new_array = [];
		foreach ($comment_array as $i) {
			if ((string)$i["id"] !== (string)$delete) {
				$new_array[] = $i;
			}
		}
		file_put_contents("comments.json", json_encode($new_array));
		$comment_array = $new_array; 
	}
	
?>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Kanji Matcher</title>
        <link rel="icon" type="image/x-icon" href="assets/favicon.png" />
        <!-- Font Awesome icons (free version)-->
        <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
        <!-- Google fonts-->
        <link href="https://fonts.googleapis.com/css?family=Varela+Round" rel="stylesheet" />
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet" />
        <!-- Core theme CSS (includes Bootstrap)-->
        <link href="css/styles.css" rel="stylesheet" />
		<style>
			body{
				background-color: #DDAABB;
				}
		</style>
    </head>
<!-- prevents refresh bug -->
	<script>
			if ( window.history.replaceState ) {
				window.history.replaceState( null, null, window.location.href );
			}
	</script>
    <body id="page-top">
        <!-- Navigation-->
        <nav class="navbar navbar-expand-lg navbar-light fixed-top" id="mainNav">
            <div class="container px-4 px-lg-5">
                <a class="navbar-brand" href="home_page.php"><img src="assets/img/logo.png" height="100px"></a>
                <button class="navbar-toggler navbar-toggler-right" type="button" data-bs-toggle="collapse" data-bs-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                    Menu
                    <i class="fas fa-bars"></i>
                </button>
                <div class="collapse navbar-collapse" id="navbarResponsive">
                    <ul class="navbar-nav ms-auto" style="text-shadow: -1px 1px 2px #99ccbb, 1px 1px 2px #99ccbb, 1px -1px 0 #99ccbb, -1px -1px 0 #99ccbb;">
                        <li class="nav-item"><a class="nav-link" href="home_page.php">Home Page</a></li>
						<li class="nav-item"><a class="nav-link" href="main_page.php">Main Page</a></li>
                        <li class="nav-item"><a class="nav-link" href="user_wall.php">User Wall</a></li>
						<li class="nav-item"><a class="nav-link" href="contact_page.php">Contact</a></li>
                    </ul>
                </div>
            </div>
        </nav>
        <!-- Masthead-->
        <header class="masthead">
            <div class="container px-4 px-lg-5 d-flex h-100 align-items-center justify-content-center">
                <div class="d-flex justify-content-center">
                    <div class="text-center">
                        <h1 class="mx-auto my-0 text-uppercase"><span style="font-family: segoe ui semibold;">Create:</span></h1>

<!--
I followed a tutorial on youtube as guidance for a lot of this section, but I also deviated from it a lot.
This comment applies to the functions.php file and the comments.json file as well, as all of these
pages are related to one another.
link to the video: https://www.youtube.com/watch?v=ssRnf9YIBA8
-->
                        <br><br>
						<form action="" method="POST">
							<label for="comment"><span class="text-white-50 mx-auto mt-2 mb-5" style="text-shadow: -1px 1px 2px #99ccbb, 1px 1px 2px #99ccbb, 1px -1px 0 #99ccbb, -1px -1px 0 #99ccbb;">Comment:</span></label><br><br>
							<textarea style="width: 750px; height: 250px;" name="comment"><?php echo @$_POST["deletetext"] ?></textarea><br><br>
							<input class="btn btn-primary" type="submit" name="submit" value="Submit">
						</form>
						
                    </div>
                </div>
            </div>
			<div class="container px-4 px-lg-5 d-flex h-100 align-items-center justify-content-center">
                <div class="d-flex justify-content-center">
				
				
				
                    <div class="text-center">
                        <h1 class="mx-auto my-0 text-uppercase"><span style="font-family: segoe ui semibold;">Delete Entry:</span></h1>
						<br><br>
						<form action="" method="POST">
							<label for="delete"><span class="text-white-50 mx-auto mt-2 mb-5" style="text-shadow: -1px 1px 2px #99ccbb, 1px 1px 2px #99ccbb, 1px -1px 0 #99ccbb, -1px -1px 0 #99ccbb;">ID:</span></label><br><br>
							<input type="number" name="delete2" id="delete"><br><br>
							<input class="btn btn-primary" type="submit" name="delete" value="Delete">
						</form>
					</div>
					
					
					
					
					
				</div>
			</div>
			 <div class="container px-4 px-lg-5 d-flex h-100 align-items-center justify-content-center">
				<div class="d-flex justify-content-center" style="padding-bottom:100px;">
					<div class="text-center">
						<table style="text-shadow: -1px 1px 2px #99ccbb, 1px 1px 2px #99ccbb, 1px -1px 0 #99ccbb, -1px -1px 0 #99ccbb; color:white;">
						<?php
							foreach ($comment_array as $x) {
								echo "<tr><td>" . $x['id'] . "⠀</td><td>" . $x['comment'] . "⠀</td><td>" . $x['recieved-on'] . "\n</td></tr>";
							}
							?>
						</table>
					</div>
				</div>
			</div>
        </header>
        <!-- Bootstrap core JS-->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
        <!-- Core theme JS-->
        <script src="js/scripts.js"></script>
        <!-- * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *-->
        <!-- * *                               SB Forms JS                               * *-->
        <!-- * * Activate your form at https://startbootstrap.com/solution/contact-forms * *-->
        <!-- * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *-->
        <script src="https://cdn.startbootstrap.com/sb-forms-latest.js"></script>
    </body>
</html>
