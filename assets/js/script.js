let container = document.getElementById("pointsContainer");
let count = container.querySelectorAll(".point-entry").length;
zonePositifs = document.getElementById("zonePositifs");
zoneSymptomatiques = document.getElementById("zoneSymptomatiques");
zoneHabitants = document.getElementById("zoneHabitants");
document.addEventListener("DOMContentLoaded", function () {
  $("#zoneSymptomatiques").val(0);
  $("#zonePositifs").val(0);
  loadZones();
  loadUsers();
  loadPays();
  loadPoints();
  document.getElementById("zoneForm").addEventListener("submit", function (e) {
    e.preventDefault();
    let id = document.getElementById("zoneId").value;
    let action = id ? "update" : "add";

    // Récupération des points de surveillance
    let pointInputs = document.querySelectorAll("input[name='point_nom[]']");
    let points = [];
    
    pointInputs.forEach((input) => {
        let pointNom = input.value.trim();
        if (pointNom) {
            points.push(pointNom);
        }
    });

    if (points.length === 0) {
        alert("Veuillez ajouter au moins un point de surveillance !");
        return;
    }

    let formData = new URLSearchParams();
    formData.append("action", action);
    formData.append("id", id);
    formData.append("nom", document.getElementById("zoneNom").value);
    formData.append("statut", document.getElementById("zoneStatut").value);
    formData.append("nb_habitants", document.getElementById("zoneHabitants").value);
    formData.append("nb_symptomatiques", document.getElementById("zoneSymptomatiques").value);
    formData.append("nb_positifs", document.getElementById("zonePositifs").value);
    formData.append("pays_id", document.getElementById("pays_id").value);

    points.forEach((point, index) => {
        formData.append(`point_nom[${index}]`, point);
    });

    fetch("http://localhost/epidemia_bis/src/controller/ZoneController.php", {
        method: "POST",
        body: formData,
    })
        .then((response) => response.text()).
        then(text => {console.log(text); return JSON.parse(text);}
        )
        .then(() => {
                loadZones();
                document.getElementById("zoneForm").reset();
                $('#btn-modal-add-zone').click();
        })
});

 
  document.getElementById("userForm").addEventListener("submit", function (e) {
    e.preventDefault();
    let id = document.getElementById("userId").value;
    let action = id ? "update" : "add";

    fetch("http://localhost/epidemia_bis/src/controller/UserController.php", {
      method: "POST",
      body: new URLSearchParams({
        action,
        id,
        nom_prenom: document.getElementById("userNomPrenom").value,
        login: document.getElementById("userLogin").value,
        mdp: document.getElementById("userMdp").value,
        role: document.getElementById("userRole").value,
      }),
    })
      .then((response) => response.json())
      .then(() => {
        loadUsers();
        document.getElementById("userForm").reset();
      });
  });

  document.getElementById("paysForm").addEventListener("submit", function (e) {
    e.preventDefault();
    let id = document.getElementById("paysId").value;
    let action = id ? "update" : "add";

    fetch("http://localhost/epidemia_bis/src/controller/PaysController.php", {
      method: "POST",
      body: new URLSearchParams({
        action,
        id,
        nom: document.getElementById("paysNom").value,
      }),
    })
      .then((response) => response.json())
      .then(() => {
        loadPays();
        document.getElementById("paysForm").reset();
        $("#btn_pays").text("Enregistrer");
        $("#btn-modal-add").click();
        $("#titre_pays").text("Ajouter Pays");
      });
  });

  document.getElementById("pointForm").addEventListener("submit", function (e) {
    e.preventDefault();
    let id = document.getElementById("pointId").value;
    let action = id ? "update" : "add";

    fetch("http://localhost/epidemia_bis/src/controller/PointController.php", {
      method: "POST",
      body: new URLSearchParams({
        action,
        id,
        nom: document.getElementById("pointNom").value,
        zone_id: document.getElementById("zone_id").value,
      }),
    })
      .then((response) => response.text())
      .then(text=>{console.log(text);
      })
      .then(() => {
        loadZones();
        document.getElementById("pointForm").reset();
        $("#btn_point").text("Enregistrer");
        $("#titre_point").text("Ajouter Pays");
        $("#btn-modal-add-point").click();
      });
  });
});

function loadPays() {
  fetch("http://localhost/epidemia_bis/src/controller/PaysController.php")
    .then((response) => response.json())
    .then((paysList) => {
      let tbody = document.querySelector("#paysTable tbody");
      let select = document.querySelector("#pays_id");
      tbody.innerHTML = "";

      paysList.forEach((pays) => {
        let row = `<tr>
                    <td>${pays.id}</td>
                    <td>${pays.nom}</td>
                    <td>
                        <button class="btn btn-sm btn-success" onclick="chargerModalPays(${pays.id},'${pays.nom}')" data-bs-toggle="modal" data-bs-target="#addPays">
                            <i class="fas fa-edit"></i>
                        </button>
                        <button onclick="deletePays(${pays.id},'${pays.nom}')" class="btn btn-sm btn-danger">
                            <i class="fas fa-trash"></i>
                        </button>
                    </td>
                </tr>`;
        let option = `
        <option value="${pays.id}">${pays.nom}</option>`;
        tbody.innerHTML += row;
        select.innerHTML += option;
      });
    });
}

function deletePays(id, nom) {
  let confi = confirm(`Voulez vous vraiment supprimer ${nom}?`);
  if (confi) {
    fetch("http://localhost/epidemia_bis/src/controller/PaysController.php", {
      method: "POST",
      body: new URLSearchParams({ action: "delete", id }),
    }).then(() => loadPays());
  } else {
    alert("Vous devez confirmer avant la suppression!");
  }
}

function loadPoints() {
  fetch("http://localhost/epidemia_bis/src/controller/PointController.php")
    .then((response) => response.json())
    .then((points) => {
      let select = document.querySelector("#zone_id");
      let tbody = document.querySelector("#pointsTable tbody");
      
      tbody.innerHTML = "";
      select.innerHTML = "";
      points.forEach((point) => {
        let row = `<tr>
                    <td>${point.id}</td>
                    <td>${point.nom}</td>
                    <td>${point.zone_nom}</td>
                    <td>${point.pays}</td>
                    <td>
                    
                                    <button class="btn btn-sm btn-success" onclick="chargerMoadlPoint(${point.id},'${point.nom}','${point.zone_nom}',${point.zone_id})">
                                        <i class="fas fa-edit"></i>
                                    </button>
                                    <button onclick="deletePoint(${point.id})" class="btn btn-sm btn-danger">
                                        <i class="fas fa-trash"></i>
                                    </button>
                    </td>
                </tr>`;
                if(point.nb_zone_points<4){
                let option = `
                <option value="${point.zone_id}">${point.zone_nom}</option>`;
                select.innerHTML += option;}
                tbody.innerHTML += row;
      });
    });
}

function deletePoint(id) {
  let confi = confirm(`Voulez vous vraiment supprimer ${id}`);
  if (confi) {
    fetch("http://localhost/epidemia_bis/src/controller/PointController.php", {
      method: "POST",
      body: new URLSearchParams({ action: "delete", id }),
    }).then(() => loadZones());
  } else {
    alert("Vous devez confirmer avant la suppression!");
  }
}

function loadZones() {
  fetch("http://localhost/epidemia_bis/src/controller/ZoneController.php")
    .then((response) => response.json())
    .then((zones) => {
      let tbody = document.querySelector("#zonesTable tbody");
      tbody.innerHTML = "";
      
      zones.forEach((zone) => {
        let row = `<tr class="bg-${couleur(zone.statut)}">
                    <td>${zone.id}</td>
                    <td>${zone.nom}</td>
                    <td>${zone.statut}</td>
                    <td>${zone.pays}</td>
                    <td>${zone.points.length}</td>
                    <td>
                                    <button class="btn btn-sm btn-success">
                                        <i class="fas fa-edit"></i>
                                    </button>
                                    <button onclick="deleteZone(${zone.id})" class="btn btn-sm btn-danger">
                                        <i class="fas fa-trash"></i>
                                    </button>
                    </td>
                </tr>`;
        tbody.innerHTML += row;
      });
    });
    loadPoints();
}

function loadUsers() {
  fetch("http://localhost/epidemia_bis/src/controller/UserController.php")
    .then((response) => response.json())
    .then((users) => {
      let tbody = document.querySelector("#usersTable tbody");
      tbody.innerHTML = "";
      users.forEach((user) => {
        let row = `<tr>
                    <td>${user.id}</td>
                    <td>${user.nom_prenom}</td>
                    <td>${user.login}</td>
                    <td>${user.role}</td>
                    <td>
                        <button onclick="deleteUser(${user.id})">Supprimer</button>
                    </td>
                </tr>`;
        tbody.innerHTML += row;
      });
    });
}

function deleteZone(id) {
  let confi = confirm(`Voulez vous vraiment supprimer ${id}`);
  if (confi) {
    fetch("http://localhost/epidemia_bis/src/controller/ZoneController.php", {
      method: "POST",
      body: new URLSearchParams({ action: "delete", id }),
    }).then(() => loadZones());
  } else {
    alert("Vous devez confirmer avant la suppression!");
  }
}

function deleteUser(id) {
  let confi = confirm(`Voulez vous vraiment supprimer ${id}`);
  if (confi) {
    fetch("http://localhost/epidemia_bis/src/controller/UserController.php", {
      method: "POST",
      body: new URLSearchParams({ action: "delete", id }),
    })
      .then((response) => console.log(response.json))
      .then(() => loadUsers());
  }
}
function calculStatut() {
  $("#zoneStatut").val(classifierZone(parseInt(zoneHabitants.value),parseInt(zoneSymptomatiques.value),parseInt(zonePositifs.value)));
  
}
function classifierZone(totalHabitants, symptomes, casConfirmes) {
  // Vérification des valeurs négatives
  if (totalHabitants < 0 || symptomes < 0 || casConfirmes < 0) {
    throw new Error("Les valeurs doivent être positives.");
  }

  // Cas particulier : aucun symptôme signalé
  if (symptomes === 0) {
    // S'il n'y a aucun symptôme et aucun cas confirmé, on considère la zone comme verte
    if (casConfirmes === 0) {
      return "verte";
    } else {
      throw new Error(
        "Données invalides : des cas confirmés sans personnes symptomatiques."
      );
    }
  }

  // Calcul du taux de positivité parmi les personnes présentant des symptômes
  const tauxPositifs = (casConfirmes / totalHabitants) * 100;

  // Classification selon les critères
  if (tauxPositifs < 5) {
    return "verte";
  } else if (tauxPositifs < 15) {
    return "orange";
  } else {
    return "rouge";
  }
}

function chargerModalPays(id, nom) {
  $("#btn_pays").text("Modifier");
  $("#titre_pays").text("Modifier Pays");
  $("#paysId").val(id);
  $("#paysNom").val(nom);
}
function chargerMoadlPoint(id, nom,zone_nom,zone_id) {
  $("#btn_point").text("Modifier");
  $("#titre_point").text("Modifier Point");
  $("#pointId").val(id);
  $("#pointNom").val(nom);
  console.log($("#zone_id"));
}
$("#btn_add_point_zone").on("click", function () {
  if (count <= 4) {
    let newEntry = document.createElement("div");
    newEntry.classList.add("point-entry");
    newEntry.classList.add("col-md-3");
    newEntry.innerHTML = `
        <label>Point ${++count}</label>
        <input type="text" name="point_nom[]" class="form-control" placeholder="Nom du point" required>
    `;
    container.appendChild(newEntry);
  } else {
    alert("Vous avez déjà atteint le maximum de points pour cette zone.");
  }
});
function suivant() {
  if (parseInt(zoneHabitants.value) > 0) {
    zoneSymptomatiques.removeAttribute("readonly");
  }
  if (parseInt(zoneHabitants.value) < parseInt(zoneSymptomatiques.value)) {
    alert(
      "Le nombre de symptomatiques ne peut pas etre superieur au nombre d'habitants"
    );
    parseInt(zoneSymptomatiques.value) = parseInt(zoneHabitants.value);
    zoneSymptomatiques.focus();
  } else {
    if (parseInt(zoneSymptomatiques.value) > 0) {
      zonePositifs.removeAttribute("readonly");
    }
  }
  if (parseInt(zoneHabitants.value) < parseInt(zonePositifs.value)) {
    parseInt(zonePositifs.value) = parseInt(zoneHabitants.value);
    alert(
      "Le nombre de cas positifs ne peut pas etre superieur au nombre d'habitants"
    );
    zonePositifs.focus();
  } 
}
function couleur(statut) {
  
  if (statut==='orange') {
    return 'warning';
  }
  if (statut==='rouge') {
    return 'danger';
  }
}