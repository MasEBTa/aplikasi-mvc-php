$(function(){
    $('.tambahDataMahasiswa').on('click', function(){
        $('#exampleModalLabel').html('Tambah Data Mahasiswa');
        $('.modal-footer button[type=submit]').html('Tambah Data');
    });
    
    $('.tampilModalUbah').on('click', function(){
        $('#exampleModalLabel').html('Ubah Data Mahasiswa');
        $('.modal-footer button[type=submit').html('Ubah Data');

        // get id
        const theid = $(this).data('idnya');
        const baseurl = $(this).data('base');
        
        // ganti action
        $('.modal-body form').attr('action', baseurl+'/mahasiswa/ubah');

        // ajax
        $.ajax({
            url: baseurl+'/mahasiswa/getubah',
            data: {id : theid}, // data yang dipakai fotmat objek = {nama : isi data}
            method: 'post', // metode pengiriman data (get/post)
            dataType: 'json', // text biasa atau json
            success: function(params) { // ketika sukses mengirim data mau apa
                $('#namanya').val(params.nama);
                $('#nrpnya').val(params.nrp);
                $('#InputEmail1').val(params.email);
                $('#jurusannya').val(params.jurusan);
                $('#idnya').val(params.id);
            },
        });
    });
});