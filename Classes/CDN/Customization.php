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

    /**
     * @param string $extension
     * @param string $data
     * @param string|NULL $language
     *
     * @return string
     */
    protected function renderExtensionJs(string $extension, string $data, string $language = NULL): string {
        return $this->getAssetPath($data);
    }
}