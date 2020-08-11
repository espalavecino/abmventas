<?php

$pg = "Listado de ventas";

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
                <th style="width: 170px;">Fecha</th>
                <th style="width: 130px;">Cantidad</th>
                <th>Producto</th>
                <th>Cliente</th>
                <th style="width: 150px;">Total</th>
                <th style="width: 110px;">Acciones</th>
            </tr>
                          <tr>
                  <td>08/08/2020 14:08</td>
                  <td>3</td>
                  <td>Mouse Genius</td>
                  <td>Tomas</td>
                  <td>3600.00</td>
                  <td>
                      <a href="venta-formulario.php?id=31"><i class="fas fa-search"></i></a>   
                  </td>
              </tr>
                          <tr>
                  <td>08/08/2020 14:08</td>
                  <td>1</td>
                  <td>Auricular </td>
                  <td>Tomas</td>
                  <td>1009.00</td>
                  <td>
                      <a href="venta-formulario.php?id=27"><i class="fas fa-search"></i></a>   
                  </td>
              </tr>
                          <tr>
                  <td>08/08/2020 14:08</td>
                  <td>1</td>
                  <td>Mouse Genius</td>
                  <td>Nelson</td>
                  <td>1000.00</td>
                  <td>
                      <a href="venta-formulario.php?id=29"><i class="fas fa-search"></i></a>   
                  </td>
              </tr>
                          <tr>
                  <td>08/08/2020 14:08</td>
                  <td>1</td>
                  <td>Mouse Genius</td>
                  <td>Juaness</td>
                  <td>1200.00</td>
                  <td>
                      <a href="venta-formulario.php?id=26"><i class="fas fa-search"></i></a>   
                  </td>
              </tr>
                          <tr>
                  <td>04/08/2020 21:08</td>
                  <td>1</td>
                  <td>Mouse Genius</td>
                  <td>Tomas</td>
                  <td>1200.00</td>
                  <td>
                      <a href="venta-formulario.php?id=21"><i class="fas fa-search"></i></a>   
                  </td>
              </tr>
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
