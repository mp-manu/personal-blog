<?php

/* @var $this yii\web\View */
/* @var $name string */
/* @var $message string */
/* @var $exception Exception */

use yii\helpers\Html;

$this->title = $name;
?>
<div class=akea-page-wrapper id=akea-page-wrapper style="margin: 40px">
    <div class=akea-not-found-wrap id=akea-full-no-header-wrap>
        <div class=akea-not-found-background></div>
        <div class="akea-not-found-container akea-container">
            <div class=akea-header-transparent-substitute></div>
            <div class="akea-not-found-content akea-item-pdlr">
                <h1 class="akea-not-found-head">404</h1>
                <h3 class="akea-not-found-title akea-content-font">Page Not Found</h3>
                <div class=akea-not-found-caption>Sorry, we couldn&#039;t find the page you&#039;re looking for.</div>
                <form role=search method=get class=search-form action=#>
                    <input type=text class="search-field akea-title-font" placeholder="Type Keywords..." value name=s>
                    <div class=akea-top-search-submit><i class="fa fa-search"></i></div>
                    <input type=submit class=search-submit value=Search>
                </form>
                <div class=akea-not-found-back-to-home><a href=index.html>Or Back To Homepage</a>
                </div>
            </div>
        </div>
    </div>
</div>
