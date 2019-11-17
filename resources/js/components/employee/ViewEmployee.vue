<style scoped>
.headlines{
    background:#56A1E7;
    color:#ffff;
}
</style>
<template>
        
    <div>
        <div class="row">
            <div class="col-md-12">
            <div class="card-header headlines">
                <strong>Employee List</strong>
            </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12">
                <div class="card">    
                    <table class="table table-bordered">
                        <thead class="thead-light">
                        <tr>
                            <th width="7%">SL</th>
                            <th width="15%">Employee ID</th>

                            <th width="20%">Name</th>
                            <th width="15%">Department</th>
                            <th width="20%">Designation</th>
                            <th width="13%">Joinin Date</th>
                            <th width="10%">Action</th>
                        </tr>
                        </thead>

                        <tbody>
                        <tr v-for="(employee, index) in employeeList" :key="index">
                            <td>{{index+1}}</td>
                            <td>{{employee.employeeId}}</td>
                            <td>{{employee.firstName}}{{" "+employee.lastName}}</td>
                            <td >{{employee.department}}</td>
                            <td >{{employee.designation}}</td>
                            <td >{{employee.joinDate | rdate}}</td>
                            
                            <td>
                                <button href="" @click="editModal(department)">
                                    <i class="fa fa-edit text-blue" ></i>
                                </button>  <span style="margin:0 3px; color:blue">|</span>

                                <button href="" @click="deleteDepatment(department.id)">
                                    <i class="fa fa-trash text-red"></i>
                                </button>
                            </td>
                        </tr>

                        </tbody>
                    </table>
                </div>
            </div>
               
        </div>

       
    </div>                         
</template>

<script>
    export default {
        components: { DatePicker },
        data(){
            return{
            employeeList:{},    
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

            loadEmployeeList(){
               axios.get('/employee').then(({data})=>(this.employeeList=data));
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
            this.loadEmployeeList();
            
            Fire.$on('afterCreate',()=>{
            this.loadDepartmentList();
            });
            
        }

    }

</script>