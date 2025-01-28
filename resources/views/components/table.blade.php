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
    const csrf = document.querySelector('meta[name="csrf-token"]').getAttribute('content');

    alert(csrf);
/*
    fetch('/api/categories')
        .then(response => response.json())
        .then(data => {
            tableBody.innerHTML = '';
            data.forEach(category => {
                const tr = document.createElement('tr');
                tr.innerHTML = `
                    <td>${category.id}</td>
                    <td>${category.name}</td>
                    <td>${category.description}</td>
                `;
                tableBody.appendChild(tr);
            });
        })
        .catch(error => console.error(error));*/
</script>



