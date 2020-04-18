<?php
namespace Dagou\Echarts\CDN;

use Dagou\Echarts\Traits\Asset;

class Local extends AbstractCDN {
    use Asset;
    const URL = 'EXT:echarts/Resources/Public/';

    /**
     * @param string|NULL $js
     * @param string|NULL $language
     *
     * @return string
     */
    protected function renderJs(string $js = NULL, string $language = NULL): string {
        return $this->getAssetPath(
            self::URL.$this->getBuild($language)
        );
    }
}