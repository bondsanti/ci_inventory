
<footer class="main-footer">


   
 Copyright © 2020 All rights reserved




    <div class="float-right d-none d-sm-inline-block">
      <b>Version</b> 3.0.5
    </div>
  </footer>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->




<!-- jQuery -->
<script src="<?php echo base_url('bootstrap/plugins/jquery/jquery.min.js');?>"></script>
<!-- jQuery UI 1.11.4 -->
<script src="<?php echo base_url('bootstrap/plugins/jquery-ui/jquery-ui.min.js');?>"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->

<!-- Bootstrap 4 -->
<script src="<?php echo base_url('bootstrap/plugins/bootstrap/js/bootstrap.bundle.min.js');?>"></script>
<!-- ChartJS -->
<script src="<?php echo base_url('bootstrap/plugins/chart.js/Chart.min.js');?>"></script>

  <!-- pace-progress -->
<script src="<?php echo base_url('bootstrap/plugins/pace-progress/pace.min.js');?>"></script>
<!-- jQuery Knob Chart -->
<script src="<?php echo base_url('bootstrap/plugins/jquery-knob/jquery.knob.min.js');?>"></script>

<!-- date-range-picker -->
<script src="<?php echo base_url('bootstrap/plugins/daterangepicker/daterangepicker.js');?>"></script>

<!-- Tempusdominus Bootstrap 4 -->
<script src="<?php echo base_url('bootstrap/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js');?>"></script>


<!-- AdminLTE App -->
<script src="<?php echo base_url('bootstrap/dist/js/adminlte.js');?>"></script>


<!-- DataTables -->
<script src="<?php echo base_url('bootstrap/plugins/datatables/jquery.dataTables.min.js');?>"></script>
<script src="<?php echo base_url('bootstrap/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js');?>"></script>
<script src="<?php echo base_url('bootstrap/plugins/datatables-responsive/js/dataTables.responsive.min.js');?>"></script>
<script src="<?php echo base_url('bootstrap/plugins/datatables-responsive/js/responsive.bootstrap4.min.js');?>"></script>

<!-- Select2 -->
<script src="<?php echo base_url('bootstrap/plugins/select2/js/select2.full.min.js');?>"></script>

<!-- jsGrid -->
<script src="<?php echo base_url('bootstrap/plugins/jsgrid/demos/db.js');?>"></script>
<script src="<?php echo base_url('bootstrap/plugins/jsgrid/jsgrid.min.js');?>"></script>


<script>
  $(function () {
    $("#example1").DataTable({
      "searching": true,
      "paging": true,
      "responsive": true,
      "autoWidth": false,
    });
    $("#tbl1").DataTable({
      "searching": true,
      "paging": true,
      "responsive": true,
      "autoWidth": false,
      "lengthMenu":[30,50,100,150],
    "select": true
    });

     $("#datepic").datepicker();
    
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": true,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "responsive": true,
    });

            $('.select2').select2()

    //Initialize Select2 Elements
    $('.select2bs4').select2({
      theme: 'bootstrap4'
    });
    $(document).on("click", '[data-toggle="lightbox"]', function(event) {
  event.preventDefault();
  $(this).ekkoLightbox();
});
  
  });
</script>

 <script type="text/javascript">

    <?php  if ($this->session->flashdata('login_success')):?>
    const Toast = Swal.mixin({
        toast: true,
        position: 'top-end',
        showConfirmButton: false,
        timer: 3000,
        
      })

      Toast.fire({
        icon: 'success',
        title: 'ยินดีต้อนรับเข้าสู่ระบบ'
      })
    <?php endif;?>
  </script>
  
  <script type="text/javascript">
    <?php  if ($this->session->flashdata('save_success')):?>
    const Toast = Swal.mixin({
        toast: true,
        position: 'top-end',
        showConfirmButton: false,
        timer: 3000,
        timerProgressBar: true,
        didOpen: (toast) => {
          toast.addEventListener('mouseenter', Swal.stopTimer)
          toast.addEventListener('mouseleave', Swal.resumeTimer)
        }
      })

      Toast.fire({
        icon: 'success',
        title: 'เพิ่มข้อมูลสำเร็จ'
      })
    <?php endif;?>
  
   <?php  if ($this->session->flashdata('del_success')):?>
    const Toast = Swal.mixin({
        toast: true,
        position: 'top-end',
        showConfirmButton: false,
        timer: 3000,
        timerProgressBar: true,
        didOpen: (toast) => {
          toast.addEventListener('mouseenter', Swal.stopTimer)
          toast.addEventListener('mouseleave', Swal.resumeTimer)
        }
      })

      Toast.fire({
        icon: 'success',
        title: 'ลบข้อมูลสำเร็จ'
      })
    <?php endif;?>

       <?php  if ($this->session->flashdata('edit_success')):?>
    const Toast = Swal.mixin({
        toast: true,
        position: 'top-end',
        showConfirmButton: false,
        timer: 3000,
        timerProgressBar: true,
        didOpen: (toast) => {
          toast.addEventListener('mouseenter', Swal.stopTimer)
          toast.addEventListener('mouseleave', Swal.resumeTimer)
        }
      })

      Toast.fire({
        icon: 'success',
        title: 'แก้ไขข้อมูลสำเร็จ'
      })
    <?php endif;?>

  </script>
    <script type="text/javascript">
    <?php  if ($this->session->flashdata('save_error')):?>
         const Toast = Swal.mixin({
        toast: true,
        position: 'top-end',
        showConfirmButton: false,
        timer: 3000,
        timerProgressBar: true,
        didOpen: (toast) => {
          toast.addEventListener('mouseenter', Swal.stopTimer)
          toast.addEventListener('mouseleave', Swal.resumeTimer)
        }
      })

      Toast.fire({
        icon: 'error',
        title: 'ข้อมูล ซ้ำ! โปรดลองใหม่'
      })
    <?php endif;?>
  </script>

   <script type="text/javascript">
    <?php  if ($this->session->flashdata('question')):?>
         const Toast = Swal.mixin({
        toast: true,
        position: 'top-end',
        showConfirmButton: false,
        timer: 3000,
        timerProgressBar: true,
        didOpen: (toast) => {
          toast.addEventListener('mouseenter', Swal.stopTimer)
          toast.addEventListener('mouseleave', Swal.resumeTimer)
        }
      })

      Toast.fire({
        icon: 'question',
        title: 'กรอกข้อมูลไม่ถูกต้อง'
      })
    <?php endif;?>
  </script>




</body>
</html>