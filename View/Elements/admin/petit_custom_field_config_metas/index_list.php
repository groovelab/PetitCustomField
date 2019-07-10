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
		'url' => ['controller' => 'petit_custom_field_configs','action' => 'index'],
		'title' => 'グループに戻る',
	]);
	$this->BcAdmin->addAdminMainBodyHeaderLinks([
		'url' => ['controller' => 'petit_custom_field_config_fields', 'action' => 'add', $configId],
		'title' => '新規項目追加',
	]);
}else{
	$this->BcBaser->css('//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css');
}
$this->BcBaser->css('/petit_custom_field/css/admin/petit_custom_field.css?t='.time(),false);
?>
<?php $this->BcBaser->element('pagination') ?>

<p>
<?php $this->BcBaser->link('[' . trim($this->BcText->arrayValue($contentId, $blogContentDatas)) .'] ブログ設定', [
	'admin' => true, 'plugin' => 'blog', 'controller' => 'blog_contents',
	'action' => 'edit', $contentId,
], ['class' => 'weight-bold size-medium bca-btn-icon-text', 'data-bca-btn-type'=>'edit']) ?>
&nbsp;&nbsp;&nbsp;&nbsp;
<?php $this->BcBaser->link('[' . trim($this->BcText->arrayValue($contentId, $blogContentDatas)) .'] 記事一覧', [
	'admin' => true, 'plugin' => 'blog', 'controller' => 'blog_posts',
	'action' => 'index', $contentId
], ['class' => 'weight-bold size-medium bca-btn-icon-text', 'data-bca-btn-type'=>'th-list']) ?>
</p>

<table cellpadding="0" cellspacing="0" class="list-table bca-table-listup sort-table" id="ListTable">
	<thead class="bca-table-listup__thead ">
		<tr>
		<?php if(!$customFieldConfig['isNewThemeAdmin']):?>
			<th class="list-tool bca-table-listup__thead-th">
				<div>
					<?php $this->BcBaser->link($this->BcBaser->getImg('/petit_custom_field/img/admin/btn_add.png', array('alt' => '新規項目追加', 'class' => 'btn','style' => 'margin-right:5px'))."新規項目追加",
							array('controller' => 'petit_custom_field_config_fields', 'action' => 'add', $configId),
							array('style' => 'text-decoration:underline;')) ?>
				</div>
			</th>
			<th class="bca-table-listup__thead-th"><?php echo $this->Paginator->sort('position', array(
					'asc' => $this->BcBaser->getImg('admin/blt_list_down.png', array('alt' => '昇順', 'title' => '昇順')).' 並び順',
					'desc' => $this->BcBaser->getImg('admin/blt_list_up.png', array('alt' => '降順', 'title' => '降順')).' 並び順'),
					array('escape' => false, 'class' => 'btn-direction')) ?>
			</th>
			<th class="bca-table-listup__thead-th">
				カスタムフィールド名<br /><small>ラベル名</small>
			</th>
			<th class="bca-table-listup__thead-th">
				フィールド名
			</th>
			<th class="bca-table-listup__thead-th">
				フィールドタイプ
			</th>
			<th class="bca-table-listup__thead-th">
				必須設定<br /><small>変換処理</small>
			</th>
		<?php else: ?>
			<th class="bca-table-listup__thead-th">
				<?php echo $this->Paginator->sort('position', ['asc' => '<i class="bca-icon--asc"></i>'.' 並び順', 'desc' => '<i class="bca-icon--desc"></i>'.' 並び順'], ['escape' => false, 'class' => 'btn-direction bca-table-listup__a']) ?>
			</th>
			<th class="bca-table-listup__thead-th">
				カスタムフィールド名<br /><small>ラベル名</small>
			</th>
			<th class="bca-table-listup__thead-th">
				フィールド名
			</th>
			<th class="bca-table-listup__thead-th">
				フィールドタイプ
			</th>
			<th class="bca-table-listup__thead-th">
				必須設定<br /><small>変換処理</small>
			</th>
			<th class="list-tool bca-table-listup__thead-th">
				アクション
			</th>
		<?php endif ?>
		</tr>
	</thead>
	<tbody>
<?php if(!empty($datas)): ?>
	<?php foreach ($datas as $key => $data): ?>
		<?php $this->BcBaser->element('petit_custom_field_config_metas/index_row', array('data' => $data, 'count' => ($key + 1))) ?>
	<?php endforeach; ?>
<?php else: ?>
	<tr>
		<td colspan="6" class="bca-table-listup__tbody-td"><p class="no-data">データがありません。</p></td>
	</tr>
<?php endif; ?>
	</tbody>
</table>

<!-- list-num -->
<?php //$this->BcBaser->element('list_num') ?>
