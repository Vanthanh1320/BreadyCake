const articleStated=document.querySelectorAll('.stated-article');
const statedItem=document.querySelectorAll('.stated__item');


const stated=()=>{
    var current=0;
    showStated(current)

    let timer=setInterval(autoShow,7000);

    function autoShow(){
        current +=1;
        showStated(current);
    }

    for(let i=0;i< statedItem.length;i++){
        statedItem[i].onclick=(e)=>{
            const index= parseInt(e.target.dataset.index);
            current=index;
            console.log(current);
            showStated(current);
            resetTimer();
        }
    }

    function resetTimer(){
        clearTimeout(timer);
        timer=setInterval(autoShow,7000);
    }

    function showStated(n){
        let statedLength=articleStated.length;
        let statedItemLength=statedItem.length;

        for(let i=0; i< statedLength; i++){
            articleStated[i].classList.remove('activeSlide');
        }

        for (let i=0; i< statedItemLength; i++){ 
            statedItem[i].classList.remove('active');
        }

        if(n >=statedLength){
            current=0;
        }

        if(n < 0){
            current=statedLength;
        }

        articleStated[current].classList.add('activeSlide');
        statedItem[current].classList.add('active');
    }
}


export default stated