@extends("alumni.layouts.main")
@section("container")
<h1>Isi Biodata</h1>

<div class="col-sm-6">

    <form method="POST" action="/alumni/bios" enctype="multipart/form-data">
        @csrf
    <div class="mb-3">
      <label for="exampleInputEmail1" class="form-label">Nama</label>
      <input type="name" class="form-control" id="exampleInputname1" aria-describedby="nameHelp" value="{{auth()->user()->name}} " name="name">
    </div>
    <input type="hidden" name="user_id" value="{{auth()->user()->id}}">
    <div class="mb-3">
        <label for="foto" class="form-label">foto</label>
        <input type="file" class="form-control" id="foto" name="foto" placeholder="foto">
    </div>
    <div class="mb-3">
        <label for="nim" class="form-label">NIM</label>
        <input type="text" class="form-control @error('nim')
            is-invalid
        @enderror" id="nim" name="nim" placeholder="NIM" value="{{auth()->user()->nim}}">
    </div>

    <div class="mb-3">
        <label for="kontak" class="form-label">Kontak</label>
        <input type="number" class="form-control" id="kontak" name="kontak" placeholder="Contoh : 0822xxxxxxxx" required>
    </div>

    <div class="mb-3">
        <label for="thnLulus" class="form-label">Tahun Lulus</label>
        <input type="text" class="form-control" id="thnLulus" name="thnLulus" placeholder="Contoh : 2015" required>
    </div>

    <div class="mb-3">
        <label for="ipk" class="form-label">IPK</label>
        <input type="text" class="form-control" id="ipk" name="ipk" placeholder="Contoh : 3.8" required>
    </div>

    <div class="mb-3">
        <label for="ttl" class="form-label">Tempat, Tanggal Lahir</label>
        <div class="input-group">
            <input type="text" aria-label="First name" class="form-control" name="tempatLahir" placeholder="Tempat Lahir" required>
            <input type="date" aria-label="Last name" class="form-control" name="tglLahir" required>
        </div>
    </div>

    <div class="mb-3">
        <label for="koordinat" class="form-label">Tempat Tinggal Asal</label>
        <div class="input-group">
            <input type="text"  class="form-control" name="koordinat" required placeholder="Contoh : -3.299093373224937, 114.58592704949446">
        </div>
        <div class="form-text" id="basic-addon4">
            <i><a class="link-secondary" href="#"> Cara Mengetahui Titik Kordinat <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-question-circle" viewBox="0 0 16 16">
                <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/>
                <path d="M5.255 5.786a.237.237 0 0 0 .241.247h.825c.138 0 .248-.113.266-.25.09-.656.54-1.134 1.342-1.134.686 0 1.314.343 1.314 1.168 0 .635-.374.927-.965 1.371-.673.489-1.206 1.06-1.168 1.987l.003.217a.25.25 0 0 0 .25.246h.811a.25.25 0 0 0 .25-.25v-.105c0-.718.273-.927 1.01-1.486.609-.463 1.244-.977 1.244-2.056 0-1.511-1.276-2.241-2.673-2.241-1.267 0-2.655.59-2.75 2.286zm1.557 5.763c0 .533.425.927 1.01.927.609 0 1.028-.394 1.028-.927 0-.552-.42-.94-1.029-.94-.584 0-1.009.388-1.009.94z"/>
              </svg></a></i>
        </div>
    </div>

    <div class="mb-3">
        <label for="jk" class="form-label">Jenis Kelamin</label>
        <select id="jk" class="form-select" aria-label="Default select example" name="jk" required>
            <option selected>--Pilih Jenis Kelamin--</option>
            <option value="laki-laki">Laki-laki</option>
            <option value="Perempuan">Perempuan</option>
          </select>
    </div>

    <div class="mb-3">
        <label for="agama" class="form-label">Agama</label>
        <select class="form-select" aria-label="Default select example" name="agama" required>
            <option selected>--Pilih Agama--</option>
            <option value="islam">Islam</option>
            <option value="kristen">Kristen</option>
            <option value="hindu">Hindu</option>
            <option value="buddha">Buddha</option>
          </select>
    </div>

    <div class="mb-3">
        <label for="kawin" class="form-label">Status Perkawinan</label>
        <select id="kawin" class="form-select" aria-label="Default select example" name="kawin" required>
            <option selected>--Pilih Status Perkawinan--</option>
            <option value="belum">Belum Menikah</option>
            <option value="sudah">Sudah Menikah</option>
          </select>
    </div>

    <div class="mb-3">
        <label for="pekerjaan" class="form-label">Status Pekerjaan</label>
        <select class="form-select" aria-label="Default select example" name="pekerjaan" required>
            <option selected>--Pilih Status Pekerjaan--</option>
            <option value="belum">Belum Bekerja</option>
            <option value="sudah">Sudah Bekerja</option>
          </select>
    </div>
    


    <button type="submit" class="btn btn-primary">Selesai</button>
</form>
</div>
@endsection