<?php
class ModelCatalogDiytype extends Model {

	public function getList($product_id){
		$sql = "SELECT * FROM " . DB_PREFIX . "product_diytype_relations as r left join " . DB_PREFIX . "product_diytype as d on d.id = r.type_id where product_id = " . (int)$product_id . ' ';
		$sql .= " ORDER BY r.id desc";
		$query = $this->db->query($sql);

		return $query->rows;
	}



}
