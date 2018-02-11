<div>
    <br>
    <b>Panel / Judge Enlistment</b> Please tick mark members of panel.<br>

    <table width="100%">
        <thead>
            <tr>
                <th style="text-align: center">Action</th>
                <th>Judge / Panel</th>
                <th>Email</th>
                <th>Address</th>
                <th>Contact</th>

            </tr>
        </thead>
        <tbody>
            <?php foreach($judges as $judge){ ?>
            <tr>
                <td align="center"><a href="#"><i class="fa fa-check-circle" style="color:#2ecc71"></i></a></td>
                <td><?php echo $judge->fullname; ?></td>
                <td><?php echo $judge->user_email; ?></td>
                <td><?php echo $judge->user_address; ?></td>
                <td><?php echo $judge->user_mobile; ?></td>
            </tr>
            <?php }?>
        </tbody>
    </table>
    <br><br>

    <b>Candidate Enlistment</b> Please tick mark candidates on this event.<br>
    <table width="100%">
        <thead>
        <tr>
            <th style="text-align: center">Action</th>
            <th>Candidate</th>
            <th>Nationality</th>
            <th>Address</th>
            <th>Contact</th>

        </tr>
        </thead>
        <tbody>
        <?php foreach($contestants as $contestant){ ?>
            <tr>
                <td align="center"><a href="#"><i class="fa fa-check-circle" style="color:#2ecc71"></i></a></td>
                <td><?php echo $contestant->fullname; ?></td>
                <td><?php echo $contestant->nationality; ?></td>
                <td><?php echo $contestant->address; ?></td>
                <td><?php echo $contestant->contact; ?></td>

            </tr>
        <?php }?>
        </tbody>
    </table>
    <br><br>

</div>