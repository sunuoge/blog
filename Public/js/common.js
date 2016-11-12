$(function(){
	window.onload = function () {
		//吸底效果
//		var mydiv = document.getElementById("secondary");
//		var mh = mydiv.offsetHeight + mydiv.offsetTop;
//		var ch = document.documentElement.clientHeight;
//		window.onscroll = function (){
//			var t = document.documentElement.scrollTop || document.body.scrollTop;
//			if (t + ch > mh) {
//				mydiv.style.position = "fixed";
//				mydiv.style.right = "0";	
//				mydiv.style.bottom = "0";
//				mydiv.style.margin = "0 60px 0 0";
//			}
//			else {
//				mydiv.style.margin = "0 0";
//				mydiv.style.position = "static";
//			}
//		}
		recordSkim();
	}
	//记录展示次数
	function recordSkim(){
		var aid = $("input[name=aid]").val();
		$.get('/Common/add_view_count',{'aid':aid});
	}

})