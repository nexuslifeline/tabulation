<div>
    <br>
    <b>Panel / Judge Enlistment</b> Please tick mark members of panel.
    <span class="pull-right">Not in the list? [ <a id="linkJudge" href="">Register Judge</a> ]</span>
    <br/>
    <table id="tblJudge" width="100%" style="border: 1px solid white;">
        <thead>
            <tr>
                <th width="10%" style="border: 1px solid white;">Enlist</th>
                <th style="border: 1px solid white;">Judge / Panel</th>
                <th style="border: 1px solid white;">Email</th>
                <th style="border: 1px solid white;">Address</th>
                <th style="border: 1px solid white;">Contact</th>

            </tr>
        </thead>
        <tbody>
            <?php foreach($judges as $judge){ ?>
                <tr data-judge-id="<?php echo $judge->user_id; ?>" data-event-id="<?php echo $event_id; ?>">
                    <td align="center" style="border: 1px solid white;"><select class="form-control col-sm-12 cbo-add-judge"><option value="0" <?php echo ($judge->status==0?'selected':''); ?>>No</option><option value="1" <?php echo ($judge->status==1?'selected':''); ?>>Yes</option></select></td>
                    <td style="border: 1px solid white;"><?php echo $judge->fullname; ?></td>
                    <td style="border: 1px solid white;"><?php echo $judge->user_email; ?></td>
                    <td style="border: 1px solid white;"><?php echo $judge->user_address; ?></td>
                    <td style="border: 1px solid white;"><?php echo $judge->user_mobile; ?></td>
                </tr>
            <?php }?>
        </tbody>
    </table>



    <br>
    <b>Setup Criteria of Judging</b>

    <div class="alert alert-dismissable alert-info">
        <i class="ti ti-settings"></i>&nbsp; Please make sure you select <b>Yes</b> and specify the <b>Percentage</b> of the <b>Criteria</b>.
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
    </div>
    <span class="pull-right">Not in the list? [ <a id="linkAddCriteria" href="">Add Criteria</a> ]</span>
    <table width="100%" id="tblCriteria" style="border: 1px solid white;">
        <thead>
        <tr>
            <th width="10%" style="border: 1px solid white;">Add</th>
            <th width="25%" style="border: 1px solid white;">Criteria</th>
            <th width="45%" style="border: 1px solid white;">Description</th>
            <th width="10%" style="border: 1px solid white;text-align: right">Percentage</th>
            <th width="10%" style="border: 1px solid white;text-align: right">Max Score Allowed</th>
        </tr>
        </thead>
        <tbody>
        <?php foreach($criteria as $cr){ ?>
            <tr data-criteria-id="<?php echo $cr->criteria_id; ?>" data-event-id="<?php echo $event_id; ?>">
                <td style="border: 1px solid white;"><select class="form-control col-sm-12 cbo-add-criteria"><option value="0" <?php echo ($cr->status==0?'selected':''); ?>>No</option><option value="1"<?php echo ($cr->status==1?'selected':''); ?>>Yes</option></select></td>
                <td style="border: 1px solid white;"><?php echo $cr->criteria; ?></td>
                <td style="border: 1px solid white;"><?php echo $cr->description; ?></td>
                <td style="border: 1px solid white;"><input type="number" name="percentage" min="1" oninput="validity.valid||(value=value.replace(/\D+/g, ''))" class="form-control" value="<?php echo $cr->percentage; ?>" max="100" style="text-align: right;" /></td>
                <td style="border: 1px solid white;"><input type="number" name="rating" min="1" oninput="validity.valid||(value=value.replace(/\D+/g, ''))" class="form-control" value="<?php echo ($cr->criteria_id==1?'NA':($cr->max_score==0?'100':$cr->max_score)); ?>" max="100" style="text-align: right;" <?php echo ($cr->criteria_id==1?'readonly':''); ?> /></td>
            </tr>
        <?php } ?>
        </tbody>
        <tfoot>
            <tr>
                <td colspan="3" style="border: 1px solid white;text-align: right;"><b>Total : </b></td>
                <td colspan="2" style="border: 1px solid white;text-align: center;"><b id="total_percentage"><?php echo $total_percentage; ?>%</b></td>
            </tr>
        </tfoot>
    </table>
    <br><br>

    <hr /><br>

    <b>Participant/Candidate/Person Enlistment</b> Please tick mark Participantse
	on this event.
    <span class="pull-right">Not in the list? [ <a id="linkParticipant" href="">Register Participant</a> ]</span>
    <br>
    <table id="tblParticipant" width="100%" style="border: 1px solid white;">
        <thead>
        <tr>
            <th width="10%" style="border: 1px solid white;">Enlist</th>
            <th width="15%" style="border: 1px solid white;">Participant #</th>
            <th style="border: 1px solid white;">Participant/Candidate/Competitor</th>
            <th style="border: 1px solid white;">Description</th>
            <th style="border: 1px solid white;display: none;">Description 2</th>
            <th style="border: 1px solid white;display: none;">Description 3</th>

        </tr>
        </thead>
        <tbody>
        <?php foreach($contestants as $contestant){ ?>
            <tr data-contestant-id="<?php echo $contestant->contestant_id; ?>" data-event-id="<?php echo $event_id; ?>">
                <td style="border: 1px solid white;"><select class="form-control col-sm-12 cbo-add-contestant"><option value="0" <?php echo ($contestant->status==0?'selected':''); ?>>No</option><option value="1"<?php echo ($contestant->status==1?'selected':''); ?>>Yes</option></select></td>
                <td style="border: 1px solid white;"><input type="text" name="entity_no" class="form-control entity_no" value="<?php echo $contestant->contestant_no; ?>"></td>
                <td style="border: 1px solid white;"><?php echo $contestant->entity_name; ?></td>
                <td style="border: 1px solid white;"><?php echo $contestant->desc_1; ?></td>
                <td style="border: 1px solid white;display: none;"><?php echo $contestant->desc_2; ?></td>
                <td style="border: 1px solid white;display: none;"><?php echo $contestant->desc_3; ?></td>

            </tr>
        <?php }?>
        </tbody>
    </table>
    <br><br>

</div>