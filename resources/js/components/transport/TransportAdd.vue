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
                <label for="add-model">Модель</label>
                <input 
                    id="add-model" 
                    v-model="transport.model" 
                    class="form-control" required 
                />
            </div>
            <div class="form-group">
                <label for="add-status">Статус</label>
                <select id="add-status"  v-model="transport.status">
                    <option disabled value="">Выберите один из вариантов</option>
                    <option>Используется</option>
                    <option>Не используется</option>
                    <option>В ремонте</option>
                </select>
            </div>
            <button type="submit" class="btn btn-xs btn-primary">Добавить транспорт</button>
        </form>
    </div>
</template>

<script>
export default {
    data: function(){
        return {transport: {
            model: '',
            status: ''
        }};
    },
    methods:{
        createTransport: function(){
            let url = 'http://127.0.0.1:8000/transport/';
            Axios.post(url, this.transport).then((response) => {
                this.$router.push({name: 'TransportList'})
            });
        }
    },
}
</script>

