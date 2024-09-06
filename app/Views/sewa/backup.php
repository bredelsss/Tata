<?php $no = 1;
                  foreach ($result as $value) : ?>
                    <tr>
                      <td><?= $no++ ?></td>
                      
                      <td><?= $value->no_nota ?></td>
                      <td><?= $value->nama_motor ?></td>
                      <td><?= $value->harga_sewa ?></td>
                      <td><?= date('d/m/Y', strtotime($value->tanggal_berangkat)) ?></td>
                      
                      <td><?= date('d/m/Y', strtotime($value->tanggal_kembali)) ?></td>
                      <td><?= $value->lama_pemakaian ?></td>
                      

                    <?php endforeach; ?>