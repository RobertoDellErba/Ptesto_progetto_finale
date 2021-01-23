let navbar = document.querySelector('#navbar')

if(window.innerWidth < 992){

    navbar.classList.add('bg_gradient' , 'shadow')
} else{

document.addEventListener('scroll', ()=> {
    
    if (window.pageYOffset > 20) {
        navbar.classList.add('bg_gradient' , 'shadow')
    } else {
        navbar.classList.remove('bg_gradient' , 'shadow')
    }
    
})
}





//progressbar script


                
                
    // let scores = {
    //     "Adult":{{$image->adult}},
    //     "Spoof":{{$image->spoof}},
    //     "Medical":{{$image->medical}},
    //     'Violence':{{$image->violence}},
    //     'Racy':{{$image->racy}},
    // }
    // let scoresArray = Object.entries(scores).sort( (a,b) => b[1]-a[1] )
    // let scoresWrapper = document.querySelector('#scoresWrapper')
    
    // scoresArray.forEach(el => {
    //     let color;
    //     if (el[1] < 34) {
    //         color = "success"
    //     } else if (el[1] < 66) {
    //         color = "warning"
    //     } else {
    //         color = "danger"
    //     } 
    //     let div = document.createElement('div')
    //     div.classList.add('col-12', 'my-3')
    //     div.innerHTML = 
    //     `
    //     <p class="text-main lead font-weight-bold mb-0">${el[0].toUpperCase()}: ${el[1]}</p>
    //     <div class="progress shadow">
    //         <div class="progress-bar bg-${color}" role="progressbar" style="width:${el[1]}%"></div>
    //     </div>
    //     `
        
        
        
        
    //     scoresWrapper.appendChild(div)
    // })    
    
 



  





