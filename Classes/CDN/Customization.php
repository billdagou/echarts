<?php
namespace Dagou\Echarts\CDN;

use Dagou\Echarts\Traits\Asset;

class Customization extends AbstractCDN {
    use Asset;

    /**
     * @param string|NULL $js
     * @param string|NULL $language
     *
     * @return string
     */
    protected function renderJs(string $js = NULL, string $language = NULL): string {
        return $this->getAssetPath($js);
    }
}