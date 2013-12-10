<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="<?=$d["encoding"]?>">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<title><?=$d["meta"]["title"];?></title>
		<link rel="stylesheet" href="<?=$d["baseurl"]?>templates/default/bootstrap.min.css">
		<link rel="stylesheet" href="<?=$d["baseurl"]?>templates/default/style.css">
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
						<a class="navbar-brand" href="<?=$d["baseurl"]?>"><?=$d["appname"]?></a>
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
				<div class="row">
					<div class="col-lg-12">
					<?=$d["content"]["main"]?>
					</div>
				</div>
			</div> <!-- end of main div -->
		</div>
		<div id="footer">
			<div class="container">
				<p><?=$d["appname"]?> &copy; <?=date("Y")?> You. All rights reserved.</p>
			</div>
		</div>
	</body>
</html>
