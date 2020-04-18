# TYPO3 Extension: ECharts

EXT:echarts allows you to use [ECharts](https://echarts.apache.org/) in your extensions.

**The extension version only matches the ECharts library version, it doesn't mean anything else.**

## How to use it
You can load the library in your Fluid template with **LoadViewHelper**.

	<echarts:load />

You can also load your own library.

    <echarts:load js="..." />
    
Or, load the JS before the &lt;BODY&gt; tag.

    <echarts:load footer="false" />
    
To use the CDN resource, please set `$GLOBALS['TYPO3_CONF_VARS']['EXTCONF']['echarts']['CDN']` in `ext_localconf.php` or `AdditionalConfiguration.php`.

    $GLOBALS['TYPO3_CONF_VARS']['EXTCONF']['echarts']['CDN'] = \Dagou\Echarts\CDN\jsDelivr::class;