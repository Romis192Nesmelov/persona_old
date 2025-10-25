<?php if (isset($permissions)) : ?>

    <section id="Selector">
        <div>
            <!-- vacancies -->
            <div class="wrp bot-mrgn-sml">
                <div class="w-1 row jsfd cntr-itms">
                    <h2>Вакансии</h2>
                </div>
            </div>
            <div class="grd">
                <?php $this->load->view('widgets/_btn-add', array('enabled' => $permissions['vacancies_add'], 'type' => 'vacancies/vacancy')); ?>
                <?php foreach ($vacancies as $vacancy) {
                    $this->load->view('widgets/_selector-item', array(
                        'slug' => $vacancy['id'],
                        'name' => $vacancy['h1'],
                        'type' => 'vacancies/vacancy',
                        'custom_img_path' => 'vacancies/' . $vacancy['id'] . '/',
                        'custom_img_name' => 'poster.jpg'
                    ));
                }
                ?>
            </div>
            <!-- articles -->
            <div class="wrp bot-mrgn-sml">
                <div class="w-1 row jsfd cntr-itms">
                    <h2>Статьи</h2>
                </div>
            </div>
            <div class="grd">
                <?php $this->load->view('widgets/_btn-add', array('enabled' => $permissions['vacancies_add'], 'type' => 'vacancies/article')); ?>
                <?php foreach ($articles as $article) {
                    $this->load->view('widgets/_selector-item', array(
                        'slug' => $article['id'],
                        'name' => $article['h1'],
                        'type' => 'vacancies/article',
                        'custom_img_path' => 'vacancies_articles/' . $article['id'] . '/',
                        'custom_img_name' => 'poster.jpg'
                    ));
                }
                ?>
            </div>
        </div>
    </section>

<?php endif; ?>
