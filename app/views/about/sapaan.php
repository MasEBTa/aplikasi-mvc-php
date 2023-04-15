
    <h1>Menyapa</h1>
    <?php if ( $data['nama'] == 0 || $data['waktu'] == 0) : ?>
            <p>Halo Kamu, dapat ucapan Selamat Datang dari kami</p>
    <?php else : ?>
            <p>Halo <?= $data['nama']; ?>, selamat <?= $data['waktu']; ?></p>
    <?php endif; ?>