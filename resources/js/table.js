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

    fetch('/api/categories', {
        method: 'GET',
        credentials: 'include',
    })
    .then(response => response.json())
    .then(data => {
        if(data.length > 0) {  
            tableBody.innerHTML = '';

            data.forEach(category => {
                const tr = document.createElement('tr');

                tr.innerHTML = `
                    <td>${category.id}</td>
                    <td>${category.name}</td>
                    <td>${category.description}</td>
                    <td>
                        <button href="${category.url_item}/edit" class="btn btn-light btn-sm"
                            data-bs-toggle="popover"
                            data-bs-placement="top"
                            data-bs-trigger="hover"
                            data-bs-content="Editar"
                        ><i class="bi bi-pencil-square"></i></button>
                        <button class="btn btn-light btn-sm" onclick="deleteItem('${category.api_url_item}')"
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