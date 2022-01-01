import historyAPI from "./data/historyAPI.js";

const historyItem=document.querySelector('.history__box');
const history=() =>{
    const newHistory= historyAPI.map((item,index)=>{
       const {id,title,image,author,datetime,desc}=item

       return `
            <div class="col l-4 m-12 c-12">
                <div class="history__item">
                    <div class="history__thumbnail">
                        <a href="" class="history__link">
                            <img src="${image}" alt="" class="history__image">
                        </a>
                    </div>

                    <div class="history__content">
                        <div class="history__post">
                            <a href="" class="history__link">${datetime}</a>
                        </div>
                        <h3 class="history__title">
                            <a href="" class="history__link">${title}</a>
                        </h3>
                        <p class="history__author">
                            By <span class="history_author-name"> ${author}</span> 
                        </p>
                        <p class="history__text">
                            ${desc.slice(0,142)}...
                        </p>

                        <a href="" class="history__more">Read More</a>
                    </div>
                </div>
                
            </div>
        `;
    })

    historyItem.innerHTML=newHistory.join('')
}


export default history;

