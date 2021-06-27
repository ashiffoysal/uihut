<template>
 <div class="dash-board-content-wrapper">
                <div class="sidemenu-toggler">
                    <button class="navbar-toggler" type="button">
                            <span class="navbar-toggler-icon"></span>
                        </button>
                </div>
                <div class="billing-history-wrapper">
                    <h4>User Update</h4>
                  <form>
                        <div class="form-group row">
                          <label for="staticEmail" class="col-sm-2 col-form-label mt-3">Full Name</label>
                          <div class="col-sm-6">
                            <input type="text"  class="form-control mt-3" value="" placeholder="Full Name">
                          </div>
                        </div>
                        <div class="form-group row">
                          <label for="staticEmail" class="col-sm-2 col-form-label mt-3">UserName</label>
                          <div class="col-sm-6">
                            <input type="text"  class="form-control mt-3" value="" placeholder="User Name">
                          </div>
                        </div>
                        <div class="form-group row">
                          <label for="staticEmail" class="col-sm-2 col-form-label mt-3">Email</label>
                          <div class="col-sm-6">
                            <input type="text"  class="form-control mt-3" value="" placeholder="Email">
                          </div>
                        </div>
                  
                        <div class="form-group row">
                          <label for="staticEmail" class="col-sm-2 col-form-label mt-3">Address</label>
                          <div class="col-sm-6">
                            <input type="text"  class="form-control mt-3" value="" placeholder="Address">
                          </div>
                        </div>
                          <div class="form-group row">
                          <label for="staticEmail" class="col-sm-2 col-form-label mt-3">Image</label>
                          <div class="col-sm-6">
                            <input type="file"  name="pic" class="mt-3">
                          </div>
                        </div>
                        
                        <div class="form-group row">
                          <label for="inputPassword" class="col-sm-2 col-form-label mt-3"></label>
                          <div class="col-sm-6">
                           <button class="btn btn-success mt-3" style="padding: 17px 45px;
    font-size: 15px;">Update</button>
                          </div>
                        </div>
                    </form>
                    <div class="paymnet-m-file">
                        <h4>Payment Method on File :</h4>
                        <div class="row">
                            <div class="col-md-8">
                                <p>MasterCard ending in 1985 expiring 03/2023</p>
                            </div>
                            <div class="col-md-4">
                                <div class="pmf-edit-remove">
                                    <a href="#" class="er-btn erb-1">Edit</a>
                                    <a href="#" class="er-btn erb-2">Remove</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
</template>
<script>
export default {
  name: "Dashboard",
  mounted() {
    
  },
};
</script>

