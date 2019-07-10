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
if (!$this->PetitCustomField->allowPublish($data)) {
	$classies = array('unpublish', 'disablerow');
} else {
	$classies = array('publish');
}
$class=' class="'.implode(' ', $classies).'"';
?>
<tr<?php echo $class ?>>
<?php if(!$customFieldConfig['isNewThemeAdmin']):?>
	<td class="row-tools bca-table-listup__tbody-td">
	<?php $this->BcBaser->link($this->BcBaser->getImg('admin/icn_tool_unpublish.png', array('alt' => '項目を無効', 'class' => 'btn')),
			array('action' => 'ajax_unpublish', $data['PetitCustomFieldConfigMeta']['petit_custom_field_config_id'], $data['PetitCustomFieldConfigMeta']['id']), array('title' => '項目を無効', 'class' => 'btn-unpublish')) ?>
	<?php $this->BcBaser->link($this->BcBaser->getImg('admin/icn_tool_publish.png', array('alt' => '項目を有効', 'class' => 'btn')),
			array('action' => 'ajax_publish', $data['PetitCustomFieldConfigMeta']['petit_custom_field_config_id'], $data['PetitCustomFieldConfigMeta']['id']), array('title' => '項目を有効', 'class' => 'btn-publish')) ?>

	<?php $this->BcBaser->link($this->BcBaser->getImg('admin/icn_tool_manage.png', array('alt' => '所属グループ管理', 'class' => 'btn')),
			array('controller' => 'petit_custom_field_config_metas', 'action' => 'edit',
					$data['PetitCustomFieldConfigMeta']['id']), array('title' => '所属グループ管理')) ?>

	<?php $this->BcBaser->link($this->BcBaser->getImg('admin/icn_tool_edit.png', array('alt' => '項目を編集', 'class' => 'btn')),
			array('controller' => 'petit_custom_field_config_fields', 'action' => 'edit',
					$data['PetitCustomFieldConfigMeta']['petit_custom_field_config_id'], $data['PetitCustomFieldConfigMeta']['field_foreign_id']), array('title' => '項目を編集')) ?>

	<?php $this->BcBaser->link($this->BcBaser->getImg('admin/icn_tool_delete.png', array('alt' => '項目を削除', 'class' => 'btn')),
			array('action' => 'ajax_delete', $data['PetitCustomFieldConfigMeta']['petit_custom_field_config_id'], $data['PetitCustomFieldConfigMeta']['id']), array('title' => '項目を削除', 'class' => 'btn-delete')) ?>

	<?php // 並び替えはconfigIdで絞り込んだ画面で有効化する ?>
	<?php if ($this->request->params['pass']): ?>
		<?php if ($count != 1 || !isset($datas)): ?>
			<?php $this->BcBaser->link($this->BcBaser->getImg('admin/icn_tool_up.png', array('alt' => '項目を上へ移動', 'class' => 'btn')),
					array('controller' => 'petit_custom_field_config_metas', 'action' => 'move_up', $data['PetitCustomFieldConfigMeta']['petit_custom_field_config_id'], $data['PetitCustomFieldConfigMeta']['id']), array('class' => 'btn-up', 'title' => '項目を上へ移動')) ?>
		<?php else: ?>
			<?php $this->BcBaser->link($this->BcBaser->getImg('admin/icn_tool_up.png', array('alt' => '項目を上へ移動', 'class' => 'btn')),
					array('controller' => 'petit_custom_field_config_metas', 'action' => 'move_up', $data['PetitCustomFieldConfigMeta']['petit_custom_field_config_id'], $data['PetitCustomFieldConfigMeta']['id']), array('class' => 'btn-up', 'title' => '項目を上へ移動', 'style' => 'display:none')) ?>

			<?php if (count($datas) > 2): ?>
				<?php //最下段へ移動 ?>
				<?php $this->BcBaser->link('<i class="fa fa-arrow-circle-down fa-2x" style="vertical-align: middle;margin-left: 2px;"></i>',
						array('controller' => 'petit_custom_field_config_metas', 'action' => 'move_down', $data['PetitCustomFieldConfigMeta']['petit_custom_field_config_id'], $data['PetitCustomFieldConfigMeta']['id'], 'tobottom'), array('class' => 'btn-down', 'title' => '項目を最下段へ移動')) ?>
			<?php endif ?>
		<?php endif ?>
		
		<?php if (!isset($datas) || count($datas) != $count): ?>
			<?php $this->BcBaser->link($this->BcBaser->getImg('admin/icn_tool_down.png', array('alt' => '項目を下へ移動', 'class' => 'btn')),
					array('controller' => 'petit_custom_field_config_metas', 'action' => 'move_down', $data['PetitCustomFieldConfigMeta']['petit_custom_field_config_id'], $data['PetitCustomFieldConfigMeta']['id']), array('class' => 'btn-down', 'title' => '項目を下へ移動')) ?>
		<?php else: ?>
			<?php $this->BcBaser->link($this->BcBaser->getImg('admin/icn_tool_down.png', array('alt' => '項目を下へ移動', 'class' => 'btn')),
					array('controller' => 'petit_custom_field_config_metas', 'action' => 'move_down', $data['PetitCustomFieldConfigMeta']['petit_custom_field_config_id'], $data['PetitCustomFieldConfigMeta']['id']), array('class' => 'btn-down', 'title' => '項目を下へ移動', 'style' => 'display:none')) ?>

			<?php if (count($datas) > 2): ?>
				<?php //最上段へ移動 ?>
				<?php $this->BcBaser->link('<i class="fa fa-arrow-circle-up fa-2x" style="vertical-align: middle;margin-left: 2px;"></i>',
					array('controller' => 'petit_custom_field_config_metas', 'action' => 'move_up', $data['PetitCustomFieldConfigMeta']['petit_custom_field_config_id'], $data['PetitCustomFieldConfigMeta']['id'], 'totop'), array('class' => 'btn-up', 'title' => '項目を最上段へ移動')) ?>
			<?php endif ?>
		<?php endif ?>
	<?php endif ?>
	</td>
<?php endif ?>
	<td class="bca-table-listup__tbody-td">
		<?php echo $data['PetitCustomFieldConfigMeta']['position']; ?>
	</td>
	<td class="bca-table-listup__tbody-td">
		<?php echo $this->BcBaser->link($data['PetitCustomFieldConfigField']['name'],
				array('controller' => 'petit_custom_field_config_fields', 'action' => 'edit',
						$data['PetitCustomFieldConfigMeta']['petit_custom_field_config_id'], $data['PetitCustomFieldConfigMeta']['field_foreign_id']), array('title' => '編集')) ?>
		<br />
		<small><?php echo $data['PetitCustomFieldConfigField']['label_name'] ?></small>
	</td>
	<td class="bca-table-listup__tbody-td">
		<?php echo $data['PetitCustomFieldConfigField']['field_name'] ?>
	</td>
	<td class="bca-table-listup__tbody-td">
		<?php echo $this->PetitCustomField->arrayValue($data['PetitCustomFieldConfigField']['field_type'], $customFieldConfig['field_type'], '<small>未登録</small>'); ?>
		<?php if ($data['PetitCustomFieldConfigField']['field_type'] == 'wysiwyg'): ?>
		<br /><small><?php echo $this->PetitCustomField->arrayValue($data['PetitCustomFieldConfigField']['editor_tool_type'], $customFieldConfig['editor_tool_type'], ''); ?></small>
		<?php endif ?>
	</td>
	<td class="bca-table-listup__tbody-td">
		<?php if ($data['PetitCustomFieldConfigField']['required']): ?><p class="annotation-text"><small>必須入力</small></p><?php endif ?>
		<small><?php echo $this->PetitCustomField->arrayValue($data['PetitCustomFieldConfigField']['auto_convert'], $customFieldConfig['auto_convert'], '未登録'); ?></small>
	</td>
<?php if($customFieldConfig['isNewThemeAdmin']): //新管理画面の操作を後ろに移動 ?>
	<td class="row-tools bca-table-listup__tbody-td bca-table-listup__tbody-td--actions">
	<?php $this->BcBaser->link('', array('action' => 'ajax_unpublish', $data['PetitCustomFieldConfigMeta']['petit_custom_field_config_id'], $data['PetitCustomFieldConfigMeta']['id']), array('title' => '項目を無効化','class' => 'btn-unpublish bca-btn-icon' ,'data-bca-btn-type'=>'unpublish','data-bca-btn-size'=>'lg')) ?>
	<?php $this->BcBaser->link('', array('action' => 'ajax_publish', $data['PetitCustomFieldConfigMeta']['petit_custom_field_config_id'], $data['PetitCustomFieldConfigMeta']['id']), array('title' => '項目を有効化','class' => 'btn-publish bca-btn-icon' ,'data-bca-btn-type'=>'publish','data-bca-btn-size'=>'lg')) ?>
	<?php $this->BcBaser->link('', array('controller' => 'petit_custom_field_config_metas', 'action' => 'edit', $data['PetitCustomFieldConfigMeta']['id']), array('title' => '所属グループ管理','class' => 'btn-setting bca-btn-icon' ,'data-bca-btn-type'=>'setting','data-bca-btn-size'=>'lg')) ?>
	<?php $this->BcBaser->link('', array('controller' => 'petit_custom_field_config_fields', 'action' => 'edit', $data['PetitCustomFieldConfigMeta']['petit_custom_field_config_id'], $data['PetitCustomFieldConfigMeta']['field_foreign_id']), array('title' => '項目を編集','class' => 'btn bca-btn-icon' ,'data-bca-btn-type'=>'edit','data-bca-btn-size'=>'lg')) ?>
	<?php $this->BcBaser->link('', array('action' => 'ajax_delete', $data['PetitCustomFieldConfigMeta']['petit_custom_field_config_id'], $data['PetitCustomFieldConfigMeta']['id']), array('title' => '項目を削除','class' => 'btn-delete bca-btn-icon' ,'data-bca-btn-type'=>'delete','data-bca-btn-size'=>'lg')) ?>

	<?php // 並び替えはconfigIdで絞り込んだ画面で有効化する ?>
	<?php if ($this->request->params['pass']): ?>
		<?php if ($count != 1 || !isset($datas)): ?>
			<?php $this->BcBaser->link('', array('controller' => 'petit_custom_field_config_metas', 'action' => 'move_up', $data['PetitCustomFieldConfigMeta']['petit_custom_field_config_id'], $data['PetitCustomFieldConfigMeta']['id']), array('title' => '項目を上へ移動','class' => 'bca-btn-icon bca-icon--arrow-up' ,'data-bca-btn-size'=>'lg')) ?>
		<?php else: ?>
			<?php if (count($datas) > 2): ?>
				<?php //最下段へ移動 ?>
				<?php $this->BcBaser->link('', array('controller' => 'petit_custom_field_config_metas', 'action' => 'move_down', $data['PetitCustomFieldConfigMeta']['petit_custom_field_config_id'], $data['PetitCustomFieldConfigMeta']['id'], 'tobottom'), array('title' => '項目を最下段へ移動','class' => 'bca-btn-icon fa fa-arrow-circle-down' ,'data-bca-btn-size'=>'lg')) ?>
			<?php endif ?>
		<?php endif ?>
		
		<?php if (!isset($datas) || count($datas) != $count): ?>
			<?php $this->BcBaser->link('', array('controller' => 'petit_custom_field_config_metas', 'action' => 'move_down', $data['PetitCustomFieldConfigMeta']['petit_custom_field_config_id'], $data['PetitCustomFieldConfigMeta']['id']), array('title' => '項目を下へ移動','class' => 'bca-btn-icon bca-icon--arrow-down' ,'data-bca-btn-size'=>'lg')) ?>

		<?php else: ?>
			<?php if (count($datas) > 2): ?>
				<?php //最上段へ移動 ?>
				<?php $this->BcBaser->link('', array('controller' => 'petit_custom_field_config_metas', 'action' => 'move_up', $data['PetitCustomFieldConfigMeta']['petit_custom_field_config_id'], $data['PetitCustomFieldConfigMeta']['id'],'totop'), array('title' => '項目を最上段へ移動','class' => 'bca-btn-icon fa fa-arrow-circle-up' ,'data-bca-btn-size'=>'lg')) ?>
			<?php endif ?>
		<?php endif ?>
	<?php endif ?>
<?php endif ?>

</tr>
