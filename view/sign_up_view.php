<body>
	<form id="loginForm" method="post">
        <p>ユーザー名<input type = "text" name = "user_name"></p>
		<p>登録メールアドレス：<input type="text" name="user_mail"></p>
        <p>パスワード：<input type="password" name="user_pass" id = "form_password"></p>
            <p>パスワードを表示する<input type = "checkbox" id = "password_check"></p>
        
        <input type="submit" name="sign_up" value="新規登録">
	</form>
	<p>
        <a href ="./login.php">すでにアカウントをお持ちの方はこちらからお願いいたします。</a>
    </p>

    <script>
        const pwd = document.getElementById('form_password');
        const pwdCheck = document.getElementById('password_check');
        pwdCheck.addEventListener('change', function() {
        if(pwdCheck.checked) {
            pwd.setAttribute('type', 'text');
        } else {
            pwd.setAttribute('type', 'password');
        }
    }, false);
    </script>
</body>
</html>