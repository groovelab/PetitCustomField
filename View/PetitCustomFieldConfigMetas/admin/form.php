<?php
/**
 * [ADMIN] PetitCustomField
 *
 * @link			http://www.materializing.net/
 * @author			arata
 * @package			PetitCustomField
 * @license			MIT
 */
$currentModelName = $this->request->params['models']['PetitCustomFieldConfigMeta']['className'];
if($customFieldConfig['isNewThemeAdmin']){
	$this->BcAdmin->addAdminMainBodyHeaderLinks([
		'url' => ['controller' => 'petit_custom_field_config_metas','action' => 'index',$configId],
		'title' => '一覧に戻る',
	]);
}
?>
<script type="text/javascript">
	$(window).load(function() {
		$("#PetitCustomFieldConfigContentId").focus();
	});
/**
 * コンテンツを切替えたときに、更新ボタンを有効化する
 */
$(function(){
	var beforeContentId = $("#BeforePetitCustomFieldConfigContentId").html();
	$('#BtnSave').attr('disabled', true);
	
	$("#PetitCustomFieldConfigContentId").change(function(){
		if (beforeContentId !== $("#PetitCustomFieldConfigContentId").val()) {
			$('#BtnSave').attr('disabled', false);
		} else {
			$('#BtnSave').attr('disabled', true);
		}
	});
});
</script>

<?php echo $this->BcForm->create($currentModelName, array('url' => array('action' => 'edit'))) ?>
<?php echo $this->BcForm->input("{$currentModelName}.id", array('type' => 'hidden')) ?>

<div id="BeforePetitCustomFieldConfigContentId" style="display: none;"><?php echo $this->BcForm->value('PetitCustomFieldConfig.content_id') ?></div>
<table cellpadding="0" cellspacing="0" class="form-table bca-form-table bca-table-listup section">
	<tr>
		<th class="col-head bca-form-table__label"><?php echo $this->BcForm->label($currentModelName .'.id', 'NO') ?></th>
		<td class="col-input bca-form-table__input">
			<?php echo $this->BcForm->value($currentModelName .'.id') ?>
		</td>
	</tr>
	<tr>
		<th class="col-head bca-form-table__label">
			カスタムフィールド名
		</th>
		<td class="col-input bca-form-table__input">
			<?php echo $this->request->data['PetitCustomFieldConfigField']['name'] . " [ ". $this->request->data['PetitCustomFieldConfigField']['field_name'] . ' ]'; ?>
		</td>
	</tr>
	<tr>
		<th class="col-head bca-form-table__label">
			<?php echo $this->BcForm->label('PetitCustomFieldConfig.content_id', '表示するブログ') ?>
		</th>
		<td class="col-input bca-form-table__input">
			<?php echo $this->BcForm->input('PetitCustomFieldConfig.content_id', array('type' => 'select', 'options' => $blogContentDatas)) ?>
		</td>
	</tr>
</table>

<div class="submit bca-actions">
<?php if($this->request->action == 'admin_add'): ?>
	<span class="bca-actions__main">
	<?php if($customFieldConfig['isNewThemeAdmin']):
		$this->BcBaser->link('一覧に戻る',['controller' => 'petit_custom_field_config_metas','action' => 'index',$configId],
		['class' => 'btn-gray button bca-btn bca-actions__item', 'data-bca-btn-size' => 'sm', 'data-bca-btn-type' => 'back-to-list'],false);
	endif; ?>
	<?php echo $this->BcForm->submit('登　録', array('div' => false, 'class' => 'button btn-red bca-btn bca-actions__item', 'id' => 'BtnSave', 'data-bca-btn-type' => 'save', 'data-bca-btn-size'=>'lg','data-bca-btn-width'=>'lg')) ?>
	</span>
<?php else: ?>
	<span class="bca-actions__main">
	<?php if($customFieldConfig['isNewThemeAdmin']):
		$this->BcBaser->link('一覧に戻る',['controller' => 'petit_custom_field_config_metas','action' => 'index',$configId],
		['class' => 'btn-gray button bca-btn bca-actions__item', 'data-bca-btn-size' => 'sm', 'data-bca-btn-type' => 'back-to-list'],false);
	endif; ?>
	<?php echo $this->BcForm->submit('更　新', array('div' => false, 'class' => 'button btn-red bca-btn bca-actions__item', 'id' => 'BtnSave', 'data-bca-btn-type' => 'save', 'data-bca-btn-size'=>'lg','data-bca-btn-width'=>'lg')) ?>
	</span>
	<span class="bca-actions__sub">
	<?php $this->BcBaser->link('削　除',
		array('action' => 'delete', $this->BcForm->value("{$currentModelName}.id")),
		array('class' => 'btn-gray button bca-btn', 'data-bca-btn-size' => 'sm', 'data-bca-btn-color' => 'danger', 'data-bca-btn-type' => 'delete'),
		sprintf('ID：%s のデータを削除して良いですか？', $this->BcForm->value("{$currentModelName}.id")),
		false); ?>
	</span>
<?php endif ?>
</div>
<?php echo $this->BcForm->end() ?>
