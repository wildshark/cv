<!-- Body: Body -->       
<div class="body d-flex py-lg-3 py-md-2">
      <div class="container-xxl">
          <div class="row align-items-center">
              <div class="border-0 mb-4">
                  <div class="card-header py-3 no-bg bg-transparent d-flex align-items-center px-0 justify-content-between border-bottom flex-wrap">
                      <h3 class="fw-bold mb-0">Staffs</h3>
                      <div class="col-auto d-flex w-sm-100">
                          <button type="button" class="btn btn-dark btn-set-task w-sm-100" data-bs-toggle="modal" data-bs-target="#tickadd"><i class="icofont-plus-circle me-2 fs-6"></i>Add Tickets</button>
                      </div>
                  </div>
              </div>
          </div> <!-- Row end  -->
          <div class="row clearfix g-3">
            <div class="col-sm-12">
                  <div class="card mb-3">
                      <div class="card-body">
                          <table id="myProjectTable" class="table table-hover align-middle mb-0" style="width:100%">
                              <thead>
                                  <tr>
                                      <th>Staff Id</th>
                                      <th>Position</th>
                                      <th>Staff Name</th> 
                                      <th>Gender</th> 
                                      <th>Nationality</th>   
                                      <th>Actions</th>  
                                  </tr>
                              </thead>
                              <tbody>
                                  <?php
                                    if((!isset($profile))||($profile == false)){
                                        echo"";
                                    }else{
                                        $token = $_GET['token'];
                                        foreach($profile as $r){
                                            $ref = substr($r['ref'],-8);
                                            $id = $r['staff_id'];
                                            $name = $r['fname']." ".$r['sname'];
                                            $position = $r['position']; 
                                            $gender = $r['gender'];
                                            $nationality = $r['nationality'];
                                            $data = "https://app.iquipedigital.com/cv/?cv=".$r['ref'];
                                            if(!isset($r['image'])){
                                                $picture ="assets/images/xs/avatar1.jpg";
                                            }else{
                                                $picture = $r['image'];
                                            }
                                            echo"
                                            <tr>
                                                <td>
                                                    <a href='?main=view&profile={$id}&token={$token}' class='fw-bold text-secondary'>{$ref}</a>
                                                </td>
                                                <td>{$position}</td>
                                                <td>
                                                    <img class='avatar rounded-circle' src='{$picture}' alt=''>
                                                    <span class='fw-bold ms-1'>{$name}</span>
                                                </td>
                                                <td>{$gender}</td>
                                                <td>{$nationality}</td>
                                                <td>
                                                    <div class='btn-group' role='group' aria-label='Basic outlined example'>
                                                        <button type='button' class='btn btn-outline-secondary' data-bs-toggle='modal' data-bs-target='#mod{$ref}'><i class='icofont-qr-code text-success'></i></button>
                                                        
                                                        <div class='modal fade' id='mod{$ref}' tabindex='-1'  aria-hidden='true'>
                                                            <div class='modal-dialog modal-dialog-centered modal-md modal-dialog-scrollable'>
                                                                <div class='modal-content'>
                                                                    <div class='modal-header'>
                                                                        <h5 class='modal-title  fw-bold' id='createprojectlLabel'>Scan QrCode </h5>
                                                                        <button type='button' class='btn-close' data-bs-dismiss='modal' aria-label='Close'></button>
                                                                    </div>
                                                                    <div class='modal-body'>
                                                                        <div class='mb-3'>
                                                                        <img class='mx-auto d-block' src='https://api.qrserver.com/v1/create-qr-code/?data={$data}&amp;size=100x100' id='imagepreview' style='width: 200px; height: 200px;' >
                                                                        </div>
                                                                    </div>
                                                                    <div class='modal-footer'>
                                                                        <button type='button' class='btn btn-secondary' data-bs-dismiss='modal'>Done</button>
                                                                        <!--button type='button' class='btn btn-primary'>Create</button-->
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        
                                                        
                                                        
                                                        
                                                        
                                                        
                                                        
                                                    
                                                        <button type='button' class='btn btn-outline-secondary deleterow'><i class='icofont-ui-delete text-danger'></i></button>
                                                    </div>
                                                </td>
                                            </tr>";
                                        }
                                    }
                                ?>
                              </tbody>
                          </table>
                      </div>
                  </div>
            </div>
          </div><!-- Row End -->
      </div>
  </div>