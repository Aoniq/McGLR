//1. Create variables
let totalPriceHamburger = 0;
let totalPriceMilkshake = 0;
let totalPriceCheeseburger = 0;
let totalPriceChickenburger = 0;
let totalPriceFishburger = 0;
let totalPriceFrenchfries = 0;

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
            case "Milkshake":
                //Increase number of Milkshakes
                let howManyMilkshake = Number(document.getElementById(`howMany${snackID}`).value);
                howManyMilkshake++;
                document.getElementById(`howMany${snackID}`).value = howManyMilkshake;
                
                //Increase total price of Milkshakes
                totalPriceMilkshake = (howManyMilkshake * snackPrice);
                totalPriceMilkshake = roundIt(totalPriceMilkshake);
                document.getElementById(`totalPrice${snackID}`).value = totalPriceMilkshake;
                break;
            case "Frenchfries":
                    //Increase number of Frenchfriess
                    let howManyFrenchfries = Number(document.getElementById(`howMany${snackID}`).value);
                    howManyFrenchfries++;
                    document.getElementById(`howMany${snackID}`).value = howManyFrenchfries;
                    
                    //Increase total price of Frenchfriess
                    totalPriceFrenchfries = (howManyFrenchfries * snackPrice);
                    totalPriceFrenchfries = roundIt(totalPriceFrenchfries);
                    document.getElementById(`totalPrice${snackID}`).value = totalPriceFrenchfries;
            break;
            case "Cheeseburger":
                //Increase number of Cheeseburgers
                let howManyCheeseburger = Number(document.getElementById(`howMany${snackID}`).value);
                howManyCheeseburger++;
                document.getElementById(`howMany${snackID}`).value = howManyCheeseburger;
                
                //Increase total price of Cheeseburgers
                totalPriceCheeseburger = (howManyCheeseburger * snackPrice);
                totalPriceCheeseburger = roundIt(totalPriceCheeseburger);
                document.getElementById(`totalPrice${snackID}`).value = totalPriceCheeseburger;
                break;
                case "Chickenburger":
                //Increase number of Chickenburgers
                let howManyChickenburger = Number(document.getElementById(`howMany${snackID}`).value);
                howManyChickenburger++;
                document.getElementById(`howMany${snackID}`).value = howManyChickenburger;
                
                //Increase total price of Chickenburgers
                totalPriceChickenburger = (howManyChickenburger * snackPrice);
                totalPriceChickenburger = roundIt(totalPriceChickenburger);
                document.getElementById(`totalPrice${snackID}`).value = totalPriceChickenburger;
                break;
                case "Fishburger":
                //Increase number of Fishburgers
                let howManyFishburger = Number(document.getElementById(`howMany${snackID}`).value);
                howManyFishburger++;
                document.getElementById(`howMany${snackID}`).value = howManyFishburger;
                
                //Increase total price of Fishburgers
                totalPriceFishburger = (howManyFishburger * snackPrice);
                totalPriceFishburger = roundIt(totalPriceFishburger);
                document.getElementById(`totalPrice${snackID}`).value = totalPriceFishburger;
                break;
 
    }
    //Update total amount for this order
    document.getElementById("totalOrderAmount").value = Number(totalPriceHamburger + totalPriceCheeseburger + totalPriceChickenburger + totalPriceFishburger + totalPriceFrenchfries + totalPriceMilkshake).toFixed(2);
}

//3. Function to round the amounts to 2 decimals
function roundIt(amountToRound) {
    amountToRound = Math.round(amountToRound * 100)/100;
    return amountToRound;
}

function bestel() {
    let totaal = document.getElementById('totalOrderAmount').value;
    let items = document.querySelectorAll('[id^="totalPrice"]');
    let bestelling = [];
  
    for (let i = 0; i < items.length; i++) {
      let item = items[i];
      if (item.value !== '') {
        let snackId = item.id.replace('totalPrice', '');
        let snackName = document.querySelector('[onclick*="'+snackId+'"]').textContent.split('\n')[1].trim().split(' ')[0]
        let snackPrice = document.querySelector('[onclick*="'+snackId+'"]').textContent.split('\n')[1].trim().split(' ')[2]
        let snackQuantity = document.querySelector('#howMany'+snackId).value;
        let product = { id: snackId, name: snackName, quantity: snackQuantity, price: parseFloat(snackPrice)};
        bestelling.push(product);
      }
    }
  
    var xhr = new XMLHttpRequest();
    xhr.open('POST', 'bestelling.php', true);
    xhr.setRequestHeader('Content-Type', 'application/json');
  
    xhr.onreadystatechange = function () {
      if (xhr.readyState === 4 && xhr.status === 200) {
        document.open();
        document.write(xhr.responseText);
        document.close();
      }
    };
  
    xhr.send(JSON.stringify({ items: bestelling, total: totaal }));
  }