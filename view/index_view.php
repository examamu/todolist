<main>
        <h1>今日やること</h1>
		<form method="GET">
			<select name = "sort">
				<option value="hurry">期日が近い順</option>
				<option value="slowly">期日が遠い順</option>
				<option value="old">登録が古い順</option>
				<option value="new">登録が新しい順</option>
				<option value="short">所要日数が短い順</option>
				<option value="long">所要日数が長い順</option>
			</select>
		</form>
		<ul class="todayTaskList">
<?php foreach($tasks_data as $data){?>
			<li class="todayTask">
				<h2><?php echo $data["task_name"];?></h2>
				<form method = "POST">
					<p class="delete_button">
                        <input type = "hidden" name = "delete_id" value = "<?php echo $data["task_id"] ?>">
						<input type = "submit" name = "delete<?php echo $data["task_id"] ?>" value = "Owatta!">
					</p>
				</form>
			<?php
				if(!empty($row['start'])){
					$today = date("Y-m-d");
					$finishDate = $data['finish'];
					$day1 = new DateTime($finishDate);
					$day2 = new DateTime($today);
					$interval = $day1->diff($day2);
					
					echo "期日まで" . $interval->format('%a 日');
				}
				?>
			</li>
<?php } ;?>
		</ul>
			
	</main>
	<div class="fix_button">
				<a href="form.php"><span>＋</span></a>
	</div>
	<footer>
		<p>copyright Tsubasa 2020</p>
	</footer>
</body>
</html>