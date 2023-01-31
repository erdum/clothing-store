let cartState = false;

const cart = document.getElementById("cart");

// Cart Show
const cartShow = document.getElementById("popup");

cart.addEventListener("click", (event) => {
    cartShow.style.display = "inline-block";
    cartState = true;
    event.stopPropagation();
});

window.addEventListener("click", () => {

    if (cartState) {
        cartShow.style.display = "none";
        cartState = false;
    }
});