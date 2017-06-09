<?php /* Smarty version 2.6.16, created on 2017-06-09 03:30:14
         compiled from page/login.html */ ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title><?php echo $this->_tpl_vars['title']; ?>
</title>
<link href="/assets/themes/css/login.css" rel="stylesheet" type="text/css" />
</head>

<body>
	<div id="login">
		<div id="login_header">
			<h1 class="login_logo">
				<a href="http://demo.dwzjs.com"><img src="/assets/themes/default/images/login_logo.gif" /></a>
			</h1>
			<div class="login_headerContent">
				<!--<div class="navList">-->
					<!--<ul>-->
						<!--<li><a href="#">设为首页</a></li>-->
						<!--<li><a href="http://bbs.dwzjs.com">反馈</a></li>-->
						<!--<li><a href="./assets/doc/dwz-user-guide.pdf" target="_blank">帮助</a></li>-->
					<!--</ul>-->
				<!--</div>-->
				<h2 class="login_title"><img src="/assets/themes/default/images/login_title.png" /></h2>
			</div>
		</div>
		<div id="login_content">
			<div class="loginForm">
				<?php if ($this->_tpl_vars['error']): ?>
					<?php echo $this->_tpl_vars['error']; ?>

				<?php endif; ?>
				<form action="/page/login" method="post">
					<p>
						<label>用户名：</label>
						<input type="text" name="username" size="20" class="login_input" />
					</p>
					<p>
						<label>密码：</label>
						<input type="password" name="password" size="20" class="login_input" />
					</p>
					<p>
						<label>验证码：</label>
						<input class="code" type="text" name="authCode" size="5" />
						<span><img src="/page/vcode" alt="" width="75" height="24" /></span>
						
					</p>
					<div class="login_bar">
						<input class="sub" type="submit" value=" " />
						<input type="hidden" value="1" name="isPost"/>
					</div>
				</form>
			</div>
			<div class="login_banner"><img src="/assets/themes/default/images/login_banner.jpg" /></div>
		</div>
		<div id="login_footer">
			Copyright &copy; 2009 www.dwzjs.com Inc. All Rights Reserved.
		</div>
	</div>
</body>
</html>