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
                        <div id="div_criteria_list">
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <b style="color: white; font-size: 12pt;"><i class="fa fa-bars"></i>&nbsp; Type of Criteria</b>
                                </div>
                                <div class="panel-body table-responsive">
                                    <button class="btn btn-primary" id="btn_new" style="float: left; text-transform: capitalize;font-family: Tahoma, Georgia, Serif;margin-bottom: 0px !important;" data-toggle="modal" data-target="" data-placement="left" title="New tb" ><i class="fa fa-plus"></i> Create Type</button>
                                    <table id="tbl_criteria" class="" cellspacing="0" width="100%">
                                        <thead class="">
                                        <tr>
                                            <th>Type of Criteria</th>
                                            <th>Description</th>                                         
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

<div id="modal_criteria" class="modal fade" tabindex="-1" role="dialog"><!--modal-->
    <div class="modal-dialog" style="width: 30%;">
        <div class="modal-content">
            <div class="modal-header" style="background-color:#2ecc71;">
                <button type="button" class="close"   data-dismiss="modal" aria-hidden="true">X</button>
                <b><span id="modal_mode"> </span>TYpe</b>
            </div>

            <div class="modal-body">
                <form id="frm_criteria">
                    <div class="row">
                        <div class="col-lg-12">

                            <div class="form-group" style="margin-bottom:0px;">
                                <label class="">Type * :</label>
                                <div class="input-group">
                                <span class="input-group-addon">
                                    <i class="fa fa-toggle-off"></i>
                                </span>
                                    <input type="text" name="criteria_type" id="txt_criteria" class="form-control" value="" data-error-msg="tb name is required!" required>
                                </div>
                            </div>

                            <div class="form-group" style="margin-bottom:0px;">
                                <label class="">Description :</label>
                                <textarea name="description" id="txt_description" class="form-control"></textarea>
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




<script>

$(document).ready(function(){
    var dt; var _txnMode; var _selectedID; var _selectRowObj; var _selectedProductType; var _files;

    var initializeControls=function() {
        dt=$('#tbl_criteria').DataTable({
            "dom": '<"toolbar">frtip',
            "bLengthChange":false,
            "pageLength":15,
            "ajax" : "Criteria_types/transaction/list",
            "columns": [

                { targets:[1],data: "criteria_type" },
                { targets:[2],data: "description" },
                {
                    targets:[3],
                    render: function (data, type, full, meta){
                        var btn_edit='<button class="btn btn-primary btn-sm" name="edit_info"   data-toggle="tooltip" data-placement="top" title="Edit" style="margin-left:-5px;"><i class="fa fa-pencil"></i> </button>';
                        var btn_trash='<button class="btn btn-danger btn-sm" name="remove_info"  data-toggle="tooltip" data-placement="top" title="Move to trash" style="margin-right:-5px;"><i class="fa fa-trash-o"></i> </button>';
                     
                        return '<center>'+btn_edit+'&nbsp;'+btn_trash+'&nbsp;'+'</center>';
                    }
                }
            ],

            language: {
                searchPlaceholder: "Search Criteria"
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




    var bindtbHandlers=(function(){


        $('#btn_new').click(function(){
            _txnMode="new";
            $('#modal_criteria').modal('show');
            clearFields($('#frm_criteria'));
        });

        $('#tbl_criteria tbody').on('click','button[name="edit_info"]',function(){
            _txnMode="edit";

            $('#modal_criteria').modal('show');
            _selectRowObj=$(this).closest('tr');
            var data=dt.row(_selectRowObj).data();
            _selectedID=data.criteria_type_id;

            $('input,textarea').each(function(){
                var _elem=$(this);
                $.each(data,function(name,value){
                    if(_elem.attr('name')==name){
                        _elem.val(value);
                    }
                });
            });
        });


        $('#tbl_criteria tbody').on('click','button[name="remove_info"]',function(){
            $('#modal_confirmation').modal('show');
            _selectRowObj=$(this).closest('tr');
            var data=dt.row(_selectRowObj).data();
            _selectedID=data.criteria_type_id;

        });


        $('#btn_yes').click(function(){
            removeCriteriaType().done(function(response){
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
            if(validateRequiredFields($('#frm_criteria'))){
                if(_txnMode=="new"){
                    createCriteria().done(function(response){
                        showNotification(response);
                        dt.row.add(response.row_added[0]).draw();
                        clearFields($('#frm_criteria'))
                        showList(true);
                    }).always(function(){
                        $('#modal_criteria').modal('toggle');
                        showSpinningProgress($('#btn_save'));
                    });
                    return;
                }
                if(_txnMode==="edit"){
                    updateCriteria().done(function(response){
                        showNotification(response);
                        dt.row(_selectRowObj).data(response.row_updated[0]).draw();
                    }).always(function(){
                        $('#modal_criteria').modal('toggle');
                        showSpinningProgress($('#btn_save'));
                    });
                    return;
                }
            }
        });


    })();

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

    var createCriteria=function(){
        var _data=$('#frm_criteria').serializeArray();
        //_data.push({name : "photo_path" ,value : $('img[name="img_user"]').attr('src')});
        return $.ajax({
            "dataType":"json",
            "type":"POST",
            "url":"Criteria_types/transaction/create",
            "data":_data,
            "beforeSend": showSpinningProgress($('#btn_save'))
        });
    };

    var updateCriteria=function(){
        var _data=$('#frm_criteria').serializeArray();
        _data.push({name : "criteria_type_id" ,value : _selectedID});

        return $.ajax({
            "dataType":"json",
            "type":"POST",
            "url":"Criteria_types/transaction/update",
            "data":_data,
            "beforeSend": showSpinningProgress($('#btn_save'))
        });
    };

    var removeCriteriaType=function(){
        return $.ajax({
            "dataType":"json",
            "type":"POST",
            "url":"Criteria_types/transaction/delete",
            "data":{criteria_type_id : _selectedID}
        });
    };

    var showList=function(b){
        if(b){
            $('#div_criteria_list').show();
            $('#div_criteria_fields').hide();
        }else{
            $('#div_criteria_list').hide();
            $('#div_criteria_fields').show();
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



});

</script>


</body>

</html>