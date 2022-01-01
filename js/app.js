import history from "./displayHistory.js";
import delicieux from "./displayDeli.js";
import state from "./slideStated.js"

const sliders=document.querySelectorAll('.slider__image');
const prevBtn=document.querySelector('.slider__prev');
const nextBtn=document.querySelector('.slider__next');
const backTop=document.querySelector('.backtop');
const navigation=document.querySelector('.navigation');
const navHomeMobile=document.querySelector('.navigation-home-mobile');
const navMobile=document.querySelector('.navigation-mobile');

const actionLink=document.querySelectorAll('.product-action-link');
const modalProduct=document.querySelector('.modal-product');
const closeBtn=document.querySelector('.modal-close');
const imgModal=document.querySelectorAll('.modal-product-img');

const searchBtn=document.querySelector('.header__search');


var current=1;


window.onscroll=function(){
    scrollTop();
};

function scrollTop(){
    if(document.documentElement.scrollTop > 300){
        backTop.classList.add('show');
        navigation.classList.add('navigation__scroll');

        if(navHomeMobile != undefined){
            navHomeMobile.classList.add('navigation__scroll');
        }else{
            navMobile.classList.add('navigation__scroll');
        }

    }

    if(document.documentElement.scrollTop < 100){
        backTop.classList.remove('show');
        navigation.classList.remove('navigation__scroll');

        if(navHomeMobile != undefined){
            navHomeMobile.classList.remove('navigation__scroll');
        }else{
            navMobile.classList.remove('navigation__scroll');
        }

    }
   
}
backTop.addEventListener('click',()=>{
    $('html, body').animate({scrollTop:0}, 1000);
});


const app=()=>{

    // Searach
    searchBtn.addEventListener('click', (e) =>{
        e.preventDefault();

        const searchBox = document.querySelector('.search__box');
        const searchClose=document.querySelector('.search__remove');

        searchBox.classList.add('search-active');
        searchClose.addEventListener('click', (e) =>{
            searchBox.classList.remove('search-active');
        })
    })

    actionLink.forEach((actionItem, index) => {
        console.log(actionItem)
        actionItem.onclick = (e) => {

            imgModal.forEach((imgItem, imgIndex) => {
                console.log(imgIndex)
                console.log(index)
                e.preventDefault();
                modalProduct.classList.add('show');

                imgItem.style.display='none';
                if (index === imgIndex) {
                    imgItem.style.display='block';

                }

                closeBtn.onclick = (e) => {
                    modalProduct.classList.remove('show');
                }

            })
        }
    })

    function loadUI(){
        history();
        delicieux();
    }
    
    function autoslider() {
        current += 1;
        slider(current);
    }

    function resetTimer(){
        clearInterval(timer);
        timer=setInterval(autoslider,3000);
    }

    function slider(n){
        var sliderLength=sliders.length;

        for(let i=0;i<sliderLength;i++){
            sliders[i].classList.remove('slider-active');
        }

        if(n > sliderLength){
            current=1;
        }

        if(n < 1){
            current=sliderLength;
        }

        sliders[current-1].classList.add('slider-active');
    }

    prevBtn.addEventListener('click',()=>{
        current -=1;
        slider(current);
        resetTimer()
    })

    nextBtn.addEventListener('click',()=>{
        current +=1;
        slider(current);
        resetTimer()

    })

    slider(current);
    var timer=setInterval(autoslider,3000);
    window.addEventListener("load",loadUI);
    state();

}


app();











