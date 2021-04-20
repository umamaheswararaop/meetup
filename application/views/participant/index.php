<?php
$this->load->view('participant/header');
//login checking
$loggedin = $_SESSION['ci_seesion_key']['user_id'];
// if($loggedin != '1')
// {
//     redirect('par/meetup');
// }
 
?>
<div class="row">
    <div class="col-lg-12">
        <h2 class="text-center"><?php echo $title; ?></h2>                 
    </div>
    <!--display success message to users-->
    <div class="col-lg-12">
        <h4 class="text-center" style="color: green"><?php echo $_SESSION['success']; ?></h4>                 
    </div>
    <div class="col-lg-12">
        <h4 class="text-center" style="color: green"><?php echo $_SESSION['update']; ?></h4>                 
    </div>
    <!-- End of display success message to users-->
</div><!-- /.row -->
<?php if($loggedin == '1') { ?>
<form method='post' autocomplete="off" action="<?= base_url().'Par/index' ?>" >
		<input type='text' name='search' value='<?= $search ?>' placeholder="Search with name and locality..."><input type='submit' name='submit' value='Search'>
	</form>
<br />
<div class="row">   
        <div class="col-lg-12">
    <table class="table table-bordered">
    <thead>
      <tr>
         <th width="5%">Name</th>
        <th width="15%">Name</th>
        <th width="5%">Age</th>
        <th width="10%">Date of Birth</th>        
        <th width="10%">Profession</th>
        <th width="10%">Locality</th>
        <th width="10%">No. of Guests</th>
        <th width="20%">Address</th>
        <th width="15%">Action (View / Edit)</th> 
      </tr>
    </thead>
    <tbody> 
        <?php 
        $i=$row+1;
        foreach($parInfo as $key=>$element) { 
            $content = wordwrap($element['address'], 25, "\n", true);
            $content = strip_tags($content);
            //$content = substr($element['address'],0, 25)." ...";?>
      <tr>
        <td><?php print $i; ?></td>
        <td><?php print $element['name']; ?></td>
        <td><?php print $element['age']; ?></td>  
        <td><?php print $element['dob']; ?></td>
        <td><?php print $element['profession']; ?></td> 
        <td><?php print $element['locality']; ?></td> 
        <td><?php print $element['guests']; ?></td> 
        <td><?php print $content; ?></td> 
        <td>
            <a title="View Participant" href="<?php print site_url();?>display/<?php print $element['id'];?>" class="btn btn-info btn-xs"><i class="fa fa-eye fa-2x"></i> View</a> 
            <a title="Edit participant" href="<?php print site_url();?>edit/<?php print $element['id'];?>" class="btn btn-primary btn-xs"><i class="fa fa-edit fa-2x"></i> Edit</a> 
        </td>
      </tr>
      <?php $i++; }  ?>
    </tbody>
    
  </table>
</div>
    <?php
    if(count($parInfo) == 0){
			echo "<h3 align='center'>No Records Found!</h3>";
		} ?>
</div><!-- /.row -->
<div style='margin-top: 10px;'>
		<?= $pagination; ?>
	</div>

<?php }
$this->load->view('participant/footer');
?>