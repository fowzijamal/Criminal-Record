        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Criminal Information</h6>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th></th>
                      <th> Criminal Information</th>
                      <th>Victim Information</th>
                      <th>Date Of registeration</th>
                      <th></th>
                    </tr>
                  </thead>
                  <tfoot>
                    <tr>
                      <th></th>
                      <th>Criminal Information</th>
                      <th>Victim information</th>
                      <th>Date Of Registeration</th>
                      <th> </th>
                    </tr>
                  </tfoot>
                  <tbody>
                      <?php                    
                        $result = mysqli_query($db, "SELECT * FROM `criminal` ORDER BY `criminal`.`id` DESC");
                        while ($row = mysqli_fetch_array($result)) {
                            echo "<tr>
                                    <td><img src='".$row['image']."'class='"."rounded-circle"."'width='"."50"."'height='"."50"."'> </td>
                                    <td>".$row['fName']." ".$row['lName']."<br>
                                    Father's Name: " .$row['fathersName']."<br>
                                    Mothers's Name: " .$row['mothersName']."<br>
                                    Criminal NID: " .$row['CNID']."<br>
	
									 <a href='read-criminal.php?id=". $row['id'] ."' title='View Record' data-toggle='tooltip'><span class='fa fa-eye'></span></a>
                                    </td>
                                    <td> Victim NID: ".$row['VNID']."<br>
                                     Name of victim:  ".$row['VName']."<br>
									
                                    </td>
                                    <td>".$row['dateOFbirth']."
									
									</td>
									
                                    <td>
                                      <a href='read-criminal.php?id=". $row['id'] ."' title='View Record' data-toggle='tooltip'><span class='fa fa-eye'></span></a>"

									  
					?> 
						        <?php 
      if($_SESSION['userRoll'] == "admin"){    
      ?>



                                      <a href='delete-criminal.php?id=<?php echo $row['id']; ?>' title='Delete Record' data-toggle='tooltip'><span class='fa fa-trash'></span></a>


									 
				        <?php 
        };
      ?>
	  
	  
					 <?php echo"
                                    </td>
                                  </tr> ";
                                  
                        }
                      ?>  
					  
					  
					  
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
        <!-- /.container-fluid -->
