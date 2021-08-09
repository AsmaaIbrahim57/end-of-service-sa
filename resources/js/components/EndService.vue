<template>

    <div class="wrapper">

        <!--Resignation Reason Form-->
        <form
            method="post"
            :action="route"
            id="EndService"
            @submit.prevent="submitForm"
        >

         <div class="form-group">
            <label for="reasons">
                Resignation reason:
            </label>
            <select class="form-select" aria-label="Default select example" v-model="form.reason">
                <option  value="force_majeure">Force Majeure</option>
                <option  value="childbirth" :disabled="employeegender=='male'">Childbirth (Within last 3 months)</option>
                <option  value="marriage" :disabled="employeegender=='male'">Marriage (Within last 6 months)</option>
                <option  value="contract">End of Contract</option>
                <option  value="other">Other</option>
            </select>
        </div>

        <!--Submit-->
        <div class="add">
             <button type="submit" class="btn">Get End of Service</button>
        </div>
    </form>

    <!--End of Service Value-->
    <div class="service" v-if="show_end_of_service">
        <h2>End of Service value: </h2>
        <span>{{end_of_service}}</span>
    </div>

</div>
    
</template>



<script>
export default {
    props:[
        'employeeid',
        'employeegender',
        'resignationreason',
        'route'
    ],
    data(){
        return{
            form:{
                reason:this.resignationreason?this.resignationreason:'other',
                employeeId:this.employeeid
            },
            end_of_service:'',
            show_end_of_service:false,
        }
    },
    
    methods:{
         
        submitForm(e) {
            
                axios
                .post(this.route, this.form)
                .then(response => {

                    if(response.status==200)
                    {
                        this.show_end_of_service=true;
                        this.end_of_service=response.data.end_service;
                        
                    }
                })
                .catch(error => {

                    this.validateForm();
                
                });
            
      
        }
    }
}
</script>