const first = document.getElementById("first-img");
const second = document.getElementById("second-img"); 
const third = document.getElementById("third-img"); 
const fourth = document.getElementById("fourth-img"); 


first.addEventListener("click", ()=>{
    let value = first.src;
    document.getElementById("main-img").src = value;
})
second.addEventListener("click", ()=>{
    let value = second.src;
    document.getElementById("main-img").src = value;
})
third.addEventListener("click", ()=>{
    let value = third.src;
    document.getElementById("main-img").src = value;
})
fourth.addEventListener("click", ()=>{
    let value = fourth.src;
    document.getElementById("main-img").src = value;
})


<<<<<<< HEAD
// Wishlist Color Change:
const redColor = document.getElementById("wishlist");
redColor.addEventListener("click", ()=>{
    let wish = document.getElementById("wish").style.color;
    if (wish == "rgb(200, 114, 126)"){
        document.getElementById("wish").style.color = "white";
    }
    else{
        document.getElementById("wish").style.color = "rgb(200, 114, 126)";
    }
})
=======
// // Wishlist Color Change:
// const redColor = document.getElementById("wishlist");
// redColor.addEventListener("click", ()=>{
//     let wish = document.getElementById("wish").style.color;
//     if (wish == "red"){
//         document.getElementById("wish").style.color = "white";
//     }
//     else{
//         document.getElementById("wish").style.color = "red";
//     }
// })
>>>>>>> c5625a5ef8a83e1148affaacb6715febbb76450b


// Cart button Change:

const cartBtn = document.getElementById("cart-btn");
cartBtn.addEventListener("click", ()=>{
    let cart = document.getElementById("cartText").innerText;
    if (cart == "Added to Cart"){
        document.getElementById("cartText").innerText = "Add to Cart";
    }
    else{
        document.getElementById("cartText").innerText = "Added to Cart";
    }
})


// Size Chart Class Change:

const div1 = document.getElementById("div1");
div1.addEventListener("click", ()=>{
    document.getElementById("div1").classList.add("active");
    document.getElementById("div2").classList.remove("active");
    document.getElementById("div3").classList.remove("active");
    document.getElementById("div4").classList.remove("active");
    document.getElementById("div5").classList.remove("active");

})
const div2 = document.getElementById("div2");
div2.addEventListener("click", ()=>{
    document.getElementById("div1").classList.remove("active");
    document.getElementById("div2").classList.add("active");
    document.getElementById("div3").classList.remove("active");
    document.getElementById("div4").classList.remove("active");
    document.getElementById("div5").classList.remove("active");

})
const div3 = document.getElementById("div3");
div3.addEventListener("click", ()=>{
    document.getElementById("div1").classList.remove("active");
    document.getElementById("div2").classList.remove("active");
    document.getElementById("div3").classList.add("active");
    document.getElementById("div4").classList.remove("active");
    document.getElementById("div5").classList.remove("active");
})
const div4 = document.getElementById("div4");
div4.addEventListener("click", ()=>{
    document.getElementById("div1").classList.remove("active");
    document.getElementById("div2").classList.remove("active");
    document.getElementById("div3").classList.remove("active");
    document.getElementById("div4").classList.add("active");
    document.getElementById("div5").classList.remove("active");
})
const div5 = document.getElementById("div5");
div5.addEventListener("click", ()=>{
    document.getElementById("div5").classList.add("active");
    document.getElementById("div1").classList.remove("active");
    document.getElementById("div2").classList.remove("active");
    document.getElementById("div3").classList.remove("active");
    document.getElementById("div4").classList.remove("active");
})
