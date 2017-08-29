
<center>
<table width="90%">
    <tr>
        <td width="80%">Judge/Panel</td>
        <td width="20%">Score</td>
    </tr>
    <?php foreach ($scores as $score){ ?>
        <tr>
            <td width="80%"><?php echo $score->user_fname; ?></td>
            <td width="20%"><?php echo $score->criteria_rate; ?></td>
        </tr>
    <?php } ?>
</table></center>