<?php
/**
 * [ADMIN] PetitCustomField
 *
 * @link			http://www.materializing.net/
 * @author			arata
 * @package			PetitCustomField
 * @license			MIT
 */
//新テーマの新規追加ボタン
if($customFieldConfig['isNewThemeAdmin']){
	$this->BcAdmin->addAdminMainBodyHeaderLinks([
		'url' => ['action' => 'add'],
		'title' => __d('baser', '新規グループ追加'),
	]);
}
?>
<?php $this->BcBaser->element('pagination') ?>

<table cellpadding="0" cellspacing="0" class="list-table bca-table-listup sort-table" id="ListTable">
	<thead class="bca-table-listup__thead">
		<tr>
			<?php if(!$customFieldConfig['isNewThemeAdmin'])://旧管理画面のコントロール位置?>
			<th class="list-tool bca-table-listup__thead-th">
				<div>
					<?php $this->BcBaser->link($this->BcBaser->getImg('/petit_custom_field/img/admin/btn_add.png', array('alt' => '新規グループ追加', 'class' => 'btn','style' => 'margin-right:5px')). "新規グループ追加", array('action' => 'add'),array('style'=>'text-decoration:underline;')) ?>
				</div>	
			</th>
			<th class="bca-table-listup__thead-th"><?php echo $this->Paginator->sort('id', array(
					'asc' => $this->BcBaser->getImg('admin/blt_list_down.png', array('alt' => '昇順', 'title' => '昇順')).' NO',
					'desc' => $this->BcBaser->getImg('admin/blt_list_up.png', array('alt' => '降順', 'title' => '降順')).' NO'),
					array('escape' => false, 'class' => 'btn-direction')) ?>
			</th>
			<th class="bca-table-listup__thead-th">
				<?php echo $this->Paginator->sort('content_id', array(
					'asc' => $this->BcBaser->getImg('admin/blt_list_down.png', array('alt' => '昇順', 'title' => '昇順')).' コンテンツ名',
					'desc' => $this->BcBaser->getImg('admin/blt_list_up.png', array('alt' => '降順', 'title' => '降順')).' コンテンツ名'),
					array('escape' => false, 'class' => 'btn-direction')) ?>
			</th>
			<th class="bca-table-listup__thead-th">
				フィールド数
			</th>
			<th class="bca-table-listup__thead-th">
				<?php echo $this->Paginator->sort('form_place', array(
					'asc' => $this->BcBaser->getImg('admin/blt_list_down.png', array('alt' => '昇順', 'title' => '昇順')).' 編集画面フォーム表示位置',
					'desc' => $this->BcBaser->getImg('admin/blt_list_up.png', array('alt' => '降順', 'title' => '降順')).' 編集画面フォーム表示位置'),
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
				<?php echo $this->Paginator->sort('id', ['asc' => '<i class="bca-icon--asc"></i>'.' NO', 'desc' => '<i class="bca-icon--desc"></i>'.' NO'], ['escape' => false, 'class' => 'btn-direction bca-table-listup__a']) ?>
			</th>
			<th class="bca-table-listup__thead-th">
				コンテンツ名
			</th>
			<th class="bca-table-listup__thead-th">
				フィールド数
			</th>
			<th class="bca-table-listup__thead-th">
				<?php echo $this->Paginator->sort('form_place', ['asc' => '<i class="bca-icon--asc"></i>'.' 編集画面フォーム表示位置', 'desc' => '<i class="bca-icon--desc"></i>'.' 編集画面フォーム表示位置'], ['escape' => false, 'class' => 'btn-direction bca-table-listup__a']) ?>
			</th>
			<th class="bca-table-listup__thead-th">
				<?php echo $this->Paginator->sort('created', ['asc' => '<i class="bca-icon--asc"></i>'.' 登録日', 'desc' => '<i class="bca-icon--desc"></i>'.' 登録日'], ['escape' => false, 'class' => 'btn-direction bca-table-listup__a']) ?>
				<br />
				<?php echo $this->Paginator->sort('modified', ['asc' => '<i class="bca-icon--asc"></i>'.' 更新日', 'desc' => '<i class="bca-icon--desc"></i>'.' 更新日'], ['escape' => false, 'class' => 'btn-direction bca-table-listup__a']) ?>
			</th>
			<th class="list-tool bca-table-listup__thead-th">
				コントロール
			</th>
		<?php endif ?>
		</tr>
	</thead>
	<tbody class="bca-table-listup__tbody">
<?php if(!empty($datas)): ?>
	<?php foreach($datas as $data): ?>
		<?php $this->BcBaser->element('petit_custom_field_configs/index_row', array('data' => $data)) ?>
	<?php endforeach; ?>
<?php else: ?>
	<tr>
		<td colspan="6" class="bca-table-listup__tbody-td"><p class="no-data">データがありません。</p></td>
	</tr>
<?php endif; ?>
	</tbody>
</table>

<!-- list-num -->
<?php $this->BcBaser->element('list_num') ?>
