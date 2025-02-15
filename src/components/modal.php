<!-- Modals -->
<!-- Add User Modal -->
<div class="modal fade" id="addPays">
    <div class="modal-dialog">
        <div class="modal-content">
            <form id="paysForm">
                <div class="modal-header">
                    <h5 class="modal-title">Ajouter Pays</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <input type="hidden" id="paysId">
                    <div class="mb-3">
                        <label>Nom</label>

                        <input type="text" id="paysNom" class="form-control" placeholder="Nom du pays" required>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Enregistrer</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Add Class Modal -->
<div class="modal fade" id="addClassModal">
    <div class="modal-dialog">
        <div class="modal-content">
            <form action="classes.php" method="POST">
                <div class="modal-header">
                    <h5 class="modal-title">Ajouter Classe</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <label>Nom Classe</label>
                        <input type="text" name="class_name" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label>Niveau</label>
                        <input type="text" name="level" class="form-control" required>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Enregistrer</button>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- Add Zone Modal -->
<div class="modal fade" id="addZone">
    <div class="modal-dialog">
        <div class="modal-content">
            <form id="zoneForm">
                <div class="modal-header">
                    <h5 class="modal-title">Ajouter Zone</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <input type="hidden" id="zoneId">
                    <div class="mb-3">
                        <label>Nom Zone</label>
                        <input type="text" id="zoneNom" class="form-control" placeholder="Nom de la zone" required>
                    </div>
                    <div class="mb-3">
                        <label>Nombre d'habitants</label>
                        <input type="number" id="zoneHabitants" class="form-control" placeholder="Nombre d'habitants" required>
                    </div>
                    <div class="mb-3">
                        <label>Nombre de symptomatiques</label>
                        <input type="number" id="zoneSymptomatiques" class="form-control" placeholder="Nombre de symptomatiques" required>
                    </div>
                    <div class="mb-3">
                        <label>Nombre de positifs</label>
                        <input type="number" id="zonePositifs" class="form-control" placeholder="Nombre de positifs" required>
                    </div>
                    <div class="mb-3">
                        <label>Statut</label>
                        <select id="zoneStatut" class="form-control">
                            <option value="verte">Verte</option>
                            <option value="orange">Orange</option>
                            <option value="rouge">Rouge</option>
                        </select>
                        <div class="mb-3">
                            <label>Pays</label>
                            <select id="pays_id" class="form-control">
                                <?php foreach ($pays as $pay) { ?>
                                    <option value="<?= $pay->getId() ?>"><?= $pay ?></option>
                                <?php } ?>
                            </select>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">Enregistrer</button>
                    </div>
            </form>
        </div>
    </div>
</div>
<!-- Add User Modal -->
<div class="modal fade" id="addZone">
    <div class="modal-dialog">
        <div class="modal-content">
            <form id="userForm">
                <div class="modal-header">
                    <h5 class="modal-title">Ajouter Zone</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <input type="hidden" id="zoneId">
                    <div class="mb-3">
                        <label>Nom Zone</label>
                        <input type="text" id="zoneNom" class="form-control" placeholder="Nom de la zone" required>
                    </div>
                    <div class="mb-3">
                        <label>Nombre d'habitants</label>
                        <input type="number" id="zoneHabitants" class="form-control" placeholder="Nombre d'habitants" required>
                    </div>
                    <div class="mb-3">
                        <label>Nombre de symptomatiques</label>
                        <input type="number" id="zoneSymptomatiques" class="form-control" placeholder="Nombre de symptomatiques" required>
                    </div>
                    <div class="mb-3">
                        <label>Nombre de positifs</label>
                        <input type="number" id="zonePositifs" class="form-control" placeholder="Nombre de positifs" required>
                    </div>
                    <div class="mb-3">
                        <label>Statut</label>
                        <select id="zoneStatut" class="form-control">
                            <option value="verte">Verte</option>
                            <option value="orange">Orange</option>
                            <option value="rouge">Rouge</option>
                        </select>
                        <div class="mb-3">
                            <label>Pays</label>
                            <select id="pays_id" class="form-control">
                                <?php foreach ($pays as $pay) { ?>
                                    <option value="<?= $pay->getId() ?>"><?= $pay ?></option>
                                <?php } ?>
                            </select>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">Enregistrer</button>
                    </div>
            </form>
        </div>
    </div>
</div>
<!-- Add Zone Modal -->
<div class="modal fade" id="addZone">
    <div class="modal-dialog">
        <div class="modal-content">
            <form id="pointForm">
                <div class="modal-header">
                    <h5 class="modal-title">Ajouter Zone</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <input type="hidden" id="zoneId">
                    <div class="mb-3">
                        <label>Nom Zone</label>
                        <input type="text" id="zoneNom" class="form-control" placeholder="Nom de la zone" required>
                    </div>
                    <div class="mb-3">
                        <label>Nombre d'habitants</label>
                        <input type="number" id="zoneHabitants" class="form-control" placeholder="Nombre d'habitants" required>
                    </div>
                    <div class="mb-3">
                        <label>Nombre de symptomatiques</label>
                        <input type="number" id="zoneSymptomatiques" class="form-control" placeholder="Nombre de symptomatiques" required>
                    </div>
                    <div class="mb-3">
                        <label>Nombre de positifs</label>
                        <input type="number" id="zonePositifs" class="form-control" placeholder="Nombre de positifs" required>
                    </div>
                    <div class="mb-3">
                        <label>Statut</label>
                        <select id="zoneStatut" class="form-control">
                            <option value="verte">Verte</option>
                            <option value="orange">Orange</option>
                            <option value="rouge">Rouge</option>
                        </select>
                        <div class="mb-3">
                            <label>Pays</label>
                            <select id="pays_id" class="form-control">
                                <?php foreach ($pays as $pay) { ?>
                                    <option value="<?= $pay->getId() ?>"><?= $pay ?></option>
                                <?php } ?>
                            </select>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">Enregistrer</button>
                    </div>
            </form>
        </div>
    </div>
</div>