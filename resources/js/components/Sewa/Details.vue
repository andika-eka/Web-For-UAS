<template>
    <div class="row">
        <div class="col" style=" padding-top: 50px;
        padding-right: 50px;
        padding-bottom: 20px;
        padding-left: 50px;">
            <div class="row justify-content-center">
                <div>
                    <div class="card shadow-lg border-0 rounded-lg mt-5">
                        <div class="card-header">
                            <h3 class="font-weight-light my-4">No unit {{sewa.user.no_unit}}</h3>
                            <table>
                                <tr>
                                    <td>
                                        <h6>admin pembuat</h6>
                                    </td>
                                    <td>
                                        <h6>: {{sewa.admin.name}}</h6>
                                    </td>
                                </tr>
                            </table>
                        </div>
                        <div class="card-body">
                            <!-- <h4>akun user</h4>
                            <table style="width:100%">
                                <tr>
                                    <td>
                                        <h6>id </h6>
                                    </td>
                                    <td>
                                        <h6>: {{sewa.user.user_id}}</h6>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <h6>nama </h6>
                                    </td>
                                    <td>
                                        <h6>: {{sewa.user.name}}</h6>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <h6>E-mail </h6>
                                    </td>
                                    <td>
                                        <h6>: {{sewa.user.U_email}}</h6>
                                    </td>
                                </tr>
                            </table> -->
                            <hr>
                            <h4>indenfitas penghuni</h4>
                            <table style="width:100%">
                                <tr>
                                    <td>
                                        <h6>nama </h6>
                                    </td>
                                    <td>
                                        <h6>: {{sewa.user.nama}}</h6>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <h6>NIK </h6>
                                    </td>
                                    <td>
                                        <h6>: {{sewa.user.NIK}}</h6>
                                    </td>
                                </tr>
                            </table>
                            <hr>
                            <h4>contact penhuni</h4>
                            <table style="width:100%">
                                <tr>
                                    <td>
                                        <h6>E-mail </h6>
                                    </td>
                                    <td>
                                        <h6>: {{sewa.user.email}}</h6>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <h6>no tlp </h6>
                                    </td>
                                    <td>
                                        <h6>: {{sewa.user.tlp}}</h6>
                                    </td>
                                </tr>
                            </table>
                            <hr>
                            <h4>kontrak:</h4>
                            <table style="width:100%">
                                <tr>
                                    <td>
                                        <h6>dari </h6>
                                    </td>
                                    <td>
                                        <h6>: {{sewa.user.dari}}</h6>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <h6>sampai </h6>
                                    </td>
                                    <td>
                                        <h6>: {{sewa.user.sampai}}</h6>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <h6>harga</h6>
                                    </td>
                                    <td>
                                        <h6>: Rp. {{sewa.user.harga}}</h6>
                                    </td>
                                </tr>
                            </table>
                            <hr>
                            <h4>keterangan:</h4>
                            <h6> {{sewa.user.keterangan}}</h6>
                            <hr>
                            <router-link :to="{name: 'SewaEdit', params: { id: sewa.user.id }}"
                                class="btn btn-primary btn-block">Edit</router-link>
                            <hr>
                            <button class="btn btn-danger btn-block" @click="deleteData(sewa.user.id)">Delete</button>
                        </div>
                        <div class="card-footer text-center">
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col " style=" padding-top: 50px;
        padding-right: 50px;
        padding-bottom: 20px;
        padding-left: 20px;">
            <div class="card shadow-lg border-0 rounded-lg mt-5">
                <div class="card-header">
                    <h2 class=" display-6"> history pembayaran</h2>
                    <router-link :to="{name: 'PembayaranCreate', params: { id:sewa.user.id }}"type="button" class="btn btn-outline-success" > buat pembayaran</router-link>
                </div>
                <div class=" table-responsive shadow-lg border rounded " style=" padding-top: 50px;
            padding-right: 50px;
            padding-bottom: 50px;
            padding-left: 50px;
            font-size: 20px;">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead class="thead-light">
                            <tr>
                                <th>id</th>
                                <th>dari</th>
                                <th>sampai</th>
                                <th>harga</th>
                                <th>waktu pembayaran</th>
                                <th>-</th>
                            </tr>
                        </thead>
                        <tfoot class="thead-light">
                            <tr>
                                <th>id</th>
                                <th>dari</th>
                                <th>sampai</th>
                                <th>harga</th>
                                <th>waktu pembayaran</th>
                                <th>-</th>
                            </tr>
                        </tfoot>
                        <tbody>
                            <tr v-for="(item, id) in sewa.pembayaran.data" :key="id">
                                <td>{{ item.id }}</td>
                                <td>{{ item.dari }}</td>
                                <td>{{ item.sampai }}</td>
                                <td>{{ item.harga }}</td>
                                <td>{{ item.created_at }}</td>
                                <td>
                                    <router-link :to="{name: 'pembayaranDetails', params: { id: item.id }}"
                                        class="badge rounded-pill bg-primary">details</router-link>
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
        data() {
            return {
                sewa: {},
            }
        },
        created() {
            this.details();
        },
        methods: {
            details() {
                this.axios.get('/api/sewa/' + this.$route.params.id)
                    .then(response => {
                        this.sewa = response.data;
                    });
            },
            deleteData(id) {
                this
                    .$swal
                    .fire({
                        title: 'hapus penyewa?',
                        text: "gak ada fitur undo lho.",
                        icon: 'warning',
                        showCancelButton: true,
                        confirmButtonColor: '#BF2222FF',
                        cancelButtonColor: '#A1A1A1FF',
                        confirmButtonText: 'Delete',
                        cancelButtonText: 'Batal'
                    })
                    .then((result) => {
                        if (result.value) {
                            let uri = `/api/sewa/${id}`;
                            this
                                .axios
                                .delete(uri)
                                .then(this.$router.push({
                                    path: '/vue/sewa'
                                }))
                                .catch();
                        }
                    })
            },
        }
    }

</script>
