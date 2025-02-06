<x-app-layout>
    <main class="container flex-grow-1 p-4">
        <header class="p-5">
            <h5 class="display-5 header-section">Productos</h5>
        </header>
        <div class="d-flex">
            <button type="button" class="btn btn-light btn-lg rounded-1 font-size-1 font-bold my-2 ms-auto" data-bs-toggle="modal" data-bs-target="#create-product-modal">
                Nuevo producto  <i class="bi bi-plus-lg font-size-2"></i>
            </button>
        </div>
        <x-table :columns="['Codigo', 'Nombre', 'Descripción', 'Precio', 'Stock', 'Categoria', 'Acción']" :tableJS="'table-products.js'" />
    </main>
    <div class="modal fade rounded-1 modal-lg" id="create-product-modal" tabindex="-1" aria-labelledby="create-product-modal-label" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header border-0">
              <h4 class="modal-title">Nuevo producto</h4>
              <button type="button" class="btn btn-close btn-light rounded-1" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="" onsubmit="newProduct(event)" id="new-product-form">
                <div class="d-flex flex-row flex justify-content-between">
                    <div class="w-50 p-3">
                        <div class="mb-3">
                            <label for="product-code-input" class="form-label">Codigo de producto</label>
                            <input type="text" name="code" class="form-control" id="product-code-input" placeholder="">
                        </div>
                        <div class="mb-3">
                            <label for="product-name-input" class="form-label">Nombre de producto</label>
                            <input type="text" name="name" class="form-control" id="product-name-input" placeholder="">
                        </div>
                        <div class="mb-3">
                            <label for="product-price-input" class="form-label">Precio</label>
                            <input type="number" name="price" step="0.01" min="0" class="form-control" id="product-price-input" placeholder="">
                        </div>
                        <div class="mb-3">
                            <label for="product-category-input" class="form-label">Category</label>
                            <select name="category_id" class="form-select" aria-label="category-select">
                                @foreach ($categories as $category)
                                    <option value="{{$category->id}}">{{$category->name}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="w-50 p-3">
                        <label for="product-stock-input" class="form-label">Stock/Unidad</label>
                        <div class="input-group mb-3">
                                <input type="number" name="stock" step="0.01" min="0" class="form-control" style="width: 40% !important;" id="product-stock-input" placeholder="">
                                <select name="unit" class="form-select" aria-label="unit-select">
                                    <option value="u">Unidades</option>
                                    <option value="Kg">Kilogramos</option>
                                    <option value="Gr">Gramos</option>
                                    <option value="L">Litros</option>
                                    <option value="ml">Mililitros</option>
                                </select>
                          </div>
                          <div class="mb-3">
                            <label for="product-stock-alert-input" class="form-label">Alerta de stock</label>
                            <input type="number" name="stock_alert_threshold" step="0.01" min="0" class="form-control" id="product-stock-alert-input" placeholder="">
                        </div>
                        <div class="mb-3">
                            <label for="image" class="form-label">Imagen de producto</label>
                            <input class="form-control" id="image" name="image" type="file" accept=".jpg, .jpeg, .png">
                        </div>
                        <div class="mb-3">
                            <label for="product-description-input" class="form-label">Descripción</label>
                            <textarea name="description" class="form-control" id="product-description-input" rows="3"></textarea>
                        </div>
                    </div>
                </div>

                <div class="modal-footer border-0">
                  <button type="button" id="close-modal-btn" hidden class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                  <button type="submit"  class="btn bg-cus-primary btn-light rounded-1">Crear producto</button>
                </div>
            </form>
          </div>
        </div>
      </div>


    <script>
        function newProduct(e) {
            e.preventDefault();

            const closeModal = document.getElementById('close-modal-btn');
            const form = document.getElementById('new-product-form');
            const formData = new FormData(form);
            
            fetch('api/products', {
                method: 'POST',
                credentials: 'include',
                headers: {
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
                    //'Content-Type': 'multipart/form-data'
                },
                body: formData
            })
            .then(async response => {
                const statusCode = response.status;
                const text = await response.text();
                const data = text ? JSON.parse(text) : {};
                return ({ statusCode, data });
            })
            .then(({statusCode, data}) => {
                if(statusCode === 201){
                    updateTable();
                    closeModal.click();
                } else {
                    console.error(data);
                }
            })
            .catch(error => console.error('Error:', error));
        }
    </script>
</x-app-layout>