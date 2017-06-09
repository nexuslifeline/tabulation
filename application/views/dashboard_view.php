<html lang="en">

<!-- Mirrored from avenxo.kaijuthemes.com/ui-typography.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 06 Jun 2016 12:09:25 GMT -->
<head>
    <meta charset="utf-8">
    <title>JCORE</title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0, user-scalable=no">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-touch-fullscreen" content="yes">
    <meta name="description" content="Avenxo Admin Theme">
    <meta name="author" content="">


   <?php echo $_def_css_files; ?>

    <link type="text/css" href="assets/plugins/datatables/dataTables.bootstrap.css" rel="stylesheet">
    <link type="text/css" href="assets/plugins/datatables/dataTables.themify.css" rel="stylesheet">


    <style>
    html{
        zoom: 0.8;
        zoom: 80%;
    }

    .toolbar{
        float: left;
    }

    .btn-white {
        background: white none repeat scroll 0 0;
        border: 1px solid #e7eaec;
        color: inherit;
        text-transform: none;
    }

    td.details-control {
        background: url('assets/img/Folder_Closed.png') no-repeat center center;
        cursor: pointer;
    }
    tr.details td.details-control {
        background: url('assets/img/Folder_Opened.png') no-repeat center center;
    }

    .child_table{
        padding: 5px;
        border: 1px #ff0000 solid;
    }

    .glyphicon.spinning {
        animation: spin 1s infinite linear;
        -webkit-animation: spin2 1s infinite linear;
    }

    @keyframes spin {
        from { transform: scale(1) rotate(0deg); }
        to { transform: scale(1) rotate(360deg); }
    }

    @-webkit-keyframes spin2 {
        from { -webkit-transform: rotate(0deg); }
        to { -webkit-transform: rotate(360deg); }
    }

    </style>

    <link rel="stylesheet" type="text/css" href="assets/css/dark-theme.css">

    <style>

        .page-content {
            overflow-x: hidden!important;
        }

        #tbl_po_list {
            color: white!important;
            border: none!important;
        }

        th {
          background: rgba(255, 255, 255, .2)!important;
          border-bottom: 1px solid #525252;
        }

        @media (min-width: 768px){
          .seven-cols .col-md-1,
          .seven-cols .col-sm-1,
          .seven-cols .col-lg-1  {
            width: 100%;
            *width: 100%;
          }
        }

        @media (min-width: 992px) {
          .seven-cols .col-md-1,
          .seven-cols .col-sm-1,
          .seven-cols .col-lg-1 {
            width: 14.285714285714285714285714285714%;
            *width: 14.285714285714285714285714285714%;
          }
        }

        @media (min-width: 1200px) {
          .seven-cols .col-md-1,
          .seven-cols .col-sm-1,
          .seven-cols .col-lg-1 {
            width: 14.285714285714285714285714285714%;
            *width: 14.285714285714285714285714285714%;
          }
        }
    </style>

    <style>
      .v-timeline {
          position: relative;
          padding: 0;
          margin-top: 2em;
          margin-bottom: 2em;
      }
      .vertical-container {
          width: 98%;
          margin: 0 auto;
      }

      .v-timeline::before {
          content: '';
          position: absolute;
          top: 0;
          left: 18px;
          height: 100%;
          width: 4px;
          background: #525252;
      }

      .vertical-timeline-block:first-child {
        margin-top: 0;
      }

      .vertical-timeline-block {
          position: relative;
          margin: 2em 0;
      }

      .vertical-timeline-icon {
          position: absolute;
          top: 0;
          left: 0;
          width: 40px;
          height: 40px;
          border-radius: 50%;
          font-size: 16px;
          border: 1px solid #525252;
          text-align: center;
          background: #525252;
          color: #ffffff;
      }

      .vertical-timeline-icon i {
          display: block;
          width: 24px;
          height: 24px;
          position: relative;
          left: 50%;
          top: 50%;
          margin-left: -12px;
          margin-top: -9px;
      }

      .c-accent {
          color: #f6a821;
      }

      .vertical-timeline-content {
          position: relative;
          margin-left: 60px;
          background-color: rgba(68, 70, 79, 0.5);
          border-radius: 0.25em;
          border: 1px solid #3d404c;
      }

      .vertical-timeline-content:before {
          border-color: transparent;
          border-right-color: #3d404c;
          border-width: 11px;
          margin-top: -11px;
      }

      .vertical-timeline-content:after, .vertical-timeline-content:before {
          right: 100%;
          top: 20px;
          border: solid transparent;
          content: " ";
          height: 0;
          width: 0;
          position: absolute;
          pointer-events: none;
      }

      .p-sm {
          padding: 15px !important;
      }

      .vertical-timeline-content .vertical-date {
          font-weight: 500;
          text-align: right;
      }

      .vertical-timeline-content p {
          margin: 1em 0 0 0;
          line-height: 1.6;
      }

      .vertical-timeline-content:after {
          border-color: transparent;
          border-right-color: #3d404c;
          border-width: 10px;
          margin-top: -10px;
      }

      .vertical-timeline-content:after, .vertical-timeline-content:before {
          right: 100%;
          top: 20px;
          border: solid transparent;
          content: " ";
          height: 0;
          width: 0;
          position: absolute;
          pointer-events: none;
      }

      .vertical-timeline-content:after {
          content: "";
          display: table;
          clear: both;
      }

      .vertical-timeline-content {
          position: relative;
          margin-left: 60px;
          background-color: rgba(68, 70, 79, 0.5);
          border-radius: 0.25em;
          border: 1px solid #3d404c;
      }

      .vertical-timeline-block:after {
          content: "";
          display: table;
          clear: both;
      }

      .vertical-container::after {
          content: '';
          display: table;
          clear: both;
      }

      .v-timeline {
          position: relative;
          padding: 0;
          margin-top: 2em;
          margin-bottom: 2em;
      }

      .vertical-container {
          width: 98%;
          margin: 0 auto;
      }

      #style-1::-webkit-scrollbar-track
      {
        -webkit-box-shadow: inset 0 0 6px rgba(0,0,0,0.3);
        border-radius: 10px;
        background-color: transparent;
      }

      #style-1::-webkit-scrollbar
      {
        width: 10px;
        border-radius: 11px;
        background-color: transparent;
      }

      #style-1::-webkit-scrollbar-thumb
      {
        border-radius: 10px;
        -webkit-box-shadow: inset 0 0 6px rgba(0,0,0,.3);
        background-color: #555;
      }
    </style>

</head>

<body class="animated-content" style="font-family: tahoma;">

<?php echo $_top_navigation; ?>

<div id="wrapper">
        <div id="layout-static">
        <?php echo $_side_bar_navigation; ?>
        <div class="static-content-wrapper">
            <div class="static-content">
                    <div class="page-content"><!-- #page-content -->

                    </div> <!-- #page-content -->
            </div>


            <?php echo $_footer; ?>

        </div>
        </div>


</div>


<?php echo $_switcher_settings; ?>
<?php echo $_def_js_files; ?>

<!-- Sparkline -->
<script src="assets/plugins/sparkline/jquery.sparkline.min.js"></script>

<!-- CHART -->
<script src="assets/plugins/chartJs/Chart.min.js"></script>

<!-- DATATABLE -->
<script type="text/javascript" src="assets/plugins/datatables/jquery.dataTables.js"></script>
<script type="text/javascript" src="assets/plugins/datatables/dataTables.bootstrap.js"></script>




</body>

</html>