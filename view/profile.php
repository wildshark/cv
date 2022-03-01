<!-- Body: Body -->
<div class="body d-flex py-3">
    <div class="container-xxl">
        <div class="row align-items-center">
            <div class="border-0 mb-4">
                <div class="card-header py-3 no-bg bg-transparent d-flex align-items-center px-0 justify-content-between border-bottom flex-wrap">
                    <h3 class="fw-bold mb-0"><?=$title?></h3>
                </div>
            </div>
        </div> <!-- Row end  -->

        <div class="row align-item-center">
            <div class="col-md-12">
                <div class="card mb-3">
                    <div class="card-header py-3 d-flex justify-content-between bg-transparent border-bottom-0">
                        <h6 class="mb-0 fw-bold ">Basic Form</h6> 
                    </div>
                    <div class="card-body">
                        <form method="post" action="index.php" enctype="multipart/form-data">
                            <div class="row g-3 align-items-center">
                                <div class="col-md-6">
                                    <label for="firstname" class="form-label">First Name</label>
                                    <input type="text" class="form-control" name="fname" value="<?=$fname?>" required>
                                </div>
                                <div class="col-md-6">
                                    <label for="lastname" class="form-label">Last Name</label>
                                    <input type="text" class="form-control" name="sname" value="<?=$sname?>" required>
                                </div>
                                <div class="col-md-6">
                                    <label for="admitdate" class="form-label">Date of Birth</label>
                                    <input type="date" class="form-control" name="dob" value="<?=$dob?>" required>
                                </div>
                                <div class="col-md-6">
                                    <label for="admitdate" class="form-label">Nationality</label>
                                    <input type="text" class="form-control" name="nationality" value="<?=$nationality?>" required>
                                </div>
                                <div class="col-md-6">
                                    <label for="admitdate" class="form-label">State of Origin</label>
                                    <input type="text" class="form-control" name="state" value="<?=$state?>" required>
                                </div>
                                <div class="col-md-6">
                                    <label  class="form-label">Gender</label>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="gender" value="male" checked>
                                                <label class="form-check-label" for="gender">Male</label>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="gender" value="female">
                                                <label class="form-check-label" for="gender">Female</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <label  class="form-label">Position</label>
                                    <input type="text" class="form-control" name="position" value="<?=$position?>" required>
                                </div>
                                <div class="col-md-6">
                                    <label  class="form-label">Phone Number</label>
                                    <input type="text" class="form-control" name="mobile" value="<?=$mobile?>" required>
                                </div>
                                <div class="col-md-6">
                                    <label for="emailaddress" class="form-label">Email Address</label>
                                    <input type="email" class="form-control" name="email" value="<?=$email?>" required>
                                </div>                               
                                <div class="col-md-6">
                                    <label for="formFileMultiple" class="form-label"> File Upload</label>
                                    <input class="form-control" type="file" name="image" multiple required>
                                </div>
                                <div class="col-md-12">
                                    <label for="addnote" class="form-label">Home/Contact Address</label>
                                    <textarea  class="form-control" name="address" rows="3"><?=$address?>"</textarea> 
                                </div>
                            </div>  
                            <button type="submit" name="submit" value="profile-add" class="btn btn-primary mt-4">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div><!-- Row end  -->
    </div>
</div>