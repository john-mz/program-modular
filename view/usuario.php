<div class="usuario-container">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1><i class="fas fa-users"></i> Gestión de Usuarios</h1>
        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal12">
            <i class="fas fa-plus"></i> Agregar Usuario
        </button>
    </div>
    <hr>
    <?php
    require_once 'controller/usuario.php';

    $res = $usuario->consultar();
    // pendiente hacer lo del select de roles escalable i.e que lo saque directamente de sql
    ?>

    <?php if ($res->num_rows > 0) { ?>
        <div class="table-responsive">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nombre</th>
                        <th>Email</th>
                        <th>Clave</th>
                        <th>Rol</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    <?php while ($row = $res->fetch_assoc()) { ?>
                        <tr>
                            <td><?php echo $row['id_usuario']; ?></td>
                            <td><?php echo $row['nombre']; ?></td>
                            <td><?php echo $row['email']; ?></td>
                            <td><?php echo $row['clave']; ?></td>
                            <td>
                                <span class="badge bg-<?php echo $row['rol'] == 'Admin' ? 'primary' : 'secondary'; ?>">
                                    <?php echo $row['rol']; ?>
                                </span>
                            </td>
                            <td>
                                <?php
                                $id_usuario = json_encode($row['id_usuario']);
                                $nombre = json_encode($row['nombre']);
                                $email = json_encode($row['email']);
                                $clave = json_encode($row['clave']);
                                ?>
                                <button type='button' onclick='editarModal(<?php echo $id_usuario . ", $nombre, $email, $clave"; ?>)' class='btn btn-warning btn-sm' data-bs-toggle='modal' data-bs-target='#exampleModal1'>
                                    <i class="fas fa-edit"></i> Editar
                                </button>
                                <button type="button" onclick='eliminarModal(<?php echo $id_usuario?>)' class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#eliminarModal">
                                    <i class="fas fa-trash"></i> Eliminar
                                </button>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    <?php } else { ?>
        <div class="alert alert-info">
            <i class="fas fa-info-circle"></i> No se encontraron usuarios en el sistema.
        </div>
    <?php } ?>

    <!-- editar modal -->
    <form action="" method="post">
        <div class="modal fade" id="exampleModal1" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">Datos</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>

                    <div class="modal-body">
                        <div class="mb-3">
                            <input type="hidden" class="form-control" name="id_usuario" id="inputIdUsuario" required="required">
                        </div>
                        <div class="mb-3">
                            <label for="nombre" class="form-label">Nombre</label>
                            <input type="text" class="form-control" name="nombre" id="inputNombre" required="required">
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputPassword1" class="form-label">Email</label>
                            <input type="email" class="form-control" name="email" id="inputEmail" required="required">
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputPassword1" class="form-label">clave</label>
                            <input type="password" class="form-control" name="clave" id="inputPassword" required="required">
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputPassword1" class="form-label">Rol</label>
                            <select class="form-select" aria-label="Default select example" name="rol" id="inputRolId" required="required">
                                <option disabled selected value>Selecciona el rol</option>
                                <option value="Admin">Admin</option>
                                <option value="Basico">Basico</option>
                            </select>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                        <button type="submit" id="editar" name="editar" class="btn btn-primary">Editar</button>
                    </div>
                </div>
            </div>
        </div>
    </form>

    <!-- agregar Modal -->
    <form action="" method="post">
        <div class="modal fade" id="exampleModal12" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">Modal title</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="mb-3">
                            <input type="hidden" class="form-control" name="id_usuario" id="" required="required">
                        </div>
                        <div class="mb-3">
                            <label for="nombre" class="form-label">Nombre</label>
                            <input type="text" class="form-control" name="nombre" id="" required="required">
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputPassword1" class="form-label">Email</label>
                            <input type="email" class="form-control" name="email" id="" required="required">
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputPassword1" class="form-label">Clave</label>
                            <input type="password" class="form-control" name="clave" id="" required="required">
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputPassword1" class="form-label">Rol</label>
                            <select class="form-select" aria-label="Default select example" name="rol" id="" required="required">
                                <option selected value="Admin">Admin</option>
                                <option value="Basico">Basico</option>
                            </select>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                        <button type="submit" class="btn btn-primary" name="agregar">Agregar</button>
                    </div>
                </div>
            </div>
        </div>
    </form>

    <!-- Modal eliminar -->
    <form action="" method="post">
        <div class="modal fade" id="eliminarModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">Confirmacion</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        Esta seguro de que desea eliminar el usuario?
                        <input type="text" class="form-control" name="id_usuario" id="inputIdUsuario1" readonly>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                        <button type="submit" class="btn btn-primary" name="eliminar">Confirmar</button>
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>

<script src="view/js/usuario.js"></script>
