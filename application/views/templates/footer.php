<footer class="bg-dark text-white py-4 mt-5">
    <div class="container-fluid">
        <div class="row text-center"> 
            <div class="col-md-4">
                <h5><i class="fas fa-list mr-2"></i> Kategori</h5>
                <ul class="list-unstyled">
                    <li><i class="fas fa-laptop mr-2"></i><a href="<?= base_url('kategori/laptop') ?>" class="text-white">Laptop</a></li>
                    <li><i class="fas fa-microchip mr-2"></i><a href="<?= base_url('kategori/komponen_pc') ?>" class="text-white">Komponen PC</a></li>
                    <li><i class="fas fa-headphones mr-2"></i><a href="<?= base_url('kategori/aksesoris') ?>" class="text-white">Aksesoris</a></li>
                    <li><i class="fas fa-gamepad mr-2"></i><a href="<?= base_url('kategori/konsol_game') ?>" class="text-white">Konsol Game</a></li>
                </ul>
            </div>
            <div class="col-md-4">
                <h5><i class="fas fa-phone mr-2"></i> Kontak Kami</h5>
                <ul class="list-unstyled">
                    <li><a href="https://www.instagram.com/jayatech_id" target="_blank" class="text-white"><i class="fab fa-instagram mr-2"></i> Instagram</a></li>
                    <li><a href="https://wa.me/6281234567890" target="_blank" class="text-white"><i class="fab fa-whatsapp mr-2"></i> WhatsApp</a></li>
                </ul>
            </div>
            <div class="col-md-4">
                <h5><i class="fas fa-user mr-2"></i> Masuk</h5>
                <ul class="list-unstyled">
                    <li><i class="fas fa-sign-in-alt mr-2"></i><a href="<?= base_url('auth/login') ?>" class="text-white">Login</a></li>
                    <li><i class="fas fa-user-plus mr-2"></i><a href="<?= base_url('registrasi/index') ?>" class="text-white">Register</a></li>
                </ul>
            </div>
        </div>

        <div class="row mt-3">
            <div class="col-md-12 text-center">
                <p>&copy; 2024 Jaya Tech</p>
            </div>
        </div>
    </div>
</footer>



<script src="<?php echo base_url() ?>assets/vendor/jquery/jquery.min.js"></script>
    <script src="<?php echo base_url() ?>assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <script src="<?php echo base_url() ?>assets/vendor/jquery-easing/jquery.easing.min.js"></script>

    <script src="<?php echo base_url() ?>assets/js/sb-admin-2.min.js"></script>

    <script src="<?php echo base_url() ?>assets/vendor/chart.js/Chart.min.js"></script>

    <script src="<?php echo base_url() ?>assets/js/demo/chart-area-demo.js"></script>
    <script src="<?php echo base_url() ?>assets/js/demo/chart-pie-demo.js"></script>
<script>
    window.addEventListener('load', function() {
    const footer = document.querySelector('footer');
    const mainContent = document.querySelector('body'); // Assuming your main content is in a container-fluid
    
    function adjustFooter() {
        const mainHeight = mainContent.offsetHeight; 
        const windowHeight = window.innerHeight;

        if (mainHeight < windowHeight) {
            footer.style.position = 'absolute';
            footer.style.bottom = '0';
            footer.style.width = '100%';
        } else {
            footer.style.position = 'static'; 
        }
    }

    adjustFooter();
    window.addEventListener('resize', adjustFooter);
});

</script>
</body>

</html>

