<template>
    <div>
        <h1 style="text-align: center;">Table penyewa</h1> <hr>
        <div class="table-responsive" style="padding: 20px">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>id</th>
                        <th>nama</th>
                        <th>no unit</th>
                        <th>dari</th>
                        <th>sampai</th>
                        <th>harga</th>
                        <th>-</th>
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <th>id</th>
                        <th>nama</th>
                        <th>no unit</th>
                        <th>dari</th>
                        <th>sampai</th>
                        <th>harga</th>
                        <th>-</th>
                    </tr>
                </tfoot>
                <tbody>
                    <tr v-for="(item, S_id) in sewa.sewa.data" :key="S_id">
                        <td>{{ item.S_id }}</td>
                        <td>{{ item.nama }}</td>
                        <td>{{ item.no_unit }}</td>
                        <td>{{ item.dari }}</td>
                        <td>{{ item.sampai }}</td>
                        <td>{{ item.harga }}</td>
                
                        <td>
                            <router-link :to="{name: 'SewaDetails', params: { id: item.S_id }}"
                                class="badge rounded-pill bg-primary">details</router-link>
                        </td>
                    </tr>

                </tbody>
            </table>
            <pagination :data="sewa" @pagination-change-page="table" class="justify-center py-2">hahah</pagination>

            
        </div>
    </div>
</template>

<script>
    export default {
        data() {
            return {
                sewa: {},
                msg: '',
                s: ''
            }
        },
        created() {
            this.table();
        },
        methods: {
            table(page = 1) {
                this.axios.get('/api/sewa?page=' + page + '&s=' + this.s)
                    .then(response => {
                        this.sewa = response.data;
                    });
            },
        }
    }

</script>
