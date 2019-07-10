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
<?php echo $this->BcForm->create('PetitCustomFieldConfig', array('url' => array('action' => 'index'))) ?>
<p class="bca-search__input-list">
	<span class="bca-search__input-item">
		<?php echo $this->BcForm->label('PetitCustomFieldConfig.content_id', 'ブログ') ?>
		&nbsp;<?php echo $this->BcForm->input('PetitCustomFieldConfig.content_id', array('type' => 'select', 'options' => $blogContentDatas)) ?>
	</span>
	<span class="bca-search__input-item">
		<?php echo $this->BcForm->label('PetitCustomFieldConfig.status', '利用状態') ?>
		&nbsp;<?php echo $this->BcForm->input('PetitCustomFieldConfig.status', array('type' => 'select', 'options' => $this->BcText->booleanMarkList(), 'empty' => '指定なし')) ?>
	</span>
</p>
<?php if(!$customFieldConfig['isNewThemeAdmin']):?>
<div class="button">
	<?php echo $this->BcForm->submit('admin/btn_search.png', array('alt' => '検索', 'class' => 'btn'), array('div' => false, 'id' => 'BtnSearchSubmit')) ?>
</div>
<?php else:?>
<div class="button bca-search__btns">
	<div class="bca-search__btns-item"><a href="javascript:void(0)" id="BtnSearchSubmit" class="bca-btn bca-btn-lg" data-bca-btn-size="lg">検索</a></div>
</div>
<?php endif;?>
<?php echo $this->BcForm->end() ?>
