<?php
/**
 * [ADMIN] PetitBlogCustomField
 *
 * @link			http://www.materializing.net/
 * @author			arata
 * @package			PetitBlogCustomField
 * @license			MIT
 */
if($customFieldConfig['isNewThemeAdmin']){
	$this->BcAdmin->addAdminMainBodyHeaderLinks([
		'url' => ['controller' => 'petit_custom_field_configs','action' => 'index'],
		'title' => '一覧に戻る',
	]);
}

$hasAddableBlog = false;
if (count($blogContentDatas) > 0) {
	$hasAddableBlog = true;
}
?>
<script type="text/javascript">
	$(window).load(function() {
		$("#PetitCustomFieldConfigFormPlace").focus();
	});
</script>

<?php if($this->request->action == 'admin_add'): ?>
	<?php echo $this->BcForm->create('PetitCustomFieldConfig', array('url' => array('action' => 'add'))) ?>
	<?php echo $this->BcForm->input('PetitCustomFieldConfig.model', array('type' => 'hidden')) ?>
<?php else: ?>
	<?php echo $this->BcForm->create('PetitCustomFieldConfig', array('url' => array('action' => 'edit'))) ?>
	<?php echo $this->BcForm->input('PetitCustomFieldConfig.id', array('type' => 'hidden')) ?>
	<?php echo $this->BcForm->input('PetitCustomFieldConfig.model', array('type' => 'hidden')) ?>
<?php endif ?>

<?php if($this->request->params['action'] != 'admin_add'): ?>
<p>
<?php $this->BcBaser->link('[' . trim($blogContentDatas[$this->request->data['PetitCustomFieldConfig']['content_id']]) .'] ブログ設定', [
	'admin' => true, 'plugin' => 'blog', 'controller' => 'blog_contents',
	'action' => 'edit', $this->request->data['PetitCustomFieldConfig']['content_id']
], ['class' => 'weight-bold size-medium bca-btn-icon-text', 'data-bca-btn-type'=>'edit']) ?>
&nbsp;&nbsp;&nbsp;&nbsp;
<?php $this->BcBaser->link('[' . trim($blogContentDatas[$this->request->data['PetitCustomFieldConfig']['content_id']]) .'] 記事一覧', [
	'admin' => true, 'plugin' => 'blog', 'controller' => 'blog_posts',
	'action' => 'index', $this->request->data['PetitCustomFieldConfig']['content_id']
], ['class' => 'weight-bold size-medium bca-btn-icon-text', 'data-bca-btn-type'=>'th-list']) ?>
</p>
<?php endif ?>

<div id="PetitCustomFieldConfigTable">

<table cellpadding="0" cellspacing="0" class="form-table bca-form-table section">
	<?php if($this->request->params['action'] != 'admin_add'): ?>
	<tr>
		<th class="col-head bca-form-table__label"><?php echo $this->BcForm->label('PetitCustomFieldConfig.id', 'NO') ?></th>
		<td class="col-input bca-form-table__input">
			<?php echo $this->BcForm->value('PetitCustomFieldConfig.id') ?>
		</td>
	</tr>
	<?php endif ?>

	<?php if ($hasAddableBlog): ?>
		<?php if($this->request->params['action'] == 'admin_add'): ?>
		<tr>
			<th class="col-head bca-form-table__label"><?php echo $this->BcForm->label('PetitCustomFieldConfig.content_id', 'ブログ') ?></th>
			<td class="col-input bca-form-table__input">
				<?php echo $this->BcForm->input('PetitCustomFieldConfig.content_id', array('type' => 'select', 'options' => $blogContentDatas)) ?>
				<?php echo $this->BcForm->error('PetitCustomFieldConfig.content_id') ?>
			</td>
		</tr>
		<?php endif ?>

		<tr>
			<th class="col-head bca-form-table__label">
				<?php echo $this->BcForm->label('PetitCustomFieldConfig.status', 'カスタムフィールドの利用') ?>
			</th>
			<td class="col-input bca-form-table__input">
				<?php echo $this->BcForm->input('PetitCustomFieldConfig.status', array('type' => 'radio', 'options' => $this->BcText->booleanDoList('利用'))) ?>
				<?php echo $this->BcForm->error('PetitCustomFieldConfig.status') ?>
				<?php if($customFieldConfig['isNewThemeAdmin']): ?><i class="bca-icon--question-circle btn help bca-help"></i><?php else: ?><?php echo $this->BcBaser->img('admin/icn_help.png', array('class' => 'btn help', 'alt' => 'ヘルプ')) ?><?php endif ?>
				<div id="helptextPetitCustomFieldConfigStatus" class="helptext">
					<ul>
						<li>ブログ記事でのプチ・カスタムフィールドの利用の有無を指定します。</li>
					</ul>
				</div>
			</td>
		</tr>
		<tr>
			<th class="col-head bca-form-table__label">
				<?php echo $this->BcForm->label('PetitCustomFieldConfig.form_place', 'カスタムフィールドの表示位置指定') ?>
			</th>
			<td class="col-input bca-form-table__input">
				<?php echo $this->BcForm->input('PetitCustomFieldConfig.form_place', array('type' => 'select', 'options' => $customFieldConfig['form_place'])) ?>
				<?php echo $this->BcForm->error('PetitCustomFieldConfig.form_place') ?>
			</td>
		</tr>
	<?php else: ?>
	<tr>
		<th class="col-head bca-form-table__label"><?php echo $this->BcForm->label('PetitCustomFieldConfig.content_id', 'ブログ') ?></th>
		<td class="col-input bca-form-table__input">
			追加設定可能なブログがありません。
		</td>
	</tr>
	<?php endif ?>
</table>
</div>

<?php if ($hasAddableBlog): ?>
<div class="submit bca-actions">
	<span class="bca-actions__main">
	<?php if($customFieldConfig['isNewThemeAdmin']):
		$this->BcBaser->link('一覧に戻る',['controller' => 'petit_custom_field_configs','action' => 'index'],
		['class' => 'btn-gray button bca-btn bca-actions__item', 'data-bca-btn-size' => 'sm', 'data-bca-btn-type' => 'back-to-list'],false);
	endif; ?>
	<?php echo $this->BcForm->submit('保　存', array('div' => false, 'class' => 'button btn-red bca-btn bca-actions__item', 'id' => 'BtnSave' ,'data-bca-btn-type' => 'save', 'data-bca-btn-size'=>'lg','data-bca-btn-width'=>'lg')) ?>
	</span>
</div>
<?php endif ?>
<?php echo $this->BcForm->end() ?>
