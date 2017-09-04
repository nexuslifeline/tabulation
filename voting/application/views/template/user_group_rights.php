<center>
    <table width="100%" style="font-family: tahoma;border: hidden;">
        <tbody>
        <tr>
            <td>
                <br />

                <div class="tab-container tab-left tab-default">

                    <div class="tab-content">
                        <div class="tab-pane active" id="user_rights_<?php echo $user_group_id; ?>" style="min-height: 300px;">

                            <form id="frm_user_group_rights_<?php echo $user_group_id; ?>">

                            <input type="hidden" name="user_group_id" value="<?php echo $user_group_id; ?>">

                            <span style="margin-left: 1%"><b><i class="fa fa-list"></i> User Group Rights</b></span>
                            <hr />
                            <div class="table-responsive">
                                <table id="tbl_user_group_rights" width="97%">
                                    <thead>
                                    <tr>
                                        <th width="80%" style="border: 1px solid white;">Application Module</th>
                                        <th width="17%" style="border: 1px solid white;">Permission</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach($rights as $right){ ?>
                                            <tr>
                                                <td style="color:#ffad33;border: 1px solid white;"><?php echo $right->link_name; ?></td>
                                                <td style="border: 1px solid white;">
                                                    <select name="link_code[]" class="cbo_links">
                                                        <option value="<?php echo $right->link_code; ?>" <?php echo ($right->is_allowed?'selected':''); ?>>Enable</option>
                                                        <option value="0" <?php echo ($right->is_allowed?'':'selected'); ?>>Disable</option>
                                                    </select>
                                                </td>
                                            </tr>
                                        <?php } ?>
                                    </tbody>
                                </table>
                            </div>

                            </form>


                            <hr />
                            <div class="row">
                                <div class="col-lg-12">
                                    <button id="btn_user_group_rights_<?php echo $user_group_id; ?>" class="btn btn-primary <?php echo ($user_group_id==1?'disabled':''); ?>" style="text-transform: none;"><i class="fa fa-check-circle"></i><span class=""></span> Save User Group Rights</button>
                                </div>
                            </div>

                        </div>

                    </div>
                </div>


            </td>
        </tr>
        </tbody>

    </table>
</center>

