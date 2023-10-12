<?php
namespace Dagou\Echarts\ViewHelpers\Uri;

use Dagou\Echarts\Interfaces\Source;
use Dagou\Echarts\Source\Local;
use Dagou\Echarts\Utility\ExtensionUtility;
use TYPO3\CMS\Core\Utility\GeneralUtility;
use TYPO3Fluid\Fluid\Core\ViewHelper\AbstractViewHelper;

class JsViewHelper extends AbstractViewHelper {
    protected static array $builds = [
        'common',
        'esm',
        'simple',
    ];

    public function initializeArguments(): void {
        $this->registerArgument('build', 'string', 'Build name');
        $this->registerArgument('forceLocal', 'boolean', 'Force to use local source.');
    }

    /**
     * @return string
     */
    public function render(): string {
        if ($this->arguments['forceLocal'] !== TRUE
            && is_subclass_of(($className = ExtensionUtility::getSource()), Source::class)
        ) {
            $source = GeneralUtility::makeInstance($className);
        } else {
            $source = GeneralUtility::makeInstance(Local::class);
        }

        $build = in_array($this->arguments['build'], self::$builds) ? $this->arguments['build'] : '';

        return $source->getJs($build);
    }
}