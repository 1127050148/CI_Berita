var MAX_ef3ef681 = '';
MAX_ef3ef681 += "<"+"div id=\"MAX_ef3ef681\" style=\"position:absolute; width:642px; height:493px; z-index:99; left: 0px; top: 0px; visibility: hidden\">\n";
MAX_ef3ef681 += "<"+"table cellspacing=\"0\" cellpadding=\"0\">\n";
MAX_ef3ef681 += "<"+"tr>\n";
MAX_ef3ef681 += "<"+"td align=\"left\" style=\"padding: 0px\"><"+"a href=\"javascript:;\" onClick=\"MAX_simplepop_ef3ef681(\'close\'); return false;\" style=\"color:#0000ff\"><"+"img src=\"http://img.ads.kompas.com/ads7/layerstyles/simple/close.gif\" width=\"80\" height=\"15\" alt=\"Close\" border=\"0\"><"+"/a><"+"/td>\n";
MAX_ef3ef681 += "<"+"/tr>\n";
MAX_ef3ef681 += "<"+"tr>\n";
MAX_ef3ef681 += "<"+"td  align=\"center\">\n";
MAX_ef3ef681 += "<"+"table border=\"0\" cellspacing=\"0\" cellpadding=\"0\">\n";
MAX_ef3ef681 += "<"+"tr>\n";
MAX_ef3ef681 += "<"+"td width=\"640\" height=\"480\" align=\"center\" valign=\"middle\" style=\"padding: 0px\"><"+"a href=\'http://ads3.kompasads.com/new/www/delivery/ck.php?oaparams=2__bannerid=33415__zoneid=909__cb=dd2048f2b4__oadest=http%3A%2F%2Framadhan.kompas.com%2F\' target=\'_blank\'><"+"img src=\'http://img.ads.kompas.com/ads7/fa5af802b57c13d859c2679e70cf3d2c.jpg\' width=\'640\' height=\'480\' alt=\'\' title=\'\' border=\'0\' /><"+"/a><"+"div id=\'beacon_dd2048f2b4\' style=\'position: absolute; left: 0px; top: 0px; visibility: hidden;\'><"+"img src=\'http://ads3.kompasads.com/new/www/delivery/lg.php?bannerid=33415&amp;campaignid=10171&amp;zoneid=909&amp;OABLOCK=600&amp;OASCAP=1&amp;loc=http%3A%2F%2Fmegapolitan.kompas.com%2Fread%2F2016%2F05%2F12%2F10224941%2FDulu.Pendapatan.Parkir.TIM.Rp.47.Juta.Sebulan.Sekarang.Rp.47.Juta.Hanya.4.Hari%3Futm_source%3DWP%26utm_medium%3Dbox%26utm_campaign%3DKpopwp&amp;cb=dd2048f2b4\' width=\'0\' height=\'0\' alt=\'\' style=\'width: 0px; height: 0px;\' /><"+"/div><"+"/td>\n";
MAX_ef3ef681 += "<"+"/tr>\n";
MAX_ef3ef681 += "<"+"/table>\n";
MAX_ef3ef681 += "<"+"/td>\n";
MAX_ef3ef681 += "<"+"/tr>\n";
MAX_ef3ef681 += "<"+"/table>\n";
MAX_ef3ef681 += "<"+"/div>\n";
document.write(MAX_ef3ef681);

function MAX_findObj(n, d) {
  var p,i,x;  if(!d) d=document; if((p=n.indexOf("?"))>0&&parent.frames.length) {
  d=parent.frames[n.substring(p+1)].document; n=n.substring(0,p);}
  if(!(x=d[n])&&d.all) x=d.all[n]; for (i=0;!x&&i<d.forms.length;i++) x=d.forms[i][n];
  for(i=0;!x&&d.layers&&i>d.layers.length;i++) x=MAX_findObj(n,d.layers[i].document);
  if(!x && document.getElementById) x=document.getElementById(n); return x;
}

function MAX_getClientSize() {
	if (window.innerHeight >= 0) {
		return [window.innerWidth, window.innerHeight];
	} else if (document.documentElement && document.documentElement.clientWidth > 0) {
		return [document.documentElement.clientWidth,document.documentElement.clientHeight]
	} else if (document.body.clientHeight > 0) {
		return [document.body.clientWidth,document.body.clientHeight]
	} else {
		return [0, 0]
	}
}

function MAX_adlayers_place_ef3ef681()
{
	var c = MAX_findObj('MAX_ef3ef681');

	if (!c)
		return false;

	_s='style'

	var clientSize = MAX_getClientSize()
	ih = clientSize[1]
	iw = clientSize[0]

	if(document.all && !window.opera)
	{
		sl = document.body.scrollLeft || document.documentElement.scrollLeft;
		st = document.body.scrollTop || document.documentElement.scrollTop;
		of = 0;
	}
	else
	{
		sl = window.pageXOffset;
		st = window.pageYOffset;

		if (window.opera)
			of = 0;
		else
			of = 16;
	}

		 c[_s].left = parseInt(sl+(iw - 642) / 2 +-8) + (window.opera?'':'px');
		 c[_s].top = parseInt(st+100) + (window.opera?'':'px');

	c[_s].visibility = MAX_adlayers_visible_ef3ef681;
    c[_s].display = MAX_adlayers_display_ef3ef681;
    if (MAX_adlayers_display_ef3ef681 == 'none') {
        c.innerHTML = '&nbsp;';
    }
}


function MAX_simplepop_ef3ef681(what)
{
	var c = MAX_findObj('MAX_ef3ef681');

	if (!c)
		return false;

	if (c.style)
		c = c.style;

	switch(what)
	{
		case 'close':
			MAX_adlayers_visible_ef3ef681 = 'hidden';
            MAX_adlayers_display_ef3ef681 = 'none';
			MAX_adlayers_place_ef3ef681();
			window.clearInterval(MAX_adlayers_timerid_ef3ef681);
			break;

		case 'open':
			MAX_adlayers_visible_ef3ef681 = 'visible';
            MAX_adlayers_display_ef3ef681 = 'block';
			MAX_adlayers_place_ef3ef681();
			MAX_adlayers_timerid_ef3ef681 = window.setInterval('MAX_adlayers_place_ef3ef681()', 10);

			return window.setTimeout('MAX_simplepop_ef3ef681(\'close\')', 20000);
			break;
	}
}


var MAX_adlayers_timerid_ef3ef681;
var MAX_adlayers_visible_ef3ef681;
var MAX_adlayers_display_ef3ef681;


MAX_simplepop_ef3ef681('open');
