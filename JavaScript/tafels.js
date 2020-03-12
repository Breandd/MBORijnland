// Deze funcite laat de tafels zien
function setTables(nr){
    var i = 1;
    if(i=1){
        tafels.innerHTML = null;
    }
    for(i=1;i<=10;i++){
        var antwoord = i * nr;
        tafels.innerHTML = tafels.innerHTML + nr + " x " + i + " = " + antwoord + "<br/>";
    }
}
// deze functie laat je de tafels toetsen
function tafelstoetsen(nr){
    var keuze = nr;
    if(i=1) {
        tafels.innerHTML = null;
    }
    for(i=1; i<=10; i++){
        tafels.innerHTML = tafels.innerHTML + nr + " x " + i + " = " + "<input id='ant"+i+"' type='integer'>" + "<br/>";
    }
    document.getElementById("input").innerHTML = "<button id='kijkna' onclick='nakijken("+ keuze +")'>Klik om de tafels na te kijken!</button>";
}

//deze functie kijkt de tafels na.
function nakijken(nr2) {
    var cijfer = 0;
    for(i = 1; i <= 10; i++){
        var antwoord = nr2 * i;
        var ingetypt = parseInt(document.getElementById("ant" + i).value);
        if(antwoord === ingetypt){
            document.getElementById("ant"+i).style.backgroundColor = "green";
            cijfer++;
        }else{
            document.getElementById("ant"+i).style.backgroundColor = "red";
        }
    }
        if(cijfer <= 5){
        score.innerHTML = "<p id='text'>Je hebt een " + cijfer + " download hierboven het oefenblaadje om thuis nog verder te oefenen.</p>";
    }else{
        score.innerHTML = "<p id='text'>Je hebt een " + cijfer + ". Gefeliciteerd! Kies hierboven een andere tafel om die te toetsen.";
    }
}