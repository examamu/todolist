<!doctype html>
<html>
<head>
<meta charset="UTF-8">
<title>無題ドキュメント</title>
</head>

	
<body>
	<?php
		$sql = $pdo->prepare('delete from tasks where id=?');
		if($sql->execute([$_REQUEST['id']])) {
			echo '削除に成功しました。';
		}else{
			echo '削除に失敗しました。';
		}
		
	?>
	<h1>削除に成功しました！</h1>
	<a href="http://test.mecha-f.com">トップへ戻る</a>
</body>
</html>