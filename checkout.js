var sum = localStorage.getItem('sum');
var details = localStorage.getItem('details');

if (details) {
    var tableBody = document.getElementById('tableBody');
    var detailsArray = details.split(';');

    detailsArray.forEach(detail => {
        var [name, price, description, quantity] = detail.split(',');

        var validQuantity = parseInt(quantity) || 1;

        var row = `
            <tr>
                <td>${name}</td>
                <td>${price}</td>
                <td>${description}</td>
                <td>${validQuantity}</td>
            </tr>
        `;
        tableBody.insertAdjacentHTML('beforeend', row);
    });
}

if (sum) {
    document.getElementById('totalSum').textContent = sum;
}

function clearData() {
    localStorage.removeItem('sum');
    localStorage.removeItem('details');

    const tableBody = document.getElementById('tableBody');
    tableBody.innerHTML = "";

    document.getElementById('totalSum').textContent = "0.00";
}