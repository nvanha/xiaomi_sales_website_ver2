var bannerStatus = 1;
var bannerTimer = 3000;

window.onload = function() {
	bannerLoop();
}

var startBannerLoop = setInterval(function() {
	bannerLoop();
}, bannerTimer);

document.getElementById("banner").onmouseenter = function() {
	clearInterval(startBannerLoop);
}

document.getElementById("banner").onmouseleave = function() {
	startBannerLoop = setInterval(function() {
		bannerLoop();
	}, bannerTimer);
}

document.getElementById("banner__btn-prev").onclick = function() {
	if (bannerStatus === 1) {
		bannerStatus = 2;
	}
	else if (bannerStatus === 2) {
		bannerStatus = 3;
	}
	else if (bannerStatus === 3) {
		bannerStatus = 1;
	}
	bannerLoop();
}

document.getElementById("banner__btn-next").onclick = function() {
	bannerLoop();
}

function bannerLoop() {
	if (bannerStatus === 1){
		document.getElementById("ban2").style.opacity = "0";
		setTimeout(function() {
			document.getElementById("ban1").style.right = "0px";
			document.getElementById("ban1").style.zIndex = "1000";
			document.getElementById("ban2").style.right = "-100%";
			document.getElementById("ban2").style.zIndex = "1500";
			document.getElementById("ban3").style.right = "100%";
			document.getElementById("ban3").style.zIndex = "500";			
		}, 500);
		setTimeout(function() {
			document.getElementById("ban2").style.opacity = "1";
		}, 1000);
		bannerStatus = 2;
	}
	else if (bannerStatus === 2){
		document.getElementById("ban3").style.opacity = "0";
		setTimeout(function() {
			document.getElementById("ban2").style.right = "0px";
			document.getElementById("ban2").style.zIndex = "1000";
			document.getElementById("ban3").style.right = "-100%";
			document.getElementById("ban3").style.zIndex = "1500";
			document.getElementById("ban1").style.right = "100%";
			document.getElementById("ban1").style.zIndex = "500";			
		}, 500);
		setTimeout(function() {
			document.getElementById("ban3").style.opacity = "1";
		}, 1000);
		bannerStatus = 3;
	}
	else if (bannerStatus === 3){
		document.getElementById("ban1").style.opacity = "0";
		setTimeout(function() {
			document.getElementById("ban3").style.right = "0px";
			document.getElementById("ban3").style.zIndex = "1000";
			document.getElementById("ban1").style.right = "-100%";
			document.getElementById("ban1").style.zIndex = "1500";
			document.getElementById("ban2").style.right = "100%";
			document.getElementById("ban2").style.zIndex = "500";			
		}, 500);
		setTimeout(function() {
			document.getElementById("ban1").style.opacity = "1";
		}, 1000);
		bannerStatus = 1;
	}
}