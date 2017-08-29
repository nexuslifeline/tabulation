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
        <?php foreach ($candidates as $c){ ?>
        <tr>
            <td><?php echo $c->contestant_no; ?></td>
            <td><?php echo $c->entity_name; ?></td>
            <td><?php echo $c->avg_score; ?></td>
            <td align="center"><b><?php echo $c->rank; ?></b></td>
        </tr>
        <?php } ?>
    </tbody>

</table>

<br />
<h4>Detailed Score</h4>
<table width="100%">
    <thead>
    <tr>
        <th width="45%">Panel</th>
        <th width="45%">Contestant</th>
        <th width="10%">Score</th>
    </tr>
    </thead>
    <tbody>
        <?php foreach ($judge_scores as $judge_score){ ?>
        <tr>
            <th width="45%"><?php echo $judge_score->user_fname; ?></th>
            <th width="45%"><?php echo $judge_score->entity_name; ?></th>
            <th width="10%"><?php echo $judge_score->criteria_rate; ?></th>
        </tr>
        <?php } ?>
    </tbody>

</table>

<script>
    window.print();
</script>