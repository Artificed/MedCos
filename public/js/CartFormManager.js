const totalPrice = document.getElementById('total_price');

const checkBoxes = document.querySelectorAll('.checkbox');
const prices = document.querySelectorAll('.price');
const quantities = document.querySelectorAll('.quantity');

function refreshTotalPrice() {
    let countPrice = 0;
    for(let i = 0; i < checkBoxes.length; i++) {
        if(checkBoxes[i].checked) {
            const priceNumericValue = parseInt(prices[i].textContent.replace(/\D/g, ''));
            const quantity = quantities[i].value
            countPrice += priceNumericValue * quantity;
        }
    }
    totalPrice.value = 'Rp' + countPrice.toString().replace(/\B(?=(\d{3})+(?!\d))/g, '.');
}

document.addEventListener('click', function(event) {
    const clickedElement = event.target;
    const id = clickedElement.id.split('_')[0];
    if(clickedElement.classList.contains('min-button')) {
        const quantity = document.getElementById(id + '_quantity');
        if(parseInt(quantity.value) > 1) {
            quantity.value--;
        }
    } else if(clickedElement.classList.contains('plus-button')) {
        const quantity = document.getElementById(id + '_quantity');
        const limit = document.getElementById(id + '_limit');
        if(parseInt(quantity.value) < parseInt(limit.value)) {
            quantity.value = parseInt(quantity.value) + 1;
        }
    }
    refreshTotalPrice();
})
