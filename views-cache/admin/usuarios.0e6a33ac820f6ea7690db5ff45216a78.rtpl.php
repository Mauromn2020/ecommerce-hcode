<?php if(!class_exists('Rain\Tpl')){exit;}?><!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">  <!-- Content Header (Page header) -->
    <section class="content-header">
      <h2>
        Usuários
        <small>contrôle de usuários</small>
      </h2>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Tables</a></li>
        <li class="active">Data tables</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">	
		
		  <!--Botão Novo-->	
          <div class="box">
            <div class="box-header">
              <a href="/admin/users/create" class="btn btn-success">Cadastrar Usuário</a>
            </div>
			  
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>Login</th>
                  <th>Password</th>
                  <th>Cadastro</th>
                  <th>Delete</th>
                  <th>Ações</th>
                </tr>
                </thead>
                <tbody>
                <tr>
                  <td>Trident</td>
                  <td>Internet
                    Explorer 4.0
                  </td>
                  <td>Win 95+</td>
                  <td> 4</td>
                  <td>X</td>
                </tr>
                <tr>
                  <td>Trident</td>
                  <td>Internet
                    Explorer 5.0
                  </td>
                  <td>Win 95+</td>
                  <td>5</td>
                  <td>C</td>
                </tr>
                <tr>
                  <td>Trident</td>
                  <td>Internet
                    Explorer 5.5
                  </td>
                  <td>Win 95+</td>
                  <td>5.5</td>
                  <td>A</td>
                </tr>
                <tr>
                  <td>Trident</td>
                  <td>Internet
                    Explorer 6
                  </td>
                  <td>Win 98+</td>
                  <td>6</td>
                  <td>A</td>
                </tr>
                <tr>
                  <td>Trident</td>
                  <td>Internet Explorer 7</td>
                  <td>Win XP SP2+</td>
                  <td>7</td>
                  <td>A</td>
                </tr>
                <tr>
                  <td>Other browsers</td>
                  <td>All others</td>
                  <td>-</td>
                  <td>-</td>
                  <td>U</td>
                </tr>
                </tbody>
<!--                <tfoot>
                <tr>
                  <th>Rendering engine</th>
                  <th>Browser</th>
                  <th>Platform(s)</th>
                  <th>Engine version</th>
                  <th>CSS grade</th>
                </tr>
                </tfoot>-->
              </table>
            </div><!-- /.box-body -->            
          </div><!-- /.box -->          
        </div><!-- /.col -->        
      </div><!-- /.row -->      
    </section><!-- /.content -->    
  </div><!-- /.content-wrapper ------------------------------------------------------>
  



 
</div><!-- ./wrapper -->

<!-- jQuery 2.2.3   http://curso-hcode.com/admin/usuarios -->
<script src="http://curso-hcode.com/res/admin/plugins/jQuery/jquery-2.2.3.min.js"></script>
<!-- Bootstrap 3.3.6 -->
<script src="http://curso-hcode.com/res/admin/bootstrap/js/bootstrap.min.js"></script>
<!-- DataTables -->
<script src="http://curso-hcode.com/res/admin/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="http://curso-hcode.com/res/admin/plugins/datatables/dataTables.bootstrap.min.js"></script>
<!-- SlimScroll -->
<script src="http://curso-hcode.com/res/admin/plugins/slimScroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="http://curso-hcode.com/res/admin/plugins/fastclick/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="http://curso-hcode.com/res/admin/dist/js/app.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="http://curso-hcode.com/res/admin/dist/js/demo.js"></script>
<!-- page script -->


<script>
  $(function () {
    $("#example1").DataTable();
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false
    });
  });
</script>

