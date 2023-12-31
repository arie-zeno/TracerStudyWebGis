@extends("alumni.layouts.main")
@section("container")
<h1 class="mt-4">Isi Data Pekerjaan</h1>

<div class="col-sm-6">

    <form method="POST" action="/alumni/works">
        
    @csrf

    <input type="hidden" name="nim" value="{{ auth()->user()->nim }}">

    <div class="mb-3">
        <label for="kategori_pekerjaan" class="form-label">Kategori Pekerjaan</label>
        <select id="kategori_pekerjaan" class="form-select" aria-describedby="basic-addon4" name="kategori_pekerjaan">
            <option selected>--Pilih Kategori--</option>
            <option value="IT Non kependidikan">IT ~ Non Kependidikan</option>
            <option value="IT kependidikan">IT ~ Kependidikan</option>
            <option value="Kependidikan IT">Kependidikan ~ IT</option>
            <option value="Kependidikan Non IT">Kependidikan ~ Non IT</option>
            <option value="Non IT Non Kependidikan">Non IT ~ Non Kependidikan</option>
        </select>
        <div class="form-text" id="basic-addon4">
            <ul>
                <li>IT ~ Non Kependidikan : Programmer, FrontEnd, IT Support, dll.</li>
                <li>IT ~ Kependidikan : Admin Sekolah, Operator, dll. </li>
                <li>Kependidikan ~ IT : Guru TKJ, Guru Komputer, dll. </li>
                <li>Kependidikan ~ Non IT : Guru SD, Guru IPA, Guru MTK, dll. </li>
            </ul>
        </div>
    </div>
    
    <div class="mb-3">
      <label for="nama_pekerjaan" class="form-label">Bekerja Sebagai</label>
      <input type="text" class="form-control" id="nama_pekerjaan" aria-describedby="nameHelp" name="nama_pekerjaan" placeholder="Contoh : Guru Honorer / Programmer / FrontEnd Developer">
    </div>

    <div class="mb-3">
        <label for="tempat_pekerjaan" class="form-label">Alamat Tempat Bekerja</label>
        <input type="text" class="form-control" id="tempat_pekerjaan" aria-describedby="nameHelp" name="tempat_pekerjaan">
      </div>

    <div class="mb-3">
        <label for="tanggal_pekerjaan" class="form-label">Tanggal Mendapatkan Pekerjaan</label>
        <div class="input-group">
            <input type="date" aria-label="Last name" id="tanggal_pekerjaan" class="form-control" name="tanggal_pekerjaan">
        </div>
    </div>

    <div class="mb-3">
        <label for="gaji" class="form-label">Besaran Kisaran Gaji</label>
        <div class="input-group">
            <input type="number" class="form-control" id="gaji" name="gaji" placeholder="5000000">
            <input type="text" class="form-control" id="nominal" value="" disabled>
        </div>
    </div>

    <div class="mb-3">
        <label for="relevansi_pekerjaan" class="form-label">Relevansi Pekerjaan (Menurut Anda)</label>
        <select id="relevansi_pekerjaan" class="form-select" aria-describedby="basic-addon4" name="relevansi_pekerjaan">
            <option selected>--Pilih Relevansi--</option>
            <option value="tinggi">Tinggi</option>
            <option value="sedang">Sedang</option>
            <option value="rendah">Rendah</option>
        </select>
    </div>

    <button type="submit" class="btn btn-primary">Selesai</button>
</form>
</div>

<script>
    let nominal = document.getElementById("nominal"),
        gaji = document.getElementById("gaji");

    gaji.addEventListener("change", () => {
        if(gaji.value.length == 6){
            nominal.value = `Rp. ${gaji.value[0]}${gaji.value[1]}${gaji.value[2]}.${gaji.value[3]}${gaji.value[4]}${gaji.value[5]}`
        }
        else if(gaji.value.length == 7){
            nominal.value = `Rp. ${gaji.value[0]}.${gaji.value[1]}${gaji.value[2]}${gaji.value[3]}.${gaji.value[4]}${gaji.value[5]}${gaji.value[6]}`
        }
        else if(gaji.value.length == 8){
            nominal.value = `Rp. ${gaji.value[0]}${gaji.value[1]}.${gaji.value[2]}${gaji.value[3]}${gaji.value[4]}.${gaji.value[5]}${gaji.value[6]}${gaji.value[7]}`
        }

    })
</script>
@endsection
