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
<?php $this->BcBaser->element('pagination') ?>

<table cellpadding="0" cellspacing="0" class="list-table bca-table-listup sort-table" id="ListTable">
	<thead class="bca-table-listup__thead ">
		<tr>
		<?php if(!$customFieldConfig['isNewThemeAdmin']):?>
			<th class="bca-table-listup__thead-th" style="width: 50px;">アクション</th>
			<th class="bca-table-listup__thead-th"><?php echo $this->Paginator->sort('id', array(
					'asc' => $this->BcBaser->getImg('admin/blt_list_down.png', array('alt' => '昇順', 'title' => '昇順')).' NO',
					'desc' => $this->BcBaser->getImg('admin/blt_list_up.png', array('alt' => '降順', 'title' => '降順')).' NO'),
					array('escape' => false, 'class' => 'btn-direction')) ?>
			</th>
			<th class="bca-table-listup__thead-th">
				<?php echo $this->Paginator->sort('key', array(
					'asc' => $this->BcBaser->getImg('admin/blt_list_down.png', array('alt' => '昇順', 'title' => '昇順')).' 登録キー名',
					'desc' => $this->BcBaser->getImg('admin/blt_list_up.png', array('alt' => '降順', 'title' => '降順')).' 登録キー名'),
					array('escape' => false, 'class' => 'btn-direction')) ?>
			</th>
			<th class="bca-table-listup__thead-th"><?php echo $this->Paginator->sort('created', array(
					'asc' => $this->BcBaser->getImg('admin/blt_list_down.png', array('alt' => '昇順', 'title' => '昇順')).' 登録日',
					'desc' => $this->BcBaser->getImg('admin/blt_list_up.png', array('alt' => '降順', 'title' => '降順')).' 登録日'),
					array('escape' => false, 'class' => 'btn-direction')) ?>
				<br />
				<?php echo $this->Paginator->sort('modified', array(
					'asc' => $this->BcBaser->getImg('admin/blt_list_down.png', array('alt' => '昇順', 'title' => '昇順')).' 更新日',
					'desc' => $this->BcBaser->getImg('admin/blt_list_up.png', array('alt' => '降順', 'title' => '降順')).' 更新日'),
					array('escape' => false, 'class' => 'btn-direction')) ?>
			</th>
		<?php else: ?>
			<th class="bca-table-listup__thead-th">
				<?php echo $this->Paginator->sort('id', ['asc' => '<i class="bca-icon--asc"></i>'.'  NO', 'desc' => '<i class="bca-icon--desc"></i>'.'  NO'], ['escape' => false, 'class' => 'btn-direction bca-table-listup__a']) ?>
			</th>
			<th class="bca-table-listup__thead-th">
				<?php echo $this->Paginator->sort('key', ['asc' => '<i class="bca-icon--asc"></i>'.' 登録キー名', 'desc' => '<i class="bca-icon--desc"></i>'.' 登録キー名'], ['escape' => false, 'class' => 'btn-direction bca-table-listup__a']) ?>
			</th>
			<th class="bca-table-listup__thead-th">
				<?php echo $this->Paginator->sort('created', ['asc' => '<i class="bca-icon--asc"></i>'.' 登録日', 'desc' => '<i class="bca-icon--desc"></i>'.' 登録日'], ['escape' => false, 'class' => 'btn-direction bca-table-listup__a']) ?>
				<br />
				<?php echo $this->Paginator->sort('modified', ['asc' => '<i class="bca-icon--asc"></i>'.' 更新日', 'desc' => '<i class="bca-icon--desc"></i>'.' 更新日'], ['escape' => false, 'class' => 'btn-direction bca-table-listup__a']) ?>
			</th>
			<th class="bca-table-listup__thead-th" style="width: 50px;">アクション</th>
		<?php endif ?>
		</tr>
	</thead>
	<tbody class="bca-table-listup__tbody">
<?php if(!empty($datas)): ?>
	<?php foreach($datas as $data): ?>
		<?php $this->BcBaser->element('petit_custom_field_config_fields/index_row', array('data' => $data)) ?>
	<?php endforeach; ?>
<?php else: ?>
	<tr>
		<td colspan="4" class="bca-table-listup__tbody-td"><p class="no-data">データがありません。</p></td>
	</tr>
<?php endif; ?>
	</tbody>
</table>

<!-- list-num -->
<?php $this->BcBaser->element('list_num') ?>
