<template>
    <div>
        <h1 class="bg-dark text-light display-4">Dashboard</h1>
        <div class="container-fluid">

            <hr>
            <div class="row">
                <div class="col-sm " style="padding:30px; ">
                    <div class="table-responsive shadow-lg border rounded list-group-item-danger" style=" padding-top: 30px;
                                padding-right: 30px;
                                padding-bottom: 30px;
                                padding-left: 30px;
                                font-size: 20px;">
                                <h3 >pembayaran terlambat:</h3>
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            
                            <thead class="thead-light">
                                <tr>
                                    <th>id</th>
                                    <th>nama</th>
                                    <th>no unit</th>
                                    <th>harga</th>
                                    <th>-</th>
                                </tr>
                            </thead>
                            <tfoot class="thead-light">
                                <tr>
                                    <th>id</th>
                                    <th>nama</th>
                                    <th>no unit</th>
                                    <th>harga</th>
                                    <th>-</th>
                                </tr>
                            </tfoot>
                            <tbody>
                                <tr v-for="(item, id) in res.null.data" :key="id" class="table-light">
                                    <td>{{ item.S_id }}</td>
                                    <!-- <td>{{ item.name }}</td> -->
                                    <td>{{ item.nama }}
                                    </td>
                                    <td>{{ item.no_unit }}</td>
                                    <td>Rp.{{ item.harga }}</td>
                                    <td>
                                        <router-link :to="{name: 'SewaDetails', params: { id: item.S_id }}"
                                            class="badge  bg-primary">details</router-link>
                                        <router-link :to="{name: 'PembayaranCreate', params: { id: item.S_id }}"type="button" class="badge badge-success" > buat
                                pembayaran</router-link>
                                    </td>
                                </tr>
                                <tr v-for="(item, id) in res.late.data" :key="id" class="table-light">
                                    <td>{{ item.S_id }}</td>
                                    <!-- <td>{{ item.name }}</td> -->
                                    <td>{{ item.nama }}
                                    </td>
                                    <td>{{ item.no_unit }}</td>
                                    <td>Rp.{{ item.harga }}</td>
                                    <td>
                                        <router-link :to="{name: 'SewaDetails', params: { id: item.S_id }}"
                                            class="badge  bg-primary">details</router-link>
                                        <router-link :to="{name: 'PembayaranCreate', params: { id: item.S_id }}"type="button" class="badge badge-success" > buat
                                pembayaran</router-link>
                                    </td>
                                </tr>


                            </tbody>
                        </table>
                    </div>
                    <div class="table-responsive shadow-lg border rounded list-group-item-success" style=" padding-top: 30px;
                                padding-right: 30px;
                                padding-bottom: 30px;
                                padding-left: 30px;
                                font-size: 20px;">
                                <h3 >pembayaran mendatang:</h3>
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            
                            <thead class="thead-light">
                                <tr>
                                    <th>id</th>
                                    <th>nama</th>
                                    <th>no unit</th>
                                    <th>harga</th>
                                    <th>batas pembayaran</th>
                                    <th>-</th>
                                </tr>
                            </thead>
                            <tfoot class="thead-light">
                                <tr>
                                    <th>id</th>
                                    <th>nama</th>
                                    <th>no unit</th>
                                    <th>harga</th>
                                    <th>batas pembayaran</th>
                                    <th>-</th>
                                </tr>
                            </tfoot>
                            <tbody>
                                <tr v-for="(item, id) in res.due.data" :key="id" class="table-light">
                                    <td>{{ item.S_id }}</td>
                                    <!-- <td>{{ item.name }}</td> -->
                                    <td>{{ item.nama }}
                                    </td>
                                    <td>{{ item.no_unit }}</td>
                                    <td>Rp.{{ item.harga }}</td>
                                    <td>Rp.{{ item.lastpaid }}</td>
                                    <td>
                                        <router-link :to="{name: 'SewaDetails', params: { id: item.S_id }}"
                                            class="badge  bg-primary">details</router-link>
                                            <router-link :to="{name: 'PembayaranCreate', params: { id: item.S_id }}"type="button" class="badge badge-success" > buat
                                pembayaran</router-link>
                                    </td>
                                </tr>


                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="col-sm" style="color:white; padding:30px">
                    <div class="card border-primary mb-3 shadow" style=" height :200px; font-size: 20px;">
                        <div class="card-header">jumlah penyewa</div>
                        <div class="card-body text-primary text-center">
                            <div class="card-title row">
                                <div class="col-sm"  style="padding:10px;">
                                    <div class="bg-success text-white ">
                                        <h6>active</h6>
                                        {{res.active}}
                                    </div>
                                </div>
                                <div class="col-sm " style="padding:10px;">
                                    <div class="bg-danger text-white ">
                                        <h6>expired</h6>
                                        {{res.expired}}
                                    </div>
                                </div>
                                <div class="col-sm " style="padding:10px;">
                                    <div class="bg-secondary text-white ">
                                        <h6>reserved</h6>
                                        {{res.reserved}}
                                    </div>
                                </div>
                            </div>
                            <router-link type="button" class="btn btn-outline-primary" to="/vue/sewa/create"> Daftarkan
                                Penyewa</router-link>
                            <!-- <router-link type="button" class="btn btn-outline-primary" to="/vue/pembayaran/create"> buat
                                pembayaran</router-link> -->
                        </div>
                    </div>
                    <div class="card bg-success shadow " style=" height :200px; font-size: 20px;">
                        <div class="card-header">pendapatan</div>
                        <div class="card-body text-center">
                            <h2 class="card-title ">Rp. {{res.rev}}</h2>
                        </div>
                    </div>
                </div>

            </div>
            

        </div>
    </div>
</template>

<script>
    export default {
        data() {
            return {
                res: {},
            }
        },
        created() {
            this.display();
        },
        methods: {
            display() {
                this
                    .axios
                    .get("/api/dashboard")
                    .then(response => {
                        this.res = response.data
                    });
            },
        }
    }

</script>
