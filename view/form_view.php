<main>
    <form action="" method="post">
		<p>
			タスク名：<input type="text" size="40" name="name">
		</p>
		<p>
			メモ欄：<textarea name = "note"></textarea>
		</p>
<!------------------▽ここから開始期間▽------------------>
		<p id="start_date">
			開始期間：<select name="start_year">
<?php foreach ($select_date['years'] as $data){ ?>
				<option name="<?php echo 'year_'.$data; ?>"><?php echo $data; ?></option>
<?php } ;?>
			</select> 年

			<select name="start_month">
<?php foreach ($select_date['months'] as $data){ ?>
				<option name="<?php echo 'month_'.$data; ?>"><?php echo $data; ?></option>
<?php } ;?>
			</select> 月

			<select name="start_day">
<?php foreach ($select_date['days'] as $data){ ?>
				<option name="<?php echo 'day_'.$data; ?>"><?php echo $data; ?></option>
<?php } ;?>
			</select> 日
		</p>
		
			
<!------------------▽ここから終了期間▽------------------>			
		<p id="finish_date">
			終了期間：<select name="finish_year">
<?php foreach ($select_date['years'] as $data){ ?>
		<option name="<?php echo 'year_'.$data; ?>"><?php echo $data; ?></option>
<?php } ;?>
		</select> 年
			
			<select name="finish_month">
<?php foreach ($select_date['months'] as $data){ ?>
			<option name="<?php echo 'month_'.$data; ?>"><?php echo $data; ?></option>
<?php } ;?>
		</select> 月			
				
			<select name="finish_day">
<?php foreach ($select_date['days'] as $data){ ?>
			<option name="<?php echo 'day_'.$data; ?>"><?php echo $data; ?></option>
<?php } ;?>
		</select> 日
			
		</p>
		</div>
		<input type="submit" value="送信する">
	</form>
	<a href="./mypage.php">トップへ戻る</a>
	</main>
</body>	
</html>