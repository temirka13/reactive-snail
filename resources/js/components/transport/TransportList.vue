<template id="drivers-list">
    <div class="container">
        <div>
            <div class="pull-right">
                <router-link class="btn btn-xs btn-primary" :to="{path: '/home'}">
                    <span class="glyphicon glyphicon-plus"></span>
                    Назад
                </router-link>
                <br>
                <br>
                <router-link class="btn btn-xs btn-primary" :to="{path: '/add-transport'}">
                    <span class="glyphicon glyphicon-plus"></span>
                    Добавить новый транспорт
                </router-link>
                <br><br>
                <div>
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Модель</th>
                                <th>Статус</th>
                                <th>Действия</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr v-for='(transport, index) in filteredTransport'>
                                <td>{{ index + 1 }}</td>
                                <td>{{ transport.model }}</td>
                                <td>{{ transport.status }}</td>
                                <td>
                                    <router-link class="btn btn-info btn-xs" :to="{name: 'TransportView', params: { id: transport.id }}">Подробнее</router-link>
                                    <router-link class="btn btn-warning btn-xs" :to="{name: 'TransportEdit', params: { id: transport.id }}">Изминить</router-link>
                                    <router-link class="btn btn-danger btn-xs" :to="{name: 'TransportDelete', params: { id: transport.id }}">Удалить</router-link>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    data: function(){
        return {transport: ''};
    },
    created: function(){
        let url = 'http://127.0.0.1:8000/transport/';
        Axios.get(url).then((response) => {
            this.transport = response.data;
        });
    },
    computed: {
        filteredTransport: function(){
            if(this.transport.length){
                return this.transport;
            }
        }
    }
}
</script>
