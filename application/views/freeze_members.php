<body id="mycont">
<div  class="main-panel ps-container ps-theme-default ps-active-y" data-ps-id="ad4dab3a-0431-c2c3-e934-a67efb7d756f">
      

      <div class="content">
          <div class="container-fluid">
          <div class="row">
            <div class="col-md-12">
              <div class="card">
                <div class="card-header card-header-primary card-header-icon">
                  <div class="card-icon">
                    <i class="material-icons">people</i>
                  </div>
                  <h3 class="card-title">Freezed Members</h3>
                  <!-- <a href="addVisitorForm" class="pull-right btn btn-primary btn-round" title="Add Visitor"><i class="material-icons">person_add</i><div class="ripple-container"></div></a> -->
                </div>
                <div class="card-body">
                  <div class="toolbar">
                   
                  </div>
                  <div class="material-datatables">
                    <table id="datatables" class="table table-striped table-bordered table-hover" cellspacing="0" width="100%" style="width:100%">
                      <thead class="thead-dark">
                        <tr>
                          <th>#</th>
                          <th>Name</th>
                          <th>Address</th>
                          <th>Status</th>
                          <th>Start Date</th>
                          <th>End Date</th>
                          <th>Fee Status</th>
                        
                        </tr>
                      </thead>
                      
                      <tbody>
                      
                          <?php
                          if($members->num_rows()>0)
                          {
                            $counter=0;
                            foreach($members->result() as $mem)
                            {
                              $counter++;
                              ?>

                              <tr>

                                <td><?php echo $counter ?></td>
                                <td><?php echo $mem->member_name ?></td>
                                <td><?php echo $mem->member_address ?></td>
                                <td><?php echo $mem->status ?></td>
                                <td><?php echo $mem->monthlyfee_date ?></td>
                                <td><?php echo $mem->end_date ?></td>
                                <td><?php echo $mem->fee_status?></td>
                             


                              </tr>

                              <?php

                            }
                          }
                        else
                        {
                          ?>
                          <h4>No Freezed Members</h4>
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

