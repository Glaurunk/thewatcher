// Our custom JS file

//Checkout Page
// Some JS to calculate on the front-end the shipping costs and pass the values to the form and table:)
  function calculateShipping() {

    switch(document.getElementById('inputState').value) {
      case "Very Close":
        shipping_costs = 0;
        break;
      case "Close Enough":
        shipping_costs = 2;
        break;
      case "Far":
        shipping_costs = 3.5;
        break;
      case "In a galaxy far, far away...":
        shipping_costs = 5;
        break;
      default:
        shipping_costs = 0;
    }
    var total = document.getElementById('total').innerHTML.substring(1);
    grand_total = parseFloat(total) + parseFloat(shipping_costs);

    document.getElementById('shipping').innerHTML = "&euro;" + parseFloat(shipping_costs).toFixed(2);
    document.getElementById('grandTotal').innerHTML = "&euro;" + parseFloat(grand_total).toFixed(2);
    document.getElementById('hiddenShipping').value = parseFloat(shipping_costs).toFixed(2);
    document.getElementById('hiddenGrandTotal').value = parseFloat(grand_total).toFixed(2);
  }

// A method to validate the card's date
  function validateCard() {

    var year = document.getElementById('expYear').value;
    var month = document.getElementById('expMonth').value;
    var today = new Date();
    var mm = String(today.getMonth() + 1).padStart(2, '0');
    var yyyy = today.getFullYear();

    if (yyyy > year || (year == yyyy && mm > month)) {
      event.preventDefault();
      alert("Your card has expired!");
    }
  }
