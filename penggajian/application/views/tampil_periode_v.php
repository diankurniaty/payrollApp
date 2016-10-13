
<?php  
$blnth = $_POST['bulantahun'];   
  
  
$query = $this->gajipegawai_m->cari_periode();  
$hasil = mysql_query($query);  
while ($data = mysql_fetch_array($hasil))  
{ ?>

                <table border="1">
                    <thead>
                        <tr>
                            <th>No gaji</th>
                            <th>NIP</th>
							<th>Nama</th>
							<th>Jabatan</th>
							<th>Golongan</th>
							<th>Gaji Pokok</th>
                            <th>Tunj. Jabatan</th>
							<th>Tunj. Kerja</th>	
							
                        </tr>
                    </thead>
                    <tbody>
                        
						
						
						
						
                        <tr>
                            <td><?PHP echo "".$data['no_gaji'].""; ?></td>
							 <td>
                            
                                <?PHP echo "".$data['NIP'].""; ?>
                            </td>
							
                            <td>
                            
                                <?PHP echo "".$data['nama_peg'].""; ?>
                            </td>
							
                            <td>
                            	<?PHP echo "".$data['jabatan'].""; ?>
                                
                            </td>
							
							<td>
                               <?PHP echo "".$data['gol'].""; ?>
                                
                            </td>
							
							
							<td>
                                <?PHP echo "".$data['gaji_pokok'].""; ?>
                                
                            </td>
                            
							<td>
                                <?PHP echo "".$data['tunj_jabatan'].""; ?>
                                
                            </td>
                            
							<td>
                            <?PHP echo "".$data['tunjangan_kerja'].""; ?>
                                
                            </td>
							
							
				</tr>
       </tbody>        
        </table>













<?PHP 
 
     echo "<h1>".$data['no_gaji']."</h1>";  
     echo "<p>periode : ".$data['tgl_gaji']."</p>";  
     echo "<p>tunjangan jabatan : ".$data['tunj_jabatan']."</p>";  
     echo "<p>".$data['tunjangan_kerja']."</p>";  
} 
?>