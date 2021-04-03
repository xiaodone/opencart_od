<?php
class ModelToolDiyUpload extends Model {

	public function getList() {
		$query = $this->db->query("SELECT * FROM `" . DB_PREFIX . "diy_upload` limit 1000 ");

		return $query->rows;
	}
}
