<?php

function route($url) {
    switch ($url) {
        case '/':
            return 'index.twig';
        case '/access':
            return 'access.twig';
        default:
            return '404.twig';
    }
}