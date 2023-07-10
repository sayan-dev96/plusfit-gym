<body id="mycont">
<div  class="main-panel ps-container ps-theme-default ps-active-y" data-ps-id="ad4dab3a-0431-c2c3-e934-a67efb7d756f">
      

      <div class="content">
          <div class="container-fluid">
          <div class="row">
            <div class="col-md-12">
              <div class="card">
                <div class="card-header card-header-primary card-header-icon">
                  <div class="card-icon">
                    <i class="material-icons">local_bar</i>
                  </div>
                  <h3 class="card-title">Juices/Items</h3>
                 
                </div>
                <div class="card-body">
                  <div class="toolbar">
                    
                  </div>
                  <div class="material-datatables">
                    <table id="datatables" class="table table-striped table-bordered table-hover" cellspacing="0" width="100%" style="width:100%">
                      <thead class="thead-dark">
                        <tr>
                          <th>Juice/Item</th>
                          
                          <th> Price</th>
                          <?php 
                            if($this->session->userdata('access_level')==1)
                            { 
                              ?>

                               <th class="disabled-sorting text-right">Actions</th>

                              <?php
                            }


                          ?>
                         
                        </tr>
                      </thead>
                      
                      <tbody>
                      
                          <?php
                          if($items->num_rows()>0)
                          {
                            foreach($items->result() as $item)
                            {
                              ?>

                              <tr>

                                <td><?php echo $item->name ?></td>
                                
                                <td>$ <?php echo $item->price ?></td>

                                <?php 
                                if($this->session->userdata('access_level')==1)
                                {
                                  ?>

                              <td class="text-right">
                                    
                                    <button type="button" onclick="Move(<?php echo $item->id ?>)" class="btn btn-link btn-warning btn-just-icon remove"><i class="material-icons">edit</i>

                                  
                                    <button type="button" onclick="del_item(<?php echo $item->id ?>,'<?php echo $item->name ?>')" class="btn btn-link btn-danger btn-just-icon remove"><i class="material-icons">close</i>
                                  
                                </td>

                                  <?php
                                }


                                ?>

                              </tr>

                              <?php

                            }
                          }
                        else
                        {
                          ?>
                          <h4>No Items/Juices found</h4>
                          <?php

                        }


                           ?>
                        
                        
                      </tbody>
                    </table>
                  </div>
                </div>
               
              </div>
              
            </div>
            
          </div>
          
        </div>
      </div>
    </div>

    <script>

      function del_item(id,name)
      {
       
        if(confirm("Are you sure you want to delete ?"))
        {
          $(document).ready(function(){

        $.ajax({
          method:"POST",
          url:'<?php echo base_url('Admin/delJuicePackage_Controller') ?>',
          data:{delid:id,name:name},
          success:function(result)
          {
           
            if(result=='true')
            {
                md.showNotification('bottom','right','Item Deleted Successfully',3);
            setTimeout(function(){
              location.reload();
            },2000);

            }
            else 
            {
                md.showNotification('bottom','right','Item Not Delted ! Something went wrong. Please Try again',2);

            }
          

            
          }
        });
    


        });
    


        }
        else
        {


        }
        

    }
    function Move(id)
    {
      location.href="editItemForm/"+id;
    }
     
    </script>
    
