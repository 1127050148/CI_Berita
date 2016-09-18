function fb_share(title,url,e) {
    FB.init({appId: "324557847592228", status: true, cookie: true, xfbml : true, version : 'v2.5'});//change your application ID

    // calling the API ...
    var obj = {
        method: 'feed',
        link: url
    };

    function callback(response) {
        if (response && response.post_id) {
            insert_share_count(e,'facebook');
        }
    }

    FB.ui(obj, callback);
    return false;
}

function tweet_share(status,e) {
	u = status;
	window.open('https://twitter.com/intent/tweet?text='+encodeURIComponent(u),'sharer','toolbar=0,status=0,width=626,height=436');
    insert_share_count(e,'twitter');
    return false;
}

function plus_share(url,e){
	u = url;
	window.open('https://plus.google.com/share?url='+encodeURIComponent(u),'sharer','toolbar=0,status=0,width=626,height=436');
    insert_share_count(e,'gplus');
    return false;
}

function insert_share_count(e,type){
    $.ajax({
        url: $(e).attr("data-href"),
        type: "POST",
        datatype: "json",
        data: {
            article_id: $(e).attr("data-id"),
            article_kanal: $(e).attr("data-kanal"),
            article_subkanal: $(e).attr("data-subkanal"),
            sosmed_type: type
        },
        success: function(t) {
            console.log(t);
        }
    });
}