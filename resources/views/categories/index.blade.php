<x-app-layout>
    <main class="container flex-grow-1 p-4">
        <header class="p-5">
            <h5 class="display-5 header-section">Categorias de productos</h5>
        </header>
        <div class="d-flex">
            <button type="button" class="btn btn-light btn-lg rounded-1 font-size-1 font-bold my-2 ms-auto" data-bs-toggle="modal" data-bs-target="#create-category-modal">
                Nueva categoria  <i class="bi bi-plus-lg font-size-2"></i>
            </button>
        </div>
        <x-table :columns="['Id', 'Nombre', 'Descripción', 'Acción']" />
    </main>
    <div class="modal fade rounded-1" id="create-category-modal" tabindex="-1" aria-labelledby="create-category-modal-label" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header border-0">
              <h4 class="modal-title">Nueva categoria</h4>
              <button type="button" class="btn btn-close btn-light rounded-1" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="" onsubmit="newCategory(event)" id="new-category-form">
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="category-name-input" class="form-label">Nombre de categoria</label>
                        <input type="text" name="name" class="form-control" id="category-name-input" placeholder="">
                      </div>
                      <div class="mb-3">
                        <label for="category-description-input" class="form-label">Descripción</label>
                        <textarea name="description" class="form-control" id="category-description-input" rows="3"></textarea>
                      </div>
                </div>
                <div class="modal-footer border-0">
                  <button type="button" id="close-modal-btn" hidden class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                  <button type="submit"  class="btn bg-cus-primary btn-light rounded-1">Crear</button>
                </div>
            </form>
          </div>
        </div>
      </div>


    <script>
        function newCategory(e) {
            e.preventDefault();

            const closeModal = document.getElementById('close-modal-btn');
            const form = document.getElementById('new-category-form');
            const formData = new FormData(form);
            const data = Object.fromEntries(formData.entries());
            
            fetch('/api/categories', {
                method: 'POST',
                credentials: 'include',
                headers: {
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
                    'Accept': 'application/json',
                    'Content-Type': 'application/json'
                },
                body: JSON.stringify(data)
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