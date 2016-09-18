var url = location.href;
url=url.split("?")[0];
//var url = "http://nasional.kompas.com/read/2015/12/02/12594281/Hadir.di.MKD.Sudirman.Mengaku.Bawa.Rekaman.Lengkap.dan.Bukti.Lain";
var fbtotal;
var gptotal;
var sharetotal;

$(document).ready(function() {
	
	if ($("#total-count-atas").length > 0 && $("#total-count-bawah").length > 0) {
	    getcountfb(url);
		// getcounttwit(url);
		getcountgplus(url);
	}
});

function getcountfb(param){
	$.ajax({ 
		type: 'GET', 
		dataType: "json",
		async: false,
		url: "http://api.facebook.com/restserver.php?method=links.getStats&format=json&urls="+param, 
	    statusCode: {
	    	200: function (response) {
	    		$.each(response, function(index, element) {
					// $(".social-fb-count").text(element.total_count);
					// $(".comment-fb-count").text(element.comment_count);
					fbtotal = element.total_count;
		        });
	    	},
	   },
	});
}

function getcounttwit(param){
	$.ajax({ 
		dataType:"jsonp",
		async: false,
		url: "https://cdn.api.twitter.com/1/urls/count.json?url="+param, 
	    statusCode: {
	    	200: function (response) {
				$(".social-twitter-count").text(response.count);
	    	},
	   },
	});
}

function getcountgplus(param){

	var data = {
            "method":"pos.plusones.get",
            "params":{
                "id":param,
            },
            "apiVersion":"v1"
        };

    $.ajax({
            type: "POST",
            url: "https://clients6.google.com/rpc",
            processData: true,
			async: false,
            contentType: 'application/json',
            data: JSON.stringify(data),
            success: function(r){
            	//$(".social-google-count").text(r.result.metadata.globalCounts.count);
				gptotal = r.result.metadata.globalCounts.count;
				gettotal(gptotal,fbtotal);
            }
	
        });
}

function gettotal(gptotal,fbtotal)
{
	sharetotal = gptotal + fbtotal;
	if(sharetotal > 0){
		$("#total-count-atas").append(sharetotal);
		$("#total-count-bawah").append(sharetotal);
	}else{
		$("#total-count-atas").append(0);
		$("#total-count-bawah").append(0);
	}	
}
