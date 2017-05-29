<?php

use yii\helpers\Html;

$this->title = 'О нас - Sniper Хоккейный центр';
$this->registerCssFile('@web/css/about.css', ['depends' => ['app\assets\AppAsset']]);
$this->registerJsFile('@web/js/main.js', ['depends' => ['app\assets\AppAsset']],'main');
?>

<div class="site-about">
  <div class="about-head">
    <h1>Центр подготовки хоккеистов Sniper</h1>
    <hr/>
  </div>
  <div class="about-we">
    <div class="row">
      <h2>Чем мы занимаемся</h2>
      <hr/>
      <div class="col-lg-8 col-md-8 about-info">
        <p>
          Мы занимаемся подготовкой хоккеистов любого возраста и любого уровня подготовки.
          Вы будете развиваться во всех хоккейных аспектах, особое внимание будет уделяться навыкам и умениям,
          которые больше нужны для Вашей игровой позиции. Наш центр регулярно проводит сборы,
          благодаря которым Вы качественно повысите уровень своей игры. У нас работает молодая команда специалистов,
          которые имеют профессиональный хоккейный опыт. Мы имеем современное оборудование для различных тренировок.
          Наши тренировки проходят в спортивном зале и на хоккейной площадке.
        </p>
      </div>
      <div class="col-lg-3 col-md-3 about-contact">
        <div>
          <i class="fa fa-phone fa-2x" aria-hidden="true"></i>
          <phone>&emsp;<?= Html::encode($model->phone) ?></phone>
        </div>
        <div>
          <a href="<?=Yii::$app->urlManager->createUrl('pages/contact')?>"><button class="btn">Записаться на тренировку</button></a>
        </div>
        <div>
          <a href="<?= Html::encode($model->vk) ?>" target="_blank">
            <img class='lazy' data-original="/images/vk.png" alt="vk"/>
          </a>
          <b>&emsp;</b>
          <a href="<?= Html::encode($model->instagram) ?>" target="_blank">
            <img class='lazy' data-original="/images/instagram.png" alt="instagram"/>
          </a>
          <b>&emsp;</b>
          <a href="<?=Yii::$app->urlManager->createUrl('pages/contact')?>">
            <img class='lazy' data-original="/images/message.png" alt="message"/>
          </a>
        </div>
      </div>
    </div>
  </div>

  <div class="about-training">
    <h2>Основные направления тренировок</h2>
    <hr/>
    <h4>Наши тренировки направлены на практическое применение навыков и умений.
    Благодаря нам Вы будуте знать, как действовать в различных игровых ситуациях</h4>

    <div class="row">
      <div class="col-lg-4">
        <img class='lazy' data-original="/images/dribbling-about.jpg" alt="владение шайбой">
        <a href="#"><h3>Дриблинг</h3></a>
        <p class="about-training-head">
          Владение шайбой - один из важнейших компонентов хоккейного мастерства.
          Умения обыгрывать игроков и технично контроллировать шайбу нужны как нападающему,
          так и защитнику. Также в этом тренировочном блоке большое внимание уделяется передачам,
          которые являются главным компонетом для командной игры.
        </p>
        <p>
          <h5>Упражнения:</h5>
          <ul class="rounded">
            <li>Короткое ведение шайбы на месте</li>
            <li>Длинное ведение шайбы на месте</li>
            <li>Ведение шайбы в движении</li>
            <li>Финты с шайбой</li>
            <li>Передачи на точность</li>
            <li>Техничный прием передач</li>
          </ul>
        </p>
        <hr class='hr-training'/>
      </div>
      <div class="col-lg-4">
        <img class='lazy' data-original="/images/skating-about.jpg" alt="катание на коньках">
        <a href="#"><h3>Катание</h3></a>
        <p class="about-training-head">
          Катание на коньках - основа хоккея. Для хоккеиста отличное катание на коньках означает больше,
          чем простая способность перемещаться из одного места хоккейного поля в другое.
          Умения маневрировать, быстро ускоряться и резко менять направление движения дадут Вам
          преимущество над другими игроками.
        </p>
        <p>
          <h5>Упражнения:</h5>
          <ul class="rounded">
            <li>Правильное катание лицом вперед</li>
            <li>Правильное катание спиной вперед</li>
            <li>Рывки и ускорения</li>
            <li>Взрыная сила</li>
            <li>Маневрирование</li>
            <li>Скрестный шаг</li>
          </ul>
          <hr class='hr-training'/>
        </p>
      </div>
      
      <div class="col-lg-4">
        <img class='lazy' data-original="/images/shot-about.jpg" alt="броски по воротам">
        <a href="#"><h3>Броски</h3></a>
        <p class="about-training-head">
          Точный и сильный бросок - так завершается любая голевая атака. Чтобы забивать голы, нужно
          уметь хорошо бросать, но наработать точный и сильный бросок можно только большим количеством тренировок.
          На тренировках мы отрабатываем кистевые броски и щелчки. Также часть
          тренировок уделяется броскам с хода.
        </p>
        <p>
          <h5>Упражнения:</h5>
          <ul class="rounded">
            <li>Киситевой бросок на точность</li>
            <li>Техника кистевого броска</li>
            <li>Щелчок на точность</li>
            <li>Техника щелчка</li>
            <li>Броски на силу</li>
            <li>Бросок с хода</li>
          </ul>
          <hr class='hr-training'/>
        </p>
      </div>

    </div>

  </div>

</div>
