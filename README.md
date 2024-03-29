# TYPO3 Extension: ECharts

EXT:echarts allows you to use [ECharts](https://echarts.apache.org/) in your extensions.

**The extension version only matches the ECharts library version, it doesn't mean anything else.**

## How to use it
You can load the library in your Fluid template easily.

    <f:asset.script identifier="echarts" src="{echarts:uri.js()}" />
	
And the extensions.

    <f:asset.script identifier="echarts.bmap" src="{echarts:uri.extension(extension: 'bmap')}" />
    <f:asset.script identifier="echarts.dataTool" src="{echarts:uri.extension(extension: 'dataTool')}" />

You can also load other ECharts version, like `common`, `esm`, or `simple`.

    {echarts:uri.js(build: "...")}

To use other ECharts source, you can register it in `ext_localconf.php` or `AdditionalConfiguration.php`.

    \Dagou\ECharts\Utility\ExtensionUtility::registerSource(\Dagou\ECharts\Source\JsDelivr::class);

You may want to disable the source and use the local one instead in some cases, for example saving page as PDF by [WKHtmlToPdf](https://wkhtmltopdf.org/).

    {echarts:uri.js(forceLocal: "true")}
    {echarts:uri.extension(extension: "...", forceLocal: "true")}