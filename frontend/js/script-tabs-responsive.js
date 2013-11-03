// JavaScript Document
$(document).ready(function() {
    $(".content-tab-responsive").hide(); //Nascondo tutti i contenuti
    $("ul.tabs-responsive li:first").addClass("active").show(); //Attivo il primo tab
    $(".content-tab-responsive:first").show(); //Mostro il primo contenuto (contenuto del primo tab)
 
    $("ul.tabs-responsive li").click(function() {
        $("ul.tabs-responsive li").removeClass("active"); //Rimuovo tuttle le classi "active"
        $(this).addClass("active"); //Attivo il tab selezionato
        $(".content-tab-responsive").hide(); //Nascondo tutti i contenuti
 
        var tabAttivo = $(this).find("a").attr("href"); //Prendo il valore dell'attributo href del tab per attivare il realtivo contenuto
        $(tabAttivo).fadeIn(); //Faccio un Fade in per mostrare il contenuto dell'ID appena trovato
        return false;
    });
});