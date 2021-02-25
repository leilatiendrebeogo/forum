document.querySelector('.logout').addEventListener('click',(e)=>{
    e.preventDefault();


    swal({
        title: "Confirmation de déconnexion",
        text:
          "Voulez-vous vraiment vous déconnecter ?",
        icon: "info",
        buttons :true,
        dangerMode:true,
      }).then((logout)=> {
          if (!logout) {
              
          } else {
              swal({
                title: "Déconnexion validé(e)!",
                text:
                  "Vous allez être déconnecté(e) !",
                icon: "success",
                button :'Ok'
              }).then(()=>{
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
    
              })
          }
      })

})