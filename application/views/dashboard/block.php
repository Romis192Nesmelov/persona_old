<?php
if (!isset($permissions)) {
    die('Block internal error');
}
?>
<section>
    <div>
        <div class="wrp">
            <div class="w-1">
                <h2><?= isset($block) ? 'Редактировать блок ' . $block['name'] : 'Добавить SEO блок' ?></h2>
            </div>
            <div class="w-1">
                <?php if ($block) :
                    $block['content']['slug'] = $block['slug'];
                    $this->load->view('widgets/_form', array(
                            'fields' => $fields,
                            'data' => $block['content'],
                            'post' => base_url() . 'dashboard/addBlock',
                            'ajax' => 'updateBlock',
                        )
                    );
                  else : ?>
                      <form autocomplete="off" id="Add" method="post" accept-charset="utf-8" action="<?= base_url() . 'dashboard/addBlock' ?>">
                          <?php
                          if (!empty($salons)) {
                              $this->load->view('widgets/_input-radiobox', array('label' => 'Страница салона', 'name' => 'slug', 'radio_list' => $salons, 'required' => true));
                          }
                          if (!empty($services)) {
                              $this->load->view('widgets/_input-radiobox', array('label' => 'ИЛИ страница услуги', 'name' => 'slug', 'radio_list' => $services, 'required' => true));
                          }
                          if (!empty($styles)) {
                              $this->load->view('widgets/_input-radiobox', array('label' => 'ИЛИ страница подуслуги', 'name' => 'slug', 'radio_list' => $styles, 'required' => true));
                          }
                          ?>
                          <?php foreach ($fields as $field) {
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
                          $this->load->view('widgets/_input-submit', array('value' => isset($data) && array_key_exists('slug', $data) && $data['slug'] ? 'Сохранить' : 'Добавить'));
                          ?>
                      </form>
                <?php endif; ?>
            </div>
        </div>
    </div>
</section>
