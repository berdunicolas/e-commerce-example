<div class="rounded-1 bg-light p-3 shadow">
    @if($columns)
        <table class="table table-hover table-sm table-borderless ">
            <thead class="">
                <tr id="table-head">
                @foreach ($columns as $column)
                    <th scope="col" class="pb-3">{{$column}}</th>
                @endforeach
                </tr>
            </thead>
            <tbody id="table-body">
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
{{-- table.js' --}}
<script src="{{ Vite::asset('resources/js/' . $tableJS)}}" type="module"></script>
<script>
    tableColspan = {{count($columns)}};
</script>