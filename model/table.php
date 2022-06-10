
<table id="datatable-buttons" class="table table-striped dt-responsive nowrap w-100">

<thead>
    <tr>
        <th id="descending">Date</th>
        <th>Name</th>
        <th>Email</th>
        <th>Price</th>
        <th>Invoice</th>
        <th>Action</th>
    </tr>
</thead>
<tbody id="tabledatajere">


 
<?php 

if(isset($_POST['paymentdata'])){
    require '../controller/connection.php';
    $paymentsql = "SELECT  * FROM payment ";
    $paymentresult = $con->query($paymentsql);
    $paymentdata = [];
    if ($paymentresult->num_rows > 0) {
      while ($paymentrow = $paymentresult->fetch_assoc()) {
          array_push($paymentdata, $paymentrow);
          }
      } 

      foreach($paymentdata as $key => $paymentdataval){
        $dateq = date_create($paymentdataval['date']);
        $date =  date_format($dateq , 'M d Y, h:i:A');
        echo
        "
        <tr id='row_".$paymentdataval['id']."'>
            <td>".$date."</td>
            <td>".$paymentdataval['name']."</td>
            <td>".$paymentdataval['email']."</td>
            <td>".$paymentdataval['price']."</td>
            <td>".$paymentdataval['invoice']."</td>
            <td ><button onclick=' deletepayment(".$paymentdataval['id'].")' class='btn btn-rounded btn-danger'>Delete </button></td>

        </tr>
        ";
        }
    }
?>

</tbody>

</table>
  
<script>
    atohere();
</script>

<script src="assets/js/vendor/dataTables.buttons.min.js"></script>
<script src="assets/js/vendor/buttons.bootstrap5.min.js"></script>
<script src="assets/js/vendor/buttons.html5.min.js"></script>
<script src="assets/js/vendor/buttons.flash.min.js"></script>
<script src="assets/js/vendor/buttons.print.min.js"></script>

<script src="assets/js/pages/demo.datatable-init.js"></script>
