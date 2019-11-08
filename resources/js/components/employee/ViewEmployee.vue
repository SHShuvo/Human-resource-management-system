<style scoped>
.headlines{
    background: rgb(86, 161, 231);
    color:#ffff;
    margin-bottom: 5px;
}


</style>
<template>
    <div class="row">
        <div class=" row card-header headlines">
            <strong>Add Employee</strong>
        </div>
        <div class="row card">
            <table class="table table-bordered">
                <thead class="thead-light">
                  <tr>
                    <th width="10%">SL</th>
                    <th width="25%">Department</th>
                    <th width="50%">Designation</th>
                    <th width="15%">Action</th>
                  </tr>
                </thead>

                <tbody>
                  <tr v-for="(department, index) in departmentList" :key="department.id">
                    <td>{{index+1}}</td>
                    <td>{{department.department}}</td>
                    <td > 
                       <span v-for="(desig,key) in department.designation" :key="key">
                            <p class="abc">{{desig}}</p>
                        </span>
                    </td>
                    
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

        <div class="modal fade" id="addNew" tabindex="-1" role="dialog" aria-labelledby="addNewLabel" aria-hidden="true">
        <div class="modal-dialog mod-size modal-dialog-centered" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addNew">Update Department</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <form @submit.prevent="updateDepartment()">
            <div class="modal-body">
                
                <div class="form-group row mb-5">
                    <label for="department" class="col-md-3 control-label">Add Department:</label>

                    <div class="col-md-8">
                    <input v-model="form.department" type="text" name="department"
                        placeholder="Department Name"
                        class="form-control" :class="{ 'is-invalid': form.errors.has('department') }">
                        <has-error :form="form" field="department"></has-error>
                    </div>
                    
                </div>

                <div v-for="(dsgn,k) in form.designation" :key="k" class="form-group row">
                    <label for="designation" class="col-sm-3 control-label">Add Designation:</label>

                    <div class="col-sm-8">
                    <input v-model="form.designation[k]" type="text" name="designation"
                        placeholder="Add Designation"
                        class="form-control" :class="{ 'is-invalid': form.errors.has('designation') }">
                        <has-error :form="form" field="designation"></has-error>
                    </div>
                    <div class="col-md-1">
                        <span @click="remove(k)" style="cursor:pointer; color:red">X</span>
                    </div>
                </div>

                <div class="form-group row">
                    <div class="col-md-8"></div>

                    <div class="col-md-4">
                       <a href="#" @click="addDesignation()"><strong><i class="fa fa-plus"></i>Add More Designation</strong></a>
                    </div>
                    
                </div>

            </div>
            <div class="modal-footer pr-5">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Update</button>
            </div>
            </form>

            </div>
        </div>
    </div>     
    </div>            
</template>

<script>
    export default {
        data(){
            return{
            departmentList:{},
            form: new Form({ 
            id:'',    
            department:'',  
            designation: ['']
            })
            }
        },
        mounted() {
            console.log('Component mounted.')
        },
        methods:{
            addDesignation(){
                this.form.designation.push('',);
            },
            remove(index){
                 this.form.designation.splice(index,1);
            },

            loadDepartmentList(){
              axios.get('/department').then(({data})=>(this.departmentList=data));
            },

            editModal(department){
                this.form.reset();
                this.loadDepartmentList();
                $('#addNew').modal('show');
                this.form.fill(department);
            },

            updateDepartment(){
                this.$Progress.start();
                this.form.put('/department/'+this.form.id)
                .then(()=>{
                    swal.fire(
                    'Updated!',
                    'The Department has been updated.',
                    'success'
                    )
                    Fire.$emit('afterCreate');
                    $('#addNew').modal('hide');
                    this.$Progress.finish();
                })
                .catch(()=>{
                    swal.fire("Failed!", "There was something wrong.", "warning");
                    this.$Progress.fail();
                })

            },

            deleteDepatment(id){
                swal.fire({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                type: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!'
                }).then((result) => {
                    if (result.value) {
                    this.$Progress.start();
                    this.form.delete('/department/'+id)
                    .then(()=>{
                        swal.fire(
                        'Deleted!',
                        'The Department has been deleted.',
                        'success'
                        )
                        Fire.$emit('afterCreate');
                        this.$Progress.finish();
                    }).catch(()=> {
                        swal.fire("Failed!", "There was something wrong.", "warning");
                    });
                    }
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