<template>
    <div>
        <h1 class="bg-dark text-light display-4">Table Pembayaran</h1>
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
                            <!-- <th>user</th> -->
                            <th>nama</th>
                            <th>no unit</th>
                            <th>dari</th>
                            <th>sampai</th>
                            <th>harga</th>
                            <th>total</th>
                            <th>waktu pembayaran</th>
                            <th>-</th>
                        </tr>
                    </thead>
                    <tfoot class="thead-light">
                        <tr>
                            <th>id</th>
                            <!-- <th>user</th> -->
                            <th>nama</th>
                            <th>no unit</th>
                            <th>dari</th>
                            <th>sampai</th>
                            <th>harga</th>
                            <th>total</th>
                            <th>waktu pembayaran</th>
                            <th>-</th>
                        </tr>
                    </tfoot>
                    <tbody>
                        <tr v-for="(item, id) in pembayaran" :key="id">
                            <td>{{ item.id }}</td>
                            <!-- <td>{{ item.name }}</td> -->
                            <td>{{ item.nama }}
                                <!-- <router-link :to="{name: 'SewaDetails', params: { id: item.id_sewa }}"
                                    class="stretched-link">{{ item.nama }}</router-link> -->
                                    <!-- WHAT THE FUCK -->
                            </td>
                            <td>{{ item.no_unit }}</td>
                            <td>{{ item.dari }}</td>
                            <td>{{ item.sampai }}</td>
                            <td>Rp.{{ item.harga }}</td>
                            <td>Rp.{{ item.harga * item.duration }}.00</td>
                            <td>{{ item.created_at }}</td>
                            <td><button class="badge bg-danger"
                                    @click="deleteData(item.id)">Delete</button>
                                <router-link :to="{name: 'pembayaranDetails', params: { id: item.id }}"
                                    class="badge  bg-primary">details</router-link>
                            </td>



                        </tr>

                    </tbody>
                </table>
                <!-- <pagination :data="sewa" @pagination-change-page="table" class="justify-center py-2">hahah</pagination> -->


            </div>

        </div>
    </div>
</template>

<script>
    export default {

        data() {
            return {
                pembayaran: {},
                admin: {},
                msg: '',
                s: '',
                renderComponent: true,

            }
        },
        created() {
            this.table();
        },
        methods: {
            table(page = 1) {
                this.axios.get('/api/bayar/')
                    .then(response => {
                        this.pembayaran = response.data.bayar.data;

                    });

            },
            forceRerender() {
            // Remove my-component from the DOM
                this.renderComponent = false;

                this.$nextTick(() => {
                // Add the component back in
                this.renderComponent = true;
                });
            },
            deleteData(id) {
                this
                    .$swal
                    .fire({
                        title: 'hapus pembayaran?',
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
                            let url = `/api/bayar/${id}`;
                            this
                                .axios
                                .delete(url)
                                .then(this.$swal
                                    .fire(
                                        {title: 'Success!', text: 'Article deleted successfully', icon: 'success', timer: 1000}
                                    ))
                                .catch();
                        }
                    })
            },

        }
    }

</script>
