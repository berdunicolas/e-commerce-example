import { updatePopoverList } from './helpers.js';

window.tableColspan;

window.deleteItem = function (url) {
    fetch(url, {
        method: 'DELETE',
        credentials: 'include',
        headers: {
            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
            'Accept': 'application/json'
        }
    })
    .then(async response => {
        const statusCode = response.status;
        const text = await response.text();
        const data = text ? JSON.parse(text) : {};
        return ({ statusCode, data });
    })
    .then(({statusCode, data}) => {
        if(statusCode === 200){
            updateTable();
        } else {
            console.error(data);
        }
    })
    .catch(error => console.error('Error:', error));
};


window.updateTable = function () {
    const tableBody = document.getElementById('table-body');

    fetch('/api/products', {
        method: 'GET',
        credentials: 'include',
    })
    .then(response => response.json())
    .then(data => {
        if(data.length > 0) {  
            tableBody.innerHTML = '';

            data.forEach(product => {
                let stock_status = `<i class="bi bi-check-circle text-success font-size-2"></i>`;
                if(product.stock <= product.stock_alert){
                    stock_status = `<i class="bi bi-exclamation-triangle text-warning font-size-2"></i>`;
                }

                const tr = document.createElement('tr');

                tr.innerHTML = `
                    <td>${product.code}</td>
                    <td>${product.name}</td>
                    <td>${product.description}</td>
                    <td>$${product.price}</td>
                    <td>${product.stock}${product.unit} ${stock_status}</td>
                    <td>${(product.category) ? product.category.name : ''}</td>
                    <td>
                        <button href="${product.url_item}/edit" class="btn btn-light btn-sm"
                            data-bs-toggle="popover"
                            data-bs-placement="top"
                            data-bs-trigger="hover"
                            data-bs-content="Editar"
                        ><i class="bi bi-pencil-square"></i></button>
                        <button class="btn btn-light btn-sm" onclick="deleteItem('${product.api_url_item}')"
                            data-bs-toggle="popover"
                            data-bs-placement="top"
                            data-bs-trigger="hover"
                            data-bs-content="Eliminar"
                        ><i class="bi bi-trash3"></i></button>
                    </td>
                `;
                tableBody.appendChild(tr);
            });
        } else {
            const tr = document.createElement('tr');

            tableBody.innerHTML = '';
            tr.innerHTML = `
                <td class="text-center" colspan="${tableColspan}">Sin contenido...</td>
            `;
            tableBody.appendChild(tr);
        }
        updatePopoverList();
    });
}

document.addEventListener('DOMContentLoaded', function() {
    updateTable();
});