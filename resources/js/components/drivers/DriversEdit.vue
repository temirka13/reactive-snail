<template id="drivers-edit">
    <div class="container">
        <router-link class="btn btn-xs btn-primary" :to="{path: '/drivers-page'}">
            <span class="glyphicon glyphicon-plus"></span>
            Назад
        </router-link>
        <br>
        <br>
        <h3>Изменить параметры водителя</h3>
        <form v-on:submit.prevent = "editDriver">
            <div class="form-group">
                <label for="edit-first_name">Имя</label>
                <input 
                    id="edit-first_name" 
                    v-model="driver.first_name" 
                    class="form-control" required 
                />
            </div>
            <div class="form-group">
                <label for="edit-second_name">Фамилия</label>
                <input 
                    id="edit-second_name" 
                    v-model="driver.second_name" 
                    class="form-control" required 
                />
            </div>
            <button type="submit" class="btn btn-xs btn-primary">Изменить</button>
        </form>
    </div>
</template>

<script>
export default {
    data: function(){
        return {driver:{
            first_name: '',
            second_name: ''
        }}
    },
    created: function(){
        let url = 'http://127.0.0.1:8000/drivers/'+this.$route.params.id+'edit';
        Axios.get(url).then((response) => {
                this.driver = response.data;
        });
    },
    methods: {
        editDriver: function(){
            let url = 'http://127.0.0.1:8000/drivers/'+this.$route.params.id;
            Axios.patch(url, this.driver).then((response) =>{
                this.$router.push({name: 'DriversList'})
            });
        }
    }
}
</script>
