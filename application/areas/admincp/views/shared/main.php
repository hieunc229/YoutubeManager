<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title><?php echo $this->variables['title']; ?></title>
	<link href="/styles/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css">
	<link href="/styles/_layout.css" rel="stylesheet" type="text/css">
	<link rel="icon" href="/styles/mvicon.ico">
	<link href="http://hayageek.github.io/jQuery-Upload-File/4.0.2/uploadfile.css" rel="stylesheet">
</head>
<body>
	<div class="panel panel-default">
			<nav class="navbar navbar-default nav-black-style">
			  <div class="container-fluid">
			    <!-- Brand and toggle get grouped for better mobile display -->
			    <div class="navbar-header">
			      
			    	<?php \Application\HTMLHelper::InsertImage(WEBSITE_URL.DS.'styles/mvicon.png','MVideo', 'inline-block margin-10', 30, 30); ?>
			    	<!-- <a class="navbar-brand inline-block"><?php echo $this->variables['title']; ?></a> -->
			    	<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
				        <span class="icon-bar"></span>
				        <span class="icon-bar"></span>
				        <span class="icon-bar"></span>
				     </button>
      			</div>
			    <!-- Collect the nav links, forms, and other content for toggling -->  
			    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
			    <?php if(\Application\HTMLHelper::IsLogin()) { ?>
			      <ul class="nav navbar-nav">
			        <li id="category"><a href="<?php echo WEBSITE_URL; ?>/admincp/category">Categories<span class="sr-only">(current)</span></a></li>
			        <li id="series"><a href="<?php echo WEBSITE_URL; ?>/admincp/series">Series</a></li>
			        <li id="link"><a href="<?php echo WEBSITE_URL; ?>/admincp/link">Links</a></li>
			      </ul>
			    <?php } ?>
			      <ul class="nav navbar-nav navbar-right">
			        <li id="home"><a href="<?php echo WEBSITE_URL; ?>/admincp/home">Cpanel</a></li>
			        <li><a href="<?php echo WEBSITE_URL; ?>">Home</a></li>
			        <?php if(\Application\HTMLHelper::IsLogin()) { ?>
			        <li><a href="<?php echo WEBSITE_URL; ?>/admincp/account/logout">Logout</a></li>
			        <?php } ?>
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
		\Application\HTMLHelper::AddJSScripts('mvscripts.js');
		\Application\HTMLHelper::JSScripts();
	?>
	<script src="http://hayageek.github.io/jQuery-Upload-File/4.0.2/jquery.uploadfile.min.js"></script>

</body>
</html>