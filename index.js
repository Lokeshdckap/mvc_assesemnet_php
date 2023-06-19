const names = document.querySelector(".product_name")
const image = document.querySelector(".product_image")
const price = document.querySelector(".price")
const sku = document.querySelector(".sku")
const brand = document.querySelector(".brand")
const manufacture_date = document.querySelector(".manufacture_date")
const stock = document.querySelector(".stock")



const btn = document.querySelector('.btn')
const form = document.querySelector('#form');
const p = document.querySelectorAll('p');
btn.addEventListener("click",(e)=>{
    // e.preventDefault();
  checkRequired([names,image,price,sku,brand,manufacture_date,stock]);
})

function checkRequired(input) {
    input.forEach(element => {
        if (element.value === "") {
            for(let i=0;i<p.length;i++){
                    p[i].innerText = 'Field is required';
                    }
            }
        else{
            p[i].innerText = ""
        }
            

    });
}

