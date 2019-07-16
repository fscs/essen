<!DOCTYPE html>
<html dir="ltr" lang="de-DE">
<head>
<meta charset="UTF-8" />
<link rel="stylesheet" media="screen" href="style.css">
<title>Mensapläne</title>
<script type="text/javascript">
function loadImages() {
	if (screen.width < 1024) {
		var bodys = document.getElementsByTagName("body");
		bodys[0].id = "smallbody";
		var myImages = document.getElementsByTagName("img");
		for (var i = 0; i < myImages.length; i++) {
			var src = myImages[i].src;
			src = src.replace("hhu-fscs.de/", "hhu-fscs.de/small/");
			myImages[i].src = src;
		}
	}
}
</script>
</head>
<body>

<div id="wrapper">
<div id="menu">
<ul>
<li><a href="hauptmensa" class="<?= ($m=="m1" ? "active" : "") ?>">Hauptmensa</a></li>
<li><a href="campus-vita" class="<?= ($m=="m2" ? "active" : "") ?>">Campus Vita</a></li>
<li><a href="sued" class="<?= ($m=="m3" ? "active" : "") ?>">Essen Math.-Nat Fakultät</a></li>
</ul>
</div>

<div id="content">
