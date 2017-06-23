<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

$this->title = 'Контакты - Sniper Хоккейный центр';
$this->registerCssFile('@web/css/contact.css', ['depends' => ['app\assets\AppAsset']]);
$this->registerJsFile('//maps.googleapis.com/maps/api/js?key=AIzaSyB9HSouo1F_fT-a9_e7abJ7YDTK9E7vVW4&callback=myMap');
?>
<div class="site-contact">
  <div class=" contact-block">
    <h1>Контакты</h1>
  </div>
  <div class="row">
    <div class="col-lg-6 col-md-6">
      <h2>Контактные данные</h2>
      <hr class='hr-black'>
      <p class='location'>
        <span class="name-location">Адрес: </span>
        <?php foreach ($boss as $adr){ ?>
            <span class="info-location">
              <?=  Html::encode($adr->address) ?>,
              <?=  Html::encode($adr->description) ?>
            </span><br>
        <?php } ?>
      </p>
      <p class='location'>
        <span class="name-location">Телефон: </span>
        <span class="info-location">
          <?=  Html::encode($this->params['phone']) ?>, <?=  Html::encode($this->params['name']) ?>
        </span>
      </p>
      <p class='location'>
        <span class="name-location">Почта: </span>
        <span class="info-location">
          <?=  Html::encode($this->params['email']) ?>
        </span>
      </p>
      <div class="contact-social">
        <a href="<?= Html::encode( $this->params['vk']) ?>" target="_blank">
          <img class='lazy' data-original="/images/backgrounds/vk.png" alt="vk"/>
        </a>
        &emsp;
        <a href="<?= Html::encode( $this->params['instagram']) ?>" target="_blank">
          <img class='lazy' data-original="/images/backgrounds/instagram.png" alt="instagram"/>
        </a>
        &emsp;
        <a href="<?= Html::encode( $this->params['youtube']) ?>" target="_blank">
          <img class='lazy' data-original="/images/backgrounds/youtube.png" alt="youtube"/>
        </a>
        &emsp;
        </div>
    </div>
    <div class="col-lg-6 col-md-6 loc">
      <h2>Места проведения тренировок</h2>
      <hr class='hr-black'>
      <p class='location'>
        <span class="name-location">Тренировки в зале: </span><br>
        <?php foreach ($earth as $adr){ ?>
            <span class="info-location">
              <?=  Html::encode($adr->address) ?>,
              <?=  Html::encode($adr->description) ?>
            </span><br>
        <?php } ?>
      </p>
      <p class='location'>
        <span class="name-location">Тренировки на льду: </span><br>
        <?php foreach ($ice as $adr){ ?>
            <span class="info-location">
              <?=  Html::encode($adr->address) ?>,
              <?=  Html::encode($adr->description) ?>
            </span><br>
        <?php } ?>
      </p>

    </div>

</div>

<div id="googleMap">

</div>
</div>

<script type="text/javascript">
  function myMap() {
     var mapProp = {
             center: new google.maps.LatLng(<?=$coordinates[0]->width ?>, <?= $coordinates[0]->height ?>),
             zoom: 10,
             mapTypeId: google.maps.MapTypeId.ROADMAP
         };
     var map = new google.maps.Map(document.getElementById('googleMap'), mapProp);

     var markers = [];
     var infowindows = [];

     <?php $count = 0; ?>

     <?php foreach ($coordinates as $coordinate) { ?>

        var infowindow = new google.maps.InfoWindow({
          content: '<?= $coordinate->address ?>'
        });

        var marker = new google.maps.Marker({
          position: new google.maps.LatLng(<?=$coordinate->width ?>, <?= $coordinate->height ?>),
          title: '<?= $coordinate->address ?>',
          map: map
        });

        markers.push(marker);
        infowindows.push(infowindow);

        google.maps.event.addListener(marker, 'click', function() {
              infowindows[<?= $count ?>].open(map, markers[<?= $count ?>]);
        });

        <?php $count++;

       } ?>
  }
</script>
