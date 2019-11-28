<?php

/* @var $this yii\web\View */

use yii\helpers\Html;

$this->title = 'About Me';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="gdlr-core-pbf-sidebar-content  gdlr-core-column-40 gdlr-core-pbf-sidebar-padding gdlr-core-line-height gdlr-core-column-extend-left"
     id="div_2207_2">
    <div class=gdlr-core-pbf-sidebar-content-inner>
        <div class="row">
            <div class="col-md-12">
                <?php if(!empty($data)): ?>
                    <div class="akea-above-logo" style="float: left; margin: 0px 15px 5px 0px">
                        <a href="/main/about-me"><img src="/upload/avatars/<?= $data[0]['photo'] ?>" alt="my-photo" width="348"  height="252" title="logo-1"></a>
                    </div>
                    <?php foreach ($data as $text): ?>
                        <?= $text['text'] ?>
                    <?php endforeach; ?>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>