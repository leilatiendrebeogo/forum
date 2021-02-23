let form = document.querySelector("form");
document.querySelector('.user-icons').innerHTML='';
let data = form.querySelectorAll("input");
let isOk = true;

let keyUp = (input) => {
  input.addEventListener("keyup", () => {
    input.nextElementSibling.innerText = "";
    input.classList.remove("error");
  });
};

function verifForm(form) {
  if (data.length == 2) {
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
  } else if (data.length == 4) {
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
        input.name == "mdp" &&
        !/^[a-zA-Z0-9]{8,50}$/.test(input.value)
      ) {
        isOk = false;
        input.classList.add("error");
        input.nextElementSibling.innerText =
          "Veuillez entrer un mot de passe valide d'au moins 8 caractères";
        keyUp(input);
      }
    });
  }
  return isOk;
}
if (data.length == 4) {
  form.mdp.addEventListener("keyup", (e) => {
    if (form.mdp.value && form.mdp_confirm.value != form.mdp.value) {
      form.mdp_confirm.nextElementSibling.innerText =
        "Les mots de passe ne correspondent pas";
      form.mdp_confirm.nextElementSibling.style.color = "#dc3545";
      isOk = false;
    } else {
      form.mdp_confirm.nextElementSibling.innerText =
        "Les mots de passe correspondent";
      form.mdp_confirm.nextElementSibling.style.color = "#28a745";
      isOk = true;
    }
  });

  form.mdp_confirm.addEventListener("keyup", (e) => {
    if (form.mdp_confirm.value && form.mdp_confirm.value != form.mdp.value) {
      form.mdp_confirm.nextElementSibling.innerText =
        "Les mots de passe ne correspondent pas";
      form.mdp_confirm.nextElementSibling.style.color = "#dc3545";
      isOk = false;
    } else {
      form.mdp_confirm.nextElementSibling.innerText =
        "Les mots de passe correspondent";
      form.mdp_confirm.nextElementSibling.style.color = "#28a745";
      isOk = true;
    }
  });
}

form.addEventListener("submit", (e) => {
  e.preventDefault();
  isOk = verifForm(e.target);
  if (isOk) {
    let myForm = new FormData(e.target);
    let xhr = new XMLHttpRequest();
    xhr.open("POST", "treat/treatConnect.php", true);

    xhr.onreadystatechange = () => {
      if (xhr.status == 200 && xhr.readyState == 4) {
        if (xhr.responseText == "wrong data") {
          swal({
            title: "Identifiants incorrects!",
            text:
              "Les identifiants entrés sont incorrects. Veuillez entrez à nouveau vos identifiants!",
            icon: "error",
            button: "OK",
          });
        } else if (/[.php]$/.test(xhr.responseText)) {
          if (/connect\.php/.test(window.location.href))
            swal({
              title: "Connexion Réussie!",
              text: "Cliquez sur OK pour être redirigé(e)",
              icon: "success",
              button: "OK",
            }).then(() => {
              window.location.href = window.location.href.replace(
                /connect\.php/,
                xhr.responseText
              );
            });
          else
            swal({
              title: "Identifiants enregistrés!",
              text:
                "Vos identifiants ont étés enregistrés! Cliquez sur OK pour être redirigés",
              icon: "success",
              button: "OK",
            }).then(() => {
              window.location.href = window.location.href.replace(
                /inscript\.php/,
                xhr.responseText
              );
            });
        } else if (xhr.responseText) {
          swal({
            title: "Identifiants invalides!",
            text: "Veuillez entrer des identifiants valides!",
            icon: "error",
            button: "OK",
          });
        }
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
