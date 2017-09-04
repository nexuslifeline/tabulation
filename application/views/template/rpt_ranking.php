<style>
    table{
        border-collapse: collapse;
        border: 1px solid black;
        text-align: left;

    }
    th{
        padding: 5px;
        border: 1px solid black;
    }
    td{
        padding: 5px;
        border: 1px solid black;
    }


</style>

<h4>Ranking List</h4>
<table width="100%">
    <thead>
        <tr>
            <th>#</th>
            <th>Entity/Candidate/Competitor</th>
            <th>Average</th>
            <th style="text-align: center;">Rank</th>
        </tr>
    </thead>
    <tbody>
        <?php $i=0; foreach ($candidates as $c){ $i++; ?>
        <tr>
            <td><?php echo $c->contestant_no; ?></td>
            <td><?php echo $c->entity_name; ?></td>
            <td><?php echo $c->avg_score; ?></td>
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
            <tr>
                <td width="70%" align="right">Average : </td>
                <td width="30%" align="right"><b> <?php echo $total/count($judges); ?></b></td>
            </tr>
        </tfoot>

    </table>
<?php } ?>



<script>
    window.print();
</script>