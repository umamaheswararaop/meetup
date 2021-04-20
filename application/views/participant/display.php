<?php
$loggedin = $_SESSION['ci_seesion_key']['user_id'];
$this->load->view('participant/header');
    $id = $parInfo['id'] ? $parInfo['id'] : '';
    $name = $parInfo['name'] ? $parInfo['name'] : '';
    $age = $parInfo['age'] ? $parInfo['age'] : '';
    $dob = $parInfo['dob'] ? $parInfo['dob'] : '';
    $profession = $parInfo['profession'] ? $parInfo['profession'] : '';
    $locality = $parInfo['locality'] ? $parInfo['locality'] : '';
    $guests = $parInfo['guests'] ? $parInfo['guests'] : '0';
    $address = $parInfo['address'] ? $parInfo['address'] : '';
?>
<div class="row">
    <div class="col-lg-12">
        <h2 align='center'><?php echo $title; ?></h2>                 
    </div>
</div><!-- /.row -->
<br />

<div class="row">   
    <div class="col-lg-12">
        <table align='center' width='500px'>
            <tr><td><strong>Name: </strong></td><td><?php echo $name ?></td></tr>
        <tr><td><strong>Age: </strong></td><td><?php echo $age ?></td></tr>
        <tr><td><strong>Date of Birth: </strong></td><td><?php echo $dob ?></td></tr>
        <tr><td><strong>Profession: </strong></td><td><?php echo $profession ?></td></tr>
        <tr><td><strong>Locality: </strong></td><td><?php echo $locality ?></td></tr>
        <tr><td><strong>Guests: </strong></td><td><?php echo $guests ?></td></tr>
        <tr><td><strong>Address: </strong></td><td><?php echo $address ?></td></tr>
        </table>
    </div>
</div><!-- /.row -->
<?php
$this->load->view('participant/footer');
?>