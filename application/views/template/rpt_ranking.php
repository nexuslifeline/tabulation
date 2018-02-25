<style>

    table{
        border-collapse: collapse;
        border: 1px solid black;
        text-align: left;
		font-family:Monotype Corsiva, Times, Serif;
    }
    th{
        padding: 5px;
        border: 1px solid black;
    }
    td{
        padding: 5px;
        border: 1px solid black;
    }
	
	table > thead th{
		background-color: #49c1bc;
	}
	
	/*table > tbody tr:nth-child(even) {background: #CCC}
	table > tbody tr:nth-child(odd) {background: #FFF}
*/
    .circle{
        width: 35px;
        height: 35px;
        border-radius: 50%;
        font-size: 12px;
        color: #000000;
        line-height: 35px;
        text-align: center;
        background: #49c1bc;
        margin-right: 10px;
    }

    .provider-container{
        display: flex;
        align-items: center;
        justify-content: center;
    }

    .text-primary{
        color: #49c1bc;
        font-weight: 600;
    }

    .criteria-layout{
        font-family: Tahoma;
        font-size: 13px;
        border: none;
        text-transform: capitalize;
    }
    .criteria-layout  td{
        border: none;
    }

</style>

<div>
<center>
<h2 style="line-height: 20%;font-family:Monotype Corsiva, Times, Serif;font-size: 35px;font-weight: 600;""><?php echo $event[0]->event_name; ?></h2>
    <div class="provider-container">
        <div class="circle"><b>By :</b> </div><?php echo base_url(''); ?>
    </div>
    <p style="line-height: 20%;font-family:Monotype Corsiva, Times, Serif;"><i><?php echo date('F d, Y',strtotime($event[0]->date_schedule)); ?></i></p></center>
</div>

<p>
    Event is scored on the following criteria.
</p>

<table class="criteria-layout" width="100%">
    <thead>
    <tr>
        <?php foreach ($criterias as $c){  ?>
            <?php if($c->status == 1){  ?><td width="10%"><span class="text-primary"><?php echo $c->criteria; ?></span></td><?php } ?>
        <?php } ?>
    </tr>
    </thead>
    <tr>
        <?php foreach ($criterias as $c){  ?>
            <?php if($c->status == 1){  ?><td width="10%"><span class=""><?php echo $c->description; ?></span></td><?php } ?>
        <?php } ?>
    </tr>

</table>

<br /><br />


<table width="100%">
    <thead>
        <tr>
            <th>#</th>
            <th>Entity/Candidate/Competitor</th>
            <th style="text-align: right;">Average</th>
            <th style="text-align: center;">Rank</th>
        </tr>
    </thead>
    <tbody>
        <?php $i=0; foreach ($candidates as $c){ $i++; ?>
        <tr>
            <td><?php echo $c->contestant_no; ?></td>
            <td><?php echo $c->entity_name; ?></td>
            <td style="text-align: right;"><?php echo $c->avg_score; ?></td>
            <td align="center"><b><?php echo $i; ?></b></td>
        </tr>
        <?php } ?>
    </tbody>

</table>

<br />
<h4>Detailed Score</h4>

<?php foreach ($judges as $j){ ?>
    <h4 style="line-height: 0%;"><?php echo $j->fullname; ?></h4>
    <table width="100%">

        <tbody>
        <?php $total = 0; foreach ($judge_scores as $judge_score){ ?>
            <?php if($judge_score->judge_id==$j->judge_id){ ?>
                <tr>
                    <td width="70%"><?php echo $judge_score->entity_name; ?></td>
                    <td width="30%" align="right"><?php echo $judge_score->criteria_rate; ?></td>
                </tr>
            <?php $total+=$judge_score->criteria_rate; } ?>
        <?php  } ?>
        </tbody>
        <tfoot>
            <!--<tr>
                <td width="70%" align="right">Average : </td>
                <td width="30%" align="right"><b> <?php echo $total/count($judges); ?></b></td>
            </tr>-->
        </tfoot>

    </table>
<?php } ?>



<script>
   /* window.print();*/
</script>