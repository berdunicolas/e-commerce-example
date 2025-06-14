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
            <tbody class="overflow-y-scroll" id="cart-body" style="vertical-align: middle;"></tbody>
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
              <p class="mb-0"><b>Precio total</b></p><p class="mb-0" id="summary-total-price">$10.000</p> <!-- ID summary-total-price -->
            </li>
            <li class="d-flex justify-content-between align-items-start pt-2 pe-0 pb-0 ps-0 border-0">
              <p class="mb-0">Descuento</p><p class="mb-0" id="summary-discount">$10.000</p> <!-- ID sumamary-discount -->
            </li>
            <li class="d-flex justify-content-between align-items-start mt-3 pt-3 pe-0 pb-3 ps-0 border-top">
              <p class="mb-0">Total</p><p class="mb-0" id="summary-total">$10.000</p> <!-- summary-total -->
            </li>
          </ul>
          <button class="btn btn-dark mt-2" type="button">Ir a pagar</button>
          <a href="/store" class="btn btn-light border mt-2">Volver a la tienda</a>
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

    let itemsRows = [];

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

      static async subItemQuantity(itemIndex){
        let item = itemsRows.find(item => item.id === itemIndex);

        
        if(item.quantity > 1){
          item.quantity--;
          item.quantityElement.value--;
          
          await this.substractFromCart(itemIndex);
          item.priceElement.textContent = item.quantity * item.price;
          this.orderSummary();
        }
      }

      static async addItemQuantity(itemIndex){
        await this.addToCart(itemIndex);

        let item = itemsRows.find(item => item.id === itemIndex);

        if(!item.purchaseLimitQuantity || !(item.quantity >= item.purchaseLimitQuantity)){
          item.quantity++;
          item.quantityElement.value++;
          
          item.priceElement.textContent = item.quantity * item.price;
          this.orderSummary();
        }
      }

      static async deleteItem(itemIndex){
        try {
          let item = itemsRows.find(item => item.id === itemIndex);
          let indexToDelete = itemsRows.findIndex(item => item.id === itemIndex);

          item.rowElement.remove();
          if (indexToDelete !== -1) {
            itemsRows.splice(indexToDelete, 1);
          }

          fetch('/api/cart/items/' + item.id, {
            method: 'DELETE',
            headers: {
              'Authorization': 'Bearer 1|LXN0BmcnOujarNMt8kI22oOfE9U1ng9YFbIKCgjg1f962e8e',
              'Accept': 'application/json',
            },
          });
        } catch (error) {
          console.error('Error: ', error);
        }

        await this.getCart();
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

      static insertRow(itemId, itemName, itemDescription, itemPrice, itemQuantity, itemStock, itemUnit, itemImage){
        const cartBody = document.getElementById('cart-body');
        const tr = document.createElement('tr');
        tr.setAttribute("id", "cart-item-" + itemId);

        tr.innerHTML = `
          <td class="d-flex flex-row">
            <div class="">
              <img height="100" src="${itemImage}" alt="">
            </div>
            <div class="">
              <strong style="font-family: 'Gothic A1' !important; font-weight: 700;">${itemName}</strong>
              <p>${itemDescription}</p>
            </div>
          </td>
          <td>
            <div class="input-group">
              <button class="btn border btn-light" onclick="CartController.subItemQuantity(${itemId})" value="${itemPrice}" type="button">-</button>
              <input type="number" class="border bg-light" value="${itemQuantity}" style="width: 2.5rem; text-align:right;" id="cart-item-q-${itemId}" disabled>
              <button class="btn border btn-light" onclick="CartController.addItemQuantity(${itemId})" value="${itemPrice}" type="button">+</button>
            </div>
            <div class="form-text" id="basic-addon4">${itemStock}${itemUnit} disponibles.</div>
          </td>
          <td>
            <strong style="font-family: 'Gothic A1' !important; font-weight: 700;">
              $<span id="cart-item-price-${itemId}">${itemPrice * itemQuantity}</span>
            </strong>
            <div class="form-text" id="basic-addon4">$${itemPrice} x ${itemUnit}.</div>
          </td>
          <td>
            <a href="javascript:;" onclick="CartController.deleteItem(${itemId})" class="link-danger link-offset-2 link-underline-opacity-25 link-underline-opacity-100-hover" style="text-align: center; font-family: 'Gothic A1' !important; font-weight: 300;">
              <div>
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash3" viewBox="0 0 16 16">
                  <path d="M6.5 1h3a.5.5 0 0 1 .5.5v1H6v-1a.5.5 0 0 1 .5-.5M11 2.5v-1A1.5 1.5 0 0 0 9.5 0h-3A1.5 1.5 0 0 0 5 1.5v1H1.5a.5.5 0 0 0 0 1h.538l.853 10.66A2 2 0 0 0 4.885 16h6.23a2 2 0 0 0 1.994-1.84l.853-10.66h.538a.5.5 0 0 0 0-1zm1.958 1-.846 10.58a1 1 0 0 1-.997.92h-6.23a1 1 0 0 1-.997-.92L3.042 3.5zm-7.487 1a.5.5 0 0 1 .528.47l.5 8.5a.5.5 0 0 1-.998.06L5 5.03a.5.5 0 0 1 .47-.53Zm5.058 0a.5.5 0 0 1 .47.53l-.5 8.5a.5.5 0 1 1-.998-.06l.5-8.5a.5.5 0 0 1 .528-.47M8 4.5a.5.5 0 0 1 .5.5v8.5a.5.5 0 0 1-1 0V5a.5.5 0 0 1 .5-.5"/>
                </svg>
                <p>Eliminar</p>
              </div>
            </a>
          </td>`;
        cartBody.appendChild(tr);

      }

      static async renderCartInfo(){
        let cart = await this.getCart();

        cart.items.forEach(item => {
          this.insertRow(item.product.id, item.product.name, item.product.description, item.price, item.quantity, item.product.stock, item.product.unit, item.product.image_url);

          itemsRows.push({
            id: item.product.id,
            price: item.price,
            quantity: item.quantity,
            purchaseLimitQuantity: item.stock,
            rowElement: document.getElementById("cart-item-"+item.product.id),
            quantityElement: document.getElementById("cart-item-q-"+item.product.id),
            priceElement: document.getElementById("cart-item-price-"+item.product.id),
          });
        });
      }
  
      static async getCart(){
        try {
          let response = await fetch('/api/cart', {
            method: 'GET',
            headers: {
              'Authorization': 'Bearer 1|LXN0BmcnOujarNMt8kI22oOfE9U1ng9YFbIKCgjg1f962e8e',
              'Accept': 'application/json',
            },
          });

          let data = await response.json();
            
          let cartIcon = document.getElementById('cart-icon');
          if(data.items && data.items.length > 0){
            
            cartIcon.innerHTML = data.items.length;
            cartIcon.classList.remove('visually-hidden');
          }else{
            cartIcon.classList.add('visually-hidden');
          }

          return data;
        } catch (error) {
          console.error('Error: ', error);
          return null;
        }
        
      }

      static async addToCart(item_id){
        const cart = await this.getCart();

        const item = cart ? cart.items.find(item => item.product.id === item_id) : null;

        const data = {
          item_id: item_id,
          quantity: item ? Number(item.quantity) + 1 : 1
        };

        fetch('/api/cart/items/add', {
            method: 'PUT',
            headers: {
              'Authorization': 'Bearer 1|LXN0BmcnOujarNMt8kI22oOfE9U1ng9YFbIKCgjg1f962e8e',
              'Content-Type': 'application/json'
            },
            body: JSON.stringify(data)

        }).then(async response => {
            const statusCode = response.status;
            const text = await response.text();
            const data = text ? JSON.parse(text) : {};
            return ({ statusCode, data });
        }).then(({statusCode, data}) => {
            if(statusCode === 201){
              this.getCart();
            } else {
                console.error(data);
            }
        }).catch(error => console.error('Error:', error));
      }

      static async substractFromCart(item_id){
        const cart = await this.getCart();

        const item = cart ? cart.items.find(item => item.product.id === item_id) : null;

        const data = {
          item_id: item_id,
          quantity: Number(item.quantity) - 1
        };

        fetch('/api/cart/items/add', {
            method: 'PUT',
            headers: {
              'Authorization': 'Bearer 1|LXN0BmcnOujarNMt8kI22oOfE9U1ng9YFbIKCgjg1f962e8e',
              'Content-Type': 'application/json'
            },
            body: JSON.stringify(data)

        }).then(async response => {
            const statusCode = response.status;
            const text = await response.text();
            const data = text ? JSON.parse(text) : {};
            return ({ statusCode, data });
        }).then(({statusCode, data}) => {
            if(statusCode === 201){
              this.getCart();
            } else {
                console.error(data);
            }
        }).catch(error => console.error('Error:', error));
      }
    }

    CartController.renderCartInfo();

  </script>
  <x-store-footer/>
</x-store-layout>