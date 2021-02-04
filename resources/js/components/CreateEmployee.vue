<template>
    <form method="post"
    :action="route"
    id="CreateEmployee"
    @submit.prevent="submitForm">
        <div :class="['success-message alert alert-success ', success ? 'display-block' : ' ']">
            <i class="fa fa-check-circle" aria-hidden="true"></i>
            Employee added successfully
        </div>
        <input type="hidden" name="_token" :value="csrf" />
        <!--Name-->
        <div class="form-group">
            <label for="name">
                Name:
                <span class="required">*</span>
            </label>
            <div
                :class="[
                            ' custom-input',
                            errors.name ? 'invalid' : ''
                        ]"
            >
                <input
                type="text"
                class="form-control font-basic font-xs light"
                id="name"
                name="name"
                v-model="form.name"
                />
                <span class="required">{{ errors.name }}</span>
            </div>
        </div>

        <!--Gender-->
        <div class="form-group">
            <label for="gender">
                Gender:
                <span class="required">*</span>
            </label>
            <select class="form-select" aria-label="Default select example" v-model="form.gender">
                <option value="female">Female</option>
                <option  value="male">Male</option>
            </select>
        </div>

         <!--Work Years-->
        <div class="form-group">
            <label for="workyears">
                No of work years:
                <span class="required">*</span>
            </label>
            <div
                :class="[
                            ' custom-input',
                            errors.work_years ? 'invalid' : ''
                        ]"
            >
                <input
                type="number"
                step="0.5"
                class="form-control font-basic font-xs light"
                id="workYears"
                name="work_years"
                v-model="form.work_years"
                />
                <span class="required">{{ errors.work_years }}</span>
            </div>
        </div>

         <!--Salary-->
        <div class="form-group">
            <label for="name">
                Salary:
                <span class="required">*</span>
            </label>
            <div
                :class="[
                            ' custom-input',
                            errors.salary ? 'invalid' : ''
                        ]"
            >
                <input
                type="number"
                step="0.01"
                class="form-control font-basic font-xs light"
                id="salary"
                name="salary"
                v-model="form.salary"
                />
                <span class="required">{{ errors.salary }}</span>
            </div>
        </div>

        <div class="add">
             <button type="submit" class="btn">Add Employee</button>
        </div>
    </form>
</template>
<script>
export default {
    props:[
        'route',
    ],
    data(){
        return{

            csrf: document
                        .querySelector('meta[name="csrf-token"]')
                        .getAttribute("content"),
            form:{
                name:'',
                gender:'male',
                resignation_reason:'',
                salary:'',
                work_years:'',

            },
            errors:{
                name:'',
                gender:'',
                resignation_reason:'',
                salary:'',
                work_years:'',


            },
            success:false

        }
    },
    
    methods:{
        submitForm(e) {
            if(!this.validateForm()){
                e.preventDefault();
            }else{
                axios
                .post(this.route, this.form)
                .then(response => {
                    if(response.status==200)
                    {
                        console.log(response.data.employee);
                        this.success=true;

                        setTimeout(function() {
                            window.location.href="/";
                        }, 3000);
                    }
                })
                .catch(error => {

                this.validateForm();
                
                });
            }
      
        },

         validateForm:function(){
             
            if (this.form.name == "" || this.form.name.trim() < 1) {
                    this.errors.name = "Name is required";
            }else if( 
                this.form.name.length < 5 ||
                this.form.name.length > 100 ||
                this.form.name.trim().length < 5){
                this.errors.name="Name length should be between 5 and 100";
            } else {
                this.errors.name = "";
            }

             if ( this.form.work_years =="") {
                this.errors.work_years = "No of Work Years is required";
            }else if(this.form.work_years<0){
                this.errors.work_years="Invalid Input";
            }else if(this.form.work_years>100){
                this.errors.work_years="Invalid Input";

            }else {
                this.errors.work_years = "";
            }

            if ( this.form.salary < 1) {
                this.errors.salary="Invalid Input";
            }else if(this.form.salary==""){
                this.errors.salary="Salary is Required";
            }else{
                this.errors.salary="";
            }



            if(this.errors.name=="" && this.errors.gender=="" && this.errors.resignation_reason=="" && this.errors.salary=="" && this.errors.work_years=="" ){
                return true;
            }
            else{
                 return false;
            }
        }
    }

}
</script>