<?php
namespace Dagou\Echarts\Interfaces;

interface Source {
    const VERSION = '5.0.2';

    /**
     * @return string
     */
    public function getJs(): string;

    /**
     * @return string
     */
    public function getExtension(string $extension): string;
}