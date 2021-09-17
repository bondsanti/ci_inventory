
<footer class="main-footer">


   
 Copyright © 2020 All rights reserved <strong><a href="https://friendrista.co.th/">FGS Co.,Ltd</a></strong>




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
<!-- daterangepicker -->
<script src="<?php echo base_url('bootstrap/plugins/moment/moment.min.js');?>"></script>
<script src="<?php echo base_url('bootstrap/plugins/daterangepicker/daterangepicker.js');?>"></script>

<!-- AdminLTE App -->
<script src="<?php echo base_url('bootstrap/dist/js/adminlte.js');?>"></script>


<!-- DataTables -->
<script src="<?php echo base_url('bootstrap/plugins/datatables/jquery.dataTables.min.js');?>"></script>
<script src="<?php echo base_url('bootstrap/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js');?>"></script>
<script src="<?php echo base_url('bootstrap/plugins/datatables-responsive/js/dataTables.responsive.min.js');?>"></script>
<script src="<?php echo base_url('bootstrap/plugins/datatables-responsive/js/responsive.bootstrap4.min.js');?>"></script>

<!-- Select2 -->
<script src="<?php echo base_url('bootstrap/plugins/select2/js/select2.full.min.js');?>"></script>
<!-- date-range-picker -->
<script src="<?php echo base_url('bootstrap/plugins/daterangepicker/daterangepicker.js')?>"></script>



<script type="text/javascript">

var save_method; //for save method string
var table;

$(document).ready(function() {

    //datatables
    table = $('#table').DataTable({

        "processing": true, //Feature control the processing indicator.
        "serverSide": true, //Feature control DataTables' server-side processing mode.
        "order": [], //Initial no order.

        // Load data for the table's content from an Ajax source
        "ajax": {
            "url": "<?php echo site_url('member/ajax_list')?>",
            "type": "POST"
        },

        //Set column definition initialisation properties.
        "columnDefs": [
            {
                "targets": [ 0 ], //first column
                "orderable": false, //set not orderable
            },
            {
                "targets": [ -1 ], //last column
                "orderable": false, //set not orderable
            },

        ],


    });
    //set input/textarea/select event when change value, remove class error and remove text help block
    $("input").change(function(){
        $(this).parent().parent().removeClass('has-error');
        $(this).next().empty();
    });
    $("textarea").change(function(){
        $(this).parent().parent().removeClass('has-error');
        $(this).next().empty();
    });
    $("select").change(function(){
        $(this).parent().parent().removeClass('has-error');
        $(this).next().empty();
    });

    //check all
    $("#check-all").click(function () {
        $(".data-check").prop('checked', $(this).prop('checked'));
        showBottomDelete();
    });



});

function showBottomDelete()
{
  var total = 0;

  $('.data-check').each(function()
  {
     total+= $(this).prop('checked');
  });

  if (total > 0)
      $('#deleteList').show();
  else
      $('#deleteList').hide();
}

function addMember()
{
    save_method = 'add';
    $('#form')[0].reset(); // reset form on modals
    $('.form-group').removeClass('has-error'); // clear error class
    $('.help-block').empty(); // clear error string
    $('#modal_form').modal('show'); // show bootstrap modal
    $('.modal-title').text('Add student'); // Set Title to Bootstrap modal title
}

function editEstudiante(id)
{
    save_method = 'update';
    $('#form')[0].reset(); // reset form on modals
    $('.form-group').removeClass('has-error'); // clear error class
    $('.help-block').empty(); // clear error string

    //Ajax Load data from ajax
    $.ajax({
        url : "index.php/estudiante/ajax_edit/"+id,
        type: "GET",
        dataType: "JSON",
        success: function(data)
        {

            $('[name="estu_id"]').val(data.estu_id);
            $('[name="estu_nombre"]').val(data.estu_nombre);
            $('[name="estu_apellido"]').val(data.estu_apellido);
            $('[name="estu_cedula"]').val(data.estu_cedula);
            $('[name="carr_nombre"]').val(data.carr_id);
            $('#modal_form').modal('show'); // show bootstrap modal when complete loaded
            $('.modal-title').text('Edit'); // Set title to Bootstrap modal title

        },
        error: function (jqXHR, textStatus, errorThrown)
        {
            alert('Error getting data from ajax');
        }
    });
}

function reloadTable()
{
    table.ajax.reload(null,false); //reload datatable ajax
    $('#deleteList').hide();
}

function save()
{
    $('#btnSave').text('saving...'); //change button text
    $('#btnSave').attr('disabled',true); //set button disable
    var url;

    if(save_method == 'add') {
        url = "index.php/estudiante/ajax_add";
    } else {
        url = "index.php/estudiante/ajax_update";
    }

    // ajax adding data to database
    $.ajax({
        url : url,
        type: "POST",
        data: $('#form').serialize(),
        dataType: "JSON",
        success: function(data)
        {

            if(data.status) //if success close modal and reload ajax table
            {
                $('#modal_form').modal('hide');
                reloadTable();
            }
            else
            {
                for (var i = 0; i < data.inputerror.length; i++)
                {
                    $('[name="'+data.inputerror[i]+'"]').parent().parent().addClass('has-error'); //select parent twice to select div form-group class and add has-error class
                    $('[name="'+data.inputerror[i]+'"]').next().text(data.error_string[i]); //select span help-block class set text error string
                }
            }
            $('#btnSave').text('Save'); //change button text
            $('#btnSave').attr('disabled',false); //set button enable


        },
        error: function (jqXHR, textStatus, errorThrown)
        {
            alert('Error adding / update data');
            $('#btnSave').text('Save'); //change button text
            $('#btnSave').attr('disabled',false); //set button enable

        }
    });
}

function deleteEstudiante(id)
{
    if(confirm('Are you sure to remove the student?'))
    {
        // ajax delete data to database
        $.ajax({
            url : "index.php/estudiante/ajax_delete/"+id,
            type: "POST",
            dataType: "JSON",
            success: function(data)
            {
                //if success reload ajax table
                $('#modal_form').modal('hide');
                reloadTable();
            },
            error: function (jqXHR, textStatus, errorThrown)
            {
                alert('Error deleting data');
            }
        });

    }
}

function deleteList()
{
    var list_id = [];
    $(".data-check:checked").each(function() {
            list_id.push(this.value);
    });
    if(list_id.length > 0)
    {
        if(confirm('Are you sure delete this '+list_id.length+' data?'))
        {
            $.ajax({
                type: "POST",
                data: {id:list_id},
                url: "index.php/estudiante/ajax_list_delete",
                dataType: "JSON",
                success: function(data)
                {
                    if(data.status)
                    {
                        reloadTable();
                    }
                    else
                    {
                        alert('Failed.');
                    }

                },
                error: function (jqXHR, textStatus, errorThrown)
                {
                    alert('Error deleting data');
                }
            });
        }
    }
    else
    {
        alert('no data selected');
    }
}

</script>








<script>
  $(function () {
    $("#example1").DataTable({
      "searching": true,
      "paging": true,
      "responsive": true,
      "autoWidth": false,
    });
    
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
        title: 'Username ซ้ำ! โปรดลองใหม่'
      })
    <?php endif;?>
  </script>


</body>
</html>