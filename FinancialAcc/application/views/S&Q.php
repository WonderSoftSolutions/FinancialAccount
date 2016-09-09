<style>
.heightdiv{
	height:460px;
}
</style>
<div class="content contentcstm ">
  
		<div class="main-content ">
		<div class="col-md-5 ">
		<!-- Trigger the modal with a button -->
  
<form class="form-inline">
  
  <div class="form-group" style="margin-bottom:5px">
  
    <label for="Total">Total:</label> <input type="text" disabled placeholder="$ 295.00" class="form-control" id="Total" value = "<?php echo $this->account_model->getTotalInvertoryValue(); ?>"> <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal">New Inventory</button>
    
  </div>
 
 
</form>
  
  
  </div>
			<div class="col-md-12 col-xs-12 heightdiv">
				
            <table id="example" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%" style="font-size:12px">
					<thead>
						<tr>
							<th>Inventory ID</th>
							<th class="hidden-xs hidden-sm">Item Name</th>
							<th>Unit Price</th>
							<th class="hidden-xs hidden-sm">Quantity in Stock</th>
							<th>Total Price</th>
							<th class="hidden-xs hidden-sm">Inventory Value</th>
							<th class="hidden-xs hidden-sm">Description</th>
						</tr>
					</thead>
					<tbody id ="tablecontent">
							<?php
								$this->account_model->getallinventoryPAGELOAD();
							?>
					</tbody>
				</table>
					</div>

                    
<!-- Modal -->
  <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Add New Inventory</h4>
        </div>
        <div class="modal-body">
          <form name = "inventoryaddingform" id = "inventoryaddingform" method = "post" action = "">
  <div class="form-group">
    <label for="itemname">Item Name:</label>
    <input type="text" class="form-control" id="item_name" name = "item_name" >
  </div>
  <div class="form-group">
    <label for="unitprice">Unit Price:</label>
    <input type="number" class="form-control sandqmoneytotaladd" id="unit_price" name="unit_price" value = "0" min='0' >
  </div>
  <div class="form-group">
    <label for="quantitystock">Quantity in Stock:</label>
    <input type="text" class="form-control sandqmoneytotaladd" id="quantity_stock" name="quantity_stock" value = "0" min='0'>
  </div>
  <div class="form-group">
    <label for="totalprice">Total Price:</label>
    <input type="number" class="form-control" readonly id="total_price" name="total_price" value="0">
  </div>
  <div class="form-group">
    <label for="Inventoryvalue">Inventory Value:</label>
    <input type="number" class="form-control" id="inventory_value" name="inventory_value" value = "0" min='0'>
  </div>
  <div class="form-group">
    <label for="description">Description:</label>
    <input type="text" class="form-control" id="description" name="description">
  </div>
  <input name="submit_button" type="button" onclick="inventoryadding();" class="btn btn-default" id="submit_button" value="Submit" />
  <!--<input type="submit" value class="btn btn-default" onclick="validate();"></input>-->
  <input type="reset" class="btn btn-default" id="configreset" value="Reset">
</form>
        </div>
      
      </div>
      
    </div>
  </div>
  
  
  <div class="modal fade" id="updatesq" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Add New Inventory</h4>
        </div>
        <div class="modal-body">
          <form name = "inventoryupdateform" id = "inventoryupdateform" method = "post" action = "">
		  </form>
        </div>
      
      </div>
      
    </div>
  </div>