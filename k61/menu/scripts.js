// Opoznienie
function delay(URL) {
    setTimeout(function () {
        window.location = URL
    }, 500);
}
// Zaladowanie pliku
$(document).ready(function () {
    $("#gap").hide();
    $(".info").hide();
    var j = 0;
    // klinkniecie w wysun button
    $("#wysun").click(function () {
        if (j < 1) {
            $("#menu").animate({
                width: '+=170px'
            }, 300);
            $("#home").animate({
                width: '+=170px'
            }, 300);
            $(".bar").animate({
                width: '-=39'
            }, 200);
            $(".info").show(300);
            $("#gap").show(300);
            j++;
        } else {
            $("#menu").animate({
                width: '-=170px'
            }, 400);
            $("#home").animate({
                width: '-=170px'
            }, 400);
            $(".bar").animate({
                width: '+=39'
            }, 400);
            $(".info").hide(400);
            $("#gap").hide(300);
            j--;
        }
    });
    // schowaj na nacisniece na strone
    $("#strona").click(function () {
        if (j < 1) {} else {
            $("#menu").animate({
                width: '-=170px'
            }, 400);
            $("#home").animate({
                width: '-=170px'
            }, 400);
            $(".bar").animate({
                width: '+=39'
            }, 300);
            $(".info").hide(400);
            $("#gap").hide(300);
            j--;
        }
    });
    // animacja wylogowania
    $("#logout").click(function () {
        $("#gap").hide();
        $(".info").hide();
        $("#strona").animate({
            opacity: '0'
        }, 400);
        $("#menu").animate({
            width: '-=300px'
        }, 400);
        $("#home").animate({
            width: '-=300px'
        }, 400);
        $("#home").hide(900);
        $(".bar").hide(400);
        $(".buttons").hide(400);
    });
});

//rozszerzanie, zmniejszanie przyciskow nawigacji przy zmianie wielkosci okna
var prevScrollpos = window.pageYOffset;
window.onscroll = function () {
    if ($(window).width() < 990) {
        var currentScrollPos = window.pageYOffset;
        if (prevScrollpos > currentScrollPos) {
            document.getElementById("top").style.top = "0px";
            document.getElementById("menu").style.top = "85px";
        } else {
            document.getElementById("top").style.top = "-85px";
            document.getElementById("menu").style.top = "1%";
        }
        prevScrollpos = currentScrollPos;
    }
}