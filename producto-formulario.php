<?php

include_once "config.php";
include_once "entidades/producto.php";
include_once "entidades/tipoproducto.php";

$pg = "Productos";

$producto = new Producto();
$producto->cargarFormulario($_REQUEST);

$tipoproducto = new Tipoproducto();
$aTipoProductos = $tipoproducto->obtenerTodos();

if ($_POST) { 
  if (isset($_POST["btnGuardar"])){
    if (isset($_GET["id"]) && $_GET["id"] > 0) {
      $productoAnterior = new Producto();
      $productoAnterior->idproducto = $_GET["id"];
      $productoAnterior->obtenerPorId();
      $imagenAnterior = $productoAnterior->imagen;
      
      if ($_FILES["txtImagen"]["error"] === UPLOAD_ERR_OK) {
          $nombreRandom = date("Ymdhmsi");
          $archivo_tmp = $_FILES["txtImagen"]["tmp_name"];
          $nombreArchivo = $_FILES["txtImagen"]["name"];
          $extension = pathinfo($nombreArchivo, PATHINFO_EXTENSION);
          $nombreImagen = $nombreRandom . "." . $extension;
          move_uploaded_file($archivo_tmp, "imagenes/$nombreImagen");
        }
        if ($_FILES["txtImagen"]["error"] === UPLOAD_ERR_OK) {
          if ($imagenAnterior != ""){
          unlink("imagenes/$imagenAnterior");
          } 
        } else {
          $nombreImagen = $imagenAnterior;
      }
        $producto->imagen = $nombreImagen;
        $producto->actualizar();

    } else {
      if ($_FILES["txtImagen"]["error"] === UPLOAD_ERR_OK) {
        $nombreRandom = date("Ymdhmsi");
        $archivo_tmp = $_FILES["txtImagen"]["tmp_name"];
        $nombreArchivo = $_FILES["txtImagen"]["name"];
        $extension = pathinfo($nombreArchivo, PATHINFO_EXTENSION);
        $nombreImagen = $nombreRandom . "." . $extension;
        move_uploaded_file($archivo_tmp, "imagenes/$nombreImagen");
      }
     
      $producto->imagen = $nombreImagen;
      $producto->insertar();
  }
} else if (isset($_POST["btnBorrar"])){
    
    $producto->idproducto = $_GET["id"];
    $producto->obtenerPorId();

    if ($producto->imagen != ""){
      unlink("imagenes/$producto->imagen");
      }

    $producto->eliminar(); 
    header("location:productos-listado.php");
  }

 
} 
if (isset($_GET["id"]) && $_GET["id"] > 0) {
  $producto->obtenerPorId();
}

include_once("header.php");

?>

<!-- Begin Page Content -->
    <div class="container-fluid">
        <!-- Page Heading -->
        <h1 class="h3 mb-4 text-gray-800">Productos</h1>
           <div class="row">
                <div class="col-12 mb-3">
                    <a href="productos-listado.php" class="btn btn-primary mr-2">Listado</a>
                    <a href="producto-formulario.php" class="btn btn-primary mr-2">Nuevo</a>
                    <button type="submit" class="btn btn-success mr-2" id="btnGuardar" name="btnGuardar">Guardar</button>
                    <button type="submit" class="btn btn-danger" id="btnBorrar" name="btnBorrar">Borrar</button>
                </div>
            </div>
            <div class="row">
                <div class="col-6 form-group">
                    <label for="txtNombre">Nombre:</label>
                    <input type="text" required="" class="form-control" name="txtNombre" id="txtNombre" value="<?php echo $producto->nombre; ?>">
                </div>
                <div class="col-6 form-group">
                  <label for="lstTipoProducto">Tipo de producto:</label>
                  <select required name="lstTipoProducto" id="lstTipoProducto" class="form-control">
                  <option value="" disabled selected>Seleccionar</option>
                  <?php foreach ($aTipoProductos as $tipoproducto) : ?>
                    <?php if ($tipoproducto->idtipoproducto == $producto->fk_idtipoproducto) : ?>
                      <option selected value="<?php echo $tipoproducto->idtipoproducto; ?>"> <?php echo $tipoproducto->nombre; ?></option>
                    <?php else : ?>
                      <option value="<?php echo $tipoproducto->idtipoproducto; ?>"><?php echo $tipoproducto->nombre; ?></option>
                    <?php endif; ?>
                  <?php endforeach; ?>
                    </select>
                </div>
            </div>
            <div class="row">
                <div class="col-6 form-group">
                    <label for="txtCantidad">Cantidad:</label>
                    <input type="number" required="" class="form-control" name="txtCantidad" id="txtCantidad" value="<?php echo $producto->cantidad; ?>">
                </div>
                <div class="col-6 form-group">
                    <label for="txtPrecio">Precio:</label>
                    <input type="text" class="form-control" name="txtPrecio" id="txtPrecio" value="<?php echo $producto->precio; ?>">
                </div>
            </div>
            <div class="row">
                <div class="col-12 form-group">
                    <label for="txtDescripcion">Descripción:</label>
                    <textarea type="text" name="txtDescripcion" id="txtDescripcion" value="<?php echo $producto->descripcion; ?>"></textarea>
                </div>
            </div>
            <div class="row">
              <div class="col-12 mb-3">
                <label>Archivo adjunto:</label>
                <input type="file" id="txtImagen" name="txtImagen" class="form-control-file" value="<?php echo $producto->imagen; ?>">
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


<!-- Editor de texto -->
  <script>
    ClassicEditor
    .create( document.querySelector( '#txtDescripcion' ) )
    .catch( error => {
    console.error( error );
    } );
  </script>

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
