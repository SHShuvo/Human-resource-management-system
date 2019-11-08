<style scoped>
.form-group {
    margin-top: 2rem;
}
.headlines{
    background: rgb(86, 161, 231);
    color:#ffff;
}

.bodylines{
   background: rgba(209, 215, 219, 0.548);
}

.widget-user-image > img{
  margin-left:16px;
  margin-bottom: 9px;
  width: 120px !important;
}
.widget-user-image{ 
  background-position: center center !important;
}

.cont{
    margin-left: 100px;
    margin-right: 80px;
}
</style>
<template>
    <div class="cont">
        <div class="row">
            <div class="col-md-12">
            <div class="card">
                <div class="card-header headlines">
                    <strong>General Settings</strong>
                </div>
            <div class="card-header bodylines">
                <form class="form-horizontal">
                      <div class="form-group required">
                        <label for="name" class="col-sm-4 control-label">Company Name</label>
                        <div class="col-sm-11">
                         <input v-model="form.name" type="text" name="name"
                            placeholder="Name"
                            class="form-control" :class="{ 'is-invalid': form.errors.has('name') }">
                            <has-error :form="form" field="name"></has-error>
                        </div>
                      </div>
                      
                       
                      <div class="form-group required">
                        <div class="widget-user-image">
                          <img :src="getProfilePhoto()" alt="User Avatar">
                        </div>
                       
                        <label for="logo" class="col-sm-2 control-label">Logo</label>

                        <div class="col-sm-11">
                          <input  type="file" @change="updateLogo" name="logo"
                            placeholder="Choose File" class="form-input" :class="{ 'is-invalid': form.errors.has('logo') }">
                            <has-error :form="form" field="logo"></has-error>
                        </div>
                      </div>

                      <div class="form-group required">
                        <label for="email" class="col-sm-2 control-label">Email Address</label>

                        <div class="col-sm-11">
                          <input v-model="form.email" type="text" name="email"
                            placeholder="Email Address"
                            class="form-control" :class="{ 'is-invalid': form.errors.has('email') }">
                            <has-error :form="form" field="email"></has-error>
                        </div>
                      </div>

                       <div class="form-group required">
                        <label for="address" class="col-sm-2 control-label">Address</label>

                        <div class="col-sm-11">
                          <textarea  v-model="form.address" name="address"
                            placeholder="Address"
                            class="form-control" :class="{ 'is-invalid': form.errors.has('address') }">
                            <has-error :form="form" field="address"></has-error>
                          </textarea>
                        </div>
                       </div>

                       <div class="form-group required">
                        <label for="city" class="col-sm-2 control-label">City</label>

                        <div class="col-sm-11">
                          <input v-model="form.city" type="text" name="city"
                            placeholder="City"
                            class="form-control" :class="{ 'is-invalid': form.errors.has('city') }">
                            <has-error :form="form" field="city"></has-error>
                        </div>
                       </div>

                       <div class="form-group required">
                        <label for="country" class="col-sm-2 control-label">Country</label>

                        <div class="col-sm-11">
                          <input v-model="form.country" type="text" name="country"
                            placeholder="Country"
                            class="form-control" :class="{ 'is-invalid': form.errors.has('country') }">
                            <has-error :form="form" field="country"></has-error>
                        </div>
                       </div>

                       <div class="form-group required">
                        <label for="phone" class="col-sm-2 control-label">Phone</label>

                        <div class="col-sm-11">
                          <input v-model="form.phone" type="text" name="phone"
                            placeholder="Phone"
                            class="form-control" :class="{ 'is-invalid': form.errors.has('phone') }">
                            <has-error :form="form" field="phone"></has-error>
                        </div>
                       </div>

                        <div class="form-group required">
                        <label for="website" class="col-sm-2 control-label">Website</label>

                        <div class="col-sm-11">
                          <input v-model="form.website" type="text" name="website"
                            placeholder="Website"
                            class="form-control" :class="{ 'is-invalid': form.errors.has('website') }">
                            <has-error :form="form" field="website"></has-error>
                        </div>
                       </div>
                      
                      <div class="form-group">
                        <div class="col-sm-offset-2 col-sm-10">
                          <button type="submit" @click.prevent="updateInfo" class="btn btn-primary">Submit</button>
                        </div>
                      </div>
                    </form>
            </div>
            </div>        
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        data(){
            return{
                form:new Form({
                    name: '',
                    logo:'',
                    email: '',
                    address:'',
                    city:'',
                    country:'',
                    phone:'',
                    website:''
                })
            }
        },
        mounted() {
            console.log('Component mounted.')
        },

        methods:{
         getProfilePhoto(){
          let logo=(this.form.logo.length>100)? this.form.logo: '/img/logo/'+this.form.logo;
          return logo;
        },  
        updateInfo(){
          this.$Progress.start();
           this.form.post('/generalSettings')
           .then(()=>{

            toast.fire({
              type: 'success',
              title: 'Company Information Updated successfully'
              }) 
           this.$Progress.finish();
           })
           .catch(()=> {
           this.$Progress.fail();
           });
        },

        updateLogo(e){
         let file=e.target.files[0];
         console.log(file);
         let reader=new FileReader();
         if (file['size']<=2111775) {
           reader.onloadend=(file)=> {
           this.form.logo=reader.result;
           }
           reader.readAsDataURL(file);
         } 
         else {
            swal.fire(
            'Oops!',
            'you are uploading larger file than 2 MB ',
            'error'
            )
         }
         
        }
      },

      created() {
         axios.get("/generalSettings")
         .then(({data})=>(this.form.fill(data)));
      }

    }
</script>
