document.addEventListener("DOMContentLoaded", function () {
    loadZones();
    loadUsers();

    document.getElementById("zoneForm").addEventListener("submit", function (e) {
        e.preventDefault();
        let id = document.getElementById("zoneId").value;
        let action = id ? "update" : "add";
        
        fetch("ZoneController.php", {
            method: "POST",
            body: new URLSearchParams({
                action,
                id,
                nom: document.getElementById("zoneNom").value,
                statut: document.getElementById("zoneStatut").value,
                nb_habitants: document.getElementById("zoneHabitants").value,
                nb_symptomatiques: document.getElementById("zoneSymptomatiques").value,
                nb_positifs: document.getElementById("zonePositifs").value,
                pays_id: document.getElementById("zonePaysId").value
            })
        }).then(response => response.json()).then(() => {
            loadZones();
            document.getElementById("zoneForm").reset();
        });
    });

    document.getElementById("userForm").addEventListener("submit", function (e) {
        e.preventDefault();
        let id = document.getElementById("userId").value;
        let action = id ? "update" : "add";
        
        fetch("UserController.php", {
            method: "POST",
            body: new URLSearchParams({
                action,
                id,
                nom_prenom: document.getElementById("userNomPrenom").value,
                login: document.getElementById("userLogin").value,
                mdp: document.getElementById("userMdp").value,
                role: document.getElementById("userRole").value
            })
        }).then(response => response.json()).then(() => {
            loadUsers();
            document.getElementById("userForm").reset();
        });
    });
});

function loadZones() {
    fetch("ZoneController.php")
        .then(response => response.json())
        .then(zones => {
            let tbody = document.querySelector("#zonesTable tbody");
            tbody.innerHTML = "";
            zones.forEach(zone => {
                let row = `<tr>
                    <td>${zone.id}</td>
                    <td>${zone.nom}</td>
                    <td>${zone.statut}</td>
                    <td>${zone.nb_habitants}</td>
                    <td>${zone.nb_symptomatiques}</td>
                    <td>${zone.nb_positifs}</td>
                    <td>${zone.pays_id}</td>
                    <td>
                        <button onclick="deleteZone(${zone.id})">Supprimer</button>
                    </td>
                </tr>`;
                tbody.innerHTML += row;
            });
        });
}

function loadUsers() {
    fetch("UserController.php")
        .then(response => response.json())
        .then(users => {
            let tbody = document.querySelector("#usersTable tbody");
            tbody.innerHTML = "";
            users.forEach(user => {
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
    fetch("ZoneController.php", {
        method: "POST",
        body: new URLSearchParams({ action: "delete", id })
    }).then(() => loadZones());
}

function deleteUser(id) {
    fetch("UserController.php", {
        method: "POST",
        body: new URLSearchParams({ action: "delete", id })
    }).then(() => loadUsers());
}
