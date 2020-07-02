function getQueryVariable(variable) {
    var query = window.location.search.substring(1);
    var vars = query.split("&");
    for (var i=0;i<vars.length;i++) {
        var pair = vars[i].split("=");
        if(pair[0] == variable){return pair[1];}
    }
    return(false);
}

function getReferrer() {
    var referrerUrl = document.referrer;
    var referrerName;

    if(referrerUrl) {
        if (referrerUrl.indexOf('google') >= 0) { 
            referrerName = 'Google'; 
        } else if (referrerUrl.indexOf('bing') >= 0) {
            referrerName = 'Bing';    
        } else {
            referrerName = referrerUrl;
        }
        
    } else {
        referrerName = 'Direct';
    }
    
    return referrerName;
}

function createCookie(name,value,days) {    
    var expires = "";
    if (days) {
        var date = new Date();
        date.setTime(date.getTime()+(days*24*60*60*1000));
        var expires = "; expires="+date.toGMTString();
    }
    document.cookie = name+"="+value+expires+"; path=/";
}

function readCookie(name) {
    var nameEQ = name + "=";
    var ca = document.cookie.split(';');
    for(var i=0;i < ca.length;i++) {
        var c = ca[i];
        while (c.charAt(0)==' ') c = c.substring(1,c.length);
        if (c.indexOf(nameEQ) == 0) return c.substring(nameEQ.length,c.length);
    }
    return null;
}

function getCookie (name,value) {
    if(document.cookie.indexOf(name) == 0) {
        return -1<document.cookie.indexOf(value?name+"="+value+";":name+"=");
    }
    else if(value && document.cookie.indexOf("; "+name+"="+value) + name.length + value.length + 3== document.cookie.length) {
        return true;
    }
    else { 
        return -1<document.cookie.indexOf("; "+(value?name+"="+value + ";":name+"="));
    }
}

function eraseCookie(name) {
    createCookie(name,"",-1);
}

function setFormsField(name, value) {
    var fields = document.getElementsByClassName(name);

    if (fields.length > 0) { 

        for (var i = 0; i < fields.length; i++) {
            fields[i].value = value;
        }
     }  
}

var c_name = "_sko_utmz";

var cookie = readCookie(c_name)

if (cookie != null) {

    cookie_value=cookie.split("|");
    var source = cookie_value[0];
    var medium = cookie_value[1];
    var keyword = cookie_value[2];
    var campaign = cookie_value[3];
}

else {
    
    var source   = getQueryVariable("utm_source") != '' ? getQueryVariable("utm_source") : getReferrer();
    var medium   = getQueryVariable("utm_medium")   != '' ? getQueryVariable("utm_medium")   : '';

    if (getQueryVariable("keyword") != '') {
        var keyword = getQueryVariable("keyword");
    }
    else if (getQueryVariable("utm_term") != '') {
        var keyword = getQueryVariable("utm_term");
    }
    else {
        var keyword = ""; 
    }

    if (getQueryVariable("campaign") != '') {
        var campaign = getQueryVariable("campaign");
    }
    else if (getQueryVariable("utm_campaign") != '') {
        var campaign = getQueryVariable("utm_campaign");
    }
    else {
        var campaign = "";
    }

    createCookie(c_name, source + "|" + medium + "|" + keyword + "|" + campaign, 30);
    
}


setFormsField("sko_campaign", campaign);
setFormsField("sko_source", source);
setFormsField("sko_medium", medium);
setFormsField("sko_keyword", keyword);



