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

    span{
        color : white;
        line-height: 150%;
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
                        <div class="container-fluid">
                            <div data-widget-group="group1">
                                <div class="row">
                                    <div class="col-md-12">
                                        <br /> <br />
                                        <div id="div_product_list">
                                            <div class="panel panel-default">
                                                <div class="panel-heading">
                                                    <b style="color: white; font-size: 12pt;"><i class="fa fa-bars"></i>&nbsp; <?php echo $event_description.($is_voting_closed?'-[<b style="color:red;">VOTING IS CLOSED</b>]':''); ?> </b>
                                                </div>
                                                <div class="panel-body table-responsive">
                                                    <table id="tbl_votes" class="" cellspacing="0" width="100%">
                                                        <thead class="">
                                                        <tr>
                                                            <th width="15%">Photo</th>
                                                            <th width="85%"></th>
                                                        </tr>
                                                        </thead>
                                                        <tbody>
                                                        <?php foreach($candidates as $c){ ?>
                                                            <tr>
                                                                <td align="center" valign="top">
                                                                    <img src="<?php echo $c->photo_path; ?>" width="70%" width="70%" style="border: 1px solid black;">
                                                                    <br />
                                                                    <span></span> <b><?php echo ( $c->contestant_no != '' ? '#'.$c->contestant_no.' ' : '' ).$c->entity_name; ?></b><br /><br />
                                                                    <button class="btn btn-<?php echo ($disabled?'default':'primary'); ?> btn_vote <?php echo ($disabled?'disabled':''); ?>" data-voter-id="<?php echo $this->session->user_id; ?>" data-event-id="<?php echo $active_event_id; ?>"  data-contestant-id="<?php echo $c->contestant_id; ?>"><i class="fa fa-star" style="color:yellow;display: <?php echo ($voted_contestant==$c->contestant_id?'inline-block':'none'); ?>;"></i> Vote</button><br /><br />

                                                                </td>
                                                                <td valign="top">
                                                                    <i class="fa fa-star" style="color:yellow;"></i>
                                                                    <i class="fa fa-star" style="color:yellow;"></i>
                                                                    <i class="fa fa-star" style="color:yellow;"></i>
                                                                    <i class="fa fa-star" style="color:yellow;"></i>
                                                                    <i class="fa fa-star" style="color:yellow;"></i>
                                                                    <br />
                                                                    <span style="display: none;"><span id="span_contestant_vote_<?php echo $c->contestant_id; ?>">0</span> out of <span id="span_total_vote_<?php echo $c->contestant_id; ?>">0</span></span>
                                                                    <br /><br /><br />

                                                                    <span>Desciption 1 : </span> <b><?php echo $c->desc_1; ?></b><br />
                                                                    <span>Desciption 2 : </span> <b><?php echo $c->desc_2; ?></b><br />
                                                                    <span>Desciption 3 : </span> <b><?php echo $c->desc_3; ?></b><br />
                                                                    <br />
                                                                    </td>
                                                            </tr>
                                                        <?php } ?>
                                                        </tbody>
                                                    </table>
                                                </div>
                                                <div class="panel-footer"></div>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div> <!-- .container-fluid -->
                    </div> <!-- #page-content -->
            </div>


            <?php echo $_footer; ?>

        </div>
        </div>

    <div id="modal_confirmation" class="modal fade" tabindex="-1" role="dialog"><!--modal-->
        <div class="modal-dialog modal-sm">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close"   data-dismiss="modal" aria-hidden="true">X</button>
                    <h4 class="modal-title"><span id="modal_mode"> </span>Confirmation</h4>
                </div>

                <div class="modal-body">
                    <p id="modal-body-message">Are you sure ?</p>
                </div>

                <div class="modal-footer">
                    <button id="btn_yes" type="button" class="btn btn-danger" data-dismiss="modal">Yes</button>
                    <button id="btn_close" type="button" class="btn btn-default" data-dismiss="modal">No</button>
                </div>
            </div>
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

<script>
    $(document).ready(function(){


        var bindEventHandlers = function(){
            var event_id; var contestant_id; var voter_id; var btnVoteSelected;

            $('#btn_yes').click(function(){

                var data = [];
                data.push({"name" : "event_id" , "value" : event_id});
                data.push({"name" : "contestant_id" , "value" : contestant_id});
                data.push({"name" : "voter_id" , "value" : voter_id});

                $.ajax({
                    "dataType":"json",
                    "type":"POST",
                    "url":"Voters/transaction/vote",
                    "data":data,
                    "beforeSend": function(){

                    }
                }).done(function(response){
                    showNotification(response);
                    if(response.stat=='success'){
                        disableVoteButton();
                        btnVoteSelected.find('i').css('color','yellow').css('display','inline-block');
                    }else{
                        if(response.is_voting_closed=='1'){
                            alert("Page will be reloaded.");
                            window.reload();
                        }
                    }
                });

            });

            $('.btn_vote').click(function(){
                btnVoteSelected = $(this);
                event_id = $(this).data('event-id');
                contestant_id = $(this).data('contestant-id');
                voter_id = $(this).data('voter-id');
                $('#modal_confirmation').modal('show');
            });

        }();



        var disableVoteButton = function(  ){
            /*var rows = $('#tbl_votes').find('tbody').find('tr');

            rows.each(function( row , i ){
                row.find()
            });*/

            $('button.btn_vote').removeClass('btn-primary');
            $('button.btn_vote').addClass('disabled');
            $('button.btn_vote').addClass('btn-default');
        };

        setInterval(function(){
            var active_event_id = <?php echo ($active_event_id); ?>;
            $.ajax({
                "dataType":"json",
                "type":"GET",
                "url":"Tabulation/transaction/get-votes?event_id=" + active_event_id
            }).done(function(response){
                if( response.length > 0 ){
                    $.each(response, function(e , v){
                        //console.log(v.contestant_id);
                        $('#span_contestant_vote_'+v.contestant_id).html(v.contestant_vote);
                        $('#span_total_vote_'+v.contestant_id).html(v.total_voters);
                    });
                }
            });
        },1000);


        var showNotification=function(obj){
            PNotify.removeAll(); //remove all notifications
            new PNotify({
                title:  obj.title,
                text:  obj.msg,
                type:  obj.stat
            });
        };

    });
</script>




</body>

</html>