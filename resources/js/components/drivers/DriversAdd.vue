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
            <div class="form-group">
                <label for="add-driver">Транспорт</label>
                <select v-model="driver.transport" id="add-driver">
                    <option>Транспорт отсутствует</option>
                    <option v-for='(transport, index) in filteredTransport' >{{ transport.model }}</option>
                </select>
            </div>
            <button type="submit" class="btn btn-xs btn-primary">Создать водителя</button>
            <router-link class="btn btn-xs btn-warning" :to="'/drivers-page'">Назад</router-link>
        </form>
    </div>
</template>

<script>
export default {
    data: function(){
        return {
            driver: {
                first_name: '',
                second_name: '',
                transport: 'Транспорт отсутствует'
            },
            transports: ''
        };
    },
    methods:{
        createDriver: function(){
            let url = '/drivers/';
            Axios.post(url, this.driver).then((response) => {
                this.$router.push({name: 'DriversList'})
            });
        }
    },
    created: function(){
        let url = '/transport/';
        Axios.get(url).then((response) => {
            this.transports = response.data;
            console.log(response.data)
        });
    },
    computed: {
        filteredTransport: function(){
            if(this.transports.length){
                return this.transports;
            }
        }
    }
}
</script>

