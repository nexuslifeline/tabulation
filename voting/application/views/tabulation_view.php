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
                                                <b style="color: white; font-size: 12pt;"><i class="fa fa-bars"></i>&nbsp; Tabulation</b>
                                            </div>
                                            <div class="panel-body table-responsive">
                                                 <table id="tbl_tabulation" class="" cellspacing="0" width="100%">
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
                                                                <span></span> <b><?php echo $c->entity_name; ?></b><br />
                                                                <span></span> <b><?php echo $c->desc_1; ?></b><br />
                                                                <span></span> <b><?php echo $c->desc_2; ?></b><br />
                                                                <span></span> <b><?php echo $c->desc_3; ?></b><br />
                                                            </td>
                                                            <td valign="top">


                                                                <table id="tbl_scores_<?php echo $c->contestant_id; ?>" class="" cellspacing="0" width="100%">
                                                                    <thead>
                                                                        <tr>
                                                                            <th width="40%">Criteria</th>
                                                                            <th width="20%">Percentage</th>
                                                                            <th width="20%">Max Score Allowed</th>
                                                                            <th width="20%">Score</th>
                                                                            <th width="20%">Rating</th>
                                                                        </tr>
                                                                    </thead>
                                                                    <tbody>

                                                                        <?php $percent = 0;  $current_contestant_total = 0; foreach($criterias as $r){ ?>
                                                                        <tr data-contestant-id="<?php echo $c->contestant_id; ?>" data-percentage="<?php echo $r->percentage; ?>" data-event-id="<?php echo $active_event_id; ?>" data-criteria-id="<?php echo $r->criteria_id; ?>" data-judge-id="<?php echo $this->session->user_id; ?>">
                                                                            <td><?php echo $r->criteria; ?></td>
                                                                            <td align="right"><?php echo $r->percentage; $percent += $r->percentage; ?></td>
                                                                            <td align="right"><?php echo ($r->criteria_id==1?'NA':$r->max_score); ?></td>
                                                                            <td><input type="number" class="form-control txt_candidate_score" style="text-align: right;" value="<?php  $criteria_rating = 0; foreach ($contestant_scores as $cs){
                                                                                   //echo ( $cs->criteria_id == $r->criteria_id && $cs->contestant_id == $c->contestant_id ? $cs->score : '' );
                                                                                   if($cs->criteria_id == $r->criteria_id && $cs->contestant_id == $c->contestant_id){
                                                                                        echo $cs->score;
                                                                                       $criteria_rating = $cs->score / $r->max_score  * $r->percentage;
                                                                                       $current_contestant_total += $criteria_rating;
                                                                                   }else{
                                                                                       echo '';
                                                                                   }
                                                                                } ?>" data-max="<?php echo $r->max_score; ?>" <?php echo($c->is_submitted?'readonly':''); ?>></td>
                                                                            <td data-line-rate="" align="center"><?php echo $criteria_rating; ?>%</td>
                                                                        </tr>
                                                                        <?php } ?>

                                                                    </tbody>
                                                                    <tfoot>
                                                                        <tr>
                                                                            <td colspan="1" align="right"><b>Total Percentage : </b></td>
                                                                            <td colspan="1" align="center"><b><?php echo $percent; ?></b></td>
                                                                            <td colspan="1" align="right"><b>Total Rating : </b></td>
                                                                            <td colspan="1" align="center"><h4 class="total_rating"><?php echo $current_contestant_total; ?>%</h4></td>
                                                                        </tr>
                                                                    </tfoot>
                                                                </table>

                                                                <br />
                                                                <button class="btn btn-<?php echo($c->is_submitted?'default':'primary'); ?> btn_finalize" <?php echo($c->is_submitted?'disabled':''); ?>  data-judge-id="<?php echo $this->session->user_id; ?>" data-event-id="<?php echo $active_event_id; ?>" data-contestant-id="<?php echo $c->contestant_id; ?>">Submit and Finalize</button><br /><br />
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
        var objFinalize = {};

        var initializeControls=function() {
                $('#tbl_tabulation').DataTable();


        }();



        var bindEventHandlers=(function(){



           $('.btn_finalize').click(function(){
                objFinalize.event_id = $(this).data('event-id');
                objFinalize.contestant_id = $(this).data('contestant-id');
                objFinalize.judge_id = $(this).data('judge-id');

                $('#modal_confirmation').modal('show');
           });

           $('#btn_yes').click(function(){
               //console.log(objFinalize);

               $.ajax({
                   "dataType":"json",
                   "type":"POST",
                   "url":"Tabulation/transaction/mark-submitted",
                   "data":objFinalize,
                   "beforeSend": showSpinningProgress($('#btn_save'))
               }).done(function(response){
                    showNotification(response);
               });
           });

           $('.txt_candidate_score').keyup(function(){

                var row = $(this).closest('tr');
                var event_id = row.data('event-id');
                var criteria_id = row.data('criteria-id');
                var contestant_id = row.data('contestant-id');
                var judge_id = row.data('judge-id');
                var percentage = row.data('percentage');
                var score = getFloat($(this).val());
                var vmax = getFloat($(this).data('max'));
                var line_rate = (score / vmax) * percentage;

                row.find('td').eq(4).text(line_rate + "%");
                row.find('td').eq(4).attr('data-line-rate',line_rate);
                //row.find('td').eq(4).find('input').val(line_rate);

                if(score>vmax){
                    showNotification({"title":"Error","msg":"Invalid score, max number is "+vmax+".","type":"error"});
                    row.find('td').eq(4).html("");
                    row.find('td').eq(4).attr('data-line-rate',0);
                    $(this).val('');
                    return;
                }

               reComputeTotalRating($('#tbl_scores_'+contestant_id));

                var _data = [];
               _data.push({name : "event-id" , value : event_id });
               _data.push({name : "criteria-id" , value : criteria_id });
               _data.push({name : "judge-id" , value : judge_id });
               _data.push({name : "score" , value : score });
               _data.push({name : "contestant-id" , value : contestant_id });
               _data.push({name : "line_rate" , value : line_rate});

               $.ajax({
                   "dataType":"json",
                   "type":"POST",
                   "url":"Tabulation/transaction/create",
                   "data":_data,
                   "beforeSend": showSpinningProgress($('#btn_save'))
               }).done(function(response){
                    if( response != undefined ){
                        showNotification(response);
                    }
               });
               
           });


        })();


        var reComputeTotalRating =  function(tbl){
            var rows = tbl.find('tr'); var total = 0;
            $.each(rows,function(row){
                total += getFloat($(this).find('td').eq(4).text());
            });
            tbl.find('.total_rating').html(total+'%');
        };



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