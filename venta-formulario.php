<?php

include_once "config.php";
include_once "entidades/venta.php";
include_once "entidades/cliente.php";
include_once "entidades/producto.php";

$pg = "Ventas";

$venta = new Venta();
$venta->cargarFormulario($_REQUEST);

$cliente = new Cliente();
$aClientes = $cliente->obtenerTodos();

$producto = new Producto();
$aProductos = $producto->obtenerTodos();

if ($_POST) {
  if (isset($_POST["btnGuardar"])) {
    if (isset($_GET["id"]) && $_GET["id"] > 0) {
      $venta->actualizar();
    } else {
      $venta->insertar();
      $msg = "La venta se guardó correctamente";
    }
  } else if (isset($_POST["btnBorrar"])) {
    $venta->eliminar();
  }
}
if (isset($_GET["id"]) && $_GET["id"] > 0) {
  $venta->obtenerPorId();
}

include_once("header.php");

?>

<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="container-fluid">
        <!-- Page Heading -->
        <h1 class="h3 mb-4 text-gray-800">Venta</h1>
        <div class="row">
            <div class="col-12 mb-3">
                <a href="ventas-listado.php" class="btn btn-primary mr-2">Listado</a>
                <a href="venta-formulario.php" class="btn btn-primary mr-2">Nuevo</a>
                <button type="submit" class="btn btn-success mr-2" id="btnGuardar" name="btnGuardar">Guardar</button>
                <button type="submit" class="btn btn-danger" id="btnNuevo" name="btnNuevo">Borrar</button>
            </div>
        </div>
          <div class="row">
            <div class="col-6 form-group">
                <label for="txtFecha">Fecha:</label>
                <input type="date" required="" class="form-control" name="txtFecha" id="txtFecha" value="">
            </div>
            <div class="col-6 form-group">
                <label for="txtFecha">Hora:</label>
                <input type="time" required="" class="form-control" name="txtHora" id="txtHora" value="">
            </div>
            <div class="col-6 form-group">
                <label for="lstCliente">Cliente:</label>
                <select required="" class="form-control selectpicker" data-live-search="true" name="lstCliente" id="lstCliente">
                <option value="" disabled selected>Seleccionar</option>
                <?php foreach ($aClientes as $cliente) : ?>
                    <?php if ($cliente->idcliente == $venta->fk_idcliente) : ?>
                      <option selected value="<?php echo $cliente->idcliente; ?>"><?php echo $cliente->nombre; ?></option>
                    <?php else : ?>
                      <option value="<?php echo $cliente->idcliente; ?>"> <?php echo $cliente->nombre; ?></option>
                    <?php endif; ?>
                  <?php endforeach; ?>  
                </select>
          </div>
          <div class="col-6 form-group">
              <label for="lstProducto">Producto:</label>
              <select required="" class="form-control selectpicker" data-live-search="true" name="lstProducto" id="lstProducto">
                  <option value="" disabled selected>Seleccionar</option>
                  <?php foreach ($aProductos as $producto) : ?>
                    <?php if ($producto->idproducto == $venta->fk_idproducto) : ?>
                      <option selected value="<?php echo $producto->idproducto; ?>"><?php echo $producto->nombre; ?></option>
                    <?php else : ?>
                      <option value="<?php echo $producto->idproducto; ?>"> <?php echo $producto->nombre; ?></option>
                    <?php endif; ?>
                  <?php endforeach; ?>
              </select>
          </div>
            <div class="col-6 form-group">
                <label for="txtPrecioUnitario">Precio unitario:</label>
                <input type="number" class="form-control" name="txtPrecioUnitario" id="txtPrecioUnitario" value="<?php echo $venta->preciounitario; ?>">
            </div>
            <div class="col-6 form-group">
                <label for="txtCantidad">Cantidad:</label>
                <input type="number" class="form-control" name="txtCantidad" id="txtCantidad" value="<?php echo $venta->cantidad; ?>">
            </div>
            <div class="col-6 form-group">
                <label for="txtTotal">Total:</label>
                <input type="text" class="form-control" name="txtTotal" id="txtTotal" value="<?php echo $venta->total; ?>">
            </div>
            </div>
        </div>
        <!-- /.container-fluid -->
        <!-- End of Main Content -->
        <!-- Footer -->
        <footer class="sticky-footer bg-white">
            <div class="container my-auto">
                <div class="copyright text-center my-auto">
                    <span>Copyright &copy; Your Website 2020</span>
                </div>
            </div>
        </footer>
        <!-- End of Footer -->
    </div>
        <!-- End of Content Wrapper -->
</div>
  <!-- End of Page Wrapper -->

  <!-- Scroll to Top Button-->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>

  <!-- Logout Modal-->
  <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Desea salir del sistema?</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">Hacer clic en "Cerrar sesión" si deseas finalizar tu sesión actual.</div>
        <div class="modal-footer">
          <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancelar</button>
          <button type="submit" class="btn btn-primary" name="btnCerrar">Cerrar sesión</button>
        </div>
      </div>
    </div>
  </div>
</form>

  <!-- Bootstrap core JavaScript-->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="js/sb-admin-2.min.js"></script>

  <!-- Page level plugins -->
  <script src="vendor/chart.js/Chart.min.js"></script>

  <!-- Page level custom scripts -->
  <script src="js/demo/chart-area-demo.js"></script>
  <script src="js/demo/chart-pie-demo.js"></script>

</body>

</html>
