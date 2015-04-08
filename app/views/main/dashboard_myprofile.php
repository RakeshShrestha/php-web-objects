<?php
$cont = getContentByPageName('myaccount_page_text');

if ($cont) {
    ?>
    <div class="information_section">
        <?php
        echo $cont;
        ?>
    </div>
    <?php
}
?>
<div class="inner-box-main sign-in-page">
    <div class="left_signin">

        <div id="sign_in" class="Xpop-up dashboard">

            <div class="pop-up-title">
                <h4 class="active">Edit My  Profile </h4>
                <div class="clear"></div>
            </div>
            <div class="pop-up-details dashboardf">

                <div class="dashboard_contents">

                    <form action="<?php echo getUrl('dashboard/main/myprofile') ?>" method="post" id="editprofile" name="editprofile">
                        <input type="hidden" id="id" name="id" value="<?php echo $authuser->id; ?>">
                        <table width="1002" border="0">
                            <tr>
                                <td>First Name</td>
                                <td><input type="text" id="firstname" required="required" name="firstname" value="<?php echo $authuser->firstname; ?>"></td>
                            </tr>
                            <tr>
                                <td>Last Name</td>
                                <td><input type="text" id="lastname" required="required" value="<?php echo $authuser->lastname; ?>" name="lastname"></td>
                            </tr>
                            <tr>
                                <td>Email Address</td>
                                <td>
                                    <input type="email" id="username"  value="<?php echo $authuser->username; ?>" required="required" name="username">
                                    <span id="handle_status"></span>
                                </td>
                            </tr>
                            <tr>
                                <td>Password</td>
                                <td><input type="password" id="prepassword"  value=""  name="prepassword" autocomplete="off" required="required">
                                    <br><span id="pass_chek3" style="color: red; font-size: 12px; line-height: 16px; margin-left: 10px; margin-top: 3px; width: 329px;"><?php echo isset($prepassworderror) ? $prepassworderror : '' ?></span>
                                </td>
                            </tr>
                            <tr>
                                <td>New Password</td>
                                <td>
                                    <input type="password" id="password"  value=""  name="password" autocomplete="off" pattern="(?=^.{6,46}$)((?=.*\d)|(?=.*\W+))(?![.\n])(?=.*[A-Z])(?=.*[a-z]).*$">
                                    <br><span id="pass_chek"  style="color: red; font-size: 12px; line-height: 16px; margin-left: 0px; margin-top: 3px; width: 329px;"></span>
                                    <div style="color: grey; font-size: 12px; line-height: 16px; margin-left: 10px; margin-top: 3px; width: 329px;">Password must be 6 characters including one uppercase letter and number.</div>
                                </td>
                            </tr>
                            <tr>
                                <td>Confirm New Password</td>
                                <td>
                                    <input type="password" id="confirm_password" value=""  name="confirm_password">
                                    <span id="pass_chek1"></span>
                                </td>
                            </tr>
                            <tr>
                                <td>Country</td>
                                <td>
                                    <?php
                                    $countrylist = getCountryList();
                                    ?>
                                    <select id="country" name="country" class="listmenu" required="required" >
                                        <option value=''>-Select one-</option>
                                        <?php
                                        foreach ($countrylist AS $ckey => $cval) {
                                            if ($authuser->country == $ckey) {
                                                echo "<option value='$ckey' selected>$cval</option>";
                                            } else {
                                                echo "<option value='$ckey'>$cval</option>";
                                            }
                                        }
                                        ?>
                                    </select>
                                </td>
                            </tr>

                            <tr>
                                <td>&nbsp;</td>
                                <td>
                                    <input type='hidden' id='iserror1' name='iserror1' value='0'>
                                    <input type='hidden' id='iserror1' name='iserror2' value='0'>
                                    <input type="submit" value="Update Details" id="submit" class="" name="submit" style="margin-left:10px;">
                                </td>
                            </tr>
                        </table>
                </div>

                <div style="clear:both;"></div>

            </div>
            <div style="clear:both;"></div>
        </div>
    </div>
</div>
<script type="text/javascript">
    $(document).ready(function () {
        $("#editprofile").submit(function (event) {
            var pass1 = document.getElementById("password").value;
            var pass2 = document.getElementById("confirm_password").value;

            if (pass1 != pass2) {
                $('#pass_chek').html('Password Not Match');
                $('#iserror2').val(1);
            } else {
                $('#pass_chek').html('');
                $('#iserror2').val(0);
            }

            if (pass1 && pass1.length < 6) {
                $('#pass_chek').html('Password must be minimum 6 characters');
                passerror = 1;
            } else {
                $('#pass_chek').html('');
                passerror = 0;
            }

            if (passerror == 1 || passerror == 1 || $('#iserror1').val() == 1 || $('#iserror2').val() == 1) {
                event.preventDefault();
            } else {
                return;
            }

        });

        $("#username").focusout(function () {
            var username = $('#username').val();
            var id = $('#id').val();
            if (username) {
                $.post("<?php echo getUrl('ajax/main/userexist_account') ?>", {username: username, id: id}, function (data) {
                    if (data == 1) {
                        $('#handle_status').html('Email already taken');
                        $('#iserror1').val(1);
                    } else {
                        $('#handle_status').html('');
                        $('#iserror1').val(0);
                    }
                });
            }
        });

    });
</script>
