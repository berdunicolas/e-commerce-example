<x-store-layout>
  <x-store-navbar/>

  <main class="container-lg p-0 pb-5 pt-5">
    <div class="row">
      <div class="card p-3 col-9 d-flex flex-column" style="max-height: 700px !important;">
        <h6 class="display-6 card-title">Tu carrito de compra</h6>
        <div class="overflow-y-scroll h-100">
          <table class="table table-hover">
            <thead>
              <tr>
                <th>Producto</th>
                <th>Cantidad</th>
                <th>Precio</th>
                <th></th>
              </th>
            </thead>
            <tbody class="overflow-y-scroll" style="vertical-align: middle;">
              <tr id="cart-item-1">
                <td class="d-flex flex-row">
                  <div class="">
                    <img height="100" src="{{ asset('images/Image-not-found.png') }}" alt="Una remera">
                  </div>
                  <div class="">
                    <strong style="font-family: 'Gothic A1' !important; font-weight: 700;">
                      Pantalon
                    </strong>
                    <p>
                      Pantalon deportivo sarasa sarasa
                    </p>
                  </div>
                </td>
                <td>
                  <div class="input-group">
                    <button class="btn border btn-light" onclick="CartController.subItemQuantity(1)" value="500" type="button">-</button>
                    <input type="number" class="border bg-light" value="1" style="width: 2.5rem; text-align:right;" id="cart-item-q-1" disabled>
                    <button class="btn border btn-light" onclick="CartController.addItemQuantity(1)" value="500" type="button">+</button>
                  </div>
                  <div class="form-text" id="basic-addon4">Solo 24 disponibles.</div>
                </td>
                <td>
                  <strong style="font-family: 'Gothic A1' !important; font-weight: 700;">
                    $<span id="cart-item-price-1">700</span>
                  </strong>
                  <div class="form-text" id="basic-addon4">$700 c/u.</div>
                </td>
                <td>
                  <a href="javascript:;" onclick="CartController.deleteItem(1)" class="link-danger link-offset-2 link-underline-opacity-25 link-underline-opacity-100-hover" style="text-align: center; font-family: 'Gothic A1' !important; font-weight: 300;">
                    <div>
                      <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash3" viewBox="0 0 16 16">
                        <path d="M6.5 1h3a.5.5 0 0 1 .5.5v1H6v-1a.5.5 0 0 1 .5-.5M11 2.5v-1A1.5 1.5 0 0 0 9.5 0h-3A1.5 1.5 0 0 0 5 1.5v1H1.5a.5.5 0 0 0 0 1h.538l.853 10.66A2 2 0 0 0 4.885 16h6.23a2 2 0 0 0 1.994-1.84l.853-10.66h.538a.5.5 0 0 0 0-1zm1.958 1-.846 10.58a1 1 0 0 1-.997.92h-6.23a1 1 0 0 1-.997-.92L3.042 3.5zm-7.487 1a.5.5 0 0 1 .528.47l.5 8.5a.5.5 0 0 1-.998.06L5 5.03a.5.5 0 0 1 .47-.53Zm5.058 0a.5.5 0 0 1 .47.53l-.5 8.5a.5.5 0 1 1-.998-.06l.5-8.5a.5.5 0 0 1 .528-.47M8 4.5a.5.5 0 0 1 .5.5v8.5a.5.5 0 0 1-1 0V5a.5.5 0 0 1 .5-.5"/>
                      </svg>
                      <p>Eliminar</p>
                    </div>
                  </a>
                </td>
              </tr>
              <tr id="cart-item-2">
                <td class="d-flex flex-row">
                  <div class="">
                    <img height="100" src="{{ asset('images/Image-not-found.png') }}" alt="Una remera">
                  </div>
                  <div class="">
                    <strong style="font-family: 'Gothic A1' !important; font-weight: 700;">
                      Remera
                    </strong>
                    <p>
                      Remera deportiva sarasa sarasa
                    </p>
                  </div>
                </td>
                <td>
                  <div class="input-group">
                    <button class="btn border btn-light" onclick="CartController.subItemQuantity(2)" value="500" type="button">-</button>
                    <input type="number" class="border bg-light" value="1" style="width: 2.5rem; text-align:right;" id="cart-item-q-2" disabled>
                    <button class="btn border btn-light" onclick="CartController.addItemQuantity(2)" value="500" type="button">+</button>
                  </div>
                  <div class="form-text" id="basic-addon4">Solo 4 disponibles.</div>
                </td>
                <td>
                  <strong style="font-family: 'Gothic A1' !important; font-weight: 700;">
                    $<span id="cart-item-price-2">500</span>
                  </strong>
                  <div class="form-text" id="basic-addon4">$500 c/u.</div>
                </td>
                <td>
                  <a href="javascript:;" onclick="CartController.deleteItem(2)" class="link-danger link-offset-2 link-underline-opacity-25 link-underline-opacity-100-hover" style="text-align: center; font-family: 'Gothic A1' !important; font-weight: 300;">
                    <div>
                      <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash3" viewBox="0 0 16 16">
                        <path d="M6.5 1h3a.5.5 0 0 1 .5.5v1H6v-1a.5.5 0 0 1 .5-.5M11 2.5v-1A1.5 1.5 0 0 0 9.5 0h-3A1.5 1.5 0 0 0 5 1.5v1H1.5a.5.5 0 0 0 0 1h.538l.853 10.66A2 2 0 0 0 4.885 16h6.23a2 2 0 0 0 1.994-1.84l.853-10.66h.538a.5.5 0 0 0 0-1zm1.958 1-.846 10.58a1 1 0 0 1-.997.92h-6.23a1 1 0 0 1-.997-.92L3.042 3.5zm-7.487 1a.5.5 0 0 1 .528.47l.5 8.5a.5.5 0 0 1-.998.06L5 5.03a.5.5 0 0 1 .47-.53Zm5.058 0a.5.5 0 0 1 .47.53l-.5 8.5a.5.5 0 1 1-.998-.06l.5-8.5a.5.5 0 0 1 .528-.47M8 4.5a.5.5 0 0 1 .5.5v8.5a.5.5 0 0 1-1 0V5a.5.5 0 0 1 .5-.5"/>
                      </svg>
                      <p>Eliminar</p>
                    </div>
                  </a>
                </td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>

      <div class="col-3">
        <div class="card p-3 mb-3">
          <label for="">¿Tienes un cupon?</label> <!-- AGREGAR VALIDACION -->
          <div class="input-group mb-3">
            <input type="text" class="form-control" placeholder="Codido de cupon" aria-label="Codido de cupon" aria-describedby="button-addon2">
            <button class="btn border btn-light" type="button" id="button-addon2">Button</button>
          </div>
        </div>
        <div class="card pt-2 pb-4 pe-3 ps-3">
          <ul class="list-group border-0">
            <li class="d-flex justify-content-between align-items-start pt-2 pe-0 pb-0 ps-0 border-0">
              <p class="mb-0"><b>Precio total</b></p><p class="mb-0" id="summary-total-price">$10.000</p>
            </li>
            <li class="d-flex justify-content-between align-items-start pt-2 pe-0 pb-0 ps-0 border-0">
              <p class="mb-0">Descuento</p><p class="mb-0" id="summary-discount">$10.000</p>
            </li>
            <li class="d-flex justify-content-between align-items-start mt-3 pt-3 pe-0 pb-3 ps-0 border-top">
              <p class="mb-0">Total</p><p class="mb-0" id="summary-total">$10.000</p>
            </li>
          </ul>
          <button class="btn btn-dark mt-2" type="button">Ir a pagar</button>
          <button type="button" class="btn btn-light border mt-2">Volver a la tienda</button>
        </div>
      </div>
    </div>
  </main>

  <script>
    // LOS DATOS DE LOS ITEMS DEBEN VENIR DEL BACKEND Y SE DEBE RENDERIZAR LA TABLA DESDE EL FRONT
    // SE DEBE DAR UN ESTIMADO DEL TOTAL EN EL FRONTEND Y VALIDAR EL MISMO CALCULO EN EL BACKEND

    Object.prototype.table = function () {
      console.table(this);
    }

    let itemsRows = [
      {
        id: 1,
        price: 700,
        quantity: 1,
        purchaseLimitQuantity: 24,
        rowElement: document.getElementById("cart-item-1"),
        quantityElement: document.getElementById("cart-item-q-1"),
        priceElement: document.getElementById("cart-item-price-1"),
      },
      {
        id: 2,
        price: 500,
        quantity: 1,
        purchaseLimitQuantity: 4,

        rowElement: document.getElementById("cart-item-2"),
        quantityElement: document.getElementById("cart-item-q-2"),
        priceElement: document.getElementById("cart-item-price-2"),
      },
    ];

    let discount = {
      cuponCode: null,
      cuponTitle: null,
      amount: 0
    };

    let orderSummary = {
      totalPrice: 0,
      discount: 0,
      total: 0,

      totalPriceElement: document.getElementById("summary-total-price"),
      discountElement: document.getElementById("summary-discount"),
      totalElement: document.getElementById("summary-total"),
    }

    class CartController {
      static subItemQuantity(itemIndex){
        let item = itemsRows.find(item => item.id === itemIndex);

        if(item.quantity > 1){
          item.quantity--;
          item.quantityElement.value--;

          item.priceElement.textContent = item.quantity * item.price;
          this.orderSummary();
        }
      }

      static addItemQuantity(itemIndex){
        let item = itemsRows.find(item => item.id === itemIndex);

        if(!item.purchaseLimitQuantity || !(item.quantity >= item.purchaseLimitQuantity)){
          item.quantity++;
          item.quantityElement.value++;
          
          item.priceElement.textContent = item.quantity * item.price;
          this.orderSummary();
        }
      }

      static deleteItem(itemIndex){
        let item = itemsRows.find(item => item.id === itemIndex);
        let indexToDelete = itemsRows.findIndex(item => item.id === itemIndex);

        item.rowElement.remove();
        if (indexToDelete !== -1) {
          itemsRows.splice(indexToDelete, 1);
        }

        this.orderSummary();
      }   

      static orderSummary(){
        orderSummary.totalPrice = 0;

        itemsRows.forEach(function(item){
          orderSummary.totalPrice+= (item.price * item.quantity);
        });
        orderSummary.totalPriceElement.textContent = orderSummary.totalPrice;

        orderSummary.discount = discount.amount;
        orderSummary.discountElement.textContent = orderSummary.discount;

        orderSummary.total = orderSummary.totalPrice - orderSummary.discount;
        orderSummary.totalElement.textContent = orderSummary.total;                                                  
      }
    }
  
  </script>
  <x-store-footer/>
</x-store-layout>