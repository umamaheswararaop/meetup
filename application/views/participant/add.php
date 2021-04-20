<?php
$this->load->view('participant/header');
$url = $_SERVER['REQUEST_URI'];
$explode= explode("/",$url);
$methode_name = $explode[3];
if($methode_name == 'save')
{
// keeps the entered values in the respected fields while validations fails 
$name=isset($_REQUEST["name"]) ? $_REQUEST["name"] : ''; 
$age = $_REQUEST['age'];
$dob = $_REQUEST['dob'];
$profession = $_REQUEST['profession'];
$locality = $_REQUEST['locality'];
$guests = $_REQUEST['guests'];
$address = $_REQUEST['address'];
}
else
{
$id = $parInfo['id'] ? $parInfo['id'] : '';
$name = $parInfo['name'] ? $parInfo['name'] : '';
$age = $parInfo['age'] ? $parInfo['age'] : '';
$dob = $parInfo['dob'] ? $parInfo['dob'] : '';
$profession = $parInfo['profession'] ? $parInfo['profession'] : '';
$locality = $parInfo['locality'] ? $parInfo['locality'] : '';
$guests = $parInfo['guests'];
$address = $parInfo['address'] ? $parInfo['address'] : '';
}
?>
<!--script to calculate the age from DOB-->
<script type = "text/javascript">
        $(document).ready(function () {
            var age = "";
            $('#dob').datepicker({
                onSelect: function (value, ui) {
                    var today = new Date();
                    age = today.getFullYear() - ui.selectedYear;
                    $('#age').val(age);
                },
                changeMonth: true,
                changeYear: true,
                yearRange: "1930:2021",
                dateFormat: 'yy-mm-dd'
            })
        })
    </script>
<div class="row">
    <div class="col-lg-12">
        <h2 align='center'><?php echo $title ?></h2>                 
    </div>
</div><!-- /.row -->
<br />
<div class="row">
    <div class="col-lg-12">
        <?php if (validation_errors()) { ?>
            <div class="alert alert-danger">
                <?php echo validation_errors(); ?>
            </div>
        <?php } ?>
    </div>
</div>
<?php if ($id != '') {
    ?>
    <form action="<?php print site_url(); ?>Par/update" method="POST" class="add-participant" id="add-participant">
        <input type="hidden" name="par_id" value="<?php echo $id; ?>">
    <?php } else { ?>


        <form action="<?php print site_url(); ?>Par/save" method="POST" class="add-participant" id="add-participant">
        <?php } ?>
        <div class="form-row">
            <div class="form-group col-md-6">
                <div class="form-group col-md-4">
                    <p><b>Name :</b></p></div>
                <div class="form-group col-md-8">
                    <input type="text" name="name" class="form-control" id="name" placeholder="Name" value="<?php echo $name; ?>">
                </div>
            </div>
            <div class="form-group col-md-6">
                <div class="form-group col-md-4">
                    <p><b>Age :</b></p></div>
                <div class="form-group col-md-8">
                    <input type="text" name="age" readonly class="form-control" id="age" placeholder="Age" value="<?php echo $age; ?>">
                </div>
            </div>
        </div>
        <div class="form-row">
            <div class="form-group col-md-6">
                <div class="form-group col-md-4">
                    <p><b>Date of Birth :</b></p></div>
                <div class="form-group col-md-8">
                    <input type="text" name="dob" readonly class="form-control" id="dob" placeholder="Date Of Birth" value="<?php echo $dob; ?>">
                    <?php $this->calendar->default_template(); ?>
                </div>
            </div>
            <div class="form-group col-md-6">
                <div class="form-group col-md-4">
                    <p><b>Profession :</b></p></div>
                <div class="form-group col-md-8">
                    <select id="profession" name="profession" class="form-control" >
                        <option value="">Select Profession</option>
                        <option value="Student" <?php if ($profession == 'Student'): ?> selected="selected"<?php endif; ?>>Student</option>
                        <option value="Employee" <?php if ($profession == 'Employee'): ?> selected="selected"<?php endif; ?>>Employee</option>
                    </select>
                </div>
            </div>
        </div>
        <div class="form-row">
            <div class="form-group col-md-6">
                <div class="form-group col-md-4">
                    <p><b>Locality :</b></p></div>
                <div class="form-group col-md-8">
                    <input type="text" name="locality" class="form-control" id="locality" placeholder="Locality" value="<?php echo $locality; ?>">
                </div>
            </div>
            <div class="form-group col-md-6">
                <div class="form-group col-md-4">
                    <p><b>No. of Guests :</b></p></div>
                <div class="form-group col-md-8">
                    <select id="guests" name="guests" class="form-control">
                        <option value="">Select No. of Guests</option>
                        <option value="0" <?php if ($guests == '0'): ?> selected="selected"<?php endif; ?>>0</option>
                        <option value="1" <?php if ($guests == '1'): ?> selected="selected"<?php endif; ?>>1</option>
                        <option value="2" <?php if ($guests == '2'): ?> selected="selected"<?php endif; ?>>2</option>
                    </select>
                </div>
            </div>
        </div>
        <div class="form-row">
            <div class="form-group col-md-6">
                <div class="form-group col-md-4">
                    <p><b>Address :</b></p></div>
                <div class="form-group col-md-8">
                    <textarea id="address" name="address" cols="10" rows="5" maxlength="50" class="form-control" placeholder="Address upto 50 characters only"><?php echo $address; ?></textarea>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12 text-right">
                <button type="reset" name="reset_add_participant" id="re-submit-emp" class="btn btn-danger"><i class="fa fa-undo"></i> Reset</button>
                <button type="submit" name="add_participant" id="submit-emp" class="btn btn-primary"><i class="fa fa-save"></i> Submit</button>
            </div>
        </div>  
    </form>
    <?php
    $this->load->view('participant/footer');
    ?>