<?php
namespace Dagou\Echarts\Traits;

use TYPO3\CMS\Core\Configuration\ExtensionConfiguration;
use TYPO3\CMS\Core\Utility\GeneralUtility;

trait ExtConf {
    /**
     * @param string $path
     *
     * @return string
     */
    protected function getExtConf(string $path): string {
        return GeneralUtility::makeInstance(ExtensionConfiguration::class)
            ->get('jquery', $path);
    }
}