<!DOCTYPE html>

<html lang="en">

<head>

    <meta charset="utf-8">

    <title>Tabulation - <?php echo $title; ?></title>

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

    <link href="assets/plugins/select2/select2.min.css" rel="stylesheet">


    <link href="assets/plugins/datapicker/datepicker3.css" rel="stylesheet">


    <link href="assets/css/plugins/datapicker/datepicker3.css" rel="stylesheet">

    <style>
        html{
            zoom: 0.82;
            zoom: 82%;
        }

        #img_user {
            padding-bottom: 15px;
        }

        .img-container {
            position: relative;
            width: 50%;
        }

        .image {
            display: block;
            width: 200%;
            height: auto;
            border: 3px solid #ffad33;
        }

        .overlay {
            position: absolute;
            top: 0;
            bottom: 0;
            left: 0;
            right: 0;
            height: auto;
            width: 200%;
            opacity: 0;
            transition: .5s ease;
            cursor: pointer;
            background-color: rgba(0, 140, 186, .6);

        }

        .img-container:hover .overlay {
            opacity: 1;
        }

        .text {
            color: white;
            font-size: 20px;
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            -ms-transform: translate(-50%, -50%);
        }



        #img_user {
            padding-bottom: 15px;
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
                        <div id="div_event_list">
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <b style="color: white; font-size: 12pt;"><i class="fa fa-bars"></i>&nbsp; Nature of Event</b>
                                </div>
                                <div class="panel-body table-responsive">
                                    <button class="btn btn-primary" id="btn_new" style="float: left; text-transform: capitalize;font-family: Tahoma, Georgia, Serif;margin-bottom: 0px !important;" data-toggle="modal" data-target="" data-placement="left" title="New Event" ><i class="fa fa-plus"></i> Create New Event</button>
                                    <table id="tbl_events" class="" cellspacing="0" width="100%">
                                        <thead class="">
                                        <tr>
                                            <th></th>
                                            <th>Nature of Event</th>
                                            <th>Site</th>
                                            <th>Address</th>
                                            <th>Contact Person</th>
                                            <th><center>Action</center></th>
                                        </tr>
                                        </thead>
                                        <tbody>

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
                <h4 class="modal-title"  style="color:white;"><span id="modal_mode"> </span>Confirm Deletion</h4>
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
</div><!---modal-->

<div id="modal_events" class="modal fade" tabindex="-1" role="dialog"><!--modal-->
    <div class="modal-dialog" style="width: 30%;">
        <div class="modal-content">
            <div class="modal-header" style="background-color:#2ecc71;">
                <button type="button" class="close"   data-dismiss="modal" aria-hidden="true">X</button>
                <b><span id="modal_mode"> </span>Event Info</b>
            </div>

            <div class="modal-body">
                <form id="frm_events">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="form-group" style="margin-bottom:0px;">
                                <label class="">Nature of Event * :</label>
                                <div class="input-group">
                                <span class="input-group-addon">
                                    <i class="fa fa-toggle-off"></i>
                                </span>
                                    <input type="text" name="event_name" id="txt_event_name" class="form-control" value="" data-error-msg="Nature of Event is required!" required>
                                </div>
                            </div>

                            <div class="form-group" style="margin-bottom:0px;">
                                <label class="">Description :</label>
                                <textarea name="event_description" id="txt_event_description" class="form-control"></textarea>
                            </div>

                            <div class="form-group" style="margin-bottom:0px;">
                                <label class="">Site / Venue :</label>
                                <textarea name="event_description" id="txt_event_description" class="form-control"></textarea>
                            </div>

                            <div class="form-group" style="margin-bottom:0px;">
                                <label class="">Address :</label>
                                <textarea name="address" id="txt_address" class="form-control"></textarea>
                            </div>

                            <div class="form-group" style="margin-bottom:0px;">
                                <label class="">Contact Person :</label>
                                <div class="input-group">
                                <span class="input-group-addon">
                                    <i class="fa fa-user"></i>
                                </span>
                                    <input type="text" name="contact_person" id="txt_contact_person" class="form-control" value="">
                                </div>
                            </div>

                            <div class="form-group" style="margin-bottom:0px;">
                                <label class="">Schedule :</label>
                                <div class="input-group">
                                <span class="input-group-addon">
                                    <i class="fa fa-calendar"></i>
                                </span>
                                    <input type="text" name="date_schedule" id="txt_date_schedule" class="form-control date-picker" value="">
                                </div>
                            </div>

                            <div class="form-group" style="margin-bottom:0px;">
                                <label class="">Remarks :</label>
                                <textarea name="remarks" id="txt_remarks" class="form-control"></textarea>
                            </div>

                        </div>
                    </div>
                </form>
            </div>

            <div class="modal-footer">
                <button id="btn_save" type="button" class="btn btn-primary" style="background-color:#2ecc71;color:white;"><span class=""></span> Save</button>
                <button id="btn_cancel" type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
            </div>
        </div><!---content---->
    </div>
</div><!---modal-->

    <div id="modal_event_setup" class="modal fade" tabindex="-1" role="dialog"><!--modal-->
        <div class="modal-dialog" style="width: 90%;">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close"   data-dismiss="modal" aria-hidden="true">X</button>
                    <h4 class="modal-title" style="color:white;"><span id="modal_mode"> </span>Enlistment</h4>
                </div>

                <div class="modal-body">

                </div>

                <div class="modal-footer">

                </div>
            </div>
        </div>
    </div>

    <div id="modal_select_type" class="modal fade" tabindex="-1" role="dialog"><!--modal-->
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close"   data-dismiss="modal" aria-hidden="true">X</button>
                    <h4 class="modal-title" style="color:white;"><span id="modal_mode"> </span>Preset Event Criteria</h4>
                </div>

                <div class="modal-body">
                    <label class="">* Type : </label>
                    <select class="form-control" id="cboTypes" name="criteria_type_id" data-error-msg="Type is required!" required>
                        <?php foreach($types as $t){ ?>
                            <option value="<?php echo $t->criteria_type_id; ?>"><?php echo $t->criteria_type; ?></option>
                        <?php } ?>
                    </select>
                </div>

                <div class="modal-footer">
                    <button class="btn btn-primary" id="btnAcceptType">Accept</button>
                </div>
            </div>
        </div>
    </div>


    <div id="modal_confirm_activation" class="modal fade" tabindex="-1" role="dialog"><!--modal-->
        <div class="modal-dialog modal-sm">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close"   data-dismiss="modal" aria-hidden="true">X</button>
                    <h4 class="modal-title"><span id="modal_mode"> </span>Confirm Activation</h4>
                </div>

                <div class="modal-body">
                    <p id="modal-body-message">Are you sure you want to activate this event?</p>
                </div>

                <div class="modal-footer">
                    <button id="btn_confirm_activate" type="button" class="btn btn-danger" data-dismiss="modal">Yes</button>
                    <button id="btn_close" type="button" class="btn btn-default" data-dismiss="modal">No</button>
                </div>
            </div>
        </div>
    </div>

    <div id="modal_reenlist" class="modal fade" tabindex="-1" role="dialog"><!--modal-->
        <div class="modal-dialog modal-md">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close"   data-dismiss="modal" aria-hidden="true">X</button>
                    <h4 class="modal-title"><span id="modal_mode"> </span>Important</h4>
                </div>

                <div class="modal-body">
                    <p id="modal-body-message">
                        Is this a new round or stage?
                    </p>
                </div>

                <div class="modal-footer">
                    <button id="btn_yes_round" type="button" class="btn btn-danger" data-dismiss="modal">Yes</button>
                    <button id="btn_close" type="button" class="btn btn-default" data-dismiss="modal">No</button>
                </div>
            </div>
        </div>
    </div>


    <div id="modal_reenlist_entity" class="modal fade" tabindex="-1" role="dialog"><!--modal-->
        <div class="modal-dialog modal-md">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title"><span id="modal_mode"> </span>Required</h4>
                </div>

                <div class="modal-body">
                    <form id="frm_round">
                        <p id="modal-body-message">
                            Please specify the <b>Previous</b> Round :
                        </p>
                        <select name="prev_event_id" class="form-control col-lg-12">
                            <?php foreach($events as $event){ ?>
                            <option value="<?php echo $event->event_id; ?>"><?php echo $event->event_name; ?></option>
                            <?php } ?>
                        </select>

                        <br /><br /><br />

                        <p id="modal-body-message">
                            Top Entities/Candidates/Competitors to be included in this round/stage:
                        </p>
                        <input id="txt_limit" type="number" class="form-control col-lg-12" value="5" /><br />
                    </form>
                </div>

                <div class="modal-footer">
                    <button id="btn_finalize_round" type="button" class="btn btn-danger" data-dismiss="modal">Yes</button>
                    <button id="btn_close" type="button" class="btn btn-default" data-dismiss="modal">No</button>
                </div>
            </div>
        </div>
    </div>


<div id="modal_confirmation" class="modal fade" tabindex="-1" role="dialog"><!--modal-->
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close"   data-dismiss="modal" aria-hidden="true">X</button>
                <h4 class="modal-title"><span id="modal_mode"> </span>Confirm Deletion</h4>
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

<?php echo $_footer; ?>

</div>
</div>
</div>

<?php echo $_def_js_files; ?>


<script type="text/javascript" src="assets/plugins/datatables/jquery.dataTables.js"></script>
<script type="text/javascript" src="assets/plugins/datatables/dataTables.bootstrap.js"></script>


<!-- Date range use moment.js same as full calendar plugin -->
<script src="assets/plugins/fullcalendar/moment.min.js"></script>
<!-- Data picker -->
<script src="assets/plugins/datapicker/bootstrap-datepicker.js"></script>

<!-- Select2 -->
<script src="assets/plugins/select2/select2.full.min.js"></script>


<!-- Date range use moment.js same as full calendar plugin -->
<script src="assets/js/plugins/fullcalendar/moment.min.js"></script>
<!-- Data picker -->
<script src="assets/js/plugins/datapicker/bootstrap-datepicker.js"></script>



<!-- touchspin -->
<script type="text/javascript" src="assets/plugins/bootstrap-touchspin/dist/jquery.bootstrap-touchspin.js"></script>

<!-- numeric formatter -->
<script src="assets/plugins/formatter/autoNumeric.js" type="text/javascript"></script>
<script src="assets/plugins/formatter/accounting.js" type="text/javascript"></script>



<script>

$(document).ready(function(){
    var dt; var _txnMode; var _selectedID; var _selectRowObj; var _selectedProductType; var _files;

    var initializeControls=function() {
        dt=$('#tbl_events').DataTable({
            "dom": '<"toolbar">frtip',
            "bLengthChange":false,
            "pageLength":15,
            "ajax" : "Events/transaction/list",
            "columns": [
                {
                    targets:[1],
                    render: function (data, type, full, meta){
                        var cls = (full.is_open == "1"?"fa-check-circle":"fa-times-circle");
                        var clr = (full.is_open == "1"?"green":"red");
                        return '<center><a href="#" class="btn_activate" data-event-id="'+full.event_id+'"><i class="fa '+cls+'" style="color:'+clr+';"></a></center>';
                    }
                },
                { targets:[1],data: "event_name" },
                { targets:[2],data: "site" },
                { targets:[3],data: "address" },
                { targets:[4],data: "contact_person" },
                {
                    targets:[5],
                    render: function (data, type, full, meta){
                        var btn_edit='<button class="btn btn-primary btn-sm" name="edit_info"   data-toggle="tooltip" data-placement="top" title="Edit" style="margin-left:-5px;"><i class="fa fa-pencil"></i> </button>';
                        var btn_trash='<button class="btn btn-danger btn-sm" name="remove_info"  data-toggle="tooltip" data-placement="top" title="Move to trash" style="margin-right:-5px;"><i class="fa fa-trash-o"></i> </button>';
                        var btn_enlist='<button class="btn btn-primary btn-sm" name="enlist_contestant"  data-toggle="tooltip" data-placement="top" title="Enlist Contestant" style="margin-right:-5px;"><i class="fa fa-bars"></i></button>';

                        return '<center>'+btn_edit+'&nbsp;'+btn_enlist+'&nbsp;&nbsp;'+btn_trash+'&nbsp;'+'</center>';
                    }
                }
            ],

            language: {
                searchPlaceholder: "Search Event",
				info: "Showing page _PAGE_ of _PAGES_"
            },
            "rowCallback":function( row, data, index ){

                $(row).find('td').eq(4).attr({
                    "align": "right"
                });
            }


        });

        $('.date-picker').datepicker({
            todayBtn: "linked",
            keyboardNavigation: false,
            forceParse: false,
            calendarWeeks: true,
            autoclose: true
        });


    }();




    var bindEventHandlers=(function(){
        var detailRows = []; var selEventID = 0;

        $('#tbl_events tbody').on( 'click', 'a.btn_activate', function (e) {
            e.preventDefault();
            $('#modal_confirm_activation').modal('show');
            selEventID = $(this).data('event-id');

        });

        $('#btn_yes_round').click(function(){
            $('#modal_reenlist_entity').modal('show');
        });

        $('#btn_finalize_round').click(function(){
            var data = [];
            data.push({name : "prev-event-id", value : $('select[name="prev_event_id"]').val() });
            data.push({name : "cur-event-id", value : selEventID });
            data.push({name : "limit", value : $('#txt_limit').val() });

            $.ajax({
                "dataType":"json",
                "type":"POST",
                "url":"Events/transaction/re-enlist",
                "data" : data
            }).done(function(response){
                showNotification(response);
            });
        });

        $('#btn_confirm_activate').click(function(){
            var data = [];
            data.push({name : "event-id", value : selEventID });

            $.ajax({
                "dataType":"json",
                "type":"POST",
                "url":"Events/transaction/activate-event",
                "data" : data,
                "beforeSend" : function(){

                }
            }).done(function(response){
                $('#modal_confirm_activation').modal('hide');
                $('#modal_reenlist').modal('show');
                showNotification(response);
                dt.ajax.reload();
            });

        });


        var __selectedEventId; var __typeId;
        $('#btnAcceptType').click(function(){
            //alert($('#cboTypes').val());
            __typeId = $('#cboTypes').val();
            $('#modal_select_type').modal('hide');
            setTimeout(function(){
                $.ajax({
                    "dataType":"html",
                    "type":"POST",
                    "url":"Events/transaction/enlistment?event-id="+__selectedEventId+"&type_id="+__typeId,
                    "beforeSend" : function(){
                        $('#modal_event_setup').modal('show');
                    }
                }).done(function(response){
                    $('#modal_event_setup').find('.modal-body').html(response);
                });
            },600);

        });


        $('#tbl_events tbody').on( 'click', 'button[name="enlist_contestant"]', function () {
            var tr = $(this).closest('tr');
            var row = dt.row( tr );
            var data=dt.row(tr).data();

            var d=row.data();

            __selectedEventId = data.event_id || 0;
            $('#modal_select_type').modal('show');

            return;
           /* $.ajax({
                "dataType":"html",
                "type":"POST",
                "url":"Events/transaction/enlistment?event-id="+data.event_id,
                "beforeSend" : function(){
                    $('#modal_event_setup').modal('show');
                  
                }
            }).done(function(response){
                $('#modal_event_setup').find('.modal-body').html(response);
            });*/
        });

        $('#tbl_events tbody').on( 'click', 'tr td.details-control', function () {
            var tr = $(this).closest('tr');
            var row = dt.row( tr );
            var data=dt.row(tr).data();

            var d=row.data();
            $.ajax({
                "dataType":"html",
                "type":"POST",
                "url":"Events/transaction/enlistment?event-id="+data.event_id,
                "beforeSend" : function(){
                    $('#modal_event_setup').modal('show');
                }
            }).done(function(response){
                $('#modal_event_setup').find('.modal-body').html(response);
            });
            /*var tr = $(this).closest('tr');
            var row = dt.row( tr );
            var idx = $.inArray( tr.attr('id'), detailRows );

            var data=dt.row(tr).data();

            if ( row.child.isShown() ) {
                tr.removeClass( 'details' );
                row.child.hide();

                detailRows.splice( idx, 1 );
            }
            else {
                tr.addClass( 'details' );
                var d=row.data();
                $.ajax({
                    "dataType":"html",
                    "type":"POST",
                    "url":"Events/transaction/enlistment?event-id="+data.event_id,
                    "beforeSend" : function(){
                        row.child( '<center><br /><img src="assets/img/loader/ajax-loader-lg.gif" /><br /><br /></center>' ).show();
                    }
                }).done(function(response){
                    row.child( response ).show();

                    // Add to the 'open' array
                    if ( idx === -1 ) {
                        detailRows.push( tr.attr('id') );
                    }


                });
            }*/
        } );

        $('#btn_new').click(function(){
            _txnMode="new";
            $('#modal_events').modal('show');
            clearFields($('#frm_events'));
        });
    

        $('#tbl_events tbody').on('click','button[name="edit_info"]',function(){
            _txnMode="edit";

            $('#modal_events').modal('show');
            _selectRowObj=$(this).closest('tr');
            var data=dt.row(_selectRowObj).data();
            _selectedID=data.event_id;

            $('input,textarea,select').each(function(){
                var _elem=$(this);
                $.each(data,function(name,value){
                    if(_elem.attr('name')==name){
                        _elem.val(value);
                    }
                });
            });
        });

        $('#modal_event_setup').on('keyup','input[name="percentage"],input[name="rating"]',function(){
            var row = $(this).closest('tr');
            var criteria_id= row.data('criteria-id');
            var event_id= $(this).closest('tr').data('event-id');

            var percentage = row.find('input[name="percentage"]').val();
            var rating = row.find('input[name="rating"]').val();
            var rows = $(this).closest('table').find('tbody').find('tr');

            if(percentage>0 || rating>0){ //make sure dropdown is set to yes when there is value
                row.find('select').val(1);
            }else{
                row.find('select').val(0);
            }

            var status = row.find('select').val();

            $.ajax({
                "dataType":"json",
                "type":"POST",
                "url":"Events/transaction/add-criteria",
                "data":[{name : "criteria-id" ,value: criteria_id},{name : "event-id" ,value: event_id},{name : "status" ,value: status},{name : "percentage" ,value: percentage},{name : "rating" ,value: rating}]
            });

            $('#total_percentage').html(getTotalPercentage(rows)+"%");
        });

        $('#modal_event_setup').on('change','select.cbo-add-criteria',function(){
            var row = $(this).closest('tr');
            var criteria_id= row.data('criteria-id');
            var event_id= $(this).closest('tr').data('event-id');
            var status = $(this).val();

            var rows = $(this).closest('table').find('tbody').find('tr');

            if(status==1){
                //row.find('input[name="percentage"]').val(row.find('input[name="percentage"]').val());
            }else{
                row.find('input[name="percentage"]').val(0);
                $('#total_percentage').html(getTotalPercentage(rows)+"%");
            }

            var percentage = row.find('input[name="percentage"]').val();
            var rating = row.find('input[name="rating"]').val();

            $.ajax({
                "dataType":"json",
                "type":"POST",
                "url":"Events/transaction/add-criteria",
                "data":[{name : "criteria-id" ,value: criteria_id},{name : "event-id" ,value: event_id},{name : "status" ,value: status},{name : "percentage" ,value: percentage},{name : "rating" ,value: rating}]
            });
        });

        $('#modal_event_setup').on('change','select.cbo-add-contestant',function(){
            var contestant_id= $(this).closest('tr').data('contestant-id');
            var event_id= $(this).closest('tr').data('event-id');
            var contestant_no = $(this).closest('tr').find('input.entity_no').val();
            var status = $(this).val();

            $.ajax({
                "dataType":"json",
                "type":"POST",
                "url":"Events/transaction/add-candidate",
                "data":[{name : "contestant-id" ,value: contestant_id},{name : "event-id" ,value: event_id},{name : "status" ,value: status},{name : "contestant-no" ,value: contestant_no}]
            });
        });

         $('#modal_event_setup').on('change','select.cbo-add-judge',function(){
            var judge_id= $(this).closest('tr').data('judge-id');
            var event_id= $(this).closest('tr').data('event-id');
            var status = $(this).val();

            $.ajax({
                "dataType":"json",
                "type":"POST",
                "url":"Events/transaction/add-judge",
                "data":[{name : "judge-id" ,value: judge_id},{name : "event-id" ,value: event_id},{name : "status" ,value: status}]
            });
        });


        $('#tbl_events tbody').on('click','button[name="remove_info"]',function(){
            $('#modal_confirmation').modal('show');
            _selectRowObj=$(this).closest('tr');
            var data=dt.row(_selectRowObj).data();
            _selectedID=data.event_id;

        });


        $('#btn_yes').click(function(){
            removeEvent().done(function(response){
                showNotification(response);
                if(response.stat == 'success') {
                    dt.row(_selectRowObj).remove().draw();
                }
            });
        });


        $('#btn_cancel').click(function(){
            showList(true);
        });

        $('#btn_save').click(function(){
            if(validateRequiredFields($('#frm_events'))){
                if(_txnMode=="new"){
                    createEvent().done(function(response){
                        showNotification(response);
                        dt.ajax.reload();
                        clearFields($('#frm_events'))
                        showList(true);
                    }).always(function(){
                        $('#modal_events').modal('toggle');
                        showSpinningProgress($('#btn_save'));
                    });
                    return;
                }
                if(_txnMode==="edit"){
                    updateEvent().done(function(response){
                        showNotification(response);
                        dt.row(_selectRowObj).data(response.row_updated[0]).draw();
                    }).always(function(){
                        $('#modal_events').modal('toggle');
                        showSpinningProgress($('#btn_save'));
                    });
                    return;
                }
            }
        });

        $(document).on('keyup','input.entity_no',function () {
            var i = $(this).val();

            var row = $(this).closest('tr');
            //console.log(row.index());
            if(i>0){
                row.find('td').eq(0).find('select').val(1);
            }

            if(checkExist($(this).closest('table'),i, row.index())){
                showNotification({
                    "title" : "Already Exists!",
                    "stat" : "error",
                    "msg" : "Duplicate entity/candidate/competitor number."
                });
                $(this).val("");
                row.find('td').eq(0).find('select').val(0);
                showNotification({
                    "title" : "Info!",
                    "stat" : "info",
                    "msg" : "Please make sure you enter unique number."
                });
            }else{

            }
            $('select.cbo-add-contestant').change();
        });


    })();


    function checkExist( tbl , v , ind){
        var rows = tbl.find('tbody').find('tr');
        var b = false;
        rows.each(function(z,zz){
            //console.log($(this).index());
            var a = $(this).find('td').eq(1).find('input.entity_no').val();

            if(a == v && ind != $(this).index()){
                //console.log(a);
                //console.log(v);
                b = true;
                return;
            }
        });

        return b;
    }

    var validateRequiredFields=function(f){
        var stat=true;

        $('div.form-group').removeClass('has-error');
        $('input[required],textarea[required],select[required]',f).each(function(){

            if($(this).is('select')){
                if($(this).val()==0){
                    showNotification({title:"Error!",stat:"error",msg:$(this).data('error-msg')});
                    $(this).closest('div.form-group').addClass('has-error');
                    $(this).focus();
                    stat=false;
                    return false;
                }

            }else{
                if($(this).val()==""){
                    showNotification({title:"Error!",stat:"error",msg:$(this).data('error-msg')});
                    $(this).closest('div.form-group').addClass('has-error');
                    $(this).focus();
                    stat=false;
                    return false;
                }
            }
        });

        return stat;
    };

    var createEvent=function(){
        var _data=$('#frm_events').serializeArray();
      
        return $.ajax({
            "dataType":"json",
            "type":"POST",
            "url":"Events/transaction/create",
            "data":_data,
            "beforeSend": showSpinningProgress($('#btn_save'))
        });
    };

    var updateEvent=function(){
        var _data=$('#frm_events').serializeArray();
        _data.push({name : "event_id" ,value : _selectedID});

        return $.ajax({
            "dataType":"json",
            "type":"POST",
            "url":"Events/transaction/update",
            "data":_data,
            "beforeSend": showSpinningProgress($('#btn_save'))
        });
    };

    var removeEvent=function(){
        return $.ajax({
            "dataType":"json",
            "type":"POST",
            "url":"Events/transaction/delete",
            "data":{event_id : _selectedID}
        });
    };

    var showList=function(b){
        if(b){
            $('#div_event_list').show();
            $('#div_event_fields').hide();
        }else{
            $('#div_event_list').hide();
            $('#div_event_fields').show();
        }
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
        $(e).toggleClass('disabled');
    };

    var clearFields=function(f){
        var d = <?php echo json_encode(date('m/d/Y')); ?>;
        $('input,textarea,select',f).val('');
        $('.date-picker').val(d);
        $(f).find('input:first').focus();

    };

    var getFloat=function(f){
        return parseFloat(accounting.unformat(f));
    };


    var getTotalPercentage =  function(rows){
        var p = 0.00;

        rows.each(function(value,i){
            p += parseFloat($(this).find('input[name="percentage"]').val());
        });
        return  p;
        //$('#total_percentage').html(p);
    };




});

</script>


</body>

</html>