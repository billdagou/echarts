<?php
namespace Dagou\Echarts\ViewHelpers;

use Dagou\Echarts\Interfaces\Source;
use Dagou\Echarts\Source\Local;
use Dagou\Echarts\Utility\ExtensionUtility;
use TYPO3\CMS\Core\Utility\GeneralUtility;
use TYPO3\CMS\Fluid\ViewHelpers\Asset\ScriptViewHelper;

class ExtensionViewHelper extends ScriptViewHelper {
    protected static array $builds = [
        'bmap',
        'dataTool',
    ];

    public function initializeArguments(): void {
        parent::initializeArguments();

        $this->registerArgument('extension', 'string', 'Extension name.', TRUE);
        $this->registerArgument('disableSource', 'boolean', 'Disable Source.');

        $this->overrideArgument(
            'identifier',
            'string',
            'Use this identifier within templates to only inject your JS once, even though it is added multiple times.',
            FALSE,
            'echarts.extension'
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

            $this->tag->addAttribute('src', $source->getExtension($this->arguments['extension']));
        }

        $this->arguments['identifier'] .= '.'.$this->arguments['extension'];

        return parent::render();
    }
}