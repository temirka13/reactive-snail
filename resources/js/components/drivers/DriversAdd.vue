<template id="drivers-add">
    <div class="container">
        <router-link class="btn btn-xs btn-primary" :to="{path: '/drivers-page'}">
            <span class="glyphicon glyphicon-plus"></span>
            Назад
        </router-link>
        <br>
        <br>
        <h3>Добавить нового водителя</h3>
        <form v-on:submit.prevent = "createDriver">
            <div class="form-group">
                <label for="add-first_name">Имя</label>
                <input 
                    id="add-first_name" 
                    v-model="driver.first_name" 
                    class="form-control" required 
                />
            </div>
            <div class="form-group">
                <label for="add-second_name">Фамилия</label>
                <input 
                    id="add-second_name" 
                    v-model="driver.second_name" 
                    class="form-control" required 
                />
            </div>
            <button type="submit" class="btn btn-xs btn-primary">Создать водителя</button>
            <router-link class="btn btn-xs btn-warning" :to="'/drivers-page'">Назад</router-link>
        </form>
    </div>
</template>

<script>
export default {
    data: function(){
        return {driver: {
            first_name: '',
            second_name: ''
        }};
    },
    methods:{
        createDriver: function(){
            let url = 'http://127.0.0.1:8000/drivers/';
            Axios.post(url, this.driver).then((response) => {
                this.$router.push({name: 'DriversList'})
            });
        }
    },
}
</script>

