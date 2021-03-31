<?php
namespace Dagou\Echarts\Source;

use Dagou\Echarts\Interfaces\Source;
use Dagou\Echarts\Traits\ExtConf;
use TYPO3\CMS\Core\SingletonInterface;

abstract class AbstractSource implements Source, SingletonInterface {
    use ExtConf;

    const URL = '';

    /**
     * @return string
     */
    public function getJs(): string {
        return static::URL.$this->getJsBuild();
    }

    /**
     * @return string
     */
    protected function getJsBuild(): string {
        switch ($this->getExtConf('build')) {
            case 'common':
                return 'echarts.common.min.js';
            case 'default':
                return 'echarts.min.js';
            case 'esm':
                return 'echarts.esm.min.js';
            case 'simple':
                return 'echarts.simple.min.js';
        }
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