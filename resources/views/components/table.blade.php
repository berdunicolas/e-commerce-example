<div class="rounded-1 bg-light py-3">
    @if($columns)
        <table class="table table-hover table-sm table-borderless">
            <thead>
                <tr>
                @foreach ($columns as $column)
                    <th scope="col">{{$column}}</th>
                @endforeach
                </tr>
    
            </thead>
            <tbody id="table-body">
                <tr class="text-center">
                    <td  colspan="{{count($columns)}}">Sin contenido...</td>
                </tr>
            </tbody>
        </table>
    @else
        <table class="table table-sm table-borderless">
            <tbody>
                <tr class="text-center">
                    <td>Sin contenido...</td>
                </tr>
            </tbody>
        </table>
    @endif
</div>

<script>
    const tableBody = document.getElementById('table-body');

    fetch('/api/categories', {
        method: 'GET',
        credentials: 'include',
    })
    .then(response => response.json())
    .then(data => {
        tableBody.innerHTML = '';
        data.forEach(category => {
            const tr = document.createElement('tr');
            tr.innerHTML = `
                <td>${category.id}</td>
                <td>${category.name}</td>
                <td>${category.description}</td>
                <td>
                    <a href="${category.url_item}/edit" class="btn btn-sm btn-warning">Editar</a>
                    <button class="btn btn-sm btn-danger" onclick="deleteCategory(${category.url_item})">Eliminar</button>
                </td>
            `;
            tableBody.appendChild(tr);
        });
    });

</script>