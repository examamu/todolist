<!doctype html>
<html>
<head>
<meta charset="UTF-8">
<title><?php echo TITLE ;?></title>
<link rel="stylesheet" href="./css/sanitize.css">
<link rel="stylesheet" href="./css/style.css">
</head>

<body>
	<header>
		<div class="header_inner">
			<div class="logo"><a href = "./index.php"><img src="images/logo.png" alt="To Do リスト"></a></div>
			<p>このページは日に日に少しずつプログラミングを勉強していくつばさが管理しています。</p>
			<form method = "POST">
				<input type = "submit" name = "logout" value = "ログアウト">
			</form>
		</div>
	</header>
	
<?php if(count($err_msg) > 0 ){ ?>
	<ul>
    <?php foreach($err_msg as $data){ ?>
        <li><?php echo $data; ?></li>
	<?php } ?>
	</ul>
<?php } ?>
<?php if(isset($success_msg) === TRUE) { ?>
	<p><?php echo $success_msg ?></p>
<?php } ?>