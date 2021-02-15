let checkbox= document.querySelector('#checkbox');
checkbox.addEventListener('change',()=>{
    document.querySelector('.innerPage').classList.toggle('dark');
    if(checkbox.checked)
        document.body.style.overflow='hidden'
    else document.body.style.overflowY='initial'
})




window.setInterval(function(){
    fetch('admin.php')
},10000)