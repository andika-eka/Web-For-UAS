<template>
    <div>
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-7">
                    <div class="card shadow-lg border-0 rounded-lg mt-5">
                        <div class="card-header">
                            <h3 class="font-weight-light my-4">edit pembayaran</h3>
                        </div>
                        <div class="card-body">
                            <form class=" form-horizontal" @submit.prevent="saveData()">
                                <table style="width:100%">
                                    <tr>
                                        <td>
                                            <h6>nama </h6>
                                        </td>
                                        <td>
                                            <h6>: {{bayar.nama}}</h6>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <h6>dari </h6>
                                        </td>
                                        <td>
                                            <h6>: {{bayar.dari}}</h6>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <h6>sampai </h6>
                                        </td>
                                        <td>
                                            <h6>: {{bayar.sampai}}</h6>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <h6>harga</h6>
                                        </td>
                                        <td>
                                            <h6>: Rp. {{bayar.harga}}</h6>
                                        </td>
                                    </tr>
                                </table>
                                <div class="form-group">
                                    <label class="control-label col-sm-3" for='dari'>dari</label>
                                    <div class="col ">
                                        <input type="date" class="form-control" id='dari' v-model="form.dari">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-sm-3" for='bulan'>lama (bulan):</label>
                                    <div class="col ">
                                        <input type="number" class="form-control" id='bulan' v-model="form.bulan"
                                            min="1" max="300">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-sm-3" for='keterangan'>keterangan:</label>
                                    <div class="col">
                                        <input type="text" class="form-control" id='keterangan'
                                            v-model="form.keterangan">
                                    </div>
                                </div>
                                <hr>
                                <div class="form-group">
                                    <div class="col-sm-offset-3 col-sm-9">
                                        <button type="submit" class="btn btn-primary" name='Create'>Create</button>
                                        <router-link to="/vue/dashboard" class="btn btn-secondary" name='cancel'>cancel
                                        </router-link>
                                    </div>
                                </div>
                            </form>
                            <div class="card-footer text-center">
                            </div>
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
                bayar:{},
                form: new Form({
                    id_sewa: "",
                    dari: "",
                    bulan: "",
                    keterangan: ""
                })
            }
        },
        created(){
            this.axios.get('/api/bayar/' + this.$route.params.id)
            .then(response => {
                this.bayar = response.data.user;
                this.form.id_sewa = response.data.user.id_sewa;
                this.form.dari = response.data.user.dari;
                this.form.bulan = response.data.user.duration;
                this.form.keterangan = response.data.user.keterangan;
            }
            
            )
        },
        methods: {
            saveData() {
                this.form.put('/api/bayar/'+this.$route.params.id)
                    .then(this.$router.push({
                        path: '/vue/pembayaran'
                    }))
                    .catch();
            }
        }
    }

</script>