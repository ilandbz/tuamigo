<table class="table table-bordered table-hover" id="reportemetas">
	<tr>
		<th width="10%"></th>
		<th>AL <?php echo $fecha ?></th>
	</tr>
	<tr>
		<th>CARTERA</th>
		<td>S/.<?php echo round($cartera, 2); ?></td>
	</tr>
	<tr>
		<th>CLIENTES</th>
		<td><?php echo $clientes; ?></td>
	</tr>
	<tr>
		<th colspan="2">MORA</th>
	</tr>
	<tr>
		<th>1 - 8</th>
		<td>S/. 
		<?php 
			$reportesmora['reportmora1a8'] = is_null($reportesmora['reportmora1a8']) ? 0 : $reportesmora['reportmora1a8'];
			echo $reportesmora['reportmora1a8']; 
		?></td>
	</tr>
	<tr>
		<th>9 - 15</th>
		<td>S/. 
		<?php 
			$reportesmora['reportmora9a15'] = is_null($reportesmora['reportmora9a15']) ? 0 : $reportesmora['reportmora9a15'] ;
			echo $reportesmora['reportmora9a15'];
		?></td>
	</tr>
	<tr>
		<th>16 - 30</th>
		<td>S/. 
		<?php 
			$reportesmora['reportmora16a30'] = is_null($reportesmora['reportmora16a30']) ? 0 : $reportesmora['reportmora16a30']; 
			echo $reportesmora['reportmora16a30'];
		?></td>
	</tr>
	<tr>
		<th>31 - 45</th>
		<td>S/. <?php 
			$reportesmora['reportmora31a45'] = is_null($reportesmora['reportmora31a45']) ? 0 : $reportesmora['reportmora31a45']; 
			echo $reportesmora['reportmora31a45'];
		?></td>
	</tr>
	<tr>
		<th>46 - mas</th>
		<td>S/. 
		<?php 
			$reportesmora['reportmora46amas'] = is_null($reportesmora['reportmora46amas']) ? 0 : $reportesmora['reportmora46amas']; 
			echo $reportesmora['reportmora46amas'];
		?></td>
	</tr>
	<tr>
		<th>TOTAL</th>
		<th>S/. <?php 
		$total = $cartera + $reportesmora['reportmora1a8'] + $reportesmora['reportmora9a15'] + $reportesmora['reportmora16a30'] + $reportesmora['reportmora31a45'] + $reportesmora['reportmora46amas'];
		echo round($total,1);
		?></th>
	</tr>	
</table>