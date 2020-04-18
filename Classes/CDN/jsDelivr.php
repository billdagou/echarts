<?php
namespace Dagou\Echarts\CDN;

use Dagou\Echarts\Interfaces\CDN;

class jsDelivr extends AbstractCDN {
    const URL = '//cdn.jsdelivr.net/npm/echarts@'.CDN::VERSION.'/dist/';
}