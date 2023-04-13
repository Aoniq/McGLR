//1. Create variables
let totalPriceHamburger = 0;

//2. Main function to update the number and price for each snack
function addSnack(snackName, snackPrice, snackID) {
    switch (snackName) {
        case "Hamburger":
            //Increase number of hamburgers
            let howManyHamburger = Number(document.getElementById(`howMany${snackID}`).value);
            howManyHamburger++;
            document.getElementById(`howMany${snackID}`).value = howManyHamburger;
            
            //Increase total price of hamburgers
            totalPriceHamburger = (howManyHamburger * snackPrice);
            totalPriceHamburger = roundIt(totalPriceHamburger);
            document.getElementById(`totalPrice${snackID}`).value = totalPriceHamburger;
            break;
 
    }
    //Update total amount for this order
    document.getElementById("totalOrderAmount").value = Number(totalPriceHamburger).toFixed(2);
}

//3. Function to round the amounts to 2 decimals
function roundIt(amountToRound) {
    amountToRound = Math.round(amountToRound * 100)/100;
    return amountToRound;
}
