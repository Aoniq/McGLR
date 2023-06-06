// afreken.js
    const pinInput = document.getElementById('pinInput');
    const errorMessage = document.getElementById('errorMessage');
  
    function addToPin(number) {
        const pin = pinInput.value;
      if (pin.length >= 4) {
        errorMessage.innerText = 'Gebruik 4 cijfers';
      } else {
        pinInput.value += number;
        errorMessage.innerText = '';
      }
    }
  
    function checkPin() {
      const pin = pinInput.value;
      if (pin.length !== 4) {
        errorMessage.innerText = 'Gebruik 4 cijfers';
      } else {
        // Process the pin or perform other actions
        // Clear the error message
        errorMessage.innerText = '';
      }
    }