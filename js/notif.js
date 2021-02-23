document.querySelector('.logout').addEventListener('click',(e)=>{
    e.preventDefault();

   if (confirm('Voulez-vous vraiment vous déconnecter ?')) {
    let logout={ out: 1,}
    let data= new FormData();
    data.append('logout',JSON.stringify(logout));
       fetch('treat/notif.php',{
           method:'POST',
           body: data,
       }).then(resp=>resp.text()).then((resp)=>{
           window.location.href= window.location.href.replace(/id=[a-zA-Z0-9]/,resp);
        window.location.href= window.location.href.replace(/admin.php|dev.php|postEdit.php|post.php/,resp);
       })
   }



})