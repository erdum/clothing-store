const fixPrice = parseInt(document.getElementById("initial-price").innerHTML);
        
        let price = document.getElementById("initial-price").innerHTML;
        price = parseInt(price);
        console.log(price);
        let value = document.getElementById("item-value").innerHTML;
        value = parseInt(value);
        let totalPrice = document.getElementById("total-price");
        
        // Making a plus function;
        let plus = document.getElementById("plus");
        plus.addEventListener("click", ()=>{
            value++;
            document.getElementById("item-value").innerHTML = value;
            price = fixPrice * value;
            document.getElementById("initial-price").innerHTML = price;
            totalPrice.innerHTML = price;
        })
        
        // Making a minus function;
        let minus = document.getElementById("minus");
        minus.addEventListener("click", ()=>{
            value--;
            if (value == 0) {
                document.getElementById("elem_container").style.display = "none";
                price = price-fixPrice;
                totalPrice.innerHTML = price;
            }
            else{
                document.getElementById("item-value").innerHTML = value;
                price = price - fixPrice;
                document.getElementById("initial-price").innerHTML = price;
                totalPrice.innerHTML = price;
            }
        })
