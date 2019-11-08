<style scoped>
.headlines{
    background: rgb(86, 161, 231);
    color:#ffff;
}

.cont{
    margin-left: 100px;
    margin-right: 80px;
}

</style>
<template>
    <div class="cont">
        <div class=" row card-header headlines">
            <strong>Add Department</strong>
        </div>
        <div class="row card-header">
            <div class="col-md-10">
                <form class="form-horizontal card-body mt-4 ml-2">
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
                        <div class="col-sm-3">
                        </div>
                        <div class="col-sm-8">
                            <button @click.prevent="createDepartment()" class="btn btn-primary mt-3">Save</button>
                        </div>
                    </div>
                </form>
            </div>

            <div class="col-md-2">
                <div class="" style="margin-top: 8rem !important;">

                <a href="#" @click="addNewdesignation()"><strong><i class="fa fa-plus"></i>Add More</strong></a>
                </div>
            </div>    
        </div>      
    </div>            
</template>

<script>
    export default {
        data(){
            return{
            
            form: new Form({ 
            department:'',  
            designation: ['']
            })
            }
        },
        mounted() {
            console.log('Component mounted.')
        },
        methods:{
            addNewdesignation(){
                this.form.designation.push('',);
            },
            remove(index){
                 this.form.designation.splice(index,1);
            },

            createDepartment(){
                this.$Progress.start();
                this.form.post('/department')
                .then(()=>{
                toast.fire({
                    type: 'success',
                    title: 'New Department Added Successfully'
                    }) 
                this.form.reset();    
                this.$router.push('/admin/view-department');
                this.$Progress.finish();
                })
                .catch(()=> {
                this.$Progress.fail();
                });

            }
        }
    }

</script>