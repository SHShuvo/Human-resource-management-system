<style scoped>
.headlines{
    background: rgb(86, 161, 231);
    color:#ffff;
}
.formd{
    margin-left: 2rem;
    margin-top: 1rem;
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
                    <strong>Set Working Days</strong>
                </div>
                
                <form class="form-horizontal">
                    <div class="form-check form-check-inline">
                    
                    <div class="form-group formd">
                        <div class="custom-control custom-checkbox">
                            <input v-model="form.saturday" type="checkbox" class="custom-control-input" id="saturday">
                            <label class="custom-control-label" for="saturday">Saturday</label>
                        </div>
                    </div>

                    <div class="form-group formd">
                        <div class="custom-control custom-checkbox">
                        <input v-model="form.sunday" type="checkbox" class="custom-control-input" id="sunday">
                        <label class="custom-control-label" for="sunday">Sunday</label>
                        </div>
                    </div>

                     <div class="form-group formd">
                        <div class="custom-control custom-checkbox">
                        <input v-model="form.monday" value="true" type="checkbox" class="custom-control-input" id="monday">
                        <label class="custom-control-label" for="monday">Monday</label>
                        </div>
                    </div>

                     <div class="form-group formd">
                        <div class="custom-control custom-checkbox">
                        <input v-model="form.tuesday" value="true" type="checkbox" class="custom-control-input" id="tuesday">
                        <label class="custom-control-label" for="tuesday">Tuesday</label>
                        </div>
                    </div>

                     <div class="form-group formd">
                        <div class="custom-control custom-checkbox">
                        <input v-model="form.wednesday" value="true" type="checkbox" class="custom-control-input" id="wednesday">
                        <label class="custom-control-label" for="wednesday">Wednesday</label>
                        </div>
                    </div>

                     <div class="form-group formd">
                        <div class="custom-control custom-checkbox">
                        <input v-model="form.thursday" value="true" type="checkbox" class="custom-control-input" id="thursday">
                        <label class="custom-control-label" for="thursday">Thursday</label>
                        </div>
                    </div>

                     <div class="form-group formd">
                        <div class="custom-control custom-checkbox">
                        <input v-model="form.friday" value="true" type="checkbox" class="custom-control-input" id="friday">
                        <label class="custom-control-label" for="friday">Friday</label>
                        </div>
                    </div>


                    </div>
                    <div class="form-group">
                        <div class="col-sm-offset-2 col-sm-10">
                          <button type="submit" @click.prevent="updateWorkingDays" class="btn btn-primary">Submit</button>
                        </div>
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

                form:new Form({
                    saturday:'',
                    sunday:'',
                    monday:'',
                    tuesday:'',
                    wednesday:'',
                    thursday:'',
                    friday:'',
                })
            }
        },
        mounted() {
            console.log('Component mounted.')
        },

        methods:{

        updateWorkingDays(){
          this.$Progress.start();
           this.form.post('/setWorkingDays')
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

       
      },

      created() {
         axios.get("/setWorkingDays")
         .then(({data})=>(this.form.fill(data)));
      }

    }
</script>
