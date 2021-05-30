<template>
    <div>
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-7">
                    <div class="card shadow-lg border-0 rounded-lg mt-5">
                        <div class="card-header">
                            
                            
                            <table>
                                <tr>
                                    <td>
                                        <h3 class="font-weight-light my-4">No unit {{user.no_unit}}</h3>
                                    </td>
                                    <td>
                                        <router-link :to="{name: 'SewaDetails', params: { id: user.id_sewa }}"
                                        class="btn btn-outline-secondary">detail penyawa</router-link>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <h6>admin pembuat</h6>
                                    </td>
                                    <td>
                                        <h6>: {{admin.name}}</h6>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <h6>tanggal pembayaran</h6>
                                    </td>
                                    <td>
                                        <h6>: {{user.created_at}}</h6>
                                    </td>
                                </tr>

                            </table>

                        </div>
                        <div class="card-body">
                            <h4>akun user</h4>
                            <table style="width:100%">
                                <tr>
                                    <td>
                                        <h6>id </h6>
                                    </td>
                                    <td>
                                        <h6>: {{user.user_id}}</h6>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <h6>nama </h6>
                                    </td>
                                    <td>
                                        <h6>: {{user.name}}</h6>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <h6>E-mail </h6>
                                    </td>
                                    <td>
                                        <h6>: {{user.email}}</h6>
                                    </td>
                                </tr>
                            </table>
                            <hr>
                            <h4>jankang waktu:</h4>
                            <table style="width:100%">
                                <tr>
                                    <td>
                                        <h6>dari </h6>
                                    </td>
                                    <td>
                                        <h6>: {{user.dari}}</h6>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <h6>sampai </h6>
                                    </td>
                                    <td>
                                        <h6>: {{user.sampai}}</h6>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <h6>nominal</h6>
                                    </td>
                                    <td>
                                        <h6>: Rp. {{user.harga}}</h6>
                                    </td>
                                </tr>
                            </table>
                            <hr>
                            <h4>keterangan:</h4>
                            <h6> {{user.keterangan}}</h6>
                            <hr>
                            <router-link :to="{name: 'PembayaranEdit', params: { id: user.user_id}}"
                            class="btn btn-primary btn-block">Edit</router-link>
                            <hr>
                            <button
                                    class="btn btn-danger btn-block"
                                    @click="deleteData(user.id)">Delete</button>
                        </div>
                        <div class="card-footer text-center">

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
                user: {},
                admin:{},
            }
        },
        created() {
            this.details();
        },
        methods: {
            details() {
                this.axios.get('/api/bayar/' + this.$route.params.id)
                    .then(response => {
                        this.user = response.data.user;
                        this.admin = response.data.admin; 
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
                            let uri = `/api/bayar/${id}`;
                            this
                                .axios
                                .delete(uri)
                                .then(this.$router.push({path: '/vue/pemabayaran'}))
                                .catch();
                        }
                    })
            },
        }
    }

</script>
