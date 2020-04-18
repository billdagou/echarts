<?php
namespace Dagou\Echarts\ViewHelpers;

use Dagou\Echarts\CDN\Customization;
use Dagou\Echarts\CDN\Local;
use Dagou\Echarts\Interfaces\CDN;
use Dagou\Echarts\Traits\ExtConf;
use TYPO3\CMS\Core\Utility\GeneralUtility;
use TYPO3Fluid\Fluid\Core\ViewHelper\AbstractViewHelper;

class LoadViewHelper extends AbstractViewHelper {
    use ExtConf;

    public function initializeArguments() {
        $this->registerArgument('footer', 'boolean', 'Add to footer or not.', FALSE, TRUE);
        $this->registerArgument('js', 'string', 'ECharts file path.');
        $this->registerArgument('language', 'string', 'Language code.');
    }

    public function render() {
        $cdn = $this->getCDN((bool)$this->arguments['js']);

        $cdn->load($this->arguments['js'], $this->arguments['footer'], $this->arguments['language']);
    }

    /**
     * @param bool $isCustomized
     *
     * @return \Dagou\Echarts\Interfaces\CDN
     */
    protected function getCDN(bool $isCustomized): CDN {
        if ($isCustomized) {
            return GeneralUtility::makeInstance(Customization::class);
        }

        if (($className = $GLOBALS['TYPO3_CONF_VARS']['EXTCONF']['echarts']['CDN']) && is_subclass_of($className, CDN::class)) {
            return GeneralUtility::makeInstance($className);
        } else {
            return GeneralUtility::makeInstance(Local::class);
        }
    }
}