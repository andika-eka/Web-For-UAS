<template>
    <div>
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-7">
                    <div class="card shadow-lg border-0 rounded-lg mt-5">
                        <div class="card-header">
                            <h3 class="font-weight-light my-4">Edit data Penyewa</h3>
                        </div>
                        <div class="card-body">
                            <form class=" form-horizontal" @submit.prevent="saveData()">

                                <div class="form-group">
                                    <label class="control-label col-sm-3" for='nama'>Nama:</label>
                                    <div class="col">
                                        <input type="text" class="form-control" id='nama'  v-model="form.nama">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-sm-3" for='NIK'>NIK:</label>
                                    <div class="col">
                                        <input type="text" class="form-control" id='NIK' v-model="form.NIK">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="control-label col-sm-3" for='email'>E -mail:</label>
                                    <div class="col">
                                        <input type="email" class="form-control" id='email' v-model="form.email">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="control-label col-sm-3" for='tlp'>No tlp:</label>
                                    <div class="col">
                                        <input type="text" class="form-control" id='tlp' v-model="form.tlp">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="control-label col-sm-3" for='no_unit'>No unit:</label>
                                    <div class="col ">
                                        <input type="number" class="form-control" id='no_unit' v-model="form.no_unit"
                                            min="1" max="300">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="control-label col-sm-3" for='harga'>harga:</label>
                                    <div class="col ">
                                        <input type="number" class="form-control" id='harga' v-model="form.harga"
                                            min="50000" max="10000000">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="control-label col-sm-3" for='dari'>dari</label>
                                    <div class="col ">
                                        <input type="date" class="form-control" id='dari' v-model="form.dari">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="control-label col-sm-3" for='sampai'>sampai</label>
                                    <div class="col ">
                                        <input type="date" class="form-control" id='sampai' v-model="form.sampai">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="control-label col-sm-3" for='user_id'>Id User:</label>
                                    <div class="col ">
                                        <input type="number" class="form-control" id='user_id' v-model="form.user_id">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="control-label col-sm-3" for='keterangan'>keterangan:</label>
                                    <div class="col">
                                        <input type="text" class="form-control" id='keterangan'
                                            v-model="form.keterangan">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-sm-offset-3 col-sm-9">
                                        <button type="submit" class="btn btn-primary" name='Create'>update</button>
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
                sewa:{},
                form: new Form({
                    nama: "",
                    NIK: "",
                    email: "",
                    no_unit: "",
                    tlp: "",
                    harga: "",
                    dari: "",
                    sampai: "",
                    user_id: "",
                    keterangan: ""
                })
            }
        },
        created() {
            this.axios.get('/api/sewa/' + this.$route.params.id)
                    .then(response => {
                        console.log(response.data)
                        this.sewa = response.data.user;
                        this.form.nama = response.data.user.nama;
                        this.form.NIK = response.data.user.NIK;
                        this.form.email = response.data.user.email;
                        this.form.no_unit = response.data.user.no_unit;
                        this.form.tlp = response.data.user.tlp;
                        this.form.harga = response.data.user.harga;
                        this.form.dari = response.data.user.dari;
                        this.form.sampai = response.data.user.sampai;
                        this.form.user_id = response.data.user.user_id;
                        this.form.keterangan = response.data.user.keterangan;
                        
                    });
                    
        },
        methods: {
            saveData() {
                this.form.put('/api/sewa/'+this.$route.params.id)
                    .then(this.$router.push({
                        path: '/vue/sewa'
                    }))
                    .catch();
            }
        }
    }

</script>
