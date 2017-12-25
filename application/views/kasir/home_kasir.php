<?php date_default_timezone_set('Asia/Jakarta');?>	
	<div class="col-md-1"></div>
	<div class="col-md-10 col-centered nota">
		<div class="panel panel-default" >


		 <div class="panel-body">
		 	<div class="row">
		 		<div class="col-md-12">
			 <div class="form-group pull-right">
			    	
			      		<button type="button" class="btn btn-primary" 
			      		id="tambah" style="background-color: #30a5ff" onclick="<?php echo site_url('Pelanggan/insert_pelanggan')?>">
			      		   Tambah Pelanggan</button>
			    </div>
			 </div>
		 	</div>
		 	
			 <div class="row">
			 	<div class="col-md-8">
		 	<form class="form-horizontal" id="form_transaksi" role="form">			   
	      		<div class="form-group">
			      <label class="control-label col-md-3" 
			      	for="tgl_transaksi">Tgl.Transaksi :</label>
			      <div class="col-md-5">
			        <input type="text" class="form-control" 
			        	name="tgl_transaksi" value="<?= date('d-m-Y') ?>" 
			        	readonly="readonly">
			      </div>
			    </div> 
			    <div class="form-group">
			      <label class="control-label col-md-3" 
			      	for="id_Kendaraan">Id Pelanggan :</label>
			      <div class="col-md-5">
			        <input list="list_Pelanggan" class="form-control reset" 
			        	placeholder="Isi id Pelanggan" name="id_Pelanggan" id="id_Pelanggan" 
			        	autocomplete="off">
			        	<datalist id="list_Pelanggan">
			        	<?php foreach ($data as $value) {?>
			        		
			        	
			        		<option value="<?=$value['id_pelanggan']?>"><?=$value['nama']?></option><?php } ?>
			        	</datalist>
			      </div>
			    </div>
			    <div class="form-group">
			      <label class="control-label col-md-3" 
			      	for="id_Kendaraan">Id Kendaraan :</label>
			      <div class="col-md-5">
			        <input list="list_Kendaraan" class="form-control reset" 
			        	placeholder="Isi id Kendaraan" name="id_Kendaraan" id="id_Kendaraan" 
			        	autocomplete="off">
			        	<datalist id="list_Kendaraan">
			        	<?php foreach ($motor as $value) {?>
			        		<option value="<?=$value->PLATNOMOR?>"><?=$value->MERK_MOTOR?></option><?php } ?>
			        	</datalist>
			      </div>
			    </div>

			     <div class="form-group">
			      <label class="control-label col-md-3" 
			      	for="masuk">Jam Rental :</label>
			      <div class="col-md-5">
			        <input   class="form-control reset" 
			        	placeholder="Isi Jam Rental" name="masuk" id="masuk" value=<?= date('h:i:s')?> readonly="readonly" 
			        	>
			        	
			      </div>
			    </div>
			    <div class="form-group">
			      <label class="control-label col-md-3" 
			      	for="Keluar">Tgl Kembali :</label>
			      <div class="col-md-5">
			        <input  type="date" class="form-control reset" 
			        	placeholder="Isi Tgl Kembali" name="tgl_kembali" id="tgl_kembali" 
			        	>
			        	
			      </div>
			    </div>
			    <div class="form-group">
			      <label class="control-label col-md-3" 
			      	for="Keluar">Jam Kembali :</label>
			      <div class="col-md-5">
			        <input  type="time" class="form-control reset" 
			        	placeholder="Isi Jam Kembali" name="Keluar" id="Keluar" 
			        	>
			        	
			      </div>
			    </div>

			    
			    <div class="form-group">
			      <label class="control-label col-md-3" 
			      	for="id_Tarif">Id Tarif :</label>
			      <div class="col-md-5">
			        <input list="list_Tarif" class="form-control reset" 
			        	placeholder="Isi id Tarif" name="id_Tarif" id="id_Tarif" 
			        	autocomplete="off">
			        	<datalist id="list_Tarif">
			        	<?php foreach ($tarif as $value) {?>
			        		<option value="<?=$value->ID_TARIF?>"><?=$value->MERK_MOTOR?></option><?php } ?>
			        	</datalist>
			      </div>
			    </div>

			   
			    
			      
	      	</div><!-- end col-md-8 -->

		<div class="col-md-4 mb">
				<div class="col-md-12">
				  	<div class="form-group">
				      <label for="total" class="besar">Total (Rp) :</label>
				      	<input type="text" class="form-control input-lg" 
			        	name="total" id="total" placeholder="0">
				    </div>
				    <div class="form-group">
				      <label for="bayar" class="besar">Bayar (Rp) :</label>
				        <input type="text" class="form-control input-lg uang" 
				        	name="bayar" placeholder="0" autocomplete="off"
				        	id="bayar">
				    </div>
				    <div class="form-group">
				      <label for="kembali" class="besar">Kembali (Rp) :</label>
				      	<input type="text" class="form-control input-lg" 
			        	name="kembali" id="kembali" placeholder="0"
			        	readonly="readonly">
				    </div>
				    <a class="btn btn-primary pull-right" href="pkasir/cetak">Cetak Nota</a>
				</div>

	      	</div><!-- end col-md-4 -->
	      	</form>

			 </div>
			 <br>
	      	
	      </div>
	    </div>
	</div><!-- end col-md-9 -->
<div class="col-md-1"></div>
	
<script type="text/javascript">
	$.post("<?=base_url()?>Admin/get_rincian_tarif",{id:id}, function(data){
			var duce = jQuery.parseJSON(data);
			var nama_menu = duce.nama_menu;
			var harga = duce.harga;
			var jumlah = harga * quantity;)
</script>

      
   