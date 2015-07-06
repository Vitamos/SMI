function showPage(id, page, lat, long) {
    if (window.XMLHttpRequest) {
        // code for IE7+, Firefox, Chrome, Opera, Safari
        xmlhttp = new XMLHttpRequest();
    } else {
        // code for IE6, IE5
        xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
    }
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState === 4 && xmlhttp.status === 200) {
            document.getElementById(id).innerHTML = xmlhttp.responseText;
            lat = (typeof lat === 'undefined') ? 0 : lat;
            long = (typeof long === 'undefined') ? 0 : long;
            initialize(lat, long);
        }
    };
    
    xmlhttp.open("GET", page, true);
    xmlhttp.send();
}

function initialize(lat, long) {
    var mapCanvas = document.getElementById('map');
    var pos = new google.maps.LatLng(lat, long);
    var mapOptions = {
        center: pos,
        zoom: 13,
        mapTypeId: google.maps.MapTypeId.ROADMAP
    };

    var map = new google.maps.Map(mapCanvas, mapOptions);
    var marker = new google.maps.Marker({
        position: pos,
        map: map
    });
}



function getDistrito(){
    var e = document.getElementById("distrito");
    var id = e.options[e.selectedIndex].value;
    console.log(id);
    return id;  
}

function getConcelho(){
    var e = document.getElementById("concelho");
    var id = e.options[e.selectedIndex].value;
    console.log(id);
    return id;
    
}

function changeDistrito(){
    showPage("concelho", "concelhos.php?idD="+getDistrito());
    document.getElementById("freguesia").innerHTML = "<select id='freguesia'></select>";
}

function changeConcelho(){
    showPage("freguesia", "freguesias.php?idD="+getDistrito()+"&idC="+getConcelho());
}