const loader = document.querySelector('.loading');
const main = document.querySelector('.img_container');
function time(){
    setTimeout(() => {
        loader.style.opacity = 0;
        loader.style.display = 'none';  
        
        img_container.style.display = 'block';
        img_container.style.opacity = 1;
    }, 4000);
}

time();