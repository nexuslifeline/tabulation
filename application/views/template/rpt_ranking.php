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
            <td>001</td>
            <td><?php echo $c->entity_name; ?></td>
            <td><?php echo $c->avg_score; ?></td>
            <td align="center"><b><?php echo $c->rank; ?></b></td>
        </tr>
        <?php } ?>
    </tbody>

</table>

<script>
    window.print();
</script>