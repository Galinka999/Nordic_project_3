<?php
    require_once($_SERVER['DOCUMENT_ROOT'] . '/about.php');
    require_once($_SERVER['DOCUMENT_ROOT'] . '/components/header/index.php');
    $result = (new \Nordic\Core\Article())->getElements();
?>

<div class="wrapper">
    <div>
        <h1>Новые поступления весны</h1>
        <p class="text lobster">Мы подготовили для Вас лучшие новинки сезона</p>
        <a href="http://f0496881.xsph.ru/catalog.php?is_new=1">
            <button class="btn-new">
                посмотреть новинки
            </button>
        </a>
    </div>
    <div class="flex-box article-flex">
        <? while($row = mysqli_fetch_assoc($result)){ ?>
        <? $article = new \Nordic\Core\Article($row['id']);?>
            <div class="article" style="background-image: url('<?= $article->getField('photo') ?>')">
                <div>
                    <? if($row['symbol'] == 3) {
                        $symbol = 'article-title-symbol';
                    } elseif ($row['symbol'] == 2) {
                        $symbol = 'article-price-symbol';
                    } elseif ($row['symbol'] == null) {
                        $symbol = '';
                    }?>
                        <div class= "<?= $symbol ?>">
                        </div>
                        <div class="article-title is-bold">
                            <?= $article->title() ?>
                        </div>
                    
                    <div class="article-price">
                        <?= $row['price'] ?>
                    </div>
                    <div class="article-description italic">
                        <?= $row['description'] ?>
                    </div>
                </div>   
            </div>
        <?} ?>
    </div>
    <div class="margin-top">
        <h2>Будь всегда в курсе выгодных предложений</h2>
        <p class="text lobster">подписывайся и следи за новинками и выгодными предложениями.</p>
        <div class="recording-new display-block">
            <form class="recording-new inline-block" action="system/controllers/users/new.php" method="get">
                <input required type="email" name="email" placeholder="e-mail" />
                <button>записаться</button>
            </form>
        </div>
    </div>
</div>
<div class="wrapper border">
        <div id="map"></div>
</div>
<?php
    require_once($_SERVER['DOCUMENT_ROOT'] . '/components/footer/index.php');
?>


