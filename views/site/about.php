<?php

use yii\helpers\Html;

$this->title = 'О нас - Sniper Хоккейный центр';
$this->registerCssFile('@web/css/about.css', ['depends' => ['app\assets\AppAsset']]);
$this->registerJsFile('@web/js/main.js', ['depends' => ['app\assets\AppAsset']],'main');
?>

<div class="site-about">
  <img class='lazy nhl' data-original="/images/about.jpg" alt="хоккей sniper about nhl">

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
    <h2>Тренировочный процесс</h2>
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
          так и защитнику. Также в этом тренировочном блоке большое внимание уделяется передачам -
          главному компонету командной игры.
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

    <div class="row training-two">
      <div class="col-lg-4">
        <img class='lazy' data-original="/images/ofp-about.jpg" alt="владение шайбой">
        <a href="#"><h3>ОФП</h3></a>
        <p class="about-training-head">
          Общая физическая подготовка - формирование и совершенствование физических способностей,
          направленное на общее физическое развитие человека. Укрепление мышечного каркаса;
          развитие силы, выносливости, ловкости, гибкости - это и многое другое включает в себя офп.
        </p>
        <p>
          <h5>Упражнения:</h5>
          <ul class="rounded">
            <li>Бег</li>
            <li>Упражнения с собсвенным весом</li>
            <li>Упражнения с отягощениями</li>
            <li>Растяжка</li>
            <li>Подвижные игры</li>
          </ul>
        </p>
        <hr class='hr-training'/>
      </div>
      <div class="col-lg-4">
        <img class='lazy' data-original="/images/goalkeeper-about.jpg" alt="катание на коньках">
        <a href="#"><h3>Вратари</h3></a>
        <p class="about-training-head">
          "Хороший вратарь - половина команды". Старое народное изречение, которое актуально по сей день
          как для футбола, так и для хоккея. Благодаря нам Вы улучшите свою реакцию и
          общие вратарские навыки, научитесь правильно выбирать позицию и перемещаться в воротах.
        </p>
        <p>
          <h5>Упражнения:</h5>
          <ul class="rounded">
            <li>Развитие реакции</li>
            <li>Работа с мячами</li>
            <li>Выбор позиции</li>
            <li>Быстрое перемещение в воротах</li>
            <li>Специальная растяжка для вратарей</li>
          </ul>
          <hr class='hr-training'/>
        </p>
      </div>

      <div class="col-lg-4">
        <img class='lazy' data-original="/images/sfp-about.jpg" alt="броски по воротам">
        <a href="#"><h3>СФП</h3></a>
        <p class="about-training-head">
          Специальная физическая подготовка - процесс формирования и развития физических способностей, необходимых в хоккее.
          Взрывная сила ног, сильный точкок с места, устойчивость при физическом контакте,
          сила рук для броска - за это и многое другое отвечает сфп.
        </p>
        <p>
          <h5>Упражнения:</h5>
          <ul class="rounded">
            <li>Прыжковая взрыная работа на ноги</li>
            <li>Скоростно - силовая тренировка</li>
            <li>Балансирование и координация</li>
            <li>Упрженения на развитие ловкости</li>
            <li>Контроль шайбы с отягощениями</li>
          </ul>
          <hr class='hr-training'/>
        </p>
      </div>
    </div>
    <div class="about-video">
      <h1 class="age">Упражнения и нагрузки определяются в зависмости от Вашего возраста</h1>
      <a class="stroke" href="#">Видео с тренировок</a>
    </div>

  </div>

  <div class="equipment">
    <div class="row">
      <h2>Тренажеры и оборудование</h2>
      <hr/>
      <div class="col-lg-8 col-md-8 about-info">
        <p>
          Наш центр обеспечен современными хоккейными тренажерами и оборудованием.
          У нас в наличие имеются хоккейные ворота для тренировок вратарей и
          имитатор вратаря на ворота для отработки кистевых бросков и щелчков.
          Также присутсвуют тренажеры для отработки дриблинга, паса, кистевых бросков и
          щелчков, техники владения клюшкой, развития хоккейной моторики,
          общего и специального физческого развития.
        </p>
        <a class="stroke" href="#">Подробнее</a>
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

  <div class="coaches">
    <div class="row">
      <h2>Наши тренера</h2>
      <hr/>
      <div class="col-lg-4 col-md-4">
        <img class='lazy coach' data-original="/images/coach-1.jpg" alt="тренер sniper">
        <div >
          <a href="<?= Html::encode($model->vk) ?>" target="_blank">
            <img class='lazy' data-original="/images/vk.png" alt="vk"/>
          </a>
        </div>

      </div>
      <div class="col-lg-8 col-md-8 coaches-info">
        <h3>Владислав Павлов</h3>
        <h4>Гланый тренер</h4>
        <p>
          Воспитанник хоккейной школы "Метеор - Сигнал".
          Несколько лет выступал в молодежной хоккейной лиге. Амплуа -
          центральный нападающий. Разряд: Кандидат в мастера спорта.

        </p>
      </div>
    </div>
    <hr class='hr-black' />

    <div class="row">
      <div class="col-lg-4 col-md-4">
        <img class='lazy coach' data-original="/images/coach-2.jpg" alt="тренер sniper">
        <div >
          <a href="<?= Html::encode($model->vk) ?>" target="_blank">
            <img class='lazy' data-original="/images/vk.png" alt="vk"/>
          </a>
        </div>
      </div>
      <div class="col-lg-8 col-md-8 coaches-info">
        <h3>Владимир Митин</h3>
        <h4>Тренер</h4>
        <p>
          Воспитанник хоккейной школы "Метеор - Сигнал".
          Выступал в молодежной хоккейной лиге, в высшей хоккейной лиге. Амплуа -
          крайний нападающий. Разряд: Кандидат в мастера спорта.
        </p>
      </div>

    </div>
  </div>

  <div class="about-gallery">
    <div class="about-photo">
      <h2>Фотографии</h2>
      <hr/>
      <div id="myCarousel" class="carousel slide" data-ride="carousel">
        <ol class="carousel-indicators">
          <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
          <li data-target="#myCarousel" data-slide-to="1"></li>
          <li data-target="#myCarousel" data-slide-to="2"></li>
          <li data-target="#myCarousel" data-slide-to="3"></li>
          <li data-target="#myCarousel" data-slide-to="4"></li>
        </ol>

        <div class="carousel-inner">
          <div class="item active">
            <a href="#win0" class="">
              <img src="/images/carousel-1.jpg" alt="катание на коньках">
            </a>
          </div>
          <div class="item">
            <a href="#win1" class="">
              <img src="/images/carousel-2.jpg" alt="Chania">
            </a>
          </div>
          <div class="item">
            <a href="#win2" class="">
              <img src="/images/carousel-3.jpg" alt="Chicago">
            </a>
          </div>
          <div class="item">
            <a href="#win3" class="">
              <img src="/images/carousel-4.jpg" alt="New York">
            </a>
          </div>
          <div class="item">
            <a href="#win4" class="">
              <img src="/images/carousel-5.jpg" alt="Chania">
            </a>
          </div>
        </div>

        <a class="left carousel-control" href="#myCarousel" data-slide="prev">
          <span class="glyphicon glyphicon-chevron-left"></span>
          <span class="sr-only">Previous</span>
        </a>
        <a class="right carousel-control" href="#myCarousel" data-slide="next">
          <span class="glyphicon glyphicon-chevron-right"></span>
          <span class="sr-only">Next</span>
        </a>
      </div>
      <a class="stroke" href="#">Больше фотографий</a>

    </div>

    <a class="overlay" id="win0"></a>
    <div class="popup">
      <img src="/images/carousel-1.jpg" alt="Chania">
      <a class="close"title="Закрыть" href="#close"></a>
    </div>

    <a class="overlay" id="win1"></a>
    <div class="popup">
      <img src="/images/carousel-2.jpg" alt="Chania">
      <a class="close"title="Закрыть" href="#close"></a>
    </div>

    <a class="overlay" id="win2"></a>
    <div class="popup">
      <img src="/images/carousel-3.jpg" alt="Chania">
      <a class="close"title="Закрыть" href="#close"></a>
    </div>

    <a class="overlay" id="win3"></a>
    <div class="popup">
      <img src="/images/carousel-4.jpg" alt="Chania">
      <a class="close"title="Закрыть" href="#close"></a>
    </div>

    <a class="overlay" id="win4"></a>
    <div class="popup">
      <img src="/images/carousel-5.jpg" alt="Chania">
      <a class="close"title="Закрыть" href="#close"></a>
    </div>

  </div>

  </div>

</div>
