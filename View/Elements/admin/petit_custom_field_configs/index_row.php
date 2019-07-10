<?php
/**
 * [ADMIN] PetitCustomField
 *
 * @link			http://www.materializing.net/
 * @author			arata
 * @package			PetitCustomField
 * @license			MIT
 */
$classies = array();
if (!$this->PetitCustomField->allowPublish($data, 'PetitCustomFieldConfig')) {
	$classies = array('unpublish', 'disablerow');
} else {
	$classies = array('publish');
}
$class=' class="'.implode(' ', $classies).'"';
?>
<tr<?php echo $class ?>>
	<?php if(!$customFieldConfig['isNewThemeAdmin']):?>
	<td class="row-tools bca-table-listup__tbody-td">
	<?php $this->BcBaser->link($this->BcBaser->getImg('admin/icn_tool_unpublish.png', array('alt' => 'フィールドグループを無効化', 'class' => 'btn')),
			array('action' => 'ajax_unpublish', $data['PetitCustomFieldConfig']['id']), array('title' => 'フィールドグループを無効化', 'class' => 'btn-unpublish')) ?>
	<?php $this->BcBaser->link($this->BcBaser->getImg('admin/icn_tool_publish.png', array('alt' => 'フィールドグループを有効化', 'class' => 'btn')),
			array('action' => 'ajax_publish', $data['PetitCustomFieldConfig']['id']), array('title' => 'フィールドグループを有効化', 'class' => 'btn-publish')) ?>

	<?php $this->BcBaser->link($this->BcBaser->getImg('admin/icn_tool_manage.png', array('alt' => 'フィールド項目管理', 'class' => 'btn')),
			array('controller' => 'petit_custom_field_config_metas', 'action' => 'index', $data['PetitCustomFieldConfig']['id']), array('title' => 'フィールド項目管理')) ?>
	<?php $this->BcBaser->link($this->BcBaser->getImg('admin/icn_tool_edit.png', array('alt' => 'フィールドグループを編集', 'class' => 'btn')),
			array('action' => 'edit', $data['PetitCustomFieldConfig']['id']), array('title' => 'フィールドグループを編集')) ?>
	<?php $this->BcBaser->link($this->BcBaser->getImg('admin/icn_tool_delete.png', array('alt' => 'フィールドグループを削除', 'class' => 'btn')),
		array('action' => 'ajax_delete', $data['PetitCustomFieldConfig']['id']), array('title' => 'フィールドグループを削除', 'class' => 'btn-delete')) ?>
	<?php endif ?>
	</td>
	<td class="bca-table-listup__tbody-td"><?php echo $data['PetitCustomFieldConfig']['id']; ?></td>
	<td class="bca-table-listup__tbody-td">
		<?php echo $this->BcBaser->link($this->BcText->arrayValue($data['PetitCustomFieldConfig']['content_id'], $blogContentDatas, ''),
				array('controller' => 'petit_custom_field_config_metas', 'action' => 'index', $data['PetitCustomFieldConfig']['id']), array('title' => 'フィールド項目管理')) ?>
	</td>
	<td class="bca-table-listup__tbody-td">
		<?php if (!$this->PetitCustomField->hasCustomField($data)): ?>
			<?php $this->BcBaser->link($this->BcBaser->getImg('/petit_custom_field/img/admin/btn_add.png', array('alt' => '新規項目', 'class' => 'btn','style' => 'margin-right:5px')).'新規項目',
			array('controller' => 'petit_custom_field_config_fields', 'action' => 'add', $data['PetitCustomFieldConfig']['id'])) ?>
		<?php else: ?>
			<?php echo count($data['PetitCustomFieldConfigMeta']) ?>
		<?php endif ?>
	</td>
	<td class="bca-table-listup__tbody-td">
		<?php echo $this->BcText->arrayValue($data['PetitCustomFieldConfig']['form_place'], $customFieldConfig['form_place'], '<small>指定なし</small>') ?>
	</td>
	<td class="bca-table-listup__tbody-td" style="white-space: nowrap">
		<?php echo $this->BcTime->format('Y-m-d', $data['PetitCustomFieldConfig']['created']) ?>
		<br />
		<?php echo $this->BcTime->format('Y-m-d', $data['PetitCustomFieldConfig']['modified']) ?>
	</td>
	<?php if($customFieldConfig['isNewThemeAdmin']): //新管理画面の操作を後ろに移動 ?>
	<td class="row-tools bca-table-listup__tbody-td bca-table-listup__tbody-td--actions">
	<?php $this->BcBaser->link('', array('action' => 'ajax_unpublish', $data['PetitCustomFieldConfig']['id']), array('title' => 'フィールドグループを無効化','class' => 'btn-unpublish bca-btn-icon' ,'data-bca-btn-type'=>'unpublish','data-bca-btn-size'=>'lg')) ?>
	<?php $this->BcBaser->link('', array('action' => 'ajax_publish', $data['PetitCustomFieldConfig']['id']), array('title' => 'フィールドグループを有効化','class' => 'btn-publish bca-btn-icon' ,'data-bca-btn-type'=>'publish','data-bca-btn-size'=>'lg')) ?>
	<?php $this->BcBaser->link('', array('controller' => 'petit_custom_field_config_metas', 'action' => 'index', $data['PetitCustomFieldConfig']['id']), array('title' => 'フィールド項目管理','class' => 'btn-check bca-btn-icon' ,'data-bca-btn-type'=>'th-list','data-bca-btn-size'=>'lg')) ?>
	<?php $this->BcBaser->link('', array('action' => 'edit', $data['PetitCustomFieldConfig']['id']), array('title' => 'フィールドグループを編集','class' => 'btn-setting bca-btn-icon' ,'data-bca-btn-type'=>'setting','data-bca-btn-size'=>'lg')) ?>
	<?php $this->BcBaser->link('', array('action' => 'ajax_delete', $data['PetitCustomFieldConfig']['id']), array('title' => 'フィールドグループを削除','class' => 'btn-delete bca-btn-icon' ,'data-bca-btn-type'=>'delete','data-bca-btn-size'=>'lg')) ?>
	<?php endif ?>
	</td>
</tr>
