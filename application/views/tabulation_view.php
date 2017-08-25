<!DOCTYPE html>

<html lang="en">

<head>

    <meta charset="utf-8">

    <title>JCORE - <?php echo $title; ?></title>

    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0, user-scalable=no">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-touch-fullscreen" content="yes">
    <meta name="description" content="Avenxo Admin Theme">
    <meta name="author" content="">

    <?php echo $_def_css_files; ?>

    <link rel="stylesheet" href="assets/plugins/spinner/dist/ladda-themeless.min.css">


    <link type="text/css" href="assets/plugins/datatables/dataTables.bootstrap.css" rel="stylesheet">
    <link type="text/css" href="assets/plugins/datatables/dataTables.themify.css" rel="stylesheet">


    <style>
        html{
            zoom: 0.82;
            zoom: 82%;
        }
    </style>

    <link href="assets/css/dark-theme.css" rel="stylesheet">

    <?php echo $_switcher_settings; ?>
    <style>

        .toolbar{
            float: left;
            margin-bottom: 0px !important;
            padding-bottom: 0px !important;
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
        .select2-container{
            min-width: 100%;
        }
        @keyframes spin {
            from { transform: scale(1) rotate(0deg); }
            to { transform: scale(1) rotate(360deg); }
        }

        @-webkit-keyframes spin2 {
            from { -webkit-transform: rotate(0deg); }
            to { -webkit-transform: rotate(360deg); }
        }

        /* .container-fluid {
             padding: 0 !important;
         }

         .panel-body {
             padding: 0 !important;
         }*/



    </style>
</head>

<body class="animated-content" style="font-family: tahoma;">

<?php echo $_top_navigation; ?>

<div id="wrapper">
    <div id="layout-static">

        <?php echo $_side_bar_navigation;?>

        <div class="static-content-wrapper white-bg">
            <div class="static-content"  >
                <div class="page-content"><!-- #page-content -->

                    <br />

                    <div class="container-fluid">
                        <div data-widget-group="group1">
                            <div class="row">
                                <div class="col-md-12">
                                    <div id="div_product_list">
                                        <div class="panel panel-default">
                                            <div class="panel-heading">
                                                <b style="color: white; font-size: 12pt;"><i class="fa fa-bars"></i>&nbsp; Candidates</b>
                                            </div>
                                            <div class="panel-body table-responsive">
                                                 <table id="tbl_candidates" class="" cellspacing="0" width="100%">
                                                    <thead class="">
                                                        <tr>
                                                            <th width="15%">Photo</th>
                                                            <th width="85%"></th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <?php foreach($candidates as $c){ ?>
                                                        <tr>
                                                            <td align="center" valign="top"><img src="<?php echo $c->photo_path; ?>" width="70%" width="70%" style="border: 1px solid black;"></td>
                                                            <td valign="top">
                                                                <span>Candidate : </span> <b><?php echo $c->candidate_name; ?></b><br />
                                                                <span>Age : </span> <b>21 y/o</b><br />
                                                                <span>Nationality : </span> <b><?php echo $c->nationality; ?></b><br />
                                                                <span>Address : </span> <b><?php echo $c->address; ?></b><br />
                                                                <br />
                                                                <table id="tbl_scores" class="" cellspacing="0" width="100%">
                                                                    <thead>
                                                                        <tr>
                                                                            <th width="40%">Criteria</th>
                                                                            <th width="20%">Percentage</th>
                                                                            <th width="20%">Max Score Allowed</th>
                                                                            <th width="20%">Score</th>
                                                                        </tr>
                                                                    </thead>
                                                                    <tbody>

                                                                        <?php foreach($criterias as $r){ ?>
                                                                        <tr data-contestant-id="<?php echo $c->contestant_id; ?>" data-event-id="<?php echo $active_event_id; ?>" data-criteria-id="<?php echo $r->criteria_id; ?>" data-judge-id="<?php echo $this->session->user_id; ?>">
                                                                            <td><?php echo $r->criteria; ?></td>
                                                                            <td><?php echo $r->percentage; ?></td>
                                                                            <td><?php echo $r->max_score; ?></td>
                                                                            <td><input type="number" class="form-control txt_candidate_score" style="text-align: right;" value="<?php  foreach ($contestant_scores as $cs){
                                                                                   echo ( $cs->criteria_id == $r->criteria_id && $cs->contestant_id == $c->contestant_id ? $cs->score : '' );
                                                                                } ?>" data-max="<?php echo $r->max_score; ?>"></td>
                                                                        </tr>
                                                                        <?php } ?>

                                                                    </tbody>
                                                                    <tfoot>
                                                                        <tr>
                                                                            <td colspan="3" align="right"><b>Current Rating : </b></td>
                                                                            <td colspan="1" align="center"><b>89%</b></td>
                                                                        </tr>
                                                                    </tfoot>
                                                                </table>

                                                                <br />
                                                                <button class="btn btn-primary btn_finalize">Submit and Finalize</button><br /><br />
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

            <div id="modal_confirmation" class="modal fade" tabindex="-1" role="dialog"><!--modal-->
                <div class="modal-dialog modal-sm">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close"   data-dismiss="modal" aria-hidden="true">X</button>
                            <h4 class="modal-title"  style="color:white;"><span id="modal_mode"> </span>Confirm Finalize</h4>
                        </div>

                        <div class="modal-body">
                            <p id="modal-body-message">Are you sure you want to finalize the candidate score?</p>
                        </div>

                        <div class="modal-footer">
                            <button id="btn_yes" type="button" class="btn btn-danger" data-dismiss="modal">Finalize</button>
                            <button id="btn_close" type="button" class="btn btn-default" data-dismiss="modal">No</button>
                        </div>
                    </div>
                </div>
            </div><!---modal-->

            <?php echo $_footer; ?>

        </div>
    </div>
</div>

<?php echo $_def_js_files; ?>


<script type="text/javascript" src="assets/plugins/datatables/jquery.dataTables.js"></script>
<script type="text/javascript" src="assets/plugins/datatables/dataTables.bootstrap.js"></script>


<!-- numeric formatter -->
<script src="assets/plugins/formatter/autoNumeric.js" type="text/javascript"></script>
<script src="assets/plugins/formatter/accounting.js" type="text/javascript"></script>


<script>

    $(document).ready(function(){
        var dt; var _txnMode; var _selectedID; var _selectRowObj; var _selectedProductType; var _files;

        var initializeControls=function() {
                $('#tbl_candidates').DataTable();


        }();



        var bindEventHandlers=(function(){

           $('.btn_finalize').click(function(){
                $('#modal_confirmation').modal('show');
           });

           $('.txt_candidate_score').keyup(function(){

                var row = $(this).closest('tr');
                var event_id = row.data('event-id');
                var criteria_id = row.data('criteria-id');
                var contestant_id = row.data('contestant-id');
                var judge_id = row.data('judge-id');
                var score = getFloat($(this).val());
                var vmax = getFloat($(this).data('max'));

                if(score>vmax){
                    showNotification({"title":"Error","msg":"Invalid score, max number is "+vmax+".","type":"error"});
                    $(this).val('');
                    return;
                }

                var _data = [];
               _data.push({name : "event-id" , value : event_id });
               _data.push({name : "criteria-id" , value : criteria_id });
               _data.push({name : "judge-id" , value : judge_id });
               _data.push({name : "score" , value : score });
               _data.push({name : "contestant-id" , value : contestant_id });

               $.ajax({
                   "dataType":"json",
                   "type":"POST",
                   "url":"Tabulation/transaction/create",
                   "data":_data,
                   "beforeSend": showSpinningProgress($('#btn_save'))
               });
               
           });


        })();



        var showNotification=function(obj){
            PNotify.removeAll();
            new PNotify({
                title:  obj.title,
                text:  obj.msg,
                type:  obj.stat
            });
        };

        var showSpinningProgress=function(e){
            $(e).find('span').toggleClass('glyphicon glyphicon-refresh spinning');
        };


        var getFloat=function(f){
            return parseFloat(accounting.unformat(f));
        };




    });

</script>


</body>

</html>