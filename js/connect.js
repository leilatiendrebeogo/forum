let form=document.querySelector('form')
let data=form.querySelectorAll('input')

function verifForm(form) {
    let isOk=false;
    data.forEach((input)=>{
            if(!input.value){
                input.nextElementSibling.innerText='Vous devez remplir ce champ';
            } else if(input.name == "username" && !(/^[a-zA-Z0-9]{5,}$/.test(input.value))){
                input.nextElementSibling.innerText='Veuillez entrer un nom d\'utilisateur valide d\'au moins 5 caractères';
            } else if(input.type=='password' && !(/^[a-zA-Z0-9]{8,50}$/.test(input.value))){
                input.nextElementSibling.innerText='Veuillez entrer un mot de passe valide d\'au moins 8 caractères';
            } else isOk=true;
    })
    return isOk;
}




form.addEventListener('submit',(e)=>{
    e.preventDefault();
    let isOk=verifForm(e.target);
    if (isOk) {
        let myForm= new FormData(e.target);
        let xhr= new XMLHttpRequest();
        xhr.open('POST','pages/treat/treatConnect.php',true)
        xhr.onreadystatechange=()=>{
            if (xhr.status==200 && xhr.readyState==4) {
                +
            } else if(xhr.status==200){
                swal({
                    title: "Une erreur est malheureusement survenue!",
                    text: "Veuillez entrez à nouveau vos identifiants!",
                    icon: "error",
                    button: "OK",
                }).then();
            } else{

            }
        }
    } else {
        swal({
            title: "Identifiants incorrects!",
            text: "Veuillez entrez à nouveau vos identifiants!",
            icon: "error",
            button: "OK",
        }).then();
    }
})