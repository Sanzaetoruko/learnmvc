<div class="container mt-3">
	
	<div class="row">
		<div class="col-lg-6">
			<?php Flasher::flash(); ?>
		</div>
	</div>

	<div class="row mb-3">
		<div class="col-lg-6">
			<button type="button" class="btn btn-primary btn-tambah" data-bs-toggle="modal" data-bs-target="#formModal">
				Tambah data mahasiswa
			</button>
		</div>
	</div>

	<div class="row mb-1">
		<div class="col-lg-6">
			<form action="<?= BASEURL ?>/mahasiswa/cari" method="post">
				<div class="input-group mb-3">
				  <input type="text" class="form-control" placeholder="Cari mahasiswa..." aria-label="Recipient's username" aria-describedby="button-addon2" name="keyword" id="keyword" autocomplete="off">
				  <button class="btn btn-outline-secondary bi bi-search" type="submit" id="button-addon2" name="cari"></button>
				</div>
			</form>
		</div>
	</div>

	<div class="row">
		<div class="col-lg-6">
			<h3>Daftar Mahasiswa</h3>
			<ul class="list-group">
			<?php foreach ( $data['mhs'] as $mhs ) : ?>			
			  <li class="list-group-item">
			  	<?= $mhs['nama'] ?>
			  	<a href="<?= BASEURL ?>/mahasiswa/hapus/<?= $mhs['id'] ?>" class="badge text-bg-danger text-decoration-none float-end me-1" onclick="return confirm('Yakin?')">hapus</a>
			  	<a href="<?= BASEURL ?>/mahasiswa/ubah/<?= $mhs['id'] ?>" class="badge text-bg-success text-decoration-none float-end me-1 btn-ubah" data-bs-toggle="modal" data-bs-target="#formModal" data-id="<?= $mhs['id'] ?>">ubah</a>
			  	<a href="<?= BASEURL ?>/mahasiswa/detail/<?= $mhs['id'] ?>" class="badge text-bg-primary text-decoration-none float-end me-1">detail</a>	
			  </li>
			<?php endforeach; ?>	  
			</ul>
		</div>
</div>

<!-- Modal -->
<div class="modal fade" id="formModal" tabindex="-1" aria-labelledby="judulModal" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="judulModal">Tambah data mahasiswa</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
       
		<form action="<?= BASEURL ?>/mahasiswa/tambah" method="post" class="form-tag-modal">
			<input type="hidden" name="id" id="id">
			<div class="mb-3">
				<label for="nama" class="form-label">Nama</label>
				<input type="text" class="form-control" id="nama" name="nama">
			</div>
			<div class="mb-3">
				<label for="umur" class="form-label">Umur</label>
				<input type="number" class="form-control" id="umur" name="umur">
			</div>	
			<div class="mb-3">
				<select class="form-select" aria-label="Default select example" name="jurusan" id="jurusan">
					<option selected value="">Pilih jurusan</option>
					<option value="Teknik informatika">Teknik informatika</option>
					<option value="Psikologi">Psikologi</option>
					<option value="Ilahiyat">Ilahiyat</option>
					<option value="Teknik industri">Teknik industri</option>
				</select>
			</div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
        <button type="submit" class="btn btn-primary">Tambah data</button>
		</form>
      </div>
    </div>
  </div>