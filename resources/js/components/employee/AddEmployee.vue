<style scoped>
.headlines{
    background:#56A1E7;
    color:#ffff;
}
.toplines{
    background:rgb(151, 189, 224);
    color: rgb(3, 41, 77);
    margin-top: 1.5rem;
}
.widget-user-image > img{
  margin-left:16px;
  margin-bottom: 9px;
  width: 120px !important;
}
.widget-user-image{ 
  background-position: center center !important;
}
</style>
<template>
        
    <div>
        <div class="row">
            <div class="col-md-12">
            <div class="card-header headlines">
                <strong>Add Employee</strong>
            </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-6">
                <div class="card-header toplines">
                    <strong>Personal Details</strong>
                </div>
                <div class="card-header">
                    <form class="form-horizontal">
                      <div class="form-group required">
                        <label for="firstName" class="col-sm-4 control-label">First Name</label>
                        <div class="col-sm-12">
                         <input v-model="form.firstName" type="text" name="firstName"
                            placeholder="First Name"
                            class="form-control" :class="{ 'is-invalid': form.errors.has('firstName') }">
                            <has-error :form="form" field="firstName"></has-error>
                        </div>
                      </div>

                      <div class="form-group required">
                        <label for="lastName" class="col-sm-4 control-label">last Name</label>
                        <div class="col-sm-12">
                         <input v-model="form.lastName" type="text" name="lastName"
                            placeholder="Last Name"
                            class="form-control" :class="{ 'is-invalid': form.errors.has('lastName') }">
                            <has-error :form="form" field="lastName"></has-error>
                        </div>
                      </div>

                      <div class="form-group required">
                        <label for="fatherName" class="col-sm-4 control-label">Father's Name</label>
                        <div class="col-sm-12">
                         <input v-model="form.fatherName" type="text" name="fatherName"
                            placeholder="Father's Name"
                            class="form-control" :class="{ 'is-invalid': form.errors.has('fatherName') }">
                            <has-error :form="form" field="fatherName"></has-error>
                        </div>
                      </div>

                      <div class="form-group required">
                        <label for="birthDate" class="col-sm-4 control-label">Date of Birth</label>
                        <div class="col-sm-12">
                         <date-picker v-model="form.birthDate" placeholder="Select Date of Birth" lang="en" format="YYYY-MM-DD">
                         </date-picker>
                        </div>
                      </div>

                      <div class="form-group required">
                        <label for="gender" class="col-sm-4 control-label">Gender</label>
                        <div class="col-sm-12">
                           <select v-model="form.gender" class="form-control">
                               <option value="" selected hidden>Select Gender</option>
                               <option>Male</option>
                               <option>Female</option>
                               <option>Others</option>
                           </select>
                        </div>
                      </div>

                      <div class="form-group required">
                        <label for="maritalStatus" class="col-sm-4 control-label">Marital Status</label>
                        <div class="col-sm-12">
                           <select v-model="form.maritalStatus" class="form-control">
                               <option value="" selected hidden>Select Marital Status</option>
                               <option value="married">Married</option>
                               <option value="unmarried">Unmarried</option>
                           </select>
                        </div>
                      </div>

                      <div class="form-group required">
                        <div class="widget-user-image">
                          <img :src="getPhoto()" alt="Employee Photo">
                        </div>
                       
                        <label for="photo" class="col-sm-4 control-label">Photo</label>

                        <div class="col-sm-12">
                          <input type="file" @change="updatePhoto" name="photo"
                            placeholder="Choose File" class="form-input" :class="{ 'is-invalid': form.errors.has('photo') }">
                            <has-error :form="form" field="photo"></has-error>
                        </div>
                      </div>

                    </form>
                      
                </div>

                
                
            </div>

            <div class="col-md-6">
                <div class="card-header toplines">
                <strong>Add Department</strong>
                </div>

                <div class="card-header">
                    <form class="form-horizontal">
                        <div class="form-group required">
                           <label for="address" class="col-sm-4 control-label">Present Address</label>
                            <div class="col-sm-12">
                            <textarea  v-model="form.address" name="address"
                                placeholder="Present Address"
                                class="form-control" :class="{ 'is-invalid': form.errors.has('address') }">
                                <has-error :form="form" field="address"></has-error>
                            </textarea>
                            </div>
                       </div>

                       <div class="form-group required">
                        <label for="city" class="col-sm-4 control-label">City</label>
                        <div class="col-sm-12">
                          <input v-model="form.city" type="text" name="city"
                            placeholder="City"
                            class="form-control" :class="{ 'is-invalid': form.errors.has('city') }">
                            <has-error :form="form" field="city"></has-error>
                        </div>
                       </div>

                       <div class="form-group required">
                        <label for="country" class="col-sm-4 control-label">Country</label>
                        <div class="col-sm-12">
                          <input v-model="form.country" type="text" name="country"
                            placeholder="Country"
                            class="form-control" :class="{ 'is-invalid': form.errors.has('country') }">
                            <has-error :form="form" field="country"></has-error>
                        </div>
                       </div>

                       <div class="form-group required">
                        <label for="email" class="col-sm-4 control-label">Email Address</label>

                        <div class="col-sm-12">
                          <input v-model="form.email" type="text" name="email"
                            placeholder="Email"
                            class="form-control" :class="{ 'is-invalid': form.errors.has('email') }">
                            <has-error :form="form" field="email"></has-error>
                        </div>
                      </div>


                       <div class="form-group required">
                        <label for="phone" class="col-sm-4 control-label">Phone</label>
                        <div class="col-sm-12">
                          <input v-model="form.phone" type="text" name="phone"
                            placeholder="Phone"
                            class="form-control" :class="{ 'is-invalid': form.errors.has('phone') }">
                            <has-error :form="form" field="phone"></has-error>
                        </div>
                       </div>

                    </form>
                </div>

                <div class="card-header toplines">
                <strong>Official Status</strong>
                </div>

                <div class="card-header">
                    <form class="form-horizontal">
                       <div class="form-group required">
                        <label for="employeeId" class="col-sm-4 control-label">Employee ID</label>
                        <div class="col-sm-12">
                          <input v-model="form.employeeId" type="text" name="employeeId"
                            placeholder="Employee ID"
                            class="form-control" :class="{ 'is-invalid': form.errors.has('employeeId') }">
                            <has-error :form="form" field="employeeId"></has-error>
                        </div>
                       </div>

                       <div class="form-group required">
                           <label for="department" class="col-sm-4 control-label">Department</label>
                        <div class="col-sm-12">
                            <select v-model="form.department" @change="updateDesignation" class="form-control">
                                <option value="" selected hidden>Select Department</option>
                                <option v-for="(department,index) in departmentList" :key="index">
                                  {{department.department}}
                                </option>
                            </select>
                        </div>
                        </div>

                        <div class="form-group required">
                           <label for="designation" class="col-sm-4 control-label">Designation</label>
                            <div class="col-sm-12">
                                <select v-model="form.designation" class="form-control">
                                    <option value="" selected hidden>Select Designation</option>
                                    <template v-for="department in designationList">
                                        <option v-for="(designation,index) in department.designation" :key="index">
                                        {{designation}}
                                        </option>
                                    </template>
                                </select>
                            </div>
                        </div>

                        <div class="form-group required">
                            <label for="birthDate" class="col-sm-4 control-label">Joining Date</label>
                            <div class="col-sm-12">
                            <date-picker v-model="form.joinDate" placeholder="Select Joining Date" lang="en" format="YYYY-MM-DD">
                            </date-picker>
                            </div>
                        </div>
                    </form>
                </div>

            </div>
                
        </div>

        <div class="row">
            <div class="col-md-1"></div>
            <div class="col-md-10">
              <button class="btn btn-success btn-block" @click="createEmployee()" style="margin:3rem 0rem" >Save</button>
            </div>
        </div>
    </div>                         
</template>

<script>
    export default {
        components: { DatePicker },
        data(){
            return{
            departmentList:{},
            designationList:{},
            form: new Form({
                firstName:'',
                lastName:'',
                fatherName:'',
                birthDate:'', 
                gender:'',
                maritalStatus:'',
                photo:'',
                address:'',
                city:'',
                country:'',
                email:'',
                phone:'',
                employeeId:'',
                department:'',  
                designation:'',
                joinDate:'',
            })
            }
        },
        mounted() {
            console.log('Component mounted.')
        },
        methods:{
            getPhoto(){
            if(this.form.photo==""){
               return '/img/photo/profile.png'
            }    
            let photo=(this.form.photo.length>100)? this.form.photo: '/img/photo/'+this.form.photo;
            return photo;
            },

            updatePhoto(e){
            let file=e.target.files[0];
            console.log(file);
            let reader=new FileReader();
            if (file['size']<=2111775) {
            reader.onloadend=(file)=> {
            this.form.photo=reader.result;
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
            },

            updateDesignation(){
                let department=this.form.department;
                this.designationList = this.departmentList.filter(function(val) {
                    return val.department === department;
                });
            },
           
            loadDepartmentList(){
              axios.get('/department').then(({data})=>(this.departmentList=data));
            },

            createEmployee(){
              this.form.birthDate=moment(this.form.birthDate).format('YYYY-MM-DD');
              this.form.joinDate=moment(this.form.joinDate).format('YYYY-MM-DD');

              this.form.post('/employee')
              .then(()=>{
                //Fire.$emit('afterCreate');
                toast.fire({
                  type: 'success',
                  title: 'New Holiday Created Successfully'
                })
                this.$Progress.finish();
              })
              .catch(()=>{
                
              })

            }

        },

        created() {
            this.loadDepartmentList();
            
            Fire.$on('afterCreate',()=>{
            this.loadDepartmentList();
            });
            
        }

    }

</script>