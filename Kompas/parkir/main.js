function goTo(page){
    window.location = page;
    // window.open(page, '_blank');
}

function goAds(page){
    window.open(page, '_blank');
}

function setCookie(cname, cvalue, exdays) {
    var d = new Date();
    d.setTime(d.getTime() + (exdays*24*60*60*1000));
    var expires = "expires="+d.toUTCString();
    document.cookie = cname + "=" + cvalue + "; " + expires;
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

$(document).ready(function () {
    $("#btn-share-bawah").hide();

    // $('#top_banner, .ads, #skinads_banner, #horizontal_banner').lazyLoadAd();
    "use strict";
    
    // scroll fixed
    $(window).scroll(function () {
    var scrollpos = $(window).scrollTop();
        //artbox scroll
        if($('#sartbox').length>0){
            var h = ($('#sartbox').offset().top-50) - $(window).height();
            if(scrollpos > h){
                $('#artbox').addClass("artshow");
                $('#artboxtools').addClass("arthide");
            } else {
                $('#artbox').removeClass("artshow");
                $('#artboxtools').removeClass("arthide");
            }
        }
        if(scrollpos > 200) {
            $("body").addClass("is-scroll");
            $(".kcm-skin-ads").addClass("ads__skin--scroll");
        }else{
            $("body").removeClass("is-scroll");
            $(".kcm-skin-ads").removeClass("ads__skin--scroll");
        }

        if(scrollpos > 750) {
            if ($('.video-animated.fixed').length == 0) {
                $('.video-animated').parent().addClass('animated');
                $('.video-animated').addClass('fixed');
                $('.video-animated iframe').css('height', '200');
            };
            // $('.video-animated').animate({"margin-left":"720px","width":"340px"}, "slow");
        } else {
            if ($('.video-animated.fixed').length > 0) {
                // $('.video-animated').css({"margin-left":"0","width":"auto"}, "slow");
            }
            $('.video-animated').parent().removeClass('animated');
            $('.video-animated iframe').css('height', '370');
            $('.video-animated').removeClass('fixed');
        }

    });

    
    /*S: script NPS */
    $(document).on("click",".onclick-modal",function() {
        var dt = $(this).attr('data-show-modal');
        var nilai = $("input[name='nilai']:checked").val();

        $('div.modal-nps').removeClass('show');
        $('div.modal-nps').css({
            'position': 'absolute',
            'width': '100%'
        });

        if (dt == 'onwarning') {
            $('.modal-nps.warning').addClass('show');
            $('.modal-nps.warning').css('position', 'relative');
        }
        if (dt == 'onsuccess') {
            $('.modal-nps.success').addClass('show');
            $('.modal-nps.success').css('position', 'relative');;
        }
        if (dt == 'onnetral') {
            submit_nps(nilai);
        }
    });

    $(document).on("click","input[name='alasan']",function(event){
        event.preventDefault(); 
        var nilai = $("input[name='nilai']:checked").val();
        submit_nps(nilai);
        
    });

    function submit_nps(nilai){
        var alasan = "";

        if(nilai == 7 || nilai == 8 ){
            alasan = "";
        }else{
            alasan = $("input[name='alasan']:checked").val();
        }

        var idNps = document.getElementById('nps-data');
        var _data = {
            "client_address" : idNps.dataset.ip,
            "article_id" : idNps.dataset.articleid,
            "site_id" : idNps.dataset.siteid,
            "user_agent" : idNps.dataset.agent,
            "nilai" : nilai,
            "alasan" : alasan
        };

        $.ajax({
            url: base_url+'read/nps_insert',
            data:_data,
            method : "POST",
            success:function(results){
                if(results == "success"){
                    $('.nps').css({
                        'height': '0px',
                        'margin': '0',
                        'padding': '0',
                        'border': 'none'
                    });

                    $('.thanks').show('slow');

                    if(nilai == 9 || nilai ==10) {
                        $('#btn-share-bawah').slideDown('slow');
                    }

                    //site id and id
                    var namecookie = idNps.dataset.siteid+idNps.dataset.articleid;
                    //alert(namecookie)
                    //set cookiee 1 day
                    setCookie(namecookie, "1", 1);

                    //nilai = "";
                }else {
                    //alert(results);
                }
            }
        });
    }
    /*E: script NPS */

    // artbox close
    $('#artbox .artbox-close').bind('click',function(){
        $('#artbox').remove();
        //$('#artboxtools').removeClass("arthide");
        return false;
    });

    $('.nav-toggle').click(function(){
     //get collapse content selector
     var collapse_content_selector = $(this).attr('href');

     //make the collapse content to be shown or hide
     var toggle_switch = $(this);
     $(collapse_content_selector).toggle(function(){
         if($(this).css('display')=='none'){
             //change the button label to be 'Show'
             // toggle_switch.html($("#personalisasi_name").text()).removeClass('active');
         }else{
             //change the button label to be 'Hide'
             // toggle_switch.html($('#personalisasi_name').text()).addClass('active');
         }
     });
    });

    //*****datepicker*****//
    if($('#kcmpicker').length>0){
        var rTitle = $('#rTitle').attr('data-title');
        $('#kcmpicker').glDatePicker({
            showAlways: false,
            onClick: (function(el, cell, date, data){
                window.location = base_url+'search/'+rTitle+'/'+date.getFullYear()+'-'+(date.getMonth()+1)+'-'+date.getDate();
            })
        });
    }
    
    /* Image Zoom */
    if($('.photo').length>0){
        $( ".photo" ).each(function( index ) {
            var image=$(this).children('img').attr("src");
            console.log(image);
            $(this).append('<div class="media-action-overlay"><i class="icon icon-zoom-in colorbox" href="'+image+'" rel="colorbox"></i></div>');
        });
        $( ".photo" ).hover(function() {
            $(this).children('.media-action-overlay').css( "opacity", 1 );
        });
        $(".colorbox").colorbox({rel:'colorbox',fixed:true});
        $( ".media-action-overlay" ).hover(function() {
            $(this).css( "opacity", 1 );
        });
        $( ".icon" ).hover(function() {
            $('.media-action-overlay').css( "opacity", 1 );
        });
        $( ".photo" ).mouseout(function() {
            $(this).children('.media-action-overlay').css( "opacity", 0 );
        });
    }
    /*.End Image Zoom.*/

    // Scroll to Top
    $('#back-top').click(function() {
        $("html, body").animate({
            scrollTop: 0
        }, 'slow');
    });

    // Tabs Terpopuler dan Terkomentari //
    $('#tabs .kcmtab li a').click(function(){
        $('#tabs .kcmtab li a').removeClass('active');
        $(this).addClass('active');
            var currentTab = $(this).attr('href');
            $('#tabs .kcm-most-content').hide();
            $(currentTab).show();
                return false;
        });

    // Skin Ads, Bottom Ads //
    $('.skin-left .close, .skin-right .close').click(function () {
        $('.kcm-skin-ads').hide();
        return false;
    });
    $('.ads-bottom .close').click(function () {
        $('.ads-bottom').hide();
        return false;
    });

    // Image preloader
    $(".img-latest img").lazyload();

    $("#frmSearch").submit(function(e){
        var search = $("#search").val();
        window.location = "http://search.kompas.com/search?sort=time&sortime=0&siteid=0&start-date=&end-date=&q="+search+"&sa=";
        e.preventDefault();
        return false;
    });

    if ($(".social-fb-count").length > 0 && $(".social-twitter-count").length > 0 && $(".social-google-count").length > 0) {
        var url = $(".contentArticle").attr("article_path");

        $.sharedCount = function(url, fn) {
            url = encodeURIComponent(url || location.href);
            var arg = {
                url: "/" + "/" + (location.protocol == "https:" ? "api.chipscount" : "api.chipscount") + ".com/?url=" + url,
                cache: true,
                dataType: "json"
            };
            if ('withCredentials' in new XMLHttpRequest) {
                arg.success = fn;
            }
            else {
                var cb = "sc_" + url.replace(/\W/g, '');
                window[cb] = fn;
                arg.jsonpCallback = cb;
                arg.dataType += "p";
            }
            return $.ajax(arg);
        };

        $.sharedCount(url, function(data) {
            $(".social-fb-count").text(data.data.facebook.total);
            $(".social-twitter-count").text(data.data.twitter.total);
            $(".social-google-count").text(data.data.google_plus.total);
            $(".comment-fb-count").text(data.data.facebook.comment);
            return false;
        });
    }

    var  N = 5;//interval in seconds
    var list = $(".topic > li"),currentHighlight = 0;
    var playTopicInt = setInterval(function() { playTopic() }, N * 1000);

    // Update JS Sliding kanal news
    $(".topic > li").mouseleave(function() {
        currentHighlight = $(this).index();
        playTopicInt = setInterval(function() { playTopic() }, N * 1000);
    });

    var playTopic = function (value) {
        currentHighlight = (currentHighlight + 1) % list.length;
        list.removeClass('active').eq(currentHighlight).addClass('active');
    }

    var pauseTopic = function() {
        clearInterval(playTopicInt);
    }

    $(".topic > li").mouseover(function() {
        $('.topic > li').removeClass('active');
        pauseTopic();
        $(this).addClass('active');
    });
    
    // copy link
    $('.copylink').click(function (e) {
        e.preventDefault();
        var cp = $(this).attr('data-url');
        var $temp = $("<input>");
        $("body").append($temp);
        $temp.val(cp).select();
        document.execCommand("copy");
        $temp.remove();
    });

    /* overlay photo */
    if($('.photo-infographic').length>0){
        var height = ((window.innerHeight || $window.height()) - 100);
        var width;
        $( ".photo-infographic" ).each(function( index ) {
            var iglink=$(this).children('img').attr("data-link");
            var igtitle=$(this).children('img').attr("data-title");
            var igtype=$(this).children('img').attr("data-type");
            var igaligment=$(this).children('img').attr("data-aligment");
            $(this).append('<a class="media-action-infographic '+(igtype==='iframe'?'image mfp-iframe':igtype)+'" href="'+iglink+'" title="'+igtitle+'" '+(igtype==='blank'?'target="_blank"':'')+' style="'+igaligment+'"></a>');
        });
        $( ".photo-infographic" ).hover(function() {
            $(this).children('.media-action-infographic').css( "opacity", 1 );
        }, function(){
            $(this).children('.media-action-infographic').css( "opacity", 0 );
        });
        $('.media-action-infographic.image').magnificPopup({
          type: 'image',
          mainClass: 'mfp-with-zoom', // this class is for CSS animation below
          //closeOnBgClick: false,
          gallery:{
            enabled:true,
            arrowMarkup: '<button title="%title%" type="button" class="mfp-arrow mfp-arrow-%dir%"><i class="icon-gra icon-arr-%dir%2"></i></button>', // markup of an arrow button
          },
          overflowY:true,
          closeBtnInside:false,
        });
        $(".media-action-infographic").hover(function() {
            $(this).css( "opacity", 1 );
        });
    }
    /* overlay photo */
});