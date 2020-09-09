<?php

include_once "config.php";
include_once "entidades/venta.php";

$pg = "Listado de ventas";

$venta = new Venta();
$aVentas = $venta->obtenerTodos();

include_once("header.php");

?>

<!-- Begin Page Content -->
<div class="container-fluid">

<!-- Page Heading -->
<div class="container-fluid">

<!-- Page Heading -->
<h1 class="h3 mb-4 text-gray-800">Listado de ventas</h1>
          <div class="row">
              <div class="col-12 mb-3">
                  <a href="venta-formulario.php" class="btn btn-primary mr-2">Nuevo</a>
              </div>
          </div>
          <table class="table table-hover border">
            <tr>
              <th>Fecha</th>
              <th>Cantidad</th>
              <th>Producto</th>
              <th>Cliente</th>
              <th>Total</th>
              <th>Acciones</th>
            </tr>
          <?php foreach ($aVentas as $venta): ?>
            <tr>
              <td><?php echo $venta->fecha; ?></td>
              <td><?php echo $venta->cantidad; ?></td>
              <td><?php echo $venta->nombre_producto; ?></td>
              <td><?php echo $venta->nombre_cliente; ?></td>
              <td><?php echo $venta->total; ?></td>
              <td>
                <a href="venta-formulario.php?id=<?php echo $venta->idventa; ?>"><i class="fas fa-search"></i></a>   
              </td>
            </tr>
          <?php endforeach; ?>
            </table>
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
        <div class="modal-body">Hacer clic en "Cerrar sesión si deseas finalizar tu sesión actual.</div>
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
