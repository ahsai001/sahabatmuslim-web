$(document).ready(function() {
    if(typeof sahabatmuslim != 'undefined'){
        //android version
        $("#reminderWebId").hide();
        $("#shareWebId").hide();
    }else{
        //web version
        $("#reminderMobId").hide();
        $("#callMobId").hide();
        $("#shareMobId").hide();
    }
});

function fixedEncodeURIComponent (str) {
  return encodeURIComponent(str).replace(/[!'()*]/g, function(c) {
    return '%' + c.charCodeAt(0).toString(16);
  });
}


function openMaps(lat, long){
    if(typeof sahabatmuslim != 'undefined'){
        sahabatmuslim.openMaps(lat+","+long);
    }else{
        //window.open("http://maps.google.com/maps?q="+lat+","+long);
        window.open("https://www.google.com/maps?daddr="+lat+","+long);
    }
}

function remindMe(titleAndUstadz,dateX,dateXString,starttimeX,endtimeX,locationX){
    if(typeof sahabatmuslim != 'undefined'){
        sahabatmuslim.remindMe(titleAndUstadz,dateX,dateXString,starttimeX,endtimeX,locationX);
    }else{
        alert(titleAndUstadz+"\n"+dateX+" "+starttimeX+" - "+endtimeX+" di "+locationX);
    }
}

function callNumber(number){
    if(typeof sahabatmuslim != 'undefined'){
        //sahabatmuslim.callNumber(number);
        sahabatmuslim.showInfo("Maaf","fitur ini sedang dalam pengembangan");
    }else{
        alert("fitur ini hanya untuk android");
    }
}

function shareKajian(title, body){
    if(typeof sahabatmuslim != 'undefined'){
        if(sahabatmuslim.shareKajian != 'undefined'){
            sahabatmuslim.shareKajian(title,body);
        }
    }else{
        alert("fitur ini hanya untuk android");
    }
}