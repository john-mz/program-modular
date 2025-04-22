<h1>usuario</h1>
<hr>
<?php
require_once 'controller/usuario.php';

$res = $usuario->consultar();
// pendiente hacer lo del select de roles escalable i.e que lo saque directamente de sql
?>
<br>
<!-- agregar modal -->
<!-- Button trigger modal -->
<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal12">
  Insertar
</button>
<?php

if ($res->num_rows > 0) {
  echo "<table border='1'>"; // Start the table with a border for visibility
  echo "<tr>";
  echo "<th>ID Usuario</th>";
  echo "<th>Nombre</th>";
  echo "<th>Email</th>";
  echo "<th>Clave</th>";
  echo "<th>Rol</th>";
  echo "<th>Acciones</th>";
  echo "</tr>";

  while ($row = $res->fetch_assoc()) {
    echo "<tr>";
    echo "<td>" . $row['id_usuario'] . "</td>";
    echo "<td>" . $row['nombre'] . "</td>";
    echo "<td>" . $row['email'] . "</td>";
    echo "<td>" . $row['clave'] . "</td>";
    echo "<td>" . $row['rol'] . "</td>";
    echo "<td>";
    $id_usuario = json_encode($row['id_usuario']);
    $nombre = json_encode($row['nombre']);
    $email = json_encode($row['email']);
    $clave = json_encode($row['clave']);
?>
    <button type='button' onclick='editarModal(<?php echo $id_usuario . ", $nombre, $email, $clave"; ?>)' class='btn btn-warning' data-bs-toggle='modal' data-bs-target='#exampleModal1'>Editar</button>
    <button type="button" onclick='eliminarModal(<?php echo $id_usuario?>)' class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#eliminarModal">Eliminar</button>
<?php
    // echo "<a href='index.php?view=usuario&&accion=agregar'>Agregar | </a>";
    // echo "<a href='index.php?view=usuario&&accion=editar&&id_usuario=" . $row['id_usuario'] . "'>Editar | </a>";
    // echo "<a href='index.php?view=usuario&&accion=eliminar&&id_usuario=" . $row['id_usuario'] . "'>Eliminar</a>";
    echo "</td>";
    echo "</tr>";
  }

  echo "</table>";
} else {
  echo "No results found";
}
?>

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



<script src="view/js/usuario.js"></script>