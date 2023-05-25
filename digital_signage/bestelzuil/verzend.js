//de url waar het php bestand staat
let url = "bestelzuil.php"

//eerste bestelde product 
let product = "Hamburger"; 
let aantal = 2; 
let prijs = 350;    //prijs in centen


//aanroep van de functie
let bestelnummer = document.getElementById("bestelnummer").value;
zendBestelling(url, bestelnummer, product, aantal, prijs);

//Na 2 seconde wordt een tweede product besteld 
//met hetzelfde bestelnummer (dus hoort het bij dezelfde bestelling)
setTimeout(() => { 
    bestelnummer = document.getElementById("bestelnummer").value;
    product = "kipnuggets";
    aantal = 1;
    prijs = 300;

    zendBestelling(url, bestelnummer, product, aantal, prijs);
}, 2000);

//na weer twee seconde wordt de bestelling betaald
setTimeout(() => { 
    bestelnummer = document.getElementById("bestelnummer").value;
    zendBetaling(url, bestelnummer);
}, 4000);


function zendBestelling(url, bestelnummer, product, aantal, prijs){ 
    // Creating a XHR object 
    let xhr = new XMLHttpRequest(); 

    // open a connection 
    xhr.open("POST", url, true); 

    // Set the request header i.e. which type of content you are sending 
    xhr.setRequestHeader("Content-Type", "application/json"); 

    // Create a state change callback 
    xhr.onreadystatechange = function () { 
        if (xhr.readyState === 4 && xhr.status === 200) {  
            // Geef het bestelnummer als antwoord terug;
            document.getElementById("bestelnummer").value = this.responseText; 
        } 
    }; 

    // Converting JSON data to string 
    var data = JSON.stringify({ "bestelnummer": bestelnummer, "product": product , "aantal": aantal, "prijs": prijs}); 

    // Sending data with the request 
    xhr.send(data); 
} 

function zendBetaling(url, bestelnummer){ 
    // Creating a XHR object 
    let xhr = new XMLHttpRequest(); 

    // open a connection 
    xhr.open("POST", url, true); 

    // Set the request header i.e. which type of content you are sending 
    xhr.setRequestHeader("Content-Type", "application/json"); 

    // Create a state change callback 
    xhr.onreadystatechange = function () { 
        if (xhr.readyState === 4 && xhr.status === 200) {    
            // Geef het bestelnummer als antwoord terug;
            document.getElementById("bestelnummer").value = "0"; 
        } 
    }; 

    // Converting JSON data to string 
    var data = JSON.stringify({ "bestelnummer": bestelnummer}); 
   
    // Sending data with the request 
    xhr.send(data); 
}