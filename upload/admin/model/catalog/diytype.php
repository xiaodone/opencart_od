<?php
class ModelCatalogDiytype extends Model {
	public function addAttribute($data) {
		$this->db->query("INSERT INTO " . DB_PREFIX . "product_diytype SET sort_order = '" . (int)$data['sort_order'] . "', title = '".$this->db->escape($data['title'])."', thumb = '".$this->db->escape($data['thumb'])."', text = '".$this->db->escape($data['text'])."', entext = '".$this->db->escape($data['entext'])."', entitle = '".$this->db->escape($data['entitle'])."'");

		$attribute_id = $this->db->getLastId();

		return $attribute_id;
	}

	public function editAttribute($attribute_id, $data) {
		$this->db->query("UPDATE " . DB_PREFIX . "product_diytype SET sort_order = '" . (int)$data['sort_order'] . "', title = '".$this->db->escape($data['title'])."', thumb = '".$this->db->escape($data['thumb'])."', entext = '".$this->db->escape($data['entext'])."', entitle = '".$this->db->escape($data['entitle'])."', text = '".$this->db->escape($data['text'])."' where id = " .(int)$attribute_id);
	}

	public function deleteAttribute($attribute_id) {
		$this->db->query("DELETE FROM " . DB_PREFIX . "product_diytype WHERE id = '" . (int)$attribute_id . "'");
	}

	public function getAttribute($attribute_id) {
		$query = $this->db->query("SELECT * FROM " . DB_PREFIX . "product_diytype  id = ".(int)$attribute_id);

		return $query->row;
	}

	public function getAttributes($data = array()) {
		$sql = "SELECT * FROM " . DB_PREFIX . "product_diytype";

		if (!empty($data['filter_name'])) {
			$sql .= " AND title LIKE '" . $this->db->escape($data['filter_name']) . "%'";
		}

		$sql .= " ORDER BY id desc";


		$query = $this->db->query($sql);

		return $query->rows;
	}


	public function getTotalAttributes() {
		$query = $this->db->query("SELECT COUNT(*) AS total FROM " . DB_PREFIX . "product_diytype");

		return $query->row['total'];
	}

}
