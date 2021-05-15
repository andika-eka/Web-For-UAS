<template>
    <div>
        <div id="layoutSidenav">
            <div id="layoutSidenav_nav">
                <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                    <div class="sb-sidenav-menu">
                        <div class="nav">
                            <div class="sb-sidenav-menu-heading">utama</div>
                            <router-link class="nav-link" to="/vue/dashboard">
                                <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                                Dashboard
                            </router-link>
                            <div class="sb-sidenav-menu-heading">penyewa</div>
                            <router-link class="nav-link" to="/vue/sewa">
                                <div class="sb-nav-link-icon"><i class="fas fa-table"></i></div>
                                daftar sewa
                            </router-link>
                            <router-link class="nav-link" to="/vue/pembayaran">
                                <div class="sb-nav-link-icon"><i class="fas fa-table"></i></div>
                                history pembayaran
                            </router-link>
                        </div>
                    </div>
                    <!-- <div class="sb-sidenav-footer">
                        <div class="small">Logged in as:</div>
                    </div> -->
                </nav>
            </div>
            <div id="layoutSidenav_content">
                <main>
                    <router-view> </router-view>
                </main>
                <footer class="py-4 bg-light mt-auto">
                    <div class="container-fluid">
                        <div class="d-flex align-items-center justify-content-between small">
                            <div class="text-muted">Copyright &copy; Your Website 2020</div>
                            <div>
                                <a href="#">Privacy Policy</a>
                                &middot;
                                <a href="#">Terms &amp; Conditions</a>
                            </div>
                        </div>
                    </div>
                </footer>
            </div>
        </div>
        
    </div>
</template>

<script>


    export default {
    }

</script>
