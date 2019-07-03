<template id="transport-add">
    <div class="container">
        <router-link class="btn btn-xs btn-primary" :to="{path: '/transport-page'}">
            <span class="glyphicon glyphicon-plus"></span>
            Назад
        </router-link>
        <br>
        <br>
        <h3>Добавить новый транспорт</h3>
        <form v-on:submit.prevent = "createTransport">
            <div class="form-group">
                <label for="add-status">Модель</label>
                <select id="add-status"  v-model="transport.model">
                    <option disabled value="">Выберите один из вариантов</option>
                    <option>Легковое авто</option>
                    <option>Грузовик</option>
                    <option>Фургон</option>
                    <option>Спецтехника</option>
                </select>
            </div>
            <div class="form-group">
                <label for="add-status">Статус</label>
                <select id="add-status"  v-model="transport.status">
                    <option disabled value="">Выберите один из вариантов</option>
                    <option>Активная</option>
                    <option>Не используется</option>
                    <option>На ремонте</option>
                    <option>Продана</option>
                </select>
            </div>
            <div class="form-group">
                <label for="add-driver">Водитель</label>
                <select v-model="transport.driver" id="add-driver">
                    <option >Водитель отсутствует</option>
                    <option v-for='(driver, index) in filteredDrivers' >{{ driver.first_name + ' ' + driver.second_name }}</option>
                </select>
            </div>
            <button type="submit" class="btn btn-xs btn-primary">Добавить транспорт</button>
        </form>
    </div>
</template>

<script>
export default {
    data: function(){
        return {
            transport: {
                model: '',
                status: '',
                driver: 'Водитель отсутствует',
                // driver_id: 1
            },
            drivers: ''
        };
    },
    methods:{
        createTransport: function(){
            let url = '/transport/';
            Axios.post(url, this.transport).then((response) => {
                this.$router.push({name: 'TransportList'})
                console.log(this.transport)
            });
            
        }
    },
    created: function(){
        let url = '/drivers/';
        Axios.get(url).then((response) => {
            this.drivers = response.data;
            console.log(response.data)
        });
    },
    computed: {
        filteredDrivers: function(){
            if(this.drivers.length){
                return this.drivers;
            }
        }
    }
}
</script>

