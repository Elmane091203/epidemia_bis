<!-- Modals -->
<!-- Pays Modal -->
<div class="modal fade" id="addPays">
    <div class="modal-dialog">
        <div class="modal-content">
            <form id="paysForm">
                <div class="modal-header">
                    <h5 class="modal-title" id="titre_pays">Ajouter Pays</h5>
                    <button type="button" class="btn-close" id="btn-modal-add" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <input type="hidden" id="paysId">
                    <div class="mb-3">
                        <label>Nom</label>

                        <input type="text" id="paysNom" class="form-control" placeholder="Nom du pays" required>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" id="btn_pays" class="btn btn-primary">Enregistrer</button>
                </div>
            </form>
        </div>
    </div>
</div>



<!-- Zone Modal -->
<div class="modal fade" id="addZone">
    <div class="modal-dialog">
        <div class="modal-content">
            <form id="zoneForm">
                <div class="modal-header">
                    <h5 class="modal-title">Ajouter Zone</h5>
                    <button type="button" class="btn-close" id="btn-modal-add-zone" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <input type="hidden" id="zoneId">
                    <div class="mb-3">
                        <label>Nom Zone</label>
                        <input type="text" id="zoneNom" class="form-control" placeholder="Nom de la zone" required>
                    </div>
                    <div class="mb-3">
                        <label>Nombre d'habitants</label>
                        <input type="number" onblur="suivant()" onchange="calculStatut()" id="zoneHabitants" class="form-control" placeholder="Nombre d'habitants" required>
                    </div>
                    <div class="mb-3">
                        <label>Nombre de symptomatiques</label>
                        <input type="number" readonly onblur="suivant()" onchange="calculStatut()" id="zoneSymptomatiques" class="form-control" placeholder="Nombre de symptomatiques" required>
                    </div>
                    <div class="mb-3">
                        <label>Nombre de positifs</label>
                        <input type="number" readonly onblur="suivant()" onchange="calculStatut()" id="zonePositifs" class="form-control" placeholder="Nombre de positifs" required>
                    </div>
                    <div class="mb-3">
                        <label>Statut</label>
                        <input type="text" readonly class="form-control" id="zoneStatut">
                    </div>
                    <div class="mb-3">
                        <label>Pays</label>
                        <select id="pays_id" required class="form-control">
                        </select>
                    </div>
                    <div class="mb-3">
                        <div class="w-full d-flex justify-content-between">
                            <h6 class="text-danger align-content-center">Ajouter au moins un point</h6>
                            <button type="button" class="btn btn-sm btn-secondary mt-2" id="btn_add_point_zone">Ajouter</button>
                        </div>
                        <div id="pointsContainer" class="row">
                        </div>


                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Enregistrer</button>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- Zoneupdate Modal -->
<div class="modal fade" id="modifZone">
    <div class="modal-dialog">
        <div class="modal-content">
            <form id="zoneFormU">
                <div class="modal-header">
                    <h5 class="modal-title">Modifier Zone</h5>
                    <button type="button" class="btn-close" id="btn-modal-modif-zone" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <input type="hidden" id="zoneIdU">
                    <div class="mb-3">
                        <label>Nom Zone</label>
                        <input type="text" id="zoneNomU" class="form-control" placeholder="Nom de la zone" required>
                    </div>
                    <div class="mb-3">
                        <label>Nombre d'habitants</label>
                        <input type="number" onblur="suivant()" onchange="calculStatut()" id="zoneHabitantsU" class="form-control" placeholder="Nombre d'habitants" required>
                    </div>
                    <div class="mb-3">
                        <label>Nombre de symptomatiques</label>
                        <input type="number" readonly onblur="suivant()" onchange="calculStatut()" id="zoneSymptomatiquesU" class="form-control" placeholder="Nombre de symptomatiques" required>
                    </div>
                    <div class="mb-3">
                        <label>Nombre de positifs</label>
                        <input type="number" readonly onblur="suivant()" onchange="calculStatut()" id="zonePositifsU" class="form-control" placeholder="Nombre de positifs" required>
                    </div>
                    <div class="mb-3">
                        <label>Statut</label>
                        <input type="text" readonly class="form-control" id="zoneStatutU">
                    </div>
                    <div class="mb-3">
                        <label>Pays</label>
                        <select id="pays_idU" required class="form-control">
                        </select>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Modifier</button>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- Add User Modal -->
<div class="modal fade" id="addUser">
    <div class="modal-dialog">
        <div class="modal-content">
            <form id="userForm">
                <div class="modal-header">
                    <h5 class="modal-title">Ajouter Utilisateur</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <input type="hidden" id="userId">
                    <select id="userRole">
                        <option value="Administrateur">Administrateur</option>
                        <option value="Agent">Agent</option>
                    </select>
                    <div class="mb-3">
                        <label>Nom Pernom</label>
                        <input type="text" id="userNomPrenom" class="form-control" placeholder="Nom & Prénom" required>
                    </div>
                    <div class="mb-3">
                        <label>Login</label>
                        <input type="text" class="form-control" id="userLogin" placeholder="Login" required>
                    </div>
                    <div class="mb-3">
                        <label>Mot de Passe</label>
                        <input type="password" id="userMdp" class="form-control" placeholder="Mot de passe" required>
                    </div>
                    <div class="mb-3">
                        <label>Nombre de positifs</label>
                        <input type="number" class="form-control" placeholder="Nombre de positifs" required>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Enregistrer</button>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- Add Point Modal -->
<div class="modal fade" id="addPoint">
    <div class="modal-dialog">
        <div class="modal-content">
            <form id="pointForm">
                <div class="modal-header">
                    <h5 class="modal-title" id="titre_point">Ajouter Point</h5>
                    <button type="button" class="btn-close" id="btn-modal-add-point" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <input type="hidden" id="pointId">
                    <div class="mb-3">
                        <label>Nom Point</label>
                        <input type="text" id="pointNom" class="form-control" placeholder="Nom de la zone" required>
                    </div>
                    <div class="mb-3">
                        <label>Zone</label>
                        <select class="form-control" id="zone_id" required>
                        </select>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" id="btn_point" class="btn btn-primary">Enregistrer</button>
                </div>
            </form>
        </div>
    </div>
</div>