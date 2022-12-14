@extends('layouts.backend')

@section('css_before')
<!-- Page JS Plugins CSS -->

@endsection

@push('js_after')
<!-- jQuery (required for DataTables plugin) -->
<script src="{{ asset('js/lib/jquery.min.js') }}"></script>

<!-- Page JS Plugins -->

<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet">
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.3.1/css/all.min.css" rel="stylesheet">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
 <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.js"></script>
 <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script> 
</head>
<!-- Page JS Code -->
@endpush

@section('content')
<!-- Page Content -->
<style>
    h2,
    h4,
    .h2,
    .h4 {
        font-family: inherit;
        font-weight: 600;
        line-height: 1.5;
        margin-bottom: .5rem;
        color: #32325d;
    }

    h4,
    .h4 {
        font-size: .8125rem;
    }

    @media (min-width: 992px) {

        .col-lg-6 {
            max-width: 50%;
            flex: 0 0 50%;
        }
    }

    @media (min-width: 1200px) {

        .col-xl-3 {
            max-width: 25%;
            flex: 0 0 25%;
        }

        .col-xl-6 {
            max-width: 50%;
            flex: 0 0 50%;
        }
    }


    .bg-danger {
        background-color: #f5365c !important;
    }



    @media (min-width: 1200px) {

        .justify-content-xl-between {
            justify-content: space-between !important;
        }
    }


    .pt-5 {
        padding-top: 3rem !important;
    }

    .pb-8 {
        padding-bottom: 8rem !important;
    }

    @media (min-width: 768px) {

        .pt-md-8 {
            padding-top: 8rem !important;
        }
    }

    @media (min-width: 1200px) {

        .mb-xl-0 {
            margin-bottom: 0 !important;
        }
    }




    .font-weight-bold {
        font-weight: 600 !important;
    }


    a.text-success:hover,
    a.text-success:focus {
        color: #24a46d !important;
    }

    .text-warning {
        color: #fb6340 !important;
    }

    a.text-warning:hover,
    a.text-warning:focus {
        color: #fa3a0e !important;
    }

    .text-danger {
        color: #f5365c !important;
    }

    a.text-danger:hover,
    a.text-danger:focus {
        color: #ec0c38 !important;
    }

    .text-white {
        color: #fff !important;
    }

    a.text-white:hover,
    a.text-white:focus {
        color: #e6e6e6 !important;
    }

    .text-muted {
        color: #8898aa !important;
    }

    @media print {

        *,
        *::before,
        *::after {
            box-shadow: none !important;
            text-shadow: none !important;
        }

        a:not(.btn) {
            text-decoration: underline;
        }

        p,
        h2 {
            orphans: 3;
            widows: 3;
        }

        h2 {
            page-break-after: avoid;
        }

        @ page {
            size: a3;
        }

        body {
            min-width: 992px !important;
        }
    }

    figcaption,
    main {
        display: block;
    }

    main {
        overflow: hidden;
    }

    .bg-yellow {
        background-color: #ffd600 !important;
    }






    .icon {
        width: 3rem;
        height: 3rem;
    }

    .icon i {
        font-size: 2.25rem;
    }

    .icon-shape {
        display: inline-flex;
        padding: 12px;
        text-align: center;
        border-radius: 50%;
        align-items: center;
        justify-content: center;
    }
</style>

<body class="bg-default">
    <div class="main-content">
        <h2 class="text-center" style="margin-top: 15px;font-size: 30px;"><code>Violences</code></h2>

        <br>
        <div class="container-fluid">
            <div class="header-body">

                <div class="row">
                    <div class="col-xl-12 col-lg-12">
                      <!--  <div class="card card-stats mb-4 mb-xl-0">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col">
                                        <h4 class="card-title text-uppercase text-muted mb-0">Physique</h4>
                                        <span class="h2 font-weight-bold mb-0"></span>
                                    </div>
                                    <div class="col-auto">
                                        <div class="  text-white rounded-circle shadow">
                                            <img class="profile-user-img img-fluid img "
                                                src="{{asset('images/violence-physique.png')}}" alt="avatar"
                                                style="width: 50px;">
                                        </div>
                                    </div>
                                </div>
                                <p class="mt-3 mb-0 text-muted text-sm">
                                
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-6">
                        <div class="card card-stats mb-4 mb-xl-0">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col">
                                        <h4 class="card-title text-uppercase text-muted mb-0">Psychologique</h4>
                                        <span class="h2 font-weight-bold mb-0"></span>
                                    </div>
                                    <div class="col-auto">
                                        <div class="  text-white rounded-circle shadow">
                                            <img class="profile-user-img img-fluid img "
                                                src="{{asset('images/anxiety.png')}}" alt="avatar" style="width: 50px;">
                                        </div>
                                    </div>
                                </div>
                                <p class="mt-3 mb-0 text-muted text-sm">
                              
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-6">
                        <div class="card card-stats mb-4 mb-xl-0">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col">
                                        <h4 class="card-title text-uppercase text-muted mb-0">Economique</h4>
                                        <span class="h2 font-weight-bold mb-0"></span>
                                    </div>
                                    <div class="col-auto">
                                        <div class="  text-white rounded-circle shadow">
                                            <img class="profile-user-img img-fluid img "
                                                src="{{asset('images/pay.png')}}" alt="avatar" style="width: 50px;">
                                        </div>
                                    </div>
                                </div>
                                <p class="mt-3 mb-0 text-muted text-sm">
                               
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-6">
                        <div class="card card-stats mb-4 mb-xl-0">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col">
                                        <h4 class="card-title text-uppercase text-muted mb-0">Verbale</h4>
                                        <span class="h2 font-weight-bold mb-0"></span>
                                    </div>
                                    <div class="col-auto">
                                        <div class="  text-white rounded-circle shadow">
                                            <img class="profile-user-img img-fluid img "
                                                src="{{asset('images/curse.png')}}" alt="avatar" style="width: 50px;">
                                        </div>
                                    </div>
                                </div>
                                <p class="mt-3 mb-0 text-muted text-sm">
                                   
                                </p>
                            </div>
                        </div>
                    </div>
                    <br>
                    <br>
                    <div class="col-xl-3 col-lg-6">
                        <div class="card card-stats mb-4 mb-xl-0">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col">
                                        <h4 class="card-title text-uppercase text-muted mb-0">Harcelement</h4>
                                        <span class="h2 font-weight-bold mb-0"></span>
                                    </div>
                                    <div class="col-auto">
                                        <div class="  text-white rounded-circle shadow">
                                            <img class="profile-user-img img-fluid img "
                                                src="{{asset('images/sexual-harassment .png')}}" alt="avatar"
                                                style="width: 50px;">
                                        </div>
                                    </div>
                                </div>
                                <p class="mt-3 mb-0 text-muted text-sm">
                                
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-6">
                        <div class="card card-stats mb-4 mb-xl-0">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col">
                                        <h4 class="card-title text-uppercase text-muted mb-0">Sexuelle</h4>
                                        <span class="h2 font-weight-bold mb-0"></span>
                                    </div>
                                    <div class="col-auto">
                                        <div class="  text-white rounded-circle shadow">
                                            <img class="profile-user-img img-fluid img "
                                                src="{{asset('images/sexual.png')}}" alt="avatar" style="width: 50px;">
                                        </div>
                                    </div>
                                </div>
                                <p class="mt-3 mb-0 text-muted text-sm">
                       
                                </p>
                            </div>
                        </div>
                    </div>
                                        -->

                            <div class="chart-container">
                                <div class="pie-chart-container">
                                <canvas id="pie-chart"></canvas>
                                </div>
                            </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Page content -->
    </div>


    </head>



<!--<div id="piechart_3d" style="width: 900px; height: 500px;"></div>-->

</body>
@endsection

@push("script")


    <script type="text/javascript">
    /*  google.charts.load("current", {packages:["corechart"]});
      google.charts.setOnLoadCallback(drawChart);
      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ['Task', 'Hours per Day'],
         <?php
        //    echo $stats
            ?>
        ]);

        var options = {
          title: 'Les statistiques des types de violences',
          is3D: true,
        };

        var chart = new google.visualization.PieChart(document.getElementById('piechart_3d'));
        chart.draw(data, options);
      }*/


  $(function(){
      //get the pie chart canvas
      var cData = JSON.parse(`<?php echo $chart_data; ?>`);
      console.log(cData);
      var ctx = $("#pie-chart");
 
      //pie chart data
      var data = {
        labels: cData.label,
        datasets: [
          {
            label: "Violence Count",
            data: cData.data,
            backgroundColor: [
              "#DEB887",
              "#A9A9A9",
              "#DC143C",
              "#F4A460",
              "#2E8B57",
              "#1D7A46",
              "#CDA776",
            ],
            borderColor: [
              "#CDA776",
              "#989898",
              "#CB252B",
              "#E39371",
              "#1D7A46",
              "#F4A460",
              "#CDA776",
            ],
            borderWidth: [1, 1, 1, 1, 1,1,1]
          }
        ]
      };
 
      //options
      var options = {
        responsive: true,
        title: {
          display: true,
          position: "top",
          text: "Nombre des violence",
          fontSize: 18,
          fontColor: "#111"
        },
        legend: {
          display: true,
          position: "bottom",
          labels: {
            fontColor: "#333",
            fontSize: 16
          }
        }
      };
 
      //create Pie Chart class object
      var chart1 = new Chart(ctx, {
        type: "pie",
        data: data,
        options: options
      });
 
  });

 </script>

@endpush
