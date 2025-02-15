document.addEventListener("DOMContentLoaded", function () {
  loadZones();
  loadUsers();
  loadPays();
  loadPoints();
  document.getElementById("zoneForm").addEventListener("submit", function (e) {
    e.preventDefault();
    let id = document.getElementById("zoneId").value;
    let action = id ? "update" : "add";

    fetch("http://localhost/epidemia_bis/src/controller/ZoneController.php", {
      method: "POST",
      body: new URLSearchParams({
        action,
        id,
        nom: document.getElementById("zoneNom").value,
        statut: document.getElementById("zoneStatut").value,
        nb_habitants: document.getElementById("zoneHabitants").value,
        nb_symptomatiques: document.getElementById("zoneSymptomatiques").value,
        nb_positifs: document.getElementById("zonePositifs").value,
        pays_id: document.getElementById("zonePaysId").value,
      }),
    })
      .then((response) => response.json())
      .then(() => {
        loadZones();
        document.getElementById("zoneForm").reset();
      });
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
        zone_id: document.getElementById("pointZoneId").value,
      }),
    })
      .then((response) => response.json())
      .then(() => {
        loadPoints();
        document.getElementById("pointForm").reset();
      });
  });
});

function loadPays() {
  fetch("http://localhost/epidemia_bis/src/controller/PaysController.php")
    .then((response) => response.json())
    .then((paysList) => {
      let tbody = document.querySelector("#paysTable tbody");
      tbody.innerHTML = "";
      paysList.forEach((pays) => {
        let row = `<tr>
                    <td>${pays.id}</td>
                    <td>${pays.nom}</td>
                    <td>
                        <button onclick="deletePays(${pays.id})">Supprimer</button>
                    </td>
                </tr>`;
        tbody.innerHTML += row;
      });
    });
}

function loadPoints() {
  fetch("http://localhost/epidemia_bis/src/controller/PointController.php")
    .then((response) => response.json())
    .then((points) => {
      let tbody = document.querySelector("#pointsTable tbody");
      tbody.innerHTML = "";
      points.forEach((point) => {
        let row = `<tr>
                    <td>${point.id}</td>
                    <td>${point.nom}</td>
                    <td>${point.zone_id}</td>
                    <td>
                        <button onclick="deletePoint(${point.id})">Supprimer</button>
                    </td>
                </tr>`;
        tbody.innerHTML += row;
      });
    });
}

function deletePays(id) {
  fetch("http://localhost/epidemia_bis/src/controller/PaysController.php", {
    method: "POST",
    body: new URLSearchParams({ action: "delete", id }),
  }).then(() => loadPays());
}

function deletePoint(id) {
  fetch("PointController.php", {
    method: "POST",
    body: new URLSearchParams({ action: "delete", id }),
  }).then(() => loadPoints());
}

function loadZones() {
  fetch("http://localhost/epidemia_bis/src/controller/ZoneController.php")
    .then((response) => response.json())
    .then((zones) => {
      let tbody = document.querySelector("#zonesTable tbody");
      tbody.innerHTML = "";
      zones.forEach((zone) => {
        let row = `<tr>
                    <td>${zone.id}</td>
                    <td>${zone.nom}</td>
                    <td>${zone.statut}</td>
                    <td>${zone.nb_habitants}</td>
                    <td>${zone.nb_symptomatiques}</td>
                    <td>${zone.nb_positifs}</td>
                    <td>${zone.pays}</td>
                    <td>
                        <button onclick="deleteZone(${zone.id})">Supprimer</button>
                    </td>
                </tr>`;
        tbody.innerHTML += row;
      });
    });
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
  fetch("http://localhost/epidemia_bis/src/controller/ZoneController.php", {
    method: "POST",
    body: new URLSearchParams({ action: "delete", id }),
  }).then(() => loadZones());
}

function deleteUser(id) {
  fetch("http://localhost/epidemia_bis/src/controller/UserController.php", {
    method: "POST",
    body: new URLSearchParams({ action: "delete", id }),
  }).then(() => loadUsers());
}
