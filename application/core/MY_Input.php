<?php 

class MY_Input extends CI_Input {

	public function map($fields, &$data, $post = null) {
		log_message('debug', __METHOD__.'/'.__LINE__);

		if (!is_array($fields)) {
			$fields = explode(',', $fields);
		}

		foreach ($fields as $field) {
			$post_field = $from_field = $field;

			if (strpos($field, ' as ') !== FALSE) {
				list($post_field, $from_field) = explode(' as ', $field, 2);
			}

			$data[$from_field] = ($post) ? $post[$post_field] : $this->post($post_field);
		}

		return $this; /* allow chaining */
	}

} /* end class */