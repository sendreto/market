function totalCalc(element) {
    var productValue = element.parentNode.parentNode.cells[1].textContent;
    productValue = productValue.substring(2);

    var productTax = element.parentNode.parentNode.cells[6].textContent;
    productTax = productTax.substring(0, productTax.length - 1);

    var productQuantity = element.parentNode.parentNode.cells[7].firstChild.value;

    var calcTotalValue = (productValue * productQuantity).toFixed(2);
    element.parentNode.parentNode.cells[8].innerHTML = "R$" + calcTotalValue;

    var calcProductTaxTotal = (((productValue * productQuantity) * productTax) / 100).toFixed(2);
    element.parentNode.parentNode.cells[9].innerHTML = "R$" + calcProductTaxTotal;
}

