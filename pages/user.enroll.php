<?php 
include("../initialize.php");
includeCore();

$_SESSION['loc'] = $_SERVER['PHP_SELF'];

$agencies = getAgencies();
?>

<!DOCTYPE html>
<html lang="en">

    <head>

        <?php
        includeHead("PSRMS - Register new account");
        includeDataTables();
        ?>

    </head>

    <body>

        <div id="wrapper">
            
            <?php includeNav(); ?>
            
            <div id="page-wrapper">
                <div class="row">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="user.list.php">Account Management</a></li>
                        <li class="breadcrumb-item active">Register new account</li>
                    </ol>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h4 class="title">&nbsp;Register new account</h4>
                            </div>
                            <div class="panel-body">
                                <form method="POST" action="/includes/actions/user.process.enrollment.php">
                                <div  id = "personal_info_div" class="col-lg-12">  
                                    <div class="form-group col-md-4">
                                        <input class="form-control" id="Fname" name='Fname' placeholder="First name" required>
                                    </div>
                                    
                                    <div class="form-group col-md-4">
                                        <input class="form-control" id='Mname' name='Mname' placeholder="Middle Name" required>
                                    </div>
                                    
                                    <div class="form-group col-md-4">
                                        <input class="form-control" id = 'Lname' name='Lname' placeholder="Last name" required>
                                    </div>
                                    
                                    <div class="form-group col-md-4">
                                        <input type="date" id="Bdate" name='Bdate' class="form-control" required>
                                    </div>
                                    
                                    <div class="form-group col-md-4">
                                        <select id="Gender" name='Gender' class="form-control" required>
                                            <option value="1">Male</option>
                                            <option value="2">Female</option>
                                        </select>             
                                    </div>
                                    
                                    <div class="form-group col-md-6">
                                        <input class="form-control" id="PhoneNum" name='PhoneNum' placeholder="Phone Number" id = "PhoneNum">
                                    </div>
                                    
                                    <div class="form-group col-md-6">
                                        <input type="email" class="form-control" id='Email' name='Email' placeholder="your@mail.com">
                                    </div>
                                    
                                    <div class="form-group col-md-6">
                                        <input type="password" class="form-control" id="pwd1" name="pwd1" placeholder="Enter password" pattern="(?=^.{7,}$)((?=.*\d)|(?=.*\W+))(?![.\n])(?=.*[A-Z])(?=.*[a-z]).*$" oninvalid="this.setCustomValidity('Atleast 7 chars with atleast 1 uppercase and 1 special char')" oninput="setCustomValidity('')">
                                    </div>
                                    
                                    <div class="form-group col-md-6">
                                        <input type="password" class="form-control" id="pwd2" name="pwd2" placeholder="Verify password" pattern="(?=^.{7,}$)((?=.*\d)|(?=.*\W+))(?![.\n])(?=.*[A-Z])(?=.*[a-z]).*$" oninvalid="this.setCustomValidity('Atleast 7 chars with atleast 1 uppercase and 1 special char')" oninput="setCustomValidity('')">
                                    </div>
                                    
                                    <div class="form-group col-md-12">
                                        <label class="text-warning"><sup>Please note: Passwords should be at least 7 characters with atleast one capital letter and atleast one number or one special character</sup></label>
                                    </div>
                                    
                                    <div class="form-group col-md-4">
                                        <label for="Agency">Agency<span class="required">*</span></label>
                                        <select id="Agency" name='Agency' class="form-control" required>
                                            <?php
                                            foreach($agencies as $agency) {
                                            ?>
                                            <option value="<?php echo($agency["AgencyID"]) ?>"><?php echo($agency["AgencyName"]) ?></option>
                                            <?php
                                            }
                                            ?>
                                            <option value="specify">Other(specify)</option>
                                        </select>
                                    </div>
                                    
                                    <div class="form-group col-md-4" id="specifyAgency" style="display:none">
                                        <label for="Lname">Specify Agency<span class="required">*</span></label>
                                        <input class="form-control" id="specAgency" name="specAgency" placeholder="Enter Your Agency">
                                    </div>
                                    
                                    <div class="form-group col-md-4">
                                        <label for="UserGroup">User Group<span class="required">*</span></label>
                                        <select id="UserGroup" name='UserGroup' class="form-control" required>
                                            <option value="1">MSU-IIT Psych Dept</option>
                                            <option value="2">MSU-IIT GCC</option>
                                        </select>
                                    </div>
                                    
                                    <div class="form-group col-md-12">
                                        <input type="submit" class="btn btn-primary btn-fill btn-md">
                                    </div>
                                </div>
                                </form>  
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
        <!-- /#wrapper -->

        <?php includeCommonJS(); ?>

    </body>
    
    <script type='text/javascript'>
        $(document).ready(function(){
            $('#Agency').change(function(){
                if ($(this).val() == 'specify') {
                    $('#specifyAgency').show();       
                } else {
                    $('#specifyAgency').hide(); 
                }
            });
        });
    </script>
    
</html>