@extends('layout.master')
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Products Page - Dashboard Template</title>
    <!--

    Template 2108 Dashboard

	http://www.tooplate.com/view/2108-dashboard

    -->

    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600">
    <!-- https://fonts.google.com/specimen/Open+Sans -->
    <!-- <link rel="stylesheet" href=""> -->
    {{ HTML::style('ass/assets/css/fontawesome.min.css') }}
    <!-- https://fontawesome.com/ -->
    <!-- <link rel="stylesheet" href=""> -->
    {{ HTML::style('ass/assets/css/bootstrap.min.css') }}
    <!-- https://getbootstrap.com/ -->
    <!-- <link rel="stylesheet" href=""> -->
    {{ HTML::style('assets/css/tooplate.css') }}
    {{ HTML::style('assets/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css') }}
</head>

<body id="reportsPage" class="bg02">
    <div class="" id="home">
        <div class="container">
            <div class="row">
                <div class="col-12">

            </div>
            <!-- row -->
            <div class="row tm-content-row tm-mt-big">
                <div class="col-xl-8 col-lg-12 tm-md-12 tm-sm-12 tm-col">
                    <div class="bg-white tm-block h-100">

                        <div class="table-responsive">
                            <table class="table table-hover table-striped tm-table-striped-even mt-3">
                                <thead>
                                    <tr class="tm-bg-gray">
                                        <th scope="col">&nbsp;</th>
                                        <th scope="col">Product Name</th>
                                        <th scope="col" class="text-center">Units Sold</th>
                                        <th scope="col" class="text-center">In Stock</th>
                                        <th scope="col">Expire Date</th>
                                        <th scope="col">&nbsp;</th>
                                    </tr>
                                </thead>
                                <tbody>

                                </tbody>
                            </table>
                        </div>


                    </div>
                </div>


            </div>
            <footer class="row tm-mt-small">
                <div class="col-12 font-weight-light">
                    <p class="d-inline-block tm-bg-black text-white py-2 px-4">
                        Copyright &copy; 2018. Created by
                        <a href="http://www.tooplate.com" class="text-white tm-footer-link">Tooplate</a> |  Distributed by <a href="https://themewagon.com" class="text-white tm-footer-link">ThemeWagon</a>
                    </p>
                </div>
            </footer>
        </div>
    </div>
    <!-- <script src=""></script> -->
    {{ HTML::script('ass/assets/js/jquery-3.3.1.min.js') }}
    <!-- https://jquery.com/download/ -->
    <!-- <script src=""></script> -->
    {{ HTML::script('ass/assets/js/bootstrap.min.js') }}
    <!-- https://getbootstrap.com/ -->


<!-- <script src="../../"></script> -->

{{ HTML::script('assets/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js') }}<script>

$(function () {
$('#example1').DataTable()
$('#example2').DataTable({
  'paging'      : true,
  'lengthChange': false,
  'searching'   : false,
  'ordering'    : true,
  'info'        : true,
  'autoWidth'   : false
})
})
</script>


</html>
