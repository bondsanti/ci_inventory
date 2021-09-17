<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.css" integrity="sha512-C7hOmCgGzihKXzyPU/z4nv97W0d9bv4ALuuEbSf6hm93myico9qa0hv4dODThvCsqQUmKmLcJmlpRmCaApr83g==" crossorigin="anonymous" />
<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">หน้าหลัก</h1>
          </div><!-- /.col -->
         
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
       

                <!-- Small boxes (Stat box) -->
        <div class="row">
          <div class="col-lg-4 col-6">
            <!-- small box -->
            <div class="small-box bg-info">
              <div class="inner">
                <h3>
                  <?php
                 foreach ($Query_mat as $rs){
                   echo $rs->total_stock;
                  }
                ?>
                  
                </h3>

                <p>วัสดุทั้งหมด</p>
              </div>
              <div class="icon">
                <i class="ion ion-bag"></i>
              </div>
              <a href="<?php echo site_url('material_reg');?>" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-4 col-6">
            <!-- small box -->
            <div class="small-box bg-danger">
              <div class="inner">
                <h3>
                  
<?php
                 foreach ($Query_outstock as $rs){
                   echo $rs->total_outstock;
                  }
                ?>

                </h3>

                <p>วัสดุใกล้หมด</p>
              </div>
              <div class="icon">
                <i class="ion ion-stats-bars"></i>
              </div>
              <a href="<?php echo site_url('out_stock');?>" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-4 col-6">
            <!-- small box -->
            <div class="small-box bg-warning">
              <div class="inner">
                <h3>
                  <?php
                 foreach ($Query_member as $rs){
                   echo $rs->total_mem;
                  }
                ?>

                </h3>

                <p>ผู้ใช้งานระบบ</p>
              </div>
              <div class="icon">
                <i class="ion ion-person"></i>
              </div>
              <a href="<?php echo site_url('member');?>" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->


        </div>
        <!-- /.row -->



        <div class="row">
          <div class="col-md-12">
            <div class="card">
              <div class="card-header">
                <h5 class="card-title">ยอดเบิกประจำเดือน</h5>

                <div class="card-tools">
                  
                </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body">

                   <?php
                    $thai= array("\"ม.ค.\"",
                  "\"ก.พ.\"",
                "\"มี.ค\"",
              "\"เม.ย.\"",
            "\"พ.ค.\"",
          "\"มิ.ย.\"",
        "\"ก.ค.\"",
        "\"ส.ค.\"",
        "\"ก.ย.\"",
        "\"ต.ค.\"",
        "\"พ.ย.\"",
        "\"ธ.ค.\""

      );
                    $total_month= array();

                    foreach ($QueryMonth as $row)
                    {
                      //$name_month[]="\"".$row->name_month1."\"";
                      $total_month[]="\"".$row->total_berk_month."\"";
                     
                    }
                  //print_r($thai);
                   $name_month=implode(",",$thai);
                   $total_month=implode(",",$total_month);



                    ?>

                 <canvas id="myChart_month" width="400" height="400"></canvas>
              </div>
              <!-- ./card-body -->
             
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->

        <div class="row">
          <div class="col-md-4">
            <div class="card">
              <div class="card-header">
                <h5 class="card-title">Top 5 ยอดเบิกสะสมแยก ประเภท</h5>


              </div>
              <!-- /.card-header -->
              <div class="card-body">
              


                    <?php

                    $mat_name= array();
                    $mat_total= array();

                    foreach ($Query as $row)
                    {

                      $mat_name[]="\"".$row->mat_name."\"";
                      $mat_total[]="\"".$row->total_ber."\"";
                     
                    }
                  
                  $mat_name=implode(",",$mat_name);
                  $mat_total=implode(",",$mat_total);



                    ?>

                 <canvas id="myPie_mat" style="max-height: 100%; max-width: 100%;"></canvas>

              </div>
              <!-- ./card-body -->
             
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
         <div class="col-md-4">
            <div class="card">
              <div class="card-header">
                <h5 class="card-title">Top 5 ยอดเบิกสะสมแยก วัสดุ </h5>

              </div>
              <!-- /.card-header -->
              <div class="card-body">
   <?php

                    $dname= array();
                    $dtotal= array();

                    foreach ($Query_matdetail as $row)
                    {


                      $dname[]="\"".$row->mat_reg_name."\"";
                      $dtotal[]="\"".$row->total_qty."\"";
                     
                    }
                  
                  $dname=implode(",",$dname);
                   $dtotal=implode(",",$dtotal);



                    ?>
                 <canvas id="myPie_matdetail" style="max-height: 100%; max-width: 100%;"></canvas>

              </div>
              <!-- ./card-body -->
             
            </div>
            <!-- /.card -->
          </div>

          <div class="col-md-4">
            <div class="card">
              <div class="card-header">
                <h5 class="card-title">Top 5 ยอดเบิกสะสมแยก สมาชิก</h5>

              </div>
              <!-- /.card-header -->
              <div class="card-body">

                    <?php

                    $name= array();
                    $total= array();

                    foreach ($Query_mem as $row1)
                    {

                      $stname= $row1->mem_fname.' '.$row1->mem_lname.'( '.$row1->total_member.' )';

                      $name[]="\"".$stname."\"";
                      $total[]="\"".$row1->total_member."\"";
                     
                    }
                  
                  $name=implode(",",$name);
                   $total=implode(",",$total);

              



                    ?>
                 <canvas id="myPie_mem" style="max-height: 100%; max-width: 100%;"></canvas>

              </div>
              <!-- ./card-body -->
             
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->

<script>
var ctx = document.getElementById('myPie_mat').getContext('2d');
var myChart = new Chart(ctx, {
    type: 'pie',
    data: {
        labels: [<?php echo $mat_name;?>],
        datasets: [{

            data: [<?php echo $mat_total;?>],
            backgroundColor: [
                'rgba(255, 99, 132, 0.2)',
                'rgba(54, 162, 235, 0.2)',
                'rgba(255, 206, 86, 0.2)',
                'rgba(75, 192, 192, 0.2)',
                'rgba(153, 102, 255, 0.2)'
            ],
            borderColor: [
                'rgba(255, 99, 132, 1)',
                'rgba(54, 162, 235, 1)',
                'rgba(255, 206, 86, 1)',
                'rgba(75, 192, 192, 1)',
                'rgba(153, 102, 255, 1)'
            ],
            borderWidth: 1,
            borderAlign: 'inner'
        }]
    },
    options: {
         maintainAspectRatio : false,
      responsive : true,

    }
});
</script>
<script>
var ctx = document.getElementById('myPie_matdetail').getContext('2d');
var myChart = new Chart(ctx, {
    type: 'pie',
    data: {
        labels: [<?php echo $dname;?>],
        datasets: [{
            label: '',
            data: [<?php echo $dtotal;?>],
            backgroundColor: [
                'rgba(255, 99, 132, 0.2)',
                'rgba(54, 162, 235, 0.2)',
                'rgba(255, 206, 86, 0.2)',
                'rgba(75, 192, 192, 0.2)',
                'rgba(153, 102, 255, 0.2)'
            ],
            borderColor: [
                'rgba(255, 99, 132, 1)',
                'rgba(54, 162, 235, 1)',
                'rgba(255, 206, 86, 1)',
                'rgba(75, 192, 192, 1)',
                'rgba(153, 102, 255, 1)'
            ],
            borderWidth: 1
        }]
    },
 options: {
         maintainAspectRatio : false,
      responsive : true,

    
    }
});
</script>
<script>
var ctx = document.getElementById('myPie_mem').getContext('2d');
var myChart = new Chart(ctx, {
    type: 'pie',
    data: {
        labels: [<?php echo $name;?>],
        datasets: [{
            label: '',
            data: [<?php echo $total;?>],
            backgroundColor: [
                'rgba(255, 99, 132, 0.2)',
                'rgba(54, 162, 235, 0.2)',
                'rgba(255, 206, 86, 0.2)',
                'rgba(75, 192, 192, 0.2)',
                'rgba(153, 102, 255, 0.2)'
            ],
            borderColor: [
                'rgba(255, 99, 132, 1)',
                'rgba(54, 162, 235, 1)',
                'rgba(255, 206, 86, 1)',
                'rgba(75, 192, 192, 1)',
                'rgba(153, 102, 255, 1)'
            ],
            borderWidth: 1
        }]
    },
 options: {
         maintainAspectRatio : false,
      responsive : true,

    
    }
});
</script>
<script>
var ctx = document.getElementById('myChart_month').getContext('2d');
var myChart = new Chart(ctx, {
    type: 'bar',
    data: {
        labels: [<?php echo $name_month;?>],
        datasets: [{
            label: 'กราฟแสดงจำนวนเบิกในแต่ละเดือน',
            data: [<?php echo $total_month;?>],
            backgroundColor: [
                'rgba(255, 99, 132, 0.2)',
                'rgba(54, 162, 235, 0.2)',
                'rgba(255, 206, 86, 0.2)',
                'rgba(75, 192, 192, 0.2)',
                'rgba(153, 102, 255, 0.2)',
                'rgba(255, 159, 64, 0.2)'
            ],
            borderColor: [
                'rgba(255, 99, 132, 1)',
                'rgba(54, 162, 235, 1)',
                'rgba(255, 206, 86, 1)',
                'rgba(75, 192, 192, 1)',
                'rgba(153, 102, 255, 1)',
                'rgba(255, 159, 64, 1)'
            ],
            borderWidth: 1
        }]
    },
    options: {
               maintainAspectRatio : false,
      responsive : true,
        scales: {
            yAxes: [{
                ticks: {
                    beginAtZero: true
                }
            }]
        }
    }
});
</script>
        
      </div><!--/. container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->