<?php
if (!isset($data) || !isset($fields)) {
    die('Form internal error');
}
?>
<form autocomplete="off"
    <?php echo array_key_exists('slug', $data) ? 'id="Update" data-request="' . $ajax . '"' : 'id="Add" method="post" accept-charset="utf-8" action="' . $post . '"'; ?>>
    <?php
    foreach ($fields as $field) {
        $field['data'] = $data;
        if (!array_key_exists('value', $field)) {
            $field['value'] = array_key_exists($field['name'], $data) ? $data[$field['name']] : '';
        }
        if (array_key_exists('slug', $data) && $data['slug'] == 'default') {
            $field['required'] = false;
        }
        if ($field['name'] == 'status' && array_key_exists('slug', $data) && $data['slug'] == 'default') {
            //DO nothing, we cant edit default visibility
        } else {
            $this->load->view('widgets/_input-' . $field['type'], $field);
        }
    }
    if (!empty($data['radio_list']) && !empty($data['radio_label']) ) {
        $this->load->view('widgets/_input-radiobox', array('value' => empty($data['radio_value']) ? '' : $data['radio_value'], 'label' => $data['radio_label'], 'name' => $data['radio_name'], 'radio_list' =>  $data['radio_list']));
    }
    //TODO: fix this shit
    if (!empty($data['radio_list1']) && !empty($data['radio_label1']) ) {
        $this->load->view('widgets/_input-radiobox', array('value' => empty($data['radio_value1']) ? '' : $data['radio_value1'], 'label' => $data['radio_label1'], 'name' => $data['radio_name1'], 'radio_list' =>  $data['radio_list1']));
    }
    $this->load->view('widgets/_input-submit', array('value' => isset($data) && array_key_exists('slug', $data) && $data['slug'] ? 'Сохранить' : 'Добавить'));
    ?>
</form>
