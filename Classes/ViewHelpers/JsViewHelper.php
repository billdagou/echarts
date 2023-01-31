<?php
namespace Dagou\Echarts\ViewHelpers;

use Dagou\Echarts\Interfaces\Source;
use Dagou\Echarts\Source\Local;
use Dagou\Echarts\Utility\ExtensionUtility;
use TYPO3\CMS\Core\Utility\GeneralUtility;
use TYPO3\CMS\Fluid\ViewHelpers\Asset\ScriptViewHelper;

class JsViewHelper extends ScriptViewHelper {
    protected static array $builds = [
        'common',
        'esm',
        'simple',
    ];

    public function initializeArguments(): void {
        parent::initializeArguments();

        $this->registerArgument('build', 'string', 'Build name');
        $this->registerArgument('disableSource', 'boolean', 'Disable Source.');

        $this->overrideArgument(
            'identifier',
            'string',
            'Use this identifier within templates to only inject your JS once, even though it is added multiple times.',
            FALSE,
            'echarts'
        );
    }

    /**
     * @return string
     */
    public function render(): string {
        if (!$this->arguments['src']) {
            if (!$this->arguments['disableSource']
                && is_subclass_of(($className = ExtensionUtility::getSource()), Source::class)
            ) {
                $source = GeneralUtility::makeInstance($className);
            } else {
                $source = GeneralUtility::makeInstance(Local::class);
            }

            $build = in_array($this->arguments['build'], self::$builds) ? $this->arguments['build'] : '';

            $this->tag->addAttribute('src', $source->getJs($build));
        }

        return parent::render();
    }
}