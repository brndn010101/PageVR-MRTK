const addToCartButtons = document.querySelectorAll(".addToCart");
const cartItems = document.getElementById("cartItems");
const cartTotal = document.getElementById("cartTotal");
let cart = [];

addToCartButtons.forEach(button => {
  button.addEventListener('click', () => {
    const id = button.dataset.id;
    const name = button.dataset.name;
    const price = button.dataset.price;
    addItemToCart(id, name, price);
    displayCartItems();
    calculateCartTotal();
  });
});

function addItemToCart(id, name, price) {
  cart.push({
    id: id,
    name: name,
    price: price
  });
}

function displayCartItems() {
  cartItems.innerHTML = "";
  cart.forEach(item => {
    const li = document.createElement("li");
    li.textContent = `${item.name} - $${item.price}`;
    cartItems.appendChild(li);
  });
}

function calculateCartTotal(){
    const total=cart.reduce((acc, item) => acc + parseFloat(item.price), 0);
    cartTotal.textContent = total.toFixed(2);
}
