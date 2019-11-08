<style scoped>
.headlines{
    background: #3490dc;
    color:#ffff;
    padding: 0.50rem 0.75rem;
}
.cardt{
    margin-top: 2px;
    font-size: 20px;

}
.listt{
   margin-top: 1px;
   font-size: 18px;
   padding: 0.3rem 1.50rem;
   color:#004085;
   background-color:#eff2f5;
}
.ic{
   padding-right: 10px;
}

.cus-select {
    width: 85px;
    margin-bottom:6px;
    margin-right:5px;
    padding: 2px 9px;
    border: 1px solid #56a1e7;
    border-radius: 3px;
    overflow: hidden;
    position: relative;
    line-height: 1;
    color:#004085 ;
    vertical-align: middle;
}
.select-title{
    display: inline-block;
    font-size: 19px;
    color:#56a1e7;
    margin-left: 5px;
}


.list-group-item-primary.list-group-item-action:focus,.list-group-item-primary.list-group-item-action:hover{color:#fff;background-color:#56a1e7}
.list-group-item-primary.list-group-item-action.active{color:#fff;background-color:#56a1e7;border-color:#004085}
</style>
<template>
    <div class="row">
      
        <div class="col-md-3">
          <div class="">
            <div class="select-title">Select Year:</div>
          <select v-model="selectedYear" placeholder="select year" class="cus-select">
                <option v-for="year in 32" :key="year">{{year+2018}}</option>
          </select>

          <button  @click="holidaySearch(selectedMonth)" class="btn btn-sm btn-primary" style="font-weight:500; margin-bottom:6px">
            <i class="fa fa-search"></i>
          </button>
          </div>

          <div class="card">
            <div class="">
             
            </div>
             <div class=" card-header headlines ">
                <span class="cardt d-inline">Select Month</span>
              </div>
            <div class="list-group">
                <a href="#" @click="holidaySearch(1)" class=" list-group-item list-group-item-primary list-group-item-action listt">
                  <i class="ic fa fa-calendar-alt"></i>January</a>
                <a href="#" @click="holidaySearch(2)" class=" list-group-item list-group-item-primary list-group-item-action listt">
                  <i class="ic fa fa-calendar-alt"></i>February</a>
                <a href="#" @click="holidaySearch(3)"  class=" list-group-item list-group-item-primary list-group-item-action listt">
                  <i class="ic fa fa-calendar-alt"></i>March</a>
                <a href="#" @click="holidaySearch(4)" class=" list-group-item list-group-item-primary list-group-item-action listt">
                  <i class="ic fa fa-calendar-alt"></i>April</a>
                <a href="#" @click="holidaySearch(5)" class=" list-group-item list-group-item-primary list-group-item-action listt">
                  <i class="ic fa fa-calendar-alt"></i>May</a>
                <a href="#" @click="holidaySearch(6)" class=" list-group-item list-group-item-primary list-group-item-action listt">
                  <i class="ic fa fa-calendar-alt"></i>June</a>
                <a href="#" @click="holidaySearch(7)" class=" list-group-item list-group-item-primary list-group-item-action listt">
                  <i class="ic fa fa-calendar-alt"></i>July</a>
                <a href="#" @click="holidaySearch(8)" class=" list-group-item list-group-item-primary list-group-item-action listt">
                  <i class="ic fa fa-calendar-alt"></i>August</a>
                <a href="#" @click="holidaySearch(9)" class=" list-group-item list-group-item-primary list-group-item-action listt">
                  <i class="ic fa fa-calendar-alt"></i>September</a>
                <a href="#" @click="holidaySearch(10)" class=" list-group-item list-group-item-primary list-group-item-action listt">
                  <i class="ic fa fa-calendar-alt"></i>October</a>
                <a href="#" @click="holidaySearch(11)" class=" list-group-item list-group-item-primary list-group-item-action listt">
                  <i class="ic fa fa-calendar-alt"></i>November</a>
                <a href="#" @click="holidaySearch(12)" class=" list-group-item list-group-item-primary list-group-item-action listt">
                  <i class="ic fa fa-calendar-alt"></i>December</a>
              </div>
          </div>
        </div> 
        <div class="col-md-9">
            <div class="">
              <button class="btn btn-sm btn-outline-primary" style="font-weight:500; margin-bottom:6px" @click="newModal()">
                <strong>+Add New Holiday</strong></button>
                
            </div>
            <div class="card">
              <div class=" card-header headlines">
                <span class="cardt d-inline">Holiday List</span>
              </div>
              <!-- /.card-header -->
              <div class="card-body table-responsive p-0">
                <table class="table table-hover table-striped">
                  <tbody>
                  <tr>
                    <th>SL</th>
                    <th>Event Name</th>
                    <th>Start Date</th>
                    <th>End Date</th>
                    <th>Action</th>
                    
                  </tr>

                  <tr v-for="(holiday, index) in holidayList" :key="holiday.id">
                    <td>{{index+1}}</td>
                    <td>{{holiday.holiday_name}}</td>
                    <td>{{holiday.start_date |rdate}}</td>
                    <td>{{holiday.end_date |rdate}}</td>
                    
                    <td>
                        <button href="" @click="editModal(holiday)">
                            <i class="fa fa-edit text-blue" ></i>
                        </button>  <span style="margin:0 3px; color:blue">|</span>

                        <button href=""  @click="deleteUser(holiday.id)">
                            <i class="fa fa-trash text-red"></i>
                        </button>
                    </td>
                  </tr>

                </tbody></table>
              </div>
                 <div class="card-footer ">
                 </div>
            </div>
           
        </div>
         <div class="modal fade" id="addNew" tabindex="-1" role="dialog" aria-labelledby="addNewLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <h5 v-show="!editMode" class="modal-title" id="addNew">Add New Holiday</h5>
                <h5 v-show="editMode" class="modal-title" id="addNew">Update Holiday Info</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <form @submit.prevent="editMode? updateUser():createUser()">
            <div class="modal-body">
                <div class="form-group"> 
                  <input v-model="form.holiday_name" type="text" name="holiday_name"
                    placeholder="Holiday Name"
                    class="form-control" :class="{ 'is-invalid': form.errors.has('holiday_name') }">
                  <has-error :form="form" field="holiday_name"></has-error>
                </div>

                <div class="form-group">
                  <span>Start date:</span>  
                   <date-picker v-model="s_date" placeholder="Select Start Date" lang="en" format="YYYY-MM-DD"></date-picker>
                </div>

                <div class="form-group">
                  <span>End date:</span>  
                   <date-picker v-model="e_date" placeholder="Select End Date" lang="en" format="YYYY-MM-DD"></date-picker>
                </div>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                <button v-show="!editMode" type="submit" class="btn btn-success">Create</button>
                <button v-show="editMode" type="submit" class="btn btn-primary">Update</button>
            </div>
            </form>

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
          editMode:false,
          selectedYear:'2019',
          selectedMonth:'',
          holidayList:{},
          s_date:'',
          e_date:'',
          form:new Form({
            id:'',  
            holiday_name:'',
            start_date:'',
            end_date:'', 
            
          })
          
      }
    },
    mounted() {
        console.log('Component mounted.')
    },

    methods:{

      newModal(){
        this.editMode=false;
        this.form.reset();
        
        $('#addNew').modal('show');
      },

      editModal(holiday){
          this.editMode=true;
        this.form.reset();
        this.s_date=holiday.start_date;
        this.e_date=holiday.end_date;

        $('#addNew').modal('show');

        this.form.fill(holiday);
      },

      holidaySearch(month){
        this.selectedMonth=month;
        Fire.$emit('searching');
        
      },

      dformat(s_date,e_date){
         this.form.start_date=moment(s_date).format('YYYY-MM-DD');
         if(e_date==""){
           this.form.end_date=moment(s_date).format('YYYY-MM-DD');
         }
         else{
           this.form.end_date=moment(e_date).format('YYYY-MM-DD');
         }
      },
      
      loadHolidayList(){
            this.holidayList=null;
            axios.get('/setHolidays').then(({data})=>(this.holidayList=data));
      },
      
      updateUser(){
          this.dformat(this.s_date,this.e_date);
          this.$Progress.start();
           this.form.put('/setHolidays/'+this.form.id)
           .then(()=>{
            swal.fire(
              'Updated!',
              'The user has been updated.',
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
      deleteUser(id){
          swal.fire({
              title: 'Are you sure?',
              text: "You won't be able to revert this!",
              type: 'warning',
              showCancelButton: true,
              confirmButtonColor: '#3085d6',
              cancelButtonColor: '#d33',
              confirmButtonText: 'Yes, delete it!'
              }).then((result) => {
              // Send request to the server
                  if (result.value) {
                    this.$Progress.start();
                    this.form.delete('/setHolidays/'+id)
                    .then(()=>{
                      
                      swal.fire(
                      'Deleted!',
                      'The user has been deleted.',
                      'success'
                      )
                      Fire.$emit('afterCreate');
                      this.$Progress.finish();
                    }).catch(()=> {
                      swal.fire("Failed!", "There was something wrong.", "warning");
                    });
                  }
          })
      },

      createUser(){
        this.dformat(this.s_date,this.e_date);
        this.$Progress.start();
        this.form.post('/setHolidays')
        .then(()=>{
          Fire.$emit('afterCreate');
          $('#addNew').modal('hide');
          toast.fire({
            type: 'success',
            title: 'New Holiday Created Successfully'
            })
          this.$Progress.finish();
          })
        .catch(()=>{
          
        })
        
      },

    }, 

    created() {
      Fire.$on('searching',()=>{
        axios.get('/findHoliday?year='+this.selectedYear+'&month='+this.selectedMonth)
            .then((data)=>{
               this.holidayList=data.data;
            })
            .catch()
            
          });
      this.loadHolidayList();
          Fire.$on('afterCreate',()=>{
            this.loadHolidayList();
          });
    }    
  }
</script>
