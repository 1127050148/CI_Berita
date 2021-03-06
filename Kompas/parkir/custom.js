var durl = document.getElementById('komentar').getAttribute("data-url");
if(!durl){
	//AMBIL DOMAIN & SUBDOMAIN
	var full = window.location.host;
	//window.location.host is subdomain.domain.com
	var parts = full.split('.');
	var sub = parts[0];
	var domain = parts[1];
	var type = parts[2];
	//sub is 'subdomain', 'domain', type is 'com'
}else{
	//AMBIL DOMAIN & SUBDOMAIN
	var full = durl;
	//window.location.host is subdomain.domain.com
	var t = full.split("//")
	var hostfull = t[1];
	var y = hostfull.split('/');
	var hostname = y[0];
	var _sub = hostname.split('.');
	var sub = _sub[0];
	//sub is 'subdomain', 'domain', type is 'com'
}

if(!durl){
	//AMBIL PATHNAME
	var path = window.location.pathname;
	var arr = path.split('/');
	if (arr[2] == "komentar") {
		var thn = arr[3];
		var bln = arr[4];
		var tgl = arr[5];
		var xml_id = arr[6];
		var article_title = arr[7];
	}
	else {
		var thn = arr[2];
		var bln = arr[3];
		var tgl = arr[4];
		var xml_id = arr[5];
		var article_title = arr[6];
	}

	//nyediain article url
	var article_url = full + path;

}else{
	var _p = durl;
	var _x = _p.split("//");
	var _y = _x[1].split("/");
	var thn = _y[2];
	var bln = _y[3];
	var tgl = _y[4];
	var xml_id = _y[5];
	var article_title = _y[6];

	var article_url = _x[1];
}

//fungsi ambil full url 
var current_url = window.location.href;

//fungsi baca query string di url
function getParameterByName(name, url) {
    if (!url) url = window.location.href;
    name = name.replace(/[\[\]]/g, "\\$&");
    var regex = new RegExp("[?&]" + name + "(=([^&#]*)|&|#|$)"),
        results = regex.exec(url);
    if (!results) return null;
    if (!results[2]) return '';
    return decodeURIComponent(results[2].replace(/\+/g, " "));
}

function getCookie(cname) {
    var name = cname + "=";
    var ca = document.cookie.split(';');
    for(var i=0; i<ca.length; i++) {
            var c = ca[i];
            while (c.charAt(0)==' ') c = c.substring(1);
            if (c.indexOf(name) == 0) return c.substring(name.length,c.length);
    }
    return "";
}

function new_gets(appname,a_url,page,type){
	var _p = 0;

	var token = getCookie("IFA");
	var sm_token = getCookie("IFASC");
	var ck = "";
	
	//send cookie IFA/IFA SC to detect login
	if(token){
		ck = token;
	}else if(sm_token){
		ck = sm_token;
	}
	

	if(type=="load-more"){
		_p = parseInt($('#load-more').attr('page'));
	}else{
		_p = page;
	}

	//get cookie like or dislike
	var cooks=[];
	var x = document.cookie;
	var y = x.split(";");
	for(i=0;i<y.length; i++){
		if(y[i].search('like_') != -1){
			cooks.push(y[i]);
		}
	}

	$.get('http://apis.kompas.com/jixie/php/lib/obj.comment.php?req=get_comments&article_url='+a_url+'&app_name='+appname+'&page='+_p+'&froms=web&ck='+ck+'&cooks='+cooks, function(data) {
		if(type=="awal"){
			$('#komentar').html(data.view);
		}else if(type=="load-more"){
			if(data.last_page){
				$('#load-more').hide();
			}
			$('#comment-box').append(data.view);
			$('#load-more').attr("page",_p+10);
		}
	});
}


// LOAD KOMENTAR
$(document).ready(function() {
	new_gets(sub,article_url,0,"awal");
});
