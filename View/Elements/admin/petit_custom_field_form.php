<?php
/**
 * [ADMIN] PetitCustomField
 *
 * @link			http://www.materializing.net/
 * @author			arata
 * @package			PetitCustomField
 * @license			MIT
 */
$formPlace = $this->request->data('PetitCustomFieldConfig.form_place');
?>

<?php if ($formPlace === 'normal'): ?></table><?php endif ?>


<?php //アップロード機能を含むオリジナルテンプレートを作る場合必須
	$this->BcBaser->css('/uploader/css/uploader',false);
	$this->BcBaser->css('/petit_custom_field/css/admin/petit_custom_field.css?t='.time(),false);
	$this->BcBaser->js('/js/admin/vendors/jquery.upload-1.0.0.min',false);
	$this->BcBaser->js('/petit_custom_field/js/admin/petit_custom_field.js?t='.time(),false);
?>
<div id="modalView"><div id="modalViewResult"></div></div>
<?php // ここまで ?>

<h3 id="textPetitCustomFieldTable">カスタム項目</h3>
<?php if ($fieldConfigField): ?>
<table cellpadding="0" cellspacing="0" class="form-table bca-form-table section" id="PetitCustomFieldTable">
	<?php foreach ($fieldConfigField as $keyFieldConfig => $valueFieldConfig): ?>

		<?php if ($this->PetitCustomField->judgeStatus($valueFieldConfig)): ?>
			<?php if ($valueFieldConfig['PetitCustomFieldConfigField']['field_type'] == 'wysiwyg'): ?>
				<?php // Wysiwyg の場合 ?>
				<tr>
					<th colspan="2">
						<?php echo $this->BcForm->label("PetitCustomField.{$valueFieldConfig['PetitCustomFieldConfigField']['field_name']}", $valueFieldConfig['PetitCustomFieldConfigField']['name']) ?>
<?php if ($this->PetitCustomField->judgeShowFieldConfig($valueFieldConfig, array('field' => 'required'))): ?>&nbsp;<?php if($customFieldConfig['isNewThemeAdmin']): ?><span class="required bca-label" data-bca-label-type="required">必須</span><?php else: ?><span class="required">*</span><?php endif ?><?php endif ?>
					</th>
				</tr>
				<tr>
					<td class="col-input bca-form-table__input" colspan="2">
						<?php if ($this->PetitCustomField->judgeShowFieldConfig($valueFieldConfig, array('field' => 'prepend'))): ?>
							<?php echo nl2br($valueFieldConfig['PetitCustomFieldConfigField']['prepend']) ?>
						<?php endif ?>
						
						<?php echo $this->PetitCustomField->input("PetitCustomField.{$valueFieldConfig['PetitCustomFieldConfigField']['field_name']}",
							$this->PetitCustomField->getFormOption($valueFieldConfig, 'PetitCustomFieldConfigField')
						) ?>
						
						<?php if ($this->PetitCustomField->judgeShowFieldConfig($valueFieldConfig, array('field' => 'append'))): ?>
							<?php echo nl2br($valueFieldConfig['PetitCustomFieldConfigField']['append']) ?>
						<?php endif ?>
						
						<?php echo $this->BcForm->error("PetitCustomField.{$valueFieldConfig['PetitCustomFieldConfigField']['field_name']}") ?>
						<?php if ($this->PetitCustomField->judgeShowFieldConfig($valueFieldConfig, array('field' => 'description'))): ?>
							<br /><small><?php echo nl2br($valueFieldConfig['PetitCustomFieldConfigField']['description']) ?></small>
						<?php endif ?>
					</td>
				</tr>
			<?php elseif ($valueFieldConfig['PetitCustomFieldConfigField']['field_type'] == 'upload'): ?>
				<?php // アップロードの場合 ?>
				<tr>
					<th class="col-head bca-form-table__label">
						<?php echo $this->BcForm->label("PetitCustomField.{$valueFieldConfig['PetitCustomFieldConfigField']['field_name']}", $valueFieldConfig['PetitCustomFieldConfigField']['name']) ?>
						<?php if ($this->PetitCustomField->judgeShowFieldConfig($valueFieldConfig, array('field' => 'required'))): ?>&nbsp;<?php if($customFieldConfig['isNewThemeAdmin']): ?><span class="required bca-label" data-bca-label-type="required">必須</span><?php else: ?><span class="required">*</span><?php endif ?><?php endif ?>
					</th>
					<td class="col-input bca-form-table__input">
						<?php if ($this->PetitCustomField->judgeShowFieldConfig($valueFieldConfig, array('field' => 'prepend'))): ?>
							<?php echo '<div class="upload-before">'. nl2br($valueFieldConfig['PetitCustomFieldConfigField']['prepend']).'</div>' ?>
						<?php endif ?>
						
		<span class="upload-file">
			<?php echo $this->PetitCustomField->input("PetitCustomField.{$valueFieldConfig['PetitCustomFieldConfigField']['field_name']}",
							$this->PetitCustomField->getFormOption($valueFieldConfig, 'PetitCustomFieldConfigField'))?>
            <input type="button" value="ファイルを選択" class="upload-file-open">
            <span class="upload-file-delete"<?php if(empty($this->request->data['PetitCustomField'][$valueFieldConfig['PetitCustomFieldConfigField']['field_name']])):?> style="display:none"<?php endif;?>>× このファイルを使用しない</span>
            <div class="upload-select-file"></div>
		</span>


						<?php if ($this->PetitCustomField->judgeShowFieldConfig($valueFieldConfig, array('field' => 'append'))): ?>
							<?php echo '<div class="upload-after">' . nl2br($valueFieldConfig['PetitCustomFieldConfigField']['append']).'</div>' ?>
						<?php endif ?>
						
						<?php echo $this->BcForm->error("PetitCustomField.{$valueFieldConfig['PetitCustomFieldConfigField']['field_name']}") ?>
						<?php if ($this->PetitCustomField->judgeShowFieldConfig($valueFieldConfig, array('field' => 'description'))): ?>
							<small><?php echo nl2br($valueFieldConfig['PetitCustomFieldConfigField']['description']) ?></small>
						<?php endif ?>
					</td>
				</tr>
			<?php else: ?>
				<?php // デフォルトのフィールド ?>
				<tr>
					<th class="col-head bca-form-table__label">
						<?php echo $this->BcForm->label("PetitCustomField.{$valueFieldConfig['PetitCustomFieldConfigField']['field_name']}", $valueFieldConfig['PetitCustomFieldConfigField']['name']) ?>
						<?php if ($this->PetitCustomField->judgeShowFieldConfig($valueFieldConfig, array('field' => 'required'))): ?>&nbsp;<?php if($customFieldConfig['isNewThemeAdmin']): ?><span class="required bca-label" data-bca-label-type="required">必須</span><?php else: ?><span class="required">*</span><?php endif ?><?php endif ?>
					</th>
					<td class="col-input bca-form-table__input">
						<?php if ($this->PetitCustomField->judgeShowFieldConfig($valueFieldConfig, array('field' => 'prepend'))): ?>
							<?php echo nl2br($valueFieldConfig['PetitCustomFieldConfigField']['prepend']) ?>
						<?php endif ?>
						
						<?php echo $this->PetitCustomField->input("PetitCustomField.{$valueFieldConfig['PetitCustomFieldConfigField']['field_name']}",
							$this->PetitCustomField->getFormOption($valueFieldConfig, 'PetitCustomFieldConfigField')
						) ?>

						<?php if ($this->PetitCustomField->judgeShowFieldConfig($valueFieldConfig, array('field' => 'append'))): ?>
							<?php echo nl2br($valueFieldConfig['PetitCustomFieldConfigField']['append']) ?>
						<?php endif ?>
						
						<?php echo $this->BcForm->error("PetitCustomField.{$valueFieldConfig['PetitCustomFieldConfigField']['field_name']}") ?>
						<?php if ($this->PetitCustomField->judgeShowFieldConfig($valueFieldConfig, array('field' => 'description'))): ?>
							<br /><small><?php echo nl2br($valueFieldConfig['PetitCustomFieldConfigField']['description']) ?></small>
						<?php endif ?>
					</td>
				</tr>
			<?php endif ?>
		<?php endif ?>
	
	<?php endforeach ?>
<?php if ($formPlace === 'top'): ?></table><?php endif ?>
<?php else: ?>
<ul>
	<li>利用可能なフィールドがありません。不要な場合は
		<?php $this->BcBaser->link('カスタムフィールド設定',
			array('plugin' => 'petit_custom_field', 'controller' => 'petit_custom_field_configs', 'action'=>'edit', $this->request->data['PetitCustomFieldConfig']['id']),
			array(),
			'カスタムフィールド設定画面へ移動して良いですか？編集中の内容は保存されません。',
			false); ?>
		より無効設定ができます。		
	</li>
</ul>
<?php endif ?>
