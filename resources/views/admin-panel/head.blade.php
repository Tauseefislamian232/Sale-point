 <head>

     <meta charset="utf-8" />
     <meta name="csrf-token" content="{{ csrf_token() }}">
     <title>Dashboard | POS - Admin & Dashboard </title>
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <meta content="Premium Multipurpose Admin & Dashboard Template" name="description" />
     <meta content="Themesbrand" name="author" />
     <!-- App favicon -->

     <link rel="shortcut icon" href="{{ asset('assets/images/favicon.ico') }}">
     <link href="{{ asset('assets/libs/datatables.net-bs4/css/dataTables.bootstrap4.min.css') }}" rel="stylesheet"
         type="text/css" />
     <link href="{{ asset('assets/libs/datatables.net-buttons-bs4/css/buttons.bootstrap4.min.css') }}" rel="stylesheet"
         type="text/css" />

     <!-- Responsive datatable examples -->
     <link href="{{ asset('assets/libs/datatables.net-responsive-bs4/css/responsive.bootstrap4.min.css') }}"
         rel="stylesheet" type="text/css" />
     <!-- Bootstrap Css -->
     <link href="{{ asset('assets/css/bootstrap.min.css') }}" id="bootstrap-style" rel="stylesheet" type="text/css" />
     <!-- Icons Css -->
     <link href="{{ asset('assets/css/icons.min.css') }}" rel="stylesheet" type="text/css" />
     <!-- App Css-->
     <link href="{{ asset('assets/css/app.min.css') }}" id="app-style" rel="stylesheet" type="text/css" />

     <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

     <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
     <script src="http://code.jquery.com/jquery-1.11.1.js"></script>
     <!------ Include the above in your HEAD tag ---------->

     {{-- toastr cdn --}}
     <link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.1.4/toastr.css" rel="stylesheet" type="text/css">

     {{-- tabs --}}
     {{-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css"> --}}
     <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
     <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js"></script>

     {{-- cart system --}}
     {{-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"> --}}
     <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
     <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
     <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
     <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>

     <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.7.0/animate.min.css">


     <style>
         .bs-example {
             margin: 20px;
         }
     </style>

     {{-- <style>
         #admin-img {
             margin-left: 10px;
             border-radius: 50px;
             border: 2px solid rgb(207, 199, 199);
         }

         #modal_close {
             margin-left: 10px;
             padding: 5px 15px;
         }

         #modal_submit {
             padding: 5px 15px;
         }

         #myform {
             text-align: center;
             /* padding: 5px; */
             /* border: 1px dotted #ccc; */
             margin: 1%;
         }

         .qty_upper {
             width: 50px;
             height: 28px;
             text-align: center;
             font-weight: bold;
             background-color: rgb(240, 233, 233);

         }

         input.qtyplus {
             width: 25px;
             height: 28px;
             font-weight: bold;
         }

         input.qtyminus {
             width: 25px;
             height: 28px;
             font-weight: bold;
         }

         #qty_down {

            animation: none !important;
            overflow: hidden;
            
         }
     </style> --}}


 </head>
