function showSidebar(){
    const sidebar = document.querySelector('.sidebar')
    sidebar.style.display = 'flex'
}

function hideSidebar(){
    const sidebar = document.querySelector('.sidebar')
    sidebar.style.display = 'none'
}


var totalSum = 0;
var menuitem = [];

function total(name, price, description, button) {
    var cardBody = button.closest('.card-body');
    var quantityInput = cardBody.querySelector('.quantity');
    var quantity = parseInt(quantityInput.value);
    
    var index = menuitem.findIndex(item => item.name === name && item.price === price && item.description === description);

    if (index === -1) {
        menuitem.push({ name: name, price: price, description: description, quantity: quantity });
        totalSum += price * quantity;
        button.innerHTML = "Remove from Cart";
    } else {
        var removedQuantity = menuitem[index].quantity;
        menuitem.splice(index, 1);
        totalSum -= price * removedQuantity;
        button.innerHTML = "Add To Cart";
    }

    document.getElementById('totalSum').textContent = totalSum.toFixed(2);
    
    localStorage.setItem('sum', totalSum.toFixed(2)); 
    localStorage.setItem('details', menuitem.map(item => `${item.name},${item.price},${item.description},${item.quantity}`).join(';'));
}