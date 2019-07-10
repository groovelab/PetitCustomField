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
<?php echo $this->BcForm->create('PetitCustomFieldConfig', array('action' => 'first')) ?>
<?php echo $this->BcForm->input('PetitCustomFieldConfig.active', array('type' => 'hidden', 'value' => '1')) ?>
<table cellpadding="0" cellspacing="0" class="form-table bca-form-table section" id="ListTable">
	<tr>
		<th class="col-head bca-form-table__label">
			はじめに<br />お読み下さい。
		</th>
		<td class="col-input bca-form-table__input">
			<strong>プチ・カスタムフィールド項目作成では、各ブログ用のプチ・カスタムフィールド項目を作成します。</strong>
			<ul>
				<li>プチ・カスタムフィールド項目がないブログ用のデータのみ作成します。</li>
			</ul>
		</td>
	</tr>
</table>

<div class="submit bca-actions">
	<?php echo $this->BcForm->submit('作成する', array(
		'div' => false,
		'class' => 'btn-red button bca-btn',
		'data-bca-btn-type' => 'save',
		'data-bca-btn-width'=>'lg',
		'id' => 'BtnSubmit',
		'onClick'=>"return confirm('プチ・カスタムフィールド項目の作成を行いますが良いですか？')")) ?>
</div>
<?php echo $this->BcForm->end() ?>
