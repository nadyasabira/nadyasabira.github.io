<div class="container">

<div class="row">
		<div class="col-sm-12" style="background-color:white;" align="center">
					<b>CV.Oei Cake</b>
		</div>
		<div class="col-sm-12" style="background-color:white;" align="center">
					<b>Laporan Laba Rugi</b>
		</div>
		<div class="col-sm-12" style="background-color:white;" align="center">
				<b>Periode <?php echo format_bulan($bulan)." ".$tahun; ?></b>
		</div>
	</div>
        <p>
		<p>
  <table class="table table-condensed">
    <thead>
      <tr>
		<th colspan=4><b>Pendapatan</b></th>
      </tr>
    </thead>
    <tbody>
    <?php
    $lababersih = 0;
    $labakotor = 0;
		foreach($pendapatan_hpp as $cacah):
      echo "<tr>";
      echo "<td colspan=2>&emsp;&emsp;".$cacah['nama_akun']."</td>";
      if(strcmp($cacah['posisi_d_c'],'c')==0){
        $labakotor =  $labakotor + $cacah['total'];
        echo "<td style='width: 15%' class='text-right'>".format_rp($cacah['total'])."</td>"; 
      }else{
        echo "<td style='width: 15%' class='text-right'>(".format_rp($cacah['total']).")</td>";
        $labakotor =  $labakotor - $cacah['total'];
      }
      echo "<td style='width: 15%'></td>";
      echo "</tr>";
    endforeach;  
    $lababersih = $labakotor;
    ?>    
     <tr>
        <td style='width: 50%'></td>
        <td colspan=2><b>Laba Kotor</b></td>
        <td class='text-right'><b><?php echo format_rp($labakotor); ?></b></td>
      </tr>
      <tr>
		  <td colspan=3><b>Beban Operasional</b></td>
      <td class='text-right'><b></b></td>
      </tr>
      <?php
          $total_beban = 0;
          foreach($beban as $cacah):
            echo "<tr>";
            echo "<td colspan=2>&emsp;&emsp;".$cacah['nama_akun']."</td>";
            echo "<td style='width: 15%' class='text-right'>".format_rp($cacah['total'])."</td>"; 
            echo "<td style='width: 15%'></td>";
            echo "</tr>";
            $total_beban = $total_beban + $cacah['total'];
          endforeach;  
          $lababersih = $lababersih -  $total_beban;
      ?>
      
       <tr>
        <td style='width: 50%'></td>
        <td colspan=2><b>Total Beban Operasional</b></td>
        <td class='text-right'><b><?php echo "(".format_rp($total_beban).")"; ?></b></td>
      </tr>
      <tr>
		  <td colspan=3><b>Beban Administrasi Umum</b></td>
      <td class='text-right'><b></b></td>
      </tr>
      <?php
          $total_beban1 = 0;
          foreach($beban1 as $cacah):
            echo "<tr>";
            echo "<td colspan=2>&emsp;&emsp;".$cacah['nama_akun']."</td>";
            echo "<td style='width: 15%' class='text-right'>".format_rp($cacah['total'])."</td>"; 
            echo "<td style='width: 15%'></td>";
            echo "</tr>";
            $total_beban1 = $total_beban1 + $cacah['total'];
          endforeach;  
          $lababersih = $lababersih -  $total_beban1;
          $totalseluruh = $total_beban1 + $total_beban;
      ?>
      <tr>
        <td style='width: 50%'></td>
        <td colspan=2><b>Total Beban Adm Umum</b></td>
        <td class='text-right'><b><?php echo "(".format_rp($total_beban1).")"; ?></b></td>
      </tr>
     
      <tr>
        <td style='width: 50%'></td>
        <td colspan=2><b>Total Beban</b></td>
        <td class='text-right'><b><?php echo "(".format_rp($totalseluruh).")"; ?></b></td>
      </tr>
      <tr>
        <td style='width: 50%' style="background-color: #eee"></td>
        <td colspan=2 style="background-color: #eee"><b>Laba Bersih</b></td>
        <?php
              if($lababersih<0){
                  ?>
                    <td class='text-right'><b><?php echo "(".format_rp($lababersih).")"; ?></b></td>
                  <?php
              }else{
                  ?>
                    <td class='text-right' style="background-color: #eee"><b><?php echo format_rp($lababersih); ?></b></td>
                  <?php
              }
        ?>
        
      </tr>
    </tbody>
  </table>
  <p>
	
</div>
</body>
</html>