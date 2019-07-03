<template id="main">
    <div class="container">
            <div class="row">
                <div class="col-md-6 col-12">
                    <h3>Транспорт</h3>
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Модель</th>
                                <th>Водитель</th>
                                <th>Статус</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr v-for='(transport, index) in transport'>
                                <td style="color: #000 !important;">{{ index + 1 }}</td>
                                <td style="color: #000 !important;">{{ transport.model }}</td>
                                <td style="color: #000 !important;">{{ transport.driver }}</td>
                                <td style="color: #000 !important;">{{ transport.status }}</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div class="col-md-6 col-12">
                    <h3>Водители</h3>
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Имя</th>
                                <th>Фамилия</th>
                                <th>Транспорт</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr v-for='(driver, index) in drivers'>
                                <td class="text">{{ index + 1 }}</td>
                                <td class="text">{{ driver.first_name }}</td>
                                <td class="text">{{ driver.second_name }}</td>
                                <td class="text">{{ driver.transport }}</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
    </div>
</template>

<script>
    export default {
        data: function(){
            return{
                transport: '',
                drivers: ''
            }
        },
        mounted() {
            console.log('Main Component mounted.')
        },
        created: function(){
            let urlT = '/main-transport/';
            Axios.get(urlT).then((response) => {
                this.transport = response.data;
            });
            let urlD = '/main-drivers/';
            Axios.get(urlD).then((response) => {
                this.drivers = response.data;
                console.log(response.data)
            });
        },
    }
</script>