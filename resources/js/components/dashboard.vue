<template>
    <div>
        <h1 class="bg-dark text-light display-4">Dashboard</h1>
        <div class="container-fluid">

            <hr>
            <div class="row">
                <div class="col-sm " style="padding:30px; ">
                    <div class="card border-primary mb-3 shadow" style=" height :200px; font-size: 20px;">
                        <div class="card-header">jumlah penyewa</div>
                        <div class="card-body text-primary text-center">
                            <h2 class="card-title "> {{res.Jum_sewa}}</h2>
                            <hr>
                            <router-link type="button" class="btn btn-outline-primary" to="/vue/sewa/create"> Daftarkan
                                Penyewa</router-link>
                            <router-link type="button" class="btn btn-outline-primary" to="/vue/pembayaran/create"> buat
                                pembayaran</router-link>
                        </div>
                    </div>
                </div>
                <div class="col-sm" style="color:white; padding:30px">
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
