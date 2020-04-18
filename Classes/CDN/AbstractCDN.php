<?php
namespace Dagou\Echarts\CDN;

use Dagou\Echarts\Interfaces\CDN;
use Dagou\Echarts\Traits\ExtConf;
use Dagou\Echarts\Traits\PageRenderer;
use TYPO3\CMS\Core\SingletonInterface;

abstract class AbstractCDN implements CDN, SingletonInterface {
    use ExtConf, PageRenderer;
    const URL = '';

    /**
     * @param string|NULL $js
     * @param bool $footer
     * @param string|NULL $language
     * @param array $extensions
     */
    public function load(string $js = NULL, bool $footer = TRUE, string $language = NULL, array $extensions = []) {
        $js = $this->renderJs($js, $language);

        if ($footer) {
            $this->getPageRenderer()->addJsFooterLibrary('echarts', $js);

            foreach ($extensions as $extension => $data) {
                $extensionJs = $this->renderExtensionJs($extension, $data, $language);

                $this->getPageRenderer()->addJsFooterLibrary('echarts-'.$extension, $extensionJs);
            }
        } else {
            $this->getPageRenderer()->addJsLibrary('echarts', $js);
        }
    }

    /**
     * @param string|NULL $js
     * @param string|NULL $language
     *
     * @return string
     */
    protected function renderJs(string $js = NULL, string $language = NULL): string {
        return static::URL.$this->getBuild($language);
    }

    /**
     * @param string|NULL $language
     *
     * @return string
     */
    protected function getBuild(string $language = NULL): string {
        switch ($this->getExtConf('build')) {
            case 'common':
                return 'echarts'.($language ? '-'.$language : '').'.common.min.js';
            case 'full':
                return 'echarts'.($language ? '-'.$language : '').'.min.js';
            case 'simple':
                return 'echarts'.($language ? '-'.$language : '').'.simple.min.js';
        }
    }

    /**
     * @param string $extension
     * @param string $data
     * @param string|NULL $language
     *
     * @return string
     */
    protected function renderExtensionJs(string $extension, string $data, string $language = NULL): string {
        return static::URL.'extension/'.$this->getExtension($extension, $language);
    }

    /**
     * @param string $extension
     * @param string|NULL $language
     *
     * @return string
     */
    protected function getExtension(string $extension, string $language = NULL): string {
        return $extension.'.min.js';
    }
}