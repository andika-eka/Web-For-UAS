<template>
    <div>
        <h1 class="bg-dark text-light display-4">Table Penyewa</h1>
        <hr>
        <div style=" padding-top: 20px;
        padding-right: 20px;
        padding-bottom: 20px;
        padding-left: 20px;">
            <div class="table-responsive shadow-lg border rounded " style=" padding-top: 50px;
            padding-right: 100px;
            padding-bottom: 50px;
            padding-left: 100px;
            font-size: 20px;">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead class="thead-light">
                        <tr>
                            <th>id</th>
                            <th>nama</th>
                            <th>status</th> 
                            <th>no unit</th>
                            <th>dari</th>
                            <th>sampai</th>
                            <th>harga</th>
                            <!-- <th>user</th> -->
                            <th>-</th>
                        </tr>
                    </thead>
                    <tfoot class="thead-light">
                        <tr>
                            <th>id</th>
                            <th>nama</th>
                            <th>status</th> 
                            <th>no unit</th>
                            <th>dari</th>
                            <th>sampai</th>
                            <th>harga</th>
                            <th>-</th>
                        </tr>
                    </tfoot>
                    <tbody>
                        <tr v-for="(item, S_id) in active.data" :key="S_id">
                            <td>{{ item.S_id }}</td>
                            <td>{{ item.nama }}</td>
                            <td > <div class="badge rounded-pill bg-success">active </div> </td>
                            <td>{{ item.no_unit }}</td>
                            
                            <td>{{ item.dari }}</td>
                            <td>{{ item.sampai }}</td>
                            <td>Rp.{{ item.harga }}</td>
                            
                            <td>
                                <router-link :to="{name: 'SewaDetails', params: { id: item.S_id }}"
                                    class="badge badge-primary">details</router-link>
                                <router-link :to="{name: 'PembayaranCreate', params: { id: item.S_id }}"type="button" class="badge badge-success" > buat
                                pembayaran</router-link>
                            </td>
                        </tr>
                        <tr v-for="(item, S_id) in expired.data" :key="S_id">
                            <td>{{ item.S_id }}</td>
                            <td>{{ item.nama }}</td>
                            <td > <div class="badge rounded-pill bg-danger">expired </div> </td>
                            <td>{{ item.no_unit }}</td>
                            
                            <td>{{ item.dari }}</td>
                            <td>{{ item.sampai }}</td>
                            <td>Rp.{{ item.harga }}</td>
                            
                            <td>
                                <router-link :to="{name: 'SewaDetails', params: { id: item.S_id }}"
                                    class="badge badge-primary">details</router-link>
                                     <router-link :to="{name: 'PembayaranCreate', params: { id: item.S_id }}"type="button" class="badge badge-success" > buat
                                pembayaran</router-link>
                                    
                            </td>
                        </tr>
                        <tr v-for="(item, S_id) in reserved.data" :key="S_id">
                            <td>{{ item.S_id }}</td>
                            <td>{{ item.nama }}</td>
                            <td > <div class="badge rounded-pill bg-secondary">reserved </div> </td>
                            <td>{{ item.no_unit }}</td>
                            
                            <td>{{ item.dari }}</td>
                            <td>{{ item.sampai }}</td>
                            <td>Rp.{{ item.harga }}</td>
                            
                            <td>
                                <router-link :to="{name: 'SewaDetails', params: { id: item.S_id }}"
                                    class="badge badge-primary">details</router-link>
                                     <router-link :to="{name: 'PembayaranCreate', params: { id: item.S_id }}"type="button" class="badge badge-success" > buat
                                pembayaran</router-link>
                            </td>
                        </tr>

                    </tbody>
                </table>
                <pagination :data="sewa" @pagination-change-page="table" class="justify-center py-2">hahah</pagination>


            </div>
        </div>
    </div>
</template>

<script>
    export default {
        data() {
            return {
                active: {},
                expired: {},
                reserved: {},
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
                        this.active = response.data.active;
                        this.expired = response.data.expired;
                        this.reserved = response.data.reserved;
                    });
            },
        }
    }

</script>
