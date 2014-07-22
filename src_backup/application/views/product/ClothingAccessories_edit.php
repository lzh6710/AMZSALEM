	<h3><?php echo $categories;?></h3>
	<?php echo $productData; ?>
	<table class="table table-bordered">
		<tbody>
			<tr>
				<td>Parentage</td>
				<td><?php echo $productData->ClothingAccessories->VariationData->Parentage; ?></td>
			</tr>
			<tr>
				<td>Size</td>
				<td><?php echo $productData->ClothingAccessories->VariationData->Size; ?></td>
			</tr>
			<tr>
				<td>Color</td>
				<td><?php echo $productData->ClothingAccessories->VariationData->Color; ?></td>
			</tr>
			<tr>
				<td>Variation Theme</td>
				<td><?php echo $productData->ClothingAccessories->VariationData->VariationTheme; ?></td>
			</tr>
			<tr>
				<td>Department</td>
				<td><?php echo $productData->ClothingAccessories->ClassificationData->Department; ?></td>
			</tr>
			<tr>
				<td>ColorMap</td>
				<td><?php echo $productData->ClothingAccessories->ClassificationData->ColorMap; ?></td>
			</tr>
			<tr>
				<td>Special Size Type</td>
				<td><?php echo $productData->ClothingAccessories->ClassificationData->SpecialSizeType; ?></td>
			</tr>
		</tbody>
	</table>
