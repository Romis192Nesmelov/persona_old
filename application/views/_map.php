<?php if (isset($id)) : ?>
<div class="visually-hidden" id="Salons"></div>

<?php endif; ?>
<?php if (isset($salons)) : ?>
    <section id="Locations">
        <div>
            <div class="wrp">
                <div class="w-1 row mobile-row no-mrgn">
                    <div id="Map" class="w-6-12 mobile no-mrgn">

                    </div>
                    <div class="w-6-12 no-mrgn mobile salon-list">
                        <h3 class="cntr-txt bot-mrgn-sml">Сеть салонов <strong>«ПЕРСОНА»</strong></h3>
                        <div class="w-1 table">
                            <?php foreach ($salons as $salon) : ?>
                                <a href="<?php echo base_url() . $salon['slug']; ?>" class="row">
                                    <div class="cell place">
                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 772 529.93" class="metro"
                                             fill="<?php echo $salon['metro_color']; ?>">
                                            <path d="M772,455.93v69H499.49V456.07H540l-39.8-113.84L386,529.82,271.83,342.24,232,456.23h40.64v68.62H177.44L0,524.93v-69c15.82.08,31.65,0,47.47.35,4.42.1,6.27-1.4,7.86-5.42q87.88-222.34,176-444.58c.69-1.73,1.52-3.4,2.61-5.82L386,266.6,538.14.33c1.06,2.46,1.74,4,2.35,5.48q63.23,159.63,126.44,319.27Q692,388.43,717.19,451.73c.71,1.77,2.84,4.22,4.34,4.24C738.35,456.2,755.18,456,772,455.93Z"></path>
                                        </svg>
                                    </div>
                                    <div class="cell name">
                                        <p class="sml"><?php echo $salon['name']; ?></p>
                                    </div>
                                    <div class="cell phone">
                                        <p class="sml"><?php echo $salon['tel']; ?></p>
                                    </div>
                                    <div class="cell time">
                                        <p class="sml"><?php echo $salon['working_hours']; ?></p>
                                    </div>
                                </a>
                            <?php endforeach; ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
  <div style="display: none;">
    <?php
      function isMobile1() {
        return preg_match("/(android|avantgo|blackberry|bolt|boost|cricket|docomo|fone|hiptop|mini|mobi|palm|phone|pie|tablet|up\.browser|up\.link|webos|wos)/i", $_SERVER["HTTP_USER_AGENT"]);
      }
      $isMobile = !!isMobile1();
    ?>
  </div>
  <?php

  ?>
    <script>
      const saloons = []
      let saloon
      let isMobile = <?= $isMobile ? 'true' : 'false'?>;
      <?php foreach ($salons as $salon) : ?>
      saloon = {
        coords: [<?php echo $salon['coordinates']; ?>],
        name: "<?php echo $salon['name']; ?>",
        address: "<?php echo html_entity_decode($salon['address_short']); ?>",
        link: "<?php echo base_url(); ?><?php echo $salon['slug']; ?>"
      }
      saloons.push(saloon)
      <?php endforeach; ?>
      let isScrolled = false
      function initMap() {
          setTimeout(function () {
            let personaMap;
            ymaps.ready(init);

            function init() {
              personaMap = new ymaps.Map('Map', {
                center: [55.723191, 37.586612],
                zoom: 10,
                duration: 50
              });

              saloons.forEach(saloon => {
                personaMap.geoObjects.add(new ymaps.Placemark(saloon.coords,
                  {
                    iconCaption: saloon.address,
                    balloonContent: `${saloon.address}<br><a href='${saloon.link}' target='_blank'>Перейти на страницу салона</a> `
                  }));
              })

            }
          }, 500)
      }
      window.addEventListener('load', function() {
        if(isMobile) {
          window.addEventListener('scroll', function() {
            if (!isScrolled) {
              isScrolled = true
              initMap()
            }
          })
        } else {
          initMap()
        }
      })
    </script>
<?php endif; ?>
