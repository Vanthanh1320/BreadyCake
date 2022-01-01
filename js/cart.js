const decBtn=document.querySelectorAll('.quality-decrease');
const deleteBtn=document.querySelectorAll('.remove');
const value=document.querySelectorAll('.quality-cart');

value.forEach((valueItem,valueIndex)=>{
    let quality=parseInt(valueItem.getAttribute('value'));

    decBtn.forEach((decItem,decIndex)=>{
        if((valueIndex===decIndex) && (quality <=1) ){
            decItem.classList.add('quality-btnHide');
        }
    })
})


deleteBtn.forEach((deleteItem)=>{
    deleteItem.addEventListener('click',(e)=>{
        e.preventDefault();
    })
})

