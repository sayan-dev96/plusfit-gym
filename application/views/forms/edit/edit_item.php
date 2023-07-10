<div class="main-panel ps-container ps-theme-default" data-ps-id="944ece5a-d448-39e8-aadf-2abeef99bbb4">
      <!-- Navbar -->
      
      
      <div class="content">
        <div class="container-fluid">
          <div class="row">
            
            
            <div class="col-md-12">
              <div class="card ">
                <div class="card-header card-header-primary card-header-text">
                  <div class="card-text">
                    <h4 class="card-title">Edit Item/Juice</h4>
                  </div>
                </div>
                <div class="card-body ">
                  <form method="POST" action=""  class="form-horizontal ajax" id="pkg_form">
                    <div class="row">
                      <label class="col-sm-2 col-form-label"> Name</label>
                      <div class="col-sm-3">
                        <div class="form-group bmd-form-group">
                          <input type="text" id="name" name="name" value="<?php echo $item->name?>" class="form-control" required>
                          
                        </div>
                      </div>
                    </div>
                  

                    <div class="row">
                      
                       <label class="col-sm-2 col-form-label">Price ($)</label>
                      <div class="col-sm-3">
                        <div class="form-group bmd-form-group">
                          <input id="iddd" value="<?php echo $this->uri->segment(3) ?>" hidden>
                          <input type="text" id="price" name="price" class="form-control" value="<?php echo $item->price ?>" required>
                        </div>
                      </div>
                    </div>

                     <div class="card-footer">
                  <input  type="button" onclick="edit_package()" value="Update" readonly id="submit_pkg" class="btn btn-fill btn-success">
                   
                </div>


                  </form>
                </div>
                
               

              </div>
            </div>
            
          </div>
        </div>
      </div>
     
    <div class="ps-scrollbar-x-rail" style="left: 0px; bottom: 0px;"><div class="ps-scrollbar-x" tabindex="0" style="left: 0px; width: 0px;"></div></div><div class="ps-scrollbar-y-rail" style="top: 0px; right: 0px;"><div class="ps-scrollbar-y" tabindex="0" style="top: 0px; height: 0px;"></div></div></div>
    <script>

function edit_package()
{

$(document).ready(function(){


    var name=$('#name').val();
    var price=$('#price').val();
    var id=$('#iddd').val();
   
    if(name==='')
    {
      md.showNotification('bottom','right','Package Name cannot be empty',2);
    }
    else if(price==='')
    {
      md.showNotification('bottom','right','Package Price Cannot be empty',2);
    }

    else
    {
        $.ajax({

      method:'POST',
      url:'<?php echo base_url('Admin/editItem_Controller') ?>',
      data:{name:name,price:price,id:id},
      success:function(result)
      {
        if(result=='false')
        {
          md.showNotification('bottom','right','Daily Package Not Updated ! Something went wrong. Please try Again.',2);
        }
        else if(result=='true')
        {
          md.showNotification('bottom','right','Daily Package Updated Successfully',3);
        }
        
      }
    });
    }

});


}

    </script>