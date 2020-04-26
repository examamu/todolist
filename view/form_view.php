<main>
    <form action="" method="post">
		<p>
			タスク名：<input type="text" size="40" name="name">
		</p>
		
		<input id="shortTask" type="radio" name="contTask" value="0">短期案件
		<input id="continueTask" type="radio" name="contTask" value="1">継続案件
			
<!------------------▽ここから開始期間▽------------------>
		<p id="start_date">	
			開始期間：<select name="start_year">
<?php for($i = $thisyear-1; $i<=$thisyear+10; $i++): ?>
    <?php if($i < $thisyear): ?>
                <option name ="empty"></option>年
    <?php else :?>
                <option name="<?php echo $i ?>"><?php echo $i ?></option>
    <?php endif; ?>
<?php endfor ;?>
            </select> 年
			
			
			
			<select name="start_month">
			<?php for($i = 0; $i<=12; $i++): ?>
				<?php if($i === 0): ?>
					<option name ="empty"></option>月
				<?php else :?>
					<option name="<?php echo $i ?>"><?php echo $i ?></option>
				<?php endif; ?>
			<?php endfor ;?></select> 月
			
			
			<select name="start_day">
			<?php for($i = 0; $i<=31; $i++): ?>
				<?php if($i === 0): ?>
					<option name ="empty"></option>日
				<?php else: ?>
					<option name="<?php echo $i ?>"><?php echo $i ?></option>
				<?php endif; ?>
			<?php endfor; ?></select> 日
		</p>
		
			
<!------------------▽ここから終了期間▽------------------>			
		<p id="finish_date">
			終了期間：<select name="finish_year">
			<?php for($i = $thisyear-1; $i<=$thisyear+10; $i++): ?>
				<?php if($i < $thisyear): ?>
					<option name ="empty"></option>年
				<?php else: ?>
					<option name="<?php echo $i ?>"><?php echo $i ?></option>
				<?php endif; ?>
			<?php endfor; ?></select> 年
			
			
			<select name="finish_month">
			<?php for($i = 0; $i<=12; $i++): ?>
				<?php if($i === 0): ?>
					<option name ="empty"></option>月
				<?php else: ?>
					<option name="<?php echo $i ?>"><?php echo $i ?></option>
				<?php endif; ?>
			<?php endfor; ?></select> 月
			
		
		
			<select name="finish_day">
			<?php for($i = 0; $i<=31; $i++): ?>
				<?php if($i === 0): ?>
					<option name ="empty"></option>日
				<?php else: ?>
				<option name="<?php echo $i ?>"><?php echo $i ?></option>
				<?php endif; ?>
			<?php endfor; ?></select> 日
		</p>
		</div>
		<input type="submit" value="送信する">
	</form>
	<a href="http://test.mecha-f.com">トップへ戻る</a>
    </main>
	<!------------------▽javascript▽------------------>
	<script>
			document.getElementById("date").style.display ="none";
			document.getElementById("shortTask").onchange = function(){
  			document.getElementById("date").style.display ="block";}
			document.getElementById("continueTask").onchange = function(){
  			document.getElementById("date").style.display ="none";}	
	</script>
</body>	
</html>