<?php
?>
<section id="MainScreen" >
    <div>
        <div class="wrp cntr-txt cntr">
            <div class="w-5-12 mobile">
                <img style="margin-left: 20px; margin-right: 20px;" src="<?= base_url(); ?>media/general/default/logo-w.svg" alt="ПЕРСОНА">
            </div>
            <div class="w-1">
                <h5 class="bg-gradient about__gradient-title">
                    <?= isset($slogan) ? $slogan : ''; ?>
                </h5>
            </div>
            <div class="w-6-12 mobile">
                <h1 class="main-title"><?= isset($h1_text) ? $h1_text : '' ?></h1>
            </div>
            <div class="w-1">
                <p class="big bot-mrgn-ult"><?= isset($select_salon_text) ? $select_salon_text : ''; ?></p>
                <a href="#Salons">
                    <svg class="arrow-down" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 312.757 312.757">
                        <polygon points="244.062,184.792 170.623,258.23 170.623,0 142.139,0 142.139,258.247 68.69,184.792 48.549,204.939 156.379,312.757 264.208,204.939"/>
                    </svg>
                </a>
            </div>
        </div>
    </div>
</section>
