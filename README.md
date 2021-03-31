# TYPO3 Extension: ECharts

EXT:echarts allows you to use [ECharts](https://echarts.apache.org/) in your extensions.

**The extension version only matches the ECharts library version, it doesn't mean anything else.**

## How to use it
You can load the library in your Fluid template.

	<echarts:js />
	
And the ECharts extensions.

    <echarts:extension extension="..." />

You can also load your own libraries.

    <echarts:js src="..." />
    <echarts:extension extension="..." src="..." />

For more options please refer to &lt;f:asset.js&gt;.

To use other ECharts source, you can register it in `ext_localconf.php` or `AdditionalConfiguration.php`.

    \Dagou\ECharts\Utility\ExtensionUtility::registerSource(\Dagou\ECharts\Source\JsDelivr::class);

You may want to disable the other source and use the local one instead in some cases, for example saving page as PDF by [WKHtmlToPdf](https://wkhtmltopdf.org/).

    <echarts:js disableSource="true" />
    <echarts:extension extension="..." disableSource="true" />