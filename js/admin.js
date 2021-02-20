let checkbox = document.querySelector("#checkbox");
checkbox.addEventListener("change", () => {
  document.querySelector(".innerPage").classList.toggle("dark");
  if (checkbox.checked) document.body.style.overflow = "hidden";
  else document.body.style.overflowY = "initial";
});

let formdev = document.querySelector(".formDev");
let formdev_btn1 = document.querySelector(".formDev #formdev-btn");
let formdev_btn2 = document.querySelector(".formdev-btn #formdev-btn");

formdev_btn2.addEventListener("click", (e) => {
  e.preventDefault();
  formdev_btn2.classList.add("invisible");
  formdev.classList.remove("invisible");
});
formdev_btn1.addEventListener("click", (e) => {
  e.preventDefault();

  formdev_btn2.classList.remove("invisible");
  formdev.classList.add("invisible");
});

// window.setInterval(function () {
//   fetch("admin.php");
// }, 10000);

let keyUp = (input) => {
  input.addEventListener("keyup", () => {
    input.nextElementSibling.innerText = "";
    input.classList.remove("error");
  });
};

function verifForm() {
    let isOk=true;
  let data = formdev.querySelectorAll("input");
  data.forEach((input) => {
    if (!input.value) {
      isOk = false;
      input.nextElementSibling.innerText = "Vous devez remplir ce champ";
      input.nextElementSibling.style.color = "#dc3545";
      input.classList.add("error");
      keyUp(input);
    } else if (
      input.name == "username" &&
      !/^[a-zA-Z0-9]{5,}$/.test(input.value)
    ) {
      isOk = false;
      input.classList.add("error");
      input.nextElementSibling.innerText =
        "Veuillez entrer un nom d'utilisateur valide d'au moins 5 caractères";
      keyUp(input);
    } else if (
      input.type == "password" &&
      !/^[a-zA-Z0-9]{8,50}$/.test(input.value)
    ) {
      isOk = false;
      input.classList.add("error");
      input.nextElementSibling.innerText =
        "Veuillez entrer un mot de passe valide d'au moins 8 caractères";
      keyUp(input);
    }
  });
  return isOk;
}

formdev.addEventListener("submit", (e) => {
  e.preventDefault();
  if (verifForm()) {
    let myForm = new FormData(e.target);
    let username = formdev.username.value;
    let mdp = formdev.mdp.value;
    let xhr = new XMLHttpRequest();
    xhr.open("POST", "treat/treatConnect.php", true);

    xhr.onreadystatechange = () => {
      if (xhr.status == 200 && xhr.readyState == 4) {
        if (xhr.responseText == "already saved") {
          swal({
            title: "Cet email exist déja!",
            text:
              "Veuillez enter un email différent afin de procéder à l'inscription!",
            icon: "error",
            button: "OK",
          });
        } else if (xhr.responseText == "unavalaible data") {
          swal({
            title: "Identifiants invalides!",
            text: "Veuillez entrer des identifiants valides!",
            icon: "error",
            button: "OK",
          });
        } else if (xhr.responseText == "dev saved") {
          swal({
            title: "Dévéloppeur enregistré!",
            text: `Veuillez communiquer à celui-ci ses identifiants
                            Nom d'utilisateur: ${username} et Mot de passe: ${mdp} .`,
            icon: "success",
            button: "OK",
          });
        } else
          swal({
            title: "Une erreur est malheureusement survenue!",
            text: "Veuillez entrez à nouveau vos identifiants!",
            icon: "error",
            button: "OK",
          });
      } else if (xhr.readyState == 4) {
        swal({
          title: "Une erreur est malheureusement survenue!",
          text: "Veuillez entrez à nouveau vos identifiants!",
          icon: "error",
          button: "OK",
        });
      }
    };
    xhr.send(myForm);
  } else {
    swal({
      title: "Identifiants invalides!",
      text: "Veuillez entrer des identifiants valides!",
      icon: "error",
      button: "OK",
    });
  }
});
