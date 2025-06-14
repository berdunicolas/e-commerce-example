<x-store-layout>
  <x-store-navbar/>

  <main class="container-lg p-0 pb-5 bg-light ">

        <div class="mt-5">
          <h2 class="display-5">Nuestros Productos</h2>
          <div class="mt-4 row" id="products"></div>
  </main>
  <script>
    fetch('/api/catalog', {
        method: 'GET',
        headers: {
          'Authorization': 'Bearer 1|LXN0BmcnOujarNMt8kI22oOfE9U1ng9YFbIKCgjg1f962e8e',
          'Accept': 'application/json',
        },
    })
    .then(response => response.json())
    .then(data => {
      const products = data;
      const productsContainer = document.querySelector('#products');
      products.forEach(product => {
        const productCard = document.createElement('div');
        productCard.classList.add('col-3', 'p-2');
        productCard.innerHTML = `
          <div class="card">
            <img src="${product.image_url}" class="card-img-top" style="width: 100%; height: 300px !important; object-fit: cover;" alt="...">
            <div class="card-body">
              <h5 class="card-title">${product.name}</h5>
              <p class="card-text">${product.description}</p>
              <p class="card-text">Precio: $${product.price}</p>
              <button class="btn btn-dark" onclick="addToCart(${product.id}, 1)" >Añadir al carrito</button>
            </div>
          </div>
        `;
        productsContainer.appendChild(productCard);
      });
    });

    getCart();

    async function getCart(){
      try {
          let response = await fetch('/api/cart', {
            method: 'GET',
            headers: {
              'Authorization': 'Bearer 1|LXN0BmcnOujarNMt8kI22oOfE9U1ng9YFbIKCgjg1f962e8e',
              'Accept': 'application/json',
            },
          });

          let data = await response.json();
            
          if(data.items && data.items.length > 0){
            let cartIcon = document.getElementById('cart-icon');
            
            cartIcon.innerHTML = data.items.length;
            cartIcon.classList.remove('visually-hidden');
          }

          return data;
        } catch (error) {
          console.error('Error: ', error);
          return null;
        }
    }


    async function addToCart(item_id){
      const cart = await getCart();

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
            getCart();
          } else {
              console.error(data);
          }
      }).catch(error => console.error('Error:', error));
    }


  </script>
  <x-store-footer/>
</x-store-layout>

