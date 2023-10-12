<?php
namespace Dagou\Echarts\ViewHelpers\Uri;

use Dagou\Echarts\Interfaces\Source;
use Dagou\Echarts\Source\Local;
use Dagou\Echarts\Utility\ExtensionUtility;
use TYPO3\CMS\Core\Utility\GeneralUtility;
use TYPO3Fluid\Fluid\Core\ViewHelper\AbstractViewHelper;

class ExtensionViewHelper extends AbstractViewHelper {
    protected static array $extensions = [
        'bmap',
        'dataTool',
    ];

    public function initializeArguments(): void {
        $this->registerArgument('extension', 'string', 'Extension name.', TRUE);
        $this->registerArgument('forceLocal', 'boolean', 'Force to use local source.');
    }

    /**
     * @return string
     */
    public function render(): string {
        if (!in_array($this->arguments['extension'], self::$extensions)) {
            return '';
        }

        if ($this->arguments['forceLocal'] !== TRUE
            && is_subclass_of(($className = ExtensionUtility::getSource()), Source::class)
        ) {
            $source = GeneralUtility::makeInstance($className);
        } else {
            $source = GeneralUtility::makeInstance(Local::class);
        }

        return $source->getExtension($this->arguments['extension']);
    }
}