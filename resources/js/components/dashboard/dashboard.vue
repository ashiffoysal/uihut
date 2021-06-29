<template>
 <div class="dash-board-content-wrapper">
                <div class="sidemenu-toggler">
                    <button class="navbar-toggler" type="button">
                            <span class="navbar-toggler-icon"></span>
                        </button>
                </div>
                <div class="billing-history-wrapper">
                    <h4>User Update</h4>
                  <form  @submit.prevent="updateUser">
                        <div class="form-group row">
                          <label for="staticEmail" class="col-sm-2 col-form-label mt-3">First Name</label>
                          <div class="col-sm-6">
                            <input type="text"  v-model="userform.full_name" name="full_name"  class="form-control mt-3" value="" placeholder="Full Name">
                          </div>
                        </div>
                        <div class="form-group row">
                          <label for="staticEmail" class="col-sm-2 col-form-label mt-3">UserName</label>
                          <div class="col-sm-6">
                            <input type="text"  v-model="userform.user_name"  name="username" class="form-control mt-3" value="" placeholder="User Name" required>
                          </div>
                        </div>
                        <div class="form-group row">
                          <label for="staticEmail" class="col-sm-2 col-form-label mt-3">Email</label>
                          <div class="col-sm-6">
                            <input type="text" v-model="userform.email" class="form-control mt-3" value="" placeholder="Email" disabled>
                          </div>
                        </div>
                  
                        <div class="form-group row">
                          <label for="staticEmail" class="col-sm-2 col-form-label mt-3">Address</label>
                          <div class="col-sm-6">
                            <input type="text"  v-model="userform.address" class="form-control mt-3" value="" placeholder="Address">
                          </div>
                        </div>
                        <div class="form-group row">
                          <label for="staticEmail" class="col-sm-2 col-form-label mt-3">Image</label>
                          <div class="col-sm-4">
                            <input type="file" @change='upload_avatar' name="avatar" class="mt-3">
                          </div>
                          <div class="col-md-4">
                            <img :src="asset('public/uploads/user/'+userform.image)" style="height: 100px;" alt="">
                          </div>
                        </div>
                        
                        <div class="form-group row">
                          <label for="inputPassword" class="col-sm-2 col-form-label mt-3"></label>
                          <div class="col-sm-6">
                           <button type="submit" class="btn btn-success mt-3" style="padding: 17px 45px;font-size: 15px;">Update</button>
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
      data: () => ({
            userform: {
                full_name:'',
                user_name:'',
                email:'',
                address:'',
                avatar:'',
            }
        }),
    created(){
      this.loaduser();
    },
    methods:{
            updateUser(){
              axios.post('/update/user',this.userform).then((res)=>{
                   
                    var massage = res.data.message;

                    this.$notify({
                    text: massage,
                    });
                     this.userData.mail='';
                     this.userData.mail_err='';
                }).catch((error) => {
                    if(error.response.data.errors.mail){
                        this.mail_err = error.response.data.errors.mail[0];
                     }
                         
                });
            },
             upload_avatar(e){
              let file = e.target.files[0];
                let reader = new FileReader();  

                if(file['size'] < 2111775)
                {
                    reader.onloadend = (file) => {
                    //console.log('RESULT', reader.result)
                     this.userform.avatar = reader.result;
                    }              
                     reader.readAsDataURL(file);
                }else{
                    alert('File size can not be bigger than 2 MB')
                }
            },
            loaduser(){
              axios.defaults.headers.common['Authorization'] = 'Bearer ' +localStorage.getItem('access_token');
                axios.get('/user/edit').then(response =>{
                    //  console.log(response.data);
                     this.userform.full_name=response.data.full_name;
                     this.userform.user_name=response.data.user_name;
                     this.userform.email=response.data.email;
                     this.userform.address=response.data.address;
                     this.userform.image=response.data.image;
                    
                });
            }

          }
};
</script>

