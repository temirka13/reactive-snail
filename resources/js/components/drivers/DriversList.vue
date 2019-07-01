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
                <router-link class="btn btn-xs btn-primary" :to="{path: '/add-driver'}">
                    <span class="glyphicon glyphicon-plus"></span>
                    Добавить нового водителя
                </router-link>
                <br><br>
                <div>
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Имя</th>
                                <th>Фамилия</th>
                                <th>Действие</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr v-for='(driver, index) in filteredDrivers'>
                                <td>{{ index + 1 }}</td>
                                <td>{{ driver.first_name }}</td>
                                <td>{{ driver.second_name }}</td>
                                <td>
                                    <router-link class="btn btn-info btn-xs" :to="{name: 'DriversView', params: { id: driver.id }}">Подробнее</router-link>
                                    <router-link class="btn btn-warning btn-xs" :to="{name: 'DriversEdit', params: { id: driver.id }}">Изминить</router-link>
                                    <router-link class="btn btn-danger btn-xs" :to="{name: 'DriversDelete', params: { id: driver.id }}">Удалить</router-link>
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
        return {drivers: ''};
    },
    created: function(){
        let url = 'http://127.0.0.1:8000/drivers/';
        Axios.get(url).then((response) => {
            this.drivers = response.data;
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
