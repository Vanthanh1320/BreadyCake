const minusBtn=document.querySelector('.minus');
const plusBtn=document.querySelector('.plus');
const inputValue=document.querySelector('.product-value');
const addBtn=document.querySelector('.product-btn');


let value=parseInt(inputValue.getAttribute('value'));

// addBtn.addEventListener('click',(e)=>{
//     e.preventDefault();
//     }
// )

minusBtn.addEventListener('click',(e) => {
    e.preventDefault();

    if(value > 0){
        value--;
    }
    inputValue.setAttribute('value',value);
})

plusBtn.addEventListener('click',(e) => {
    e.preventDefault();

    value++;
    inputValue.setAttribute('value',value);
})

