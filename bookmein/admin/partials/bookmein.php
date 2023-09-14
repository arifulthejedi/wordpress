<!-- card body -->
<center class="mt-3 mb-3">
        <div class="container">
            <div class="row align-items-center justify-content-center fullheight">
                <div class="row">
                    <div class="card col-sm-12 col-md-10 col-lg-6 m-auto bg-light">
                        <div class="card-body">
                            <h1 class="card-title">Create a Campaign</h1>
                            <form id="myform" class="text-start mt-3">
                                <div class="mb-3 control-wrapper">
                                    <div class="label-container">
                                        <label for="exampleInputText" class="form-label">Campaign Name</label>
                                    </div>
                                    <input type="text" class="form-control" id="exampleInputText">
                                    <div class="display-msg"></div>
                                </div>
                                <div class="mb-3 control-wrapper">
                                    <div class="label-container">
                                        <label for="exampleInputPassword" class="form-label" >Added Fields</label>
                                    </div>
                                    <div id="bookmeinaddedfields" class="rounded-2" style="border: 1px solid #8c8f94;width:80%;min-height:50px;max-height: auto;">
                                    </div>
                                    <div id="bookmeinaddedfieldsmsg" class="form-text">To delete any added filed just click the field</div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col">
                                       <div class="label-container">
                                          <label for="exampleInputText" class="form-label">Field Name</label>
                                       </div>
                                       <input type="text" class="form-control" placeholder="Field Name" aria-label="Last name">                                       
                                    </div>
                                    <div class="col">
                                       <div class="control-wrapper">
                                       <div class="label-container">
                                          <label for="exampleInputText" class="form-label">Select Field</label>
                                       </div>
                                       <select id="bookmeinfieldselect" class="form-select form-select-sm" aria-label="Default select example">
                                          <option selected><?php echo"One" ?></option>
                                          <option value="1">Two</option>
                                          <option value="2">Three</option>
                                          <option value="3">Four</option>
                                       </select>
                                       </div>
                                       </div>
                                    </div>
                                <div class="mb-4 control-wrapper">
                                  <button id="bookmeinaddfield" type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#staticBackdrop">Add Field</button>
                                </div>                                
                                <div class="mb-3 control-wrapper">
                                    <div class="label-container">
                                        <label  class="form-label">Admin Name</label>
                                    </div>
                                    <input type="text" class="form-control" id="exampleInputPassword" minlength="3" maxlength="10">
                                    <div class="display-msg"></div>
                                </div>
                                <div class="mb-3 control-wrapper">
                                    <div class="label-container">
                                        <label class="form-label">Password</label>
                                    </div>
                                    <input type="password" class="form-control" id="exampleInputPassword" minlength="3" maxlength="10">
                                    <div class="display-msg"></div>
                                </div>
                              <div class="mt-4 control-wrapper">
                                  <button type="submit" class="btn btn-primary d-block m-auto">Submit</button>
                              </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </center>
<!-- cad body end -->

<!-- Modal -->
<div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content bg-light">
        <div class="modal-header">
          <h5 class="modal-title" id="staticBackdropLabel">Imput Details</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
           <!-- form will append here -->
        </div>
        <div class="errmasg text-danger">
           <p class="m-2">Some thing wents wrong</p>
        </div>
        <div class="modal-footer">
          <!-- <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button> -->
          <button type="button" class="btn btn-primary">Done</button>
        </div>
      </div>
    </div>
</div>

<!-- toast -->
<div id="bkmn" class="toast align-items-center text-bg-danger border-0 position-fixed bottom-0 end-0 m-2" role="alert" aria-live="assertive" aria-atomic="true">
    <div class="d-flex">
      <div class="toast-body">
        Hello, world! This is a toast message.
      </div>
      <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast" aria-label="Close"></button>
    </div>
  </div>

