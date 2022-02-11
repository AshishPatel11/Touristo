const loader = document.querySelector('.loading');
const main = document.querySelector('.main');
function time(){
    setTimeout(() => {
        loader.style.opacity = 0;
        loader.style.display = 'none';  
        
        main.style.display = 'block';
        main.style.opacity = 1;
    }, 4000);
}

time();