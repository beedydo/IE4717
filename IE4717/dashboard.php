
<html lang="en"> 
		<head> 
			<title>EEElectronics - Login </title> 
			<meta charset=“utf-8”> 
			<link rel="stylesheet" href="/view/css/style.css">

        <?php


        include "dbconnect.php";

        

        use \Phppot\Member;
        if (! empty($_SESSION["userId"])) {
            require_once __DIR__ . './Member.php';
            $member = new Member();
            $memberResult = $member->getMemberById($_SESSION["userId"]);
            if(!empty($memberResult[0]["display_name"])) {
                $displayName = ucwords($memberResult[0]["display_name"]);
            } else {
                $displayName = $memberResult[0]["user_name"];
            }
        }
        ?>
<html>
<head>
<title>User Login</title>
<link href="./styling.css" rel="stylesheet" type="text/css" />
</head>
<body>
    <div id="wrapper">
				<div id="main">
                    <div class="dashboard">
                        <div class="member-dashboard">Welcome <b><?php echo $displayName; ?></b>, You have successfully logged in!<br>
                            Click to <a href="./logout.php" class="logout-button">Logout</a>
                        </div>
                    </div>
				</div>
				<footer>
				</footer>
			</div>
    <div>
        
    </div>
</body>
</html>