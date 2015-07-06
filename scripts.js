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



function getDistrito() {
    var e = document.getElementById("distrito");
    var id = e.options[e.selectedIndex].value;
    console.log(id);
    return id;
}

function getConcelho() {
    var e = document.getElementById("concelho");
    var id = e.options[e.selectedIndex].value;
    console.log(id);
    return id;

}

function changeDistrito() {
    showPage("concelho", "concelhos.php?idD=" + getDistrito());
    document.getElementById("freguesia").innerHTML = "<select id='freguesia'></select>";
}

function changeConcelho() {
    showPage("freguesia", "freguesias.php?idD=" + getDistrito() + "&idC=" + getConcelho());
}
function checkLat(lat) {
    if (lat < -90 || lat > 90 || isNaN(lat)) {
        return false;
    }
    return true;
}

function checkLong(long) {
    if (long < -180 || long > 180 || isNaN(long)) {
        return false;
    }
    return true;
}
function validPost(form) {
    var titulo = /^[a-zA-Z0-9-]{1,25}$/;
    var descricao = /^[a-zA-Z0-9-]{1,140}$/;
    var preco = /^[0-9]{3,9}$/;
    var assoalhadas = /^[0-9]{2}$/;
    var coor;
    if (!titulo.test(form.titulo.value)) {
        alert('Titulo invalido');
        form.titulo.focus();
        return false;
    }
    if (!descricao.test(form.descricao.value)) {
        alert('Descrição invalida');
        form.descricao.focus();
        return false;
    }
    if (!preco.test(form.preco.value)) {
        alert('Preco invalido');
        form.preco.focus();
        return false;
    }
    if (!assoalhadas.test(form.assoalhadas.value)) {
        alert('Assoalhadas invalidas');
        form.assoalhadas.focus();
        return false;
    }
    if (!checkLat(form.latitude.value)) {
        alert('Latitude invalida');
        form.latitude.focus();
        return false;
    }
    if (!checkLat(form.longitude.value)) {
        alert('Longitude invalida');
        form.long.focus();
        return false;
    }
    return true;
}

function validUser(form) {
    var user = /^[a-zA-Z0-9_-]{3,12}$/;
    var pass = /^[a-zA-Z0-9_-]{6,}$/;
    var phone = /^[0-9]{9}$/;
    var email = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,3})$/;
    if (!user.test(form.user.value)) {
        alert('Utilizador invalido');
        form.user.focus();
        return false;
    }
    if (!pass.test(form.pass.value)) {
        alert('Password invalida');
        form.pass.focus();
        return false;
    }
    if (!email.test(form.email.value)) {
        alert('E-mail invalido');
        form.email.focus();
        return false;
    }
    if (!phone.test(form.tlf.value)) {
        alert('Telefone invalido');
        form.tlf.focus();
        return false;
    }
    if (!phone.test(form.tlm.value)) {
        alert('Telemovel invalido');
        form.tlm.focus();
        return false;
    }


    return true;
}

function validCat(form) {
    var nome = /^[a-zA-Z]{3,12}$/;
    if (!nome.test(form.nome.value)) {
        alert('Nome invalido');
        form.nome.focus();
        return false;
    }
    return true;
}
