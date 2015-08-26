<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title><?php echo $this->variables['title']; ?></title>

	<link href="/styles/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css">
	<link href="/styles/_layout.css" rel="stylesheet" type="text/css">
	<link rel="icon" href="/styles/mvicon.ico">
</head>
<body>
		<div class="panel panel-default">
			<nav class="navbar navbar-default nav-black-style">
			  <div class="container-fluid">
			    <!-- Brand and toggle get grouped for better mobile display -->
			    <div class="navbar-header">
			      
			    	<img src="<?php echo WEBSITE_URL; ?>/styles/mvicon.png" alt="MVideo" height=30 width=30 class="inline-block margin-10">			    	<!-- <a class="navbar-brand inline-block">Category Page - MVideo</a> -->
	<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button></div>
			    <!-- Collect the nav links, forms, and other content for toggling -->  
			    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
			    	<ul class="nav navbar-nav">
			        <li id="category"><a href="<?php echo WEBSITE_URL; ?>">Trang Chủ<span class="sr-only">(current)</span></a></li>
			        <li id="series"><a href="<?php echo WEBSITE_URL; ?>/admincp/account/login">Admincp</a></li>
			        <li id="link"><a href="javascript: window.history.back();">Quay Lại</a></li>
			      </ul>

			    </div><!-- /.navbar-collapse -->
			    
			  </div><!-- /.container-fluid -->
			</nav>

		    <div class="panel-body containter">
		<?php
			$this->include_view($this->body);
		?>
			</div>
		</div>
	<?php
		\Application\HTMLHelper::AddJSScripts('jquery.min.js');
		\Application\HTMLHelper::AddJSScripts('bootstrap.min.js');
		\Application\HTMLHelper::JSScripts();
	?>
</body>
</html>