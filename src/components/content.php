<!-- Main Content -->
<div class="col-md-9 col-lg-10 main-content ms-auto">
    <!-- Navbar -->
    <nav class="navbar navbar-expand-md navbar-light bg-light">
        <div class="container-fluid">
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#sidebar">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="navbar-nav">
                <a href="#" class="nav-link btn-danger btn-sm text-white">Déconnexion</a>
            </div>
        </div>
    </nav>

    <!-- Content -->
    <div class="tab-content p-4">
        <!-- Pays Tab -->
        <div class="tab-pane active" id="pays">
            <div class="d-flex justify-content-between mb-4">
                <h2>Gestion des Pays</h2>
                <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addPays">
                    <i class="fas fa-plus me-2"></i>Ajouter Pays
                </button>
            </div>

            <div class="card">
                <div class="card-body">
                    <table class="table table-striped table-hover" id="paysTable">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Nom</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <!-- Zones Tab -->
        <div class="tab-pane" id="zones">
            <div class="d-flex justify-content-between mb-4">
                <h2>Gestion des Zones</h2>
                <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addZone">
                    <i class="fas fa-plus me-2"></i>Ajouter Zone
                </button>
            </div>

            <div class="card">
                <div class="card-body">
                    <table class="table table-striped table-hover" id="zonesTable">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Nom zone</th>
                                <th>Status</th>
                                <th>Pays</th>
                                <th>Points de surveillance</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td>
                                    <button class="btn btn-sm btn-success">
                                        <i class="fas fa-edit"></i>
                                    </button>
                                    <button class="btn btn-sm btn-danger">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <!-- Points Tab -->
        <div class="tab-pane" id="points">
            <div class="d-flex justify-content-between mb-4">
                <h2>Gestion des Points de surveillance</h2>
                <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addClassModal">
                    <i class="fas fa-plus me-2"></i>Ajouter un point
                </button>
            </div>

            <div class="card">
                <div class="card-body">
                    <table class="table table-striped table-hover" id="pointsTable">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Nom</th>
                                <th>Zone</th>
                                <th>Pays</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td>
                                    <button class="btn btn-sm btn-success">
                                        <i class="fas fa-edit"></i>
                                    </button>
                                    <button class="btn btn-sm btn-danger">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <!-- Utilisateurs Tab -->
        <div class="tab-pane" id="users">
            <div class="d-flex justify-content-between mb-4">
                <h2>Gestion des Utilisateurs</h2>
                <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addClassModal">
                    <i class="fas fa-plus me-2"></i>Ajouter un utilisateur
                </button>
            </div>

            <div class="card">
                <div class="card-body">
                    <table class="table table-striped table-hover" id="usersTable">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Nom et prenom</th>
                                <th>Role</th>
                                <th>Derniere connexion</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td>
                                    <button class="btn btn-sm btn-success">
                                        <i class="fas fa-edit"></i>
                                    </button>
                                    <button class="btn btn-sm btn-danger">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>