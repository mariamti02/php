<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Hitung Valas</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
    <style>
        * {
           font-family: 'Trebuchet MS', 'Lucida Sans Unicode', 'Lucida Grande', 'Lucida Sans', Arial, sans-serif;
        }
        td {
            text-align: center;
            font-size: small;
         }
         th {
            font-size: small;
            text-align: center;
           
         }
    </style>  

</head>
  <body>
    <div class="container">
        <div class="card mb-5 mt-5">
            <ul class="nav justify-content-center mt-4">
        
                <li class="nav-item">
                  <a class="nav-link disabled">Data Input Pegawai</a>
                </li>
        
            </ul>
            <div class="card-body">
                <form method="post">
                    <div class="mb-3 row">
                        <label class="col-sm-2 col-form-label" for="namapegawai">Nama Pegawai</label>
                        <div class="col-sm-10">
                        <input type="text" class="form-control" name="nama">
                        </div>
                    </div>
                    
                    <div class="mb-3 row">
                        <label class="col-sm-2 col-form-label" for="agama">Agama</label>
                        <div class="col-sm-10">
                            <select name="agama" class="form-control">
                                <option value=""> </option>
                                <option value="Islam">Islam</option>
                                <option value="Khatolik">Khatolik</option>
                                <option value="Protestan">Protestan</option>
                                <option value="Budha">Budha</option>
                                <option value="Hindu">Hindu</option>
                                
                            </select>
                        </div>
                    </div> 
                    
                    <div class="mb-4 mt-4 row">
                        <label class="col-sm-2 col-form-label" for="jabatanr">Jabatan</label>
                        <div class="col-sm-10">
                        <div class="form-check form-check-inline">
                            <input class="form-check-input"  type="radio" name="jabatan" value="manager"/>
                            <label class="form-check-label" for="manager">Manager</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="jabatan" value="asistant"/>
                            <label class="form-check-label" for="asistant">Asistant Manager</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="jabatan" value="head"/>
                            <label class="form-check-label" for="head">Head Of Division</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="jabatan" value="staff"/>
                            <label class="form-check-label" for="staff">Staff</label>
                        </div>
                        </div>    
                    </div>

                    <div class="mb-3 row">
                        <label class="col-sm-2 col-form-label" for="status">Status</label>
                        <div class="col-sm-10">
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="status" value="menikah"/>
                            <label class="form-check-label" for="menikah">Menikah</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input nav-link " type="radio" name="status" value="belummenikah"/>
                            <label class="form-check-label" for="belummenikah">Belum Menikah</label>
                        </div>
                        </div>    
                    </div>

                    <div class="mb-3 row">
                        <label class="col-sm-2 col-form-label" for="jumlahanak">Jumlah Anak</label>
                        <div class="col-sm-10">
                        <input type="text" class="form-control" type="text" name="jumlahanak">
                        </div>
                    </div>


                    <div class="d-grid">
                        <button type="submit" class="btn btn-info" name="simpan">Simpan</button>
                    </div>

                </form>
            </div>

    <ul class="nav justify-content-center mt-3 mb-4">
        <li class="nav-item">
          <a class="nav-link disabled">Data Ouput Pegawai</a>
        
        </li>
    </ul>


    <?php 

    $input1 = $_POST['nama'];
    $input2 = $_POST['agama'];
    $input3 = $_POST['jabatan'];
    $input4 = $_POST['status'];
    $input5 = $_POST['jumlahanak'];

    $submit = $_POST['simpan'];

    //mengetahui gaji yang didapatkan sesuai jabatan lalu akan di konversi ke perulangan status
    switch($input3){
        case 'manager' : $gaji = 20000000; break;
        case 'asistant' : $gaji = 15000000; break;
        case 'head' : $gaji = 10000000; break;
        case 'staff' : $gaji = 4000000; break;
        default: $gaji = ''; break;
  }

  //Memberikan perulangan gaji tunjangan sesuai status saat ini
    if ($input4 == 'menikah' && $input5 == 1 && $input5 <= 2) $tKeluarga = 0.05 * $gaji;
    else if ($input4 == 'menikah' && $input5 == 3 && $input5 <= 5) $tKeluarga = 0.1 * $gaji;
    else if ($input4 == 'menikah' && $input5 > 5) $tKeluarga = 0.15 * $gaji;
    else if ($input4 == 'belummenikah') $tKeluarga = 1 * $gaji;
    else $tKeluarga = '';

  
    

    //rumus yang akan dicari dalam gaji koto hingga zakat yang akan ditentukan
    $tJabatan = $gaji * 0.2;
    $gKotor = $gaji + $tJabatan + $tKeluarga;
    $zakat = ($input2 == 'Islam' && $gKotor >= 6000000) ? 0.025 * $gKotor : 0;
    $total = $gKotor - $zakat;


    //output yang akan ditampilkan oleh sistem
if(isset($submit)){ ?>

  <div class="container">
  <table class="table table-striped table-hover mt-5">
      <thead>
          <tr>
            <!-- <th>#</th> -->
                      <th>Nama Pegawai</th>
                      <th>Agama</th>
                      <th>Jabatan</th>
                      <th>Status</th>
                      <th>Jumlah Anak</th>
                      <th>Gaji</th>
                      <th>Tunjangan Jabatan</th>
                      <th>Tunjangan Keluarga</th>
                      <th>Gaji Kotor</th>
                      <th>Zakat Profesi</th>
                      <th>Take Home Pay</th>
            <!-- <th>Total Bayar</th> -->
          </tr>
        </thead>
        <tbody>
          <tr>
          
            <td><?= $input1; ?></td>
            <td><?= $input2; ?></td>
            <td><?= $input3; ?></td>
            <td><?= $input4; ?></td>
            <td><?= $input5; ?></td>
            <td><?= 'Rp' . '_' . $gaji; ?></td>
            <td><?= 'Rp' . '_' . $tJabatan; ?></td> 
            <td><?= 'Rp' . '_' . $tKeluarga; ?></td>
            <td><?= 'Rp' . '_' . $gKotor; ?></td>
            <td><?= 'Rp' . '_' . $zakat; ?></td>
            <td><?= 'Rp' . '_' . $total; ?></td>         
          </tr>   
        </tbody>     
  </table>
</div>
<?php } ?>


    </div>  
</div>
   
    </body> 




    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous"></script>
  
</html>
