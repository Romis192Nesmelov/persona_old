<?php if (isset($permissions)) : ?>
    <section id="Selector">
        <div>
            <div class="wrp bot-mrgn-sml">
                <div class="w-1 row jsfd cntr-itms">
                    <h2>Статьи</h2>
                </div>
            </div>
            <div class="grd">
                <?php $this->load->view('widgets/_btn-add', array('enabled' => $permissions['articles_add'], 'type' => 'article')); ?>
                <?php foreach ($articles as $article) {
                    $this->load->view('widgets/_selector-item', array(
                        'slug' => $article['id'],
                        'name' => $article['h1'],
                        'type' => 'article',
                        'custom_img_path' => 'articles/' . $article['id'] . '/',
                        'custom_img_name' => 'poster.jpg'
                    ));
                }
                ?>
            </div>
        </div>
    </section>
<?php endif; ?>