<script src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script>
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.25/css/jquery.dataTables.min.css">
<div class="container-fluid">
<div class="row ">
<div class="col-md-4">
    <div class="card shadow">
       <div class="card-body">  
          <img class="card-img-top" src="vendors/img/writing.gif" alt="Ucen image" style="width:100%; height: 500px">
       </div>
    </div>
</div>
<div class="col-md-8 align-item-center mx-auto">
    <div class="card shadow">
        <div class="card-body">
            <div class="text-right p-3">
                <div class="text-center text-danger">
                     <h3>Available Stock Details</h3>
                 </div>
               </div>
     <table id="example" class="display" style="width:100%">
        <thead>
            <tr>
                <th>SI.No</th>
                <th>Product Name</th>
                <th>Product Quantity</th>
                <th>Product Price</th>
                <th>Last Updated Date</th>               
            </tr>
        </thead>
        <tbody>
            <?php if(!empty($stockdetails)) {  $i=0;?>
                <?php foreach($stockdetails as $delivery) { ?>
                    <tr>
                        <td><?php echo $i+1 ?></td>
                        <td><?php echo $delivery['product_name']; ?></td>
                        <td><?php echo $delivery['product_quantity']; ?></td>
                        <td><?php echo $delivery['product_price']; ?></td>
                        <td><?php echo $delivery['last_updated_time']; ?></td>
                    </tr>
                <?php $i++; } ?>
            </div>
            <?php } ?>
        </tbody>
    </table>
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
