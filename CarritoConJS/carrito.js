const AnadirProductosAlcarrito = document.querySelectorAll('.anadirCarrito');
AnadirProductosAlcarrito.forEach((AnadirAlcarrito) => {
  AnadirAlcarrito.addEventListener('click', anadirAlcarrito);
});

const comprarButton = document.querySelector('.comprarButton');
comprarButton.addEventListener('click', comprarCarrito);

const shoppingCartItemsContainer = document.querySelector(
  '.shoppingCartItemsContainer'
);

function anadirAlcarrito(event) {
  const button = event.target;
  const item = button.closest('.item');

  const nombre = item.querySelector('.item-title').textContent;
  const precio = item.querySelector('.item-price').textContent;
  const imagen = item.querySelector('.item-image').src;

  anadirDatosProductoAlCarrito(nombre, precio, imagen);
}

function anadirDatosProductoAlCarrito(nombre, precio, imagen) {
  const elementsTitle = shoppingCartItemsContainer.getElementsByClassName(
    'shoppingCartItemTitle'
  );
  for (let i = 0; i < elementsTitle.length; i++) {
    if (elementsTitle[i].innerText === nombre) {
      let elementQuantity = elementsTitle[
        i
      ].parentElement.parentElement.parentElement.querySelector(
        '.shoppingCartItemQuantity'
      );
      elementQuantity.value++;
      $('.toast').toast('show');
      actualizarPrecioTotalCarrito();
      return;
    }
  }

  const shoppingCartRow = document.createElement('div');
  const shoppingCartContent = `
  <div class="row shoppingCartItem">
        <div class="col-6">
            <div class="shopping-cart-item d-flex align-items-center h-100 border-bottom pb-2 pt-3">
                <img src=${imagen} class="shopping-cart-image">
                <h6 class="shopping-cart-item-title shoppingCartItemTitle text-truncate ml-3 mb-0">${nombre}</h6>
            </div>
        </div>
        <div class="col-2">
            <div class="shopping-cart-price d-flex align-items-center h-100 border-bottom pb-2 pt-3">
                <p class="item-price mb-0 shoppingCartItemPrice">${precio}</p>
            </div>
        </div>
        <div class="col-4">
            <div
                class="shopping-cart-quantity d-flex justify-content-between align-items-center h-100 border-bottom pb-2 pt-3">
                <input class="shopping-cart-quantity-input shoppingCartItemQuantity" type="number"
                    value="1">
                <button class="btn btn-danger buttonDelete" type="button">X</button>
            </div>
        </div>
    </div>`;
  shoppingCartRow.innerHTML = shoppingCartContent;
  shoppingCartItemsContainer.append(shoppingCartRow);

  shoppingCartRow
    .querySelector('.buttonDelete')
    .addEventListener('click', eliminarProductoDelCarrito);

  shoppingCartRow
    .querySelector('.shoppingCartItemQuantity')
    .addEventListener('change', cambiarCantidadProducto);

  actualizarPrecioTotalCarrito();
}

function actualizarPrecioTotalCarrito() {
  let total = 0;
  const shoppingCartTotal = document.querySelector('.shoppingCartTotal');

  const shoppingCartItems = document.querySelectorAll('.shoppingCartItem');

  shoppingCartItems.forEach((shoppingCartItem) => {
    const shoppingCartItemPriceElement = shoppingCartItem.querySelector(
      '.shoppingCartItemPrice'
    );
    const shoppingCartItemPrice = Number(
      shoppingCartItemPriceElement.textContent.replace('€', '')
    );
    const shoppingCartItemQuantityElement = shoppingCartItem.querySelector(
      '.shoppingCartItemQuantity'
    );
    const shoppingCartItemQuantity = Number(
      shoppingCartItemQuantityElement.value
    );
    total = total + shoppingCartItemPrice * shoppingCartItemQuantity;
  });
  shoppingCartTotal.innerHTML = `${total.toFixed(2)}€`;
}

function eliminarProductoDelCarrito(event) {
  const buttonClicked = event.target;
  buttonClicked.closest('.shoppingCartItem').remove();
  actualizarPrecioTotalCarrito();
}

function cambiarCantidadProducto(event) {
  const input = event.target;
  input.value <= 0 ? (input.value = 1) : null;
  actualizarPrecioTotalCarrito();
}

function comprarCarrito() {
  shoppingCartItemsContainer.innerHTML = '';
  actualizarPrecioTotalCarrito();
}
