<x-app-layout>
    <main class="container flex-grow-1 p-4">
        <header class="p-5">
            <h5 class="display-5 header-section">Categorias de productos</h5>
        </header>
        <x-table :columns="['Id', 'Nombre', 'Descripción']" />
    </main>
</x-app-layout>