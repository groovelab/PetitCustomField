<?php
/**
 * [ADMIN] PetitCustomField
 *
 * @link			http://www.materializing.net/
 * @author			arata
 * @package			PetitCustomField
 * @license			MIT
 */
?>
<tr>
<?php if(!$customFieldConfig['isNewThemeAdmin']):?>
	<td class="row-tools bca-table-listup__tbody-td">
	<?php $this->BcBaser->link($this->BcBaser->getImg('admin/icn_tool_edit.png', array('alt' => '編集', 'class' => 'btn')),
			array('action' => 'edit', $data['PetitCustomFieldConfigField']['id']), array('title' => '編集')) ?>
	</td>
<?php endif; ?>
	<td class="bca-table-listup__tbody-td" style="width: 45px;"><?php echo $data['PetitCustomFieldConfigField']['id']; ?></td>
	<td class="bca-table-listup__tbody-td">
		<?php echo $this->BcBaser->link($data['PetitCustomFieldConfigField']['key'], array('action' => 'edit',$data['PetitCustomFieldConfigField']['foreign_id']), array('title' => '編集')) ?>
		<?php //echo $data['PetitCustomFieldConfigField']['key'] ?>
		<br />
		<?php echo $data['PetitCustomFieldConfigField']['value'] ?>
	</td>
	<td class="bca-table-listup__tbody-td" style="white-space: nowrap">
		<?php echo $this->BcTime->format('Y-m-d', $data['PetitCustomFieldConfigField']['created']) ?>
		<br />
		<?php echo $this->BcTime->format('Y-m-d', $data['PetitCustomFieldConfigField']['modified']) ?>
	</td>
<?php if($customFieldConfig['isNewThemeAdmin']):?>	
	<td class="row-tools bca-table-listup__tbody-td">
	<?php $this->BcBaser->link($this->BcBaser->getImg('admin/icn_tool_edit.png', array('alt' => '編集', 'class' => 'btn')),
			array('action' => 'edit', $data['PetitCustomFieldConfigField']['foreign_id']), array('title' => '編集')) ?>
	</td>
<?php endif; ?>
</tr>
