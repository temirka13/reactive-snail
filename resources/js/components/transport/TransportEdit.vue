<template id="transport-edit">
    <div class="container">
        <router-link class="btn btn-xs btn-primary" :to="{path: '/transport-page'}">
            <span class="glyphicon glyphicon-plus"></span>
            Назад
        </router-link>
        <br>
        <br>
        <h3>Изминить параметры транспорта</h3>
        <form v-on:submit.prevent = "editTransport">
            <div class="form-group">
                <label for="edit-model">Модель</label>
                <input 
                    id="edit-statuse" 
                    v-model="transport.model" 
                    class="form-control" required 
                />
            </div>
            <div class="form-group">
                <label for="edit-status">Статус</label>
                <select id="add-status"  v-model="transport.status">
                    <option disabled value="">Выберите один из вариантов</option>
                    <option>Используется</option>
                    <option>Не используется</option>
                    <option>В ремонте</option>
                </select>
            </div>
            <button type="submit" class="btn btn-xs btn-primary">Изминить</button>
        </form>
    </div>
</template>

<script>
export default {
    data: function(){
        return {transport:{
            model: '',
            status: ''
        }}
    },
    created: function(){
        let url = 'http://127.0.0.1:8000/transport/'+this.$route.params.id+'edit';
        Axios.get(url).then((response) => {
                this.transport = response.data;
        });
    },
    methods: {
        editTransport: function(){
            let url = 'http://127.0.0.1:8000/transport/'+this.$route.params.id;
            Axios.patch(url, this.transport).then((response) =>{
                this.$router.push({name: 'TransportList'})
            });
        }
    }
}
</script>
