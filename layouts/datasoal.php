    <div class="card-body">
            <h3 class="card-title mt-1">Data Soal</h3>
                <a href="bank_soal_form.php?act=tambah" class="btn btn-sm btn-primary float-right mb-3">Tambah Data</a>
                <table class="table table-sm table-bordered">
                    <thead>
                        <tr>
                            <th >Kode Soal</th>
                            <th >Soal</th>
                            <th >kategori</th>
                            <th >Jenis Soal</th>
                            <th >aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php 
                    
                    
                    $data = $bank_soal->getData();
                    
                    

                    $i = 1;
                    while($row = $data->fetch_assoc()){
                    
                        echo '<tr>
                        <td>'.$row['soal_id'].'</td>
                        <td>'.$row['soal_nama'].'</td>
                        <td>'.$row['kategori_nama'].'</td>
                        <td>'.$row['soal_jenis'].'</td>
                        
                        <td>
                        <a title="Edit Data" href="bank_soal_form.php?act=edit&id='.$row['soal_id'].'" class="btn btn-sm btn-warning" title="Edit Data"><i class="fa fa-edit"></i> Edit</a>
                        <a onclick="return confirm(\'Apakah anda yakin menghapus data ini?\')" title="Hapus Data" href="bank_soal_action.php?act=delete&id='.$row['soal_id'].'" class="btn btn-sm btn-danger" title="Hapus Data"><i class="fa fa-trash"></i> Hapus</a>

                        </td>
                        </tr>';
                        $i++;
                    }
                ?>
                    </tbody>
                </table>

            </div>