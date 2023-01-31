<?php
namespace Dagou\Echarts\Interfaces;

interface Source {
    /**
     * @param string $build
     *
     * @return string
     */
    public function getJs(string $build): string;

    /**
     * @param string $extension
     *
     * @return string
     */
    public function getExtension(string $extension): string;
}