<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="<?=$this->encoding?>">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<title><?=$this->get("title");?></title>
		<link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css">
		<link rel="stylesheet" href="<?=$this->baseurl?>themes/default/style.css">
	</head>
	<body>
		<div id="wrap">
			<div class="navbar navbar-inverse navbar-fixed-top">
				<div class="container">
					<div class="navbar-header">
						<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
						</button>
						<a class="navbar-brand" href="<?=$this->baseurl?>"><?=$this->appname?></a>
					</div>
					<div class="collapse navbar-collapse">
						<ul class="nav navbar-nav">
							<li class="active"><a href="#">Home</a></li>
							<li><a href="#">About</a></li>
							<li><a href="#">Contact</a></li>
						</ul>
					</div>
				</div>
			</div>
			<div class="container" role="main">
