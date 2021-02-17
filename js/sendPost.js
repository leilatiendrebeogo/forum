let form = document.querySelector("form");

form.file_type.nextElementSibling.name = form.file_type.value;

form.file_type.addEventListener("change", (e) => {
  form.file_type.nextElementSibling.name = form.file_type.value;
});

let data = form.querySelectorAll("input,select,textarea");
let postCard = document.querySelector(".postCard");

let verifFormValidity =()=> {
  let statusForm = true;
  let data = form.querySelectorAll("#title,textarea,select");

  //Verification de la validité des champs
  data.forEach((form_element) => {
    if (!form_element.value) {
      statusForm = false;
      if (form_element.name == "title") {
        swal({
          title: "Titre obligatoire!",
          text: "Vous devez entrer un titre!",
          icon: "error",
          button: "OK",
        });
      } else if (form_element.name == "category") {
        swal({
          title: "Catégorie obligatoire!",
          text: "Vous devez entrer un titre!",
          icon: "error",
          button: "OK",
        });
      } else if (form_element.name == "content") {
        swal({
          title: "Contenu obligatoire!",
          text: "Vous devez entrer un un contenu est necessaire!",
          icon: "error",
          button: "OK",
        });
      }
    } else {
      if (
        form_element.name == "title" &&
        !/[a-zA-Z0-9\-._éè]+/.test(form_element.value)
      ) {
        statusForm == false;
        swal({
          title: "Titre invalide!",
          text:
            "Vous devez entrer un titre dont composé de caractères alphanumériques!",
          icon: "error",
          button: "OK",
        });
      }
    }
  });

  return statusForm;
};












form.addEventListener("submit", (e) => {
  e.preventDefault();
    let isok=verifFormValidity()
  if (isok) {
    postCard.querySelector(".post-text").innerText = form.content.value;
    form.classList.add("invisible");
    postCard.classList.remove("invisible");
    if(!form.file.value){
        postCard.querySelector(".post-image").classList.add('invisible')
    } else if (form.file_type.value == "image" && form.file.value) {
      postCard.querySelector(
        ".post-image"
      ).style.backgroundImage = form.querySelector("#file_type").value;
    } else {
      postCard.querySelector(".post-image").style.cssText = `
        background-color:inherit;
        width=auto!important;
        height:auto!important;`;
      postCard.querySelector(".post-image").innerHTML = `
            Ci joint la pièce :${form.file.value}
        `;
    }
  } else {
  }
});

postCard.querySelector('#return').addEventListener('click',(e)=>{
    form.classList.remove("invisible");
    postCard.classList.add("invisible");
})
postCard.querySelector('#validation').addEventListener('click',(e)=>{
    fetch('treat/PostHandler.php',{
        method:'POST',
        body:new FormData(form),
    }).then(resp => resp.text()).then((resp)=>{
        if (/[.php]$/.test(resp)){
            swal({
                title: "Post Publié!",
                text:
                  "Cliquez sur OK pour quitter!",
                icon: "succes",
                button: "OK",
            });
        } else 
            swal({
                title: "Une erreur est survenue!",
                text:
                "Veuillez réessayer s'il vous plait",
                icon: "error",
                button: "OK",
            });
    })
})
