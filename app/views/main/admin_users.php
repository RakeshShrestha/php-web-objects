<div class="inner-box-main sign-in-page">    <div class="left_signin">        <div id="sign_in" class="Xpop-up dashboard">            <div class="pop-up-title">                <h4 class="active">Users</h4>                <div class="clear"></div>            </div>            <div class="pop-up-details dashboardf">                <div class="dashboard_contents">                    <table width="100%" border="0">                        <tr bgcolor="#F1EEEE">                            <td><strong>Username</strong></td>                            <td><strong>Name</strong></td>                            <td><strong>Country</strong></td>                            <td><strong>Registered Date</strong></td>                            <td><strong>Status</strong></td>                            <td><strong>Action</strong></td>                        </tr>                        <?php                        $i = 1;                        foreach ($users as $user) {                            ?>                            <tr>                                <td><?php echo $user->username; ?> </td>                                <td><?php echo $user->firstname; ?> <?php echo $user->lastname; ?></td>                                <td><?php echo $user->country ? getCountryList($user->country) : ''; ?></td>                                <td><?php echo date('F d, Y', strtotime($user->created)); ?></td>                                <td><?php echo $user->status == 2 ? 'Enabled' : 'Disabled'; ?></td>                                <td>                                    <?php                                    if ($user->status == 2) {                                        ?>                                        <a href="<?php echo getUrl('admin/main/disable') ?>/<?php echo $user->id ?>">                                            Disable                                        </a>                                        <?php                                    }                                    ?>                                    <?php                                    if ($user->status == 3) {                                        ?>                                        <a href="<?php echo getUrl('admin/main/enable') ?>/<?php echo $user->id ?>">                                            Enable                                        </a>                                        <?php                                    }                                    ?>                                </td>                            </tr>                            <?php                            $i++;                        }                        ?>                    </table>                </div>                <div style="clear:both;"></div>            </div>            <div style="clear:both;"></div>        </div>    </div></div>