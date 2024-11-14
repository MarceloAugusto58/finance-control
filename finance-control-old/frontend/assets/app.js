document.addEventListener('DOMContentLoaded', loadProducts);
const productForm = document.getElementById('productForm');

productForm.addEventListener('submit', function(event) {
    event.preventDefault();
    addProduct();
});
function loadProducts() {
    fetch('http://localhost/finance-control/backend/index.php?action=list')
        .then(response => response.json())
        .then(products => {
            const productTableBody = document.getElementById('productTableBody');
            productTableBody.innerHTML = '';
            products.forEach(product => {
                const row = document.createElement('tr');
                row.innerHTML = `
                    <td>${product.id}</td>
                    <td>${product.name}</td>
                    <td>${product.description}</td>
                    <td>${product.price}</td>
                    <td>
                        <button class="btn btn-warning btn-sm" onclick="editProduct(${product.id})">Editar</button>
                        <button class="btn btn-danger btn-sm" onclick="deleteProduct(${product.id})">Excluir</button>
                    </td>
                `;
                productTableBody.appendChild(row);
            });
        });
}

function addProduct() {
    const productName = document.getElementById('productName').value;
    const productDescription = document.getElementById('productDescription').value;
    const productPrice = parseFloat(document.getElementById('productPrice').value);

    const data = {
        name: productName,
        description: productDescription,
        price: productPrice
    };

    fetch('http://localhost/finance-control/backend/index.php', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json'
        },
        body: JSON.stringify(data)
    })
    .then(response => response.json())
    .then(result => {
        alert(result.message || result.error);
        productForm.reset();
        loadProducts();
    });
}

function deleteProduct(id) {
    fetch(`http://localhost/finance-control/backend/index.php?id=${id}`, {
        method: 'DELETE'
    })
    .then(response => response.json())
    .then(result => {
        alert(result.message || result.error);
        loadProducts();
    });
}
