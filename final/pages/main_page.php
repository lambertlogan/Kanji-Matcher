<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Kanji Matcher</title>
        <link rel="icon" type="image/x-icon" href="../assets/favicon.png" />
        <!-- Font Awesome icons (free version)-->
        <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
        <!-- Google fonts-->
        <link href="https://fonts.googleapis.com/css?family=Varela+Round" rel="stylesheet" />
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet" />
        <!-- Core theme CSS (includes Bootstrap)-->
        <link href="../css/styles.css" rel="stylesheet" />
		<style>
			body{
				background-color: #DDAABB;
				}
			
			selector {
				overflow: hidden;
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
	<?php
		
		$kanji_file = "../data/kanji.json";
		$Kanji = json_decode(file_get_contents($kanji_file), true);
		
		$Question = array_rand($Kanji);
		$Answer = $Kanji[$Question];
		$Incorrect = array_values(array_diff($Kanji,[$Answer]));
//rand incorrect is a key
		$RandIncorrect = array_rand($Incorrect, 2);

		$Choices = [
			$Answer, $Incorrect[$RandIncorrect[0]], $Incorrect[$RandIncorrect[1]]
		];
		
		shuffle($Choices);
//Javascript AND PHP?!?!?!
		if ($_SERVER["REQUEST_METHOD"] == "POST"){
			$chosen = $_POST["chosen"];
			$prompt = $_POST["prompt"];
			
//get around null errors
			if ($chosen != "" && $prompt != ""){
				$correct =$Kanji[$prompt];
			
				if ($chosen == $correct){
					echo "<script>alert('Correct!');</script>";
				}
				else{
					echo "<script>alert('Bzzzzzzz! Wrong!');</script>";
				}
			}
		}
	?>
        <!-- Navigation-->
        <nav class="navbar navbar-expand-lg navbar-light fixed-top" id="mainNav">
            <div class="container px-4 px-lg-5">
                <a class="navbar-brand" href="../index.php"><img src="../assets/img/logo.png" height="100px"></a>
                <button class="navbar-toggler navbar-toggler-right" type="button" data-bs-toggle="collapse" data-bs-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                    Menu
                    <i class="fas fa-bars"></i>
                </button>
                <div class="collapse navbar-collapse" id="navbarResponsive">
                    <ul class="navbar-nav ms-auto" style="text-shadow: -1px 1px 2px #99ccbb, 1px 1px 2px #99ccbb, 1px -1px 0 #99ccbb, -1px -1px 0 #99ccbb;">
                        <li class="nav-item"><a class="nav-link" href="../index.php">Home Page</a></li>
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
                        <h1><?php echo $Question;?></h1>
						<br>
						<h3><?php
							foreach ($Choices as $x) {
								echo "<form method='post' action='#' style='display:inline-block; margin:15px;'>";
								echo "<input type='hidden' name='prompt' value='" . $Question . "'>";
								echo "<input type='hidden' name='chosen' value='" . $x . "'>";
								echo "<button type='submit' class='btn btn-primary'>" . $x . "</button>";
								echo "</form>";
						}
						?>
						</h3>
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
