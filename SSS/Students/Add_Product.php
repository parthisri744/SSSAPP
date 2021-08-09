<script src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script>
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.25/css/jquery.dataTables.min.css">
<div class="container-fluid">
<div class="row">
<div class="col-md-10 lign-item-centaer mx-auto">
    <div class="card shadow">
        <div class="card-body">
            <div class="text-right p-3">
                <div class="text-center text-success">
                     <h3>Add Product</h3>
                 </div>
                    <a  href="Students/Stock_verifivation.php" type="button" id="add"  class="btn btn-success">Add Product</a>
                    <button type="button" class="btn btn-primary" id="edit" >Update Product</button>
                    <button type="button" class="btn btn-danger" id="delete" >Delete</button>

               </div>
               <table id="example" class="display" style="width:100%">
        <thead>
            <tr>
                <th>SI.No</th>
                <th>Student Name</th>
                <th>Register Number</th>
                <th>Submitted Time</th>
                <th>Status</th>
                <th>Select</th>
            </tr>
        </thead>
        <tbody>
            <?php if(!empty($deliveryhis)) {  $i=0;?>
                <?php foreach($deliveryhis as $delivery) { ?>
                    <tr>
                        <td><?php echo $i+1 ?></td>
                        <td><?php echo $delivery['Stu_name']; ?></td>
                        <td><?php echo $delivery['stu_regno']; ?></td>
                        <td><?php echo $delivery['sbmitted_time']; ?></td>
                        <td><?php echo $delivery['status']; ?></td>
                        <td><input type="checkbox" class="form-checkbox-control" id="checkbox" style="height:30px; width:30px" value="<?php echo $purchase['ID']  ?>"></td>
                    </tr>
                <?php $i++; } ?>
            <?php } ?>
        </tbody>
    </table>
<div class="modal fade" id="addstock">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <!-- Modal Header -->
        <div class="modal-header">
             <h4 class="modal-title"><h1 class="text-center">STUDENT STATIONERY SHOP</h1></h4>
              <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
             <div class="modal-body">
           
           </div>
         </div>
        </div>
       </div>
      </div>
     </div>
    </div>
   </div>
 </div>
</div>
<script>
$(document).ready(function() {
        // Setup - add a text input to each footer cell
    $('#example thead tr').clone(true).appendTo( '#example thead' );
    $('#example thead tr:eq(1) th').each( function (i) {
        var title = $(this).text();
        $(this).html( '<input type="text" class="form-control" placeholder="Search '+title+'" />' );
        $( 'input', this ).on( 'keyup change', function () {
            if ( table.column(i).search() !== this.value ) {
                table
                    .column(i)
                    .search(this.value )
                    .draw();
            }
        } );
    } ); 
    var table = $('#example').DataTable( {
        orderCellsTop: true,
        searching: true,
        "scrollX": true
    } );  
 
});
    </script>
    