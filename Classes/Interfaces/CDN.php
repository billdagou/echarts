<?php
namespace Dagou\Echarts\Interfaces;

interface CDN {
    const VERSION = '4.7.0';

    /**
     * @param string|NULL $js
     * @param bool $footer
     * @param string|NULL $language
     */
    public function load(string $js = NULL, bool $footer = TRUE, string $language = NULL);
}