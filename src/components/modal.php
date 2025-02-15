<!-- Modals -->
<!-- Add Student Modal -->
<div class="modal fade" id="addPays">
    <div class="modal-dialog">
        <div class="modal-content">
            <form action="students.php" method="POST">
                <div class="modal-header">
                    <h5 class="modal-title">Ajouter Étudiant</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <label>Nom</label>
                        <input type="text" name="last_name" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label>Prénom</label>
                        <input type="text" name="first_name" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label>Classe</label>
                        <select name="class_id" class="form-select" required>
                            <?php foreach ($classes as $class): ?>
                                <option value="<?= $class['id'] ?>"><?= $class['class_name'] ?></option>
                            <?php endforeach; ?>
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
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Enregistrer</button>
                </div>
            </form>
        </div>
    </div>
</div>