<?php
	class Mens_Model extends CI_Model
	{
		

		public function get_products($id)
		{
			
			$this->db->where('cat_id', $id);
			$query = $this->db->get('products');
			return $query->result_array();
		}

	}