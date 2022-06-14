$(function() {

	$(".btn-tambah").on("click", function(){

		$("#judulModal").html("Tambah Data Mahasiswa");
		$(".modal-footer button[type=submit]").html("Tambah data");
		$("#nama").val("");
		$("#umur").val("");
		$("#jurusan").val("");
		$(".form-tag-modal").attr("action","http://localhost/learnmvc/public/Mahasiswa/tambah");


	});

	$(".btn-ubah").on("click", function(){

		$("#judulModal").html("Ubah Data Mahasiswa");
		$(".modal-footer button[type=submit]").html("Ubah data");
		$(".form-tag-modal").attr("action","http://localhost/learnmvc/public/Mahasiswa/ubah");

		const id = $(this).data('id');

		$.ajax({
			url: 'http://localhost/learnmvc/public/Mahasiswa/getubah',
			data: {id : id},
			method: 'post',
			dataType: 'json',
			success: function(data){
				$("#nama").val(data.nama);
				$("#umur").val(data.umur);
				$("#jurusan").val(data.jurusan);
				$("#id").val(data.id);

			}
		});

	});



})