import deliAPI from "./data/delicieux.API.js";

const intro=document.querySelector('.introduce__box')

const delicieux=() =>{
    const newDeli= deliAPI.map((item,index)=>{
       const {id,title,image,year,description}=item

       return `
               <div class="col l-4 m-4 c-12 ">
                <div class="introduce__item">
                    <img src="${image}" alt="" class="introduce__main-image">
                    <h4 class="introduce__title">${title}
                        <span>${year}</span>
                    </h4>

                    <p class="introduce__main-text">${description}</p>
                </div>
               
            </div>

        `;
    })

    intro.innerHTML=newDeli.join('')
}

export default delicieux