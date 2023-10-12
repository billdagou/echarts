<?php
namespace Dagou\Echarts\Source;

use Dagou\Echarts\Interfaces\Source;
use TYPO3\CMS\Core\SingletonInterface;

abstract class AbstractSource implements Source, SingletonInterface {
    protected const URL = '';
    protected const VERSION = '5.4.3';

    /**
     * @param string $build
     *
     * @return string
     */
    public function getJs(string $build): string {
        return static::URL.$this->getJsBuild($build);
    }

    /**
     * @param string $buildName
     *
     * @return string
     */
    protected function getJsBuild(string $buildName): string {
        return 'echarts'.($buildName ? '.'.$buildName : '').'.min.js';
    }

    /**
     * @param string $extension
     *
     * @return string
     */
    public function getExtension(string $extension): string {
        return static::URL.'extension/'.$extension.'.min.js';
    }
}