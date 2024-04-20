<?php

	include("_init_.php");

?>


<head>
	<title>Geometry Dash Browser!</title>
	<meta charset="utf-8">
	<link href="assets/css/browser.css" type="text/css" rel="stylesheet">
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-135255146-3"></script><script>window.dataLayer = window.dataLayer || []; function gtag(){dataLayer.push(arguments);}gtag('js', new Date());gtag('config', 'UA-135255146-3');</script>
	<link rel="icon" href="assets/coin.png">
	<meta id="meta-title" property="og:title" content="Geometry Dash Browser!">
	<meta id="meta-desc" property="og:description" content="Browse all of Geometry Dash's online features, right from this handy little website! Levels, profiles, leaderboards, comments, and more!">
	<meta id="meta-image" name="og:image" content="https://gdbrowser.com/assets/coin.png" itemprop="image">
	<meta name="twitter:card" content="summary">
</head>


<body class="levelBG" onbeforeunload="saveUrl()">

<div id="everything">

	<div class="popup" id="credits">
	</div>

	<div style="position:absolute; bottom: 0%; left: 0%; width: 100%; pointer-events: none">
		<img class="cornerPiece" src="assets/corner.png" width=7%;>
	</div>

	<div style="position:absolute; top: 0%; left: 0%; width: 100%; pointer-events: none">
		<img class="cornerPiece" src="assets/corner.png" width=7%; style="transform: scaleY(-1)">
	</div>

	<div style="position:absolute; top: 1.7%; right: 2%; text-align: right; width: 10%;">
		<img id="creditsButton" class="gdButton" src="assets/credits.png" width="60%" onclick="loadCredits()">
	</div>

	

	<div style="position: absolute;
    bottom: 10.5%;
    display: flex;
	left: -2%;
    flex-wrap: wrap;
    justify-content: center;
    align-items: center;
    align-content: center;
    flex-direction: column;
	width: 15%;">
	<p>
		<?php if(!$logged) echo 'Login here!'; else echo $userName; ?>
	</p>
		<a href="./account/login" style="width:30%;"><img class="gdButton" src="assets/user.png" width = "100%"></a>
	</div>

	<?php if($logged && $isAdmin) {
		?> 
		<div style="position:absolute; bottom: 2%; right: 1%; text-align: right; width: 15%; display: flex;
		justify-content: center;
		flex-direction: column;
		align-items: center;">
			<p style="text-align: center;">New update!<br>Click here to update!</p>
			<img class="gdButton" src="assets/plus.png" width="40%" onclick="location.href='./update';"></a>
		</div>; 
		<?php
	} ?>
	

	<!-- <div class="menu-achievements" style="position:absolute; top: 5.5%; left: 3%; width: 12%;">
		<a href="../achievements"><img class="gdButton" src="assets/achievements.png" width="40%"></a>
	</div>

	<div class="menu-messages" style="position:absolute; top: -1.7%; left: 11%; text-align: left; width: 10%;">
		<a href="../messages"><img class="iconRope" src="assets/messagerope.png" width="40%"></a>
	</div>

	<div style="position:absolute; top: -1.5%; right: 10%; text-align: right; width: 10%;">
		<a href="../iconkit"><img class="iconRope" src="assets/iconrope.png" width="40%"></a>
	</div> -->
	
	<div class="supercenter center" id="menuButtons" style="bottom: 5%;">
			<table>
					<tr class="menuButtonList">
						<!-- <td><a tabindex="1" href="./search/*?type=saved"><img class="menubutton menu-saved" src="assets/category-saved.png" title="Saved Levels"></a></td> -->
						<td><a tabindex="1" href="./level?id=!daily"><img class="menubutton menu-daily" src="assets/category-daily.png" title="Daily Level"></a></td>
						<td style="display: block" id="menu_weekly"><a tabindex="1" href="./level?id=!weekly"><img class="menubutton menu-weekly" src="assets/category-weekly.png" title="Weekly Demon"></a></td>
						<!-- <td style="display: none" id="menu_featured"><a tabindex="1" href="./search/*?type=featured"><img class="menubutton menu-featured" src="assets/category-featured.png" title="Featured"></a></td> -->
						<!-- <td><a tabindex="1" href="./gauntlets"><img class="menubutton menu-gauntlets" src="assets/category-gauntlets.png" title="Gauntlets"></a></td> -->
					</tr>
					<tr class="menuButtonList">
						<!-- <td><a tabindex="1" href="./leaderboard"><img class="menubutton menu-leaderboard" src="assets/category-scores.png" title="Scores"></a></td> -->
						<!-- <img src="./assets/exclamation.png" style="position: absolute; height: 18%; left: 3.5%; bottom: 23%; pointer-events: none; z-index: 50;"> -->
						<td><a tabindex="1" href="./search?levelName=*&type=hof"><img class="menubutton menu-hof" src="assets/category-hof.png" title="Hall Of Fame"></a></td>
						<!-- <td><a tabindex="1" href="./mappacks"><img class="menubutton menu-mappacks" src="assets/category-packs.png" title="Map Packs"></a></td> -->
						<td><a tabindex="1" href="./search"><img class="menubutton menu-search" src="assets/category-search.png" title="Search"></a></td>
					</tr>
			</table>


			<p style="color: #ffffff1f; font-size: 2.5vh;">Development in beta, this may contain unwanted bugs.</p>
	</div>

	<!-- <div style="position:absolute; bottom: 17%; right: 7%; width: 9%; text-align: right; pointer-events: none">
		<img src="assets/privateservers.png" width=85%;">
	</div>

	<div style="position:absolute; bottom: 2.5%; right: 1.5%; text-align: right; width: 18%;">
		<a href="../gdps" title="GD Private Servers"><img class="gdButton" src="assets/basement.png" width="40%"></a>
	</div>

	 -->

	
  

	<div class="center" width="100%" style="margin-top: 2%">
		<img src="assets/gdlogo.png" height="11.5%"><br>
		<img id="browserlogo" src="assets/browser.png" height="7%" style="margin: 0.5% 0% 0% 30%">
	</div>

	<div id="noDaily" style="display: none;">
		<div class="copied center noClick" style="position:absolute; top: 29%; left: 50%; transform: translate(-50%,-50%); width: 90vh; background-color: rgba(0, 0, 0, 0.7);">
			<h1 class="smaller noSelect">No active <span id="noLevel">daily</span> level!</h1>
		</div>
	</div>

</div>

</body>
<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script type="text/javascript" src="../sizecheck.js?"></script>
<script>

let page = 1
$('#browserlogo').css('filter', `hue-rotate(${Math.floor(Math.random() * (330 - 60)) + 60}deg) saturate(${Math.floor(Math.random() * (150 - 100)) + 100}%)`)

let xButtonPos = '43%'
let lastPage

let noDaily = (window.location.search == "?daily=1")
let noWeekly = (window.location.search == "?daily=2")

if (noDaily || noWeekly) {
	if (noWeekly) $('#noLevel').html("weekly")
	$('#noDaily').fadeIn(200).delay(500).fadeOut(500)
	let newURLpush = window.location.href.replace(/(\?daily=1|\?daily=2)/g, '');
	window.history.pushState(null, null, newURLpush);
}

function loadCredits() {
	$('.subCredits').hide()
	$('#credits' + page).show()
	$('#credits').show()
	if (page == lastPage) $('#closeCredits').css('height', '52%')
	else $('#closeCredits').css('height', xButtonPos)
	$('.creditsicon:visible').each(function() {		// only load icons when necessary 
		$(this).attr('src', $(this).attr('icon'))
	})

}

Fetch(`./api/credits`).then(res => {

	lastPage = res.credits.length + 1
	res.credits.forEach((x, y) => {
		$('#credits').append(`<div id="credits${y+1}" class="subCredits" style="display: none;">
			<img class="gdButton" src="assets/arrow-left.png" width="60vh" style="${y == 0 ? "display: none; " : ""}position: absolute; top: 45%; right: 75%" tabindex="0" onclick="page -= 1; loadCredits()">
			<div class="brownBox center supercenter" style="width: 80vh; height: 43%; padding-top: 1.5%; padding-bottom: 3.5%;">
				<h1>${x.header}</h1>
				<h2 style="margin-bottom: 1.5%; margin-top: 1.5%" class="gdButton biggerShadow"><a href="https://gdbrowser.com/u/${x.ign || x.name}" title=${x.name}>${x.name}</h2></a>
				<img class="creditsicon" icon="./icon/${x.ign || x.name}?forceGD=1" height=30%; style="margin-bottom: 7%"><br>
				<a target=_blank href="${x.youtube[0]}" title="YouTube"><img src="assets/${x.youtube[1]}.png" width="11%" class="gdButton"></a>
				<a target=_blank href="${x.twitter[0]}" title="Twitter"><img src="assets/${x.twitter[1]}.png" width="11%" class="sideSpace gdButton"></a>
				<a target=_blank href="${x.github[0]}" title="GitHub"><img src="assets/${x.github[1]}.png" width="11%" class="sideSpace gdButton"></a>
				<br>
			</div>
			<img class="gdButton" src="assets/arrow-right.png" width="60vh" style="position: absolute; top: 45%; left: 75%" tabindex="0" onclick="page += 1; loadCredits()">
		</div>`)
	})

	$('#credits').append(`<div id="credits${lastPage}" class="subCredits" style="display: none;">
			<div id="specialthanks" class="brownBox center supercenter" style="width: 80vh; height: 55%; padding-top: 1.5%; padding-bottom: 3.5%;">
				<h1>Special Thanks!</h1><br>
			</div>
			<img class="gdButton" src="assets/arrow-left.png" width="60vh" style="position: absolute; top: 45%; right: 75%" tabindex="0" onclick="page -= 1; loadCredits()">
		</div>`)

	res.specialThanks.forEach((x, y) => {
		n = x.split("/")
		$('#specialthanks').append(`<div class="specialThanks">
				<h2 class="gdButton smaller"><a href="https://gdbrowser.com/u/${n[1] || n[0]}" title=${n[0]}>${n[0]}</h2></a>
				<img class="creditsicon" icon="./icon/${n[1] || n[0]}?forceGD=1" height=77%><br>
				</div>`)
		})

	$('#credits').append(`<div id="closeCredits" class="center supercenter" style="width: 80vh; height: ${xButtonPos}%; pointer-events: none;">
	<img class="closeWindow gdButton" src="assets/close.png" width="14%" style="position: absolute; top: -24%; left: -7vh; pointer-events: all;" tabindex="0" onclick="$('#credits').hide(); page = 1;" title="Close"></div>`)

	$(document).keydown(function(k) {

	if ($('#credits').is(':hidden')) return

    if (k.which == 37 && page > 1) { //left
		page -= 1; loadCredits();
	}
	
	if (k.which == 39 && page < lastPage) { //right
		page += 1; loadCredits();
	}
	
});
});

</script>
