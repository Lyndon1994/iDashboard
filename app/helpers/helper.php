<?php
if (!function_exists('flash_info')) {
    function flash_info($result, $successMsg = 'success !', $errorMsg = 'something error !')
    {
        return $result ? flash($successMsg, 'success')->important() : flash($errorMsg, 'danger')->important();
    }
}

if (!function_exists('getUser')) {
    function getUser($guards = '')
    {
        return auth($guards)->user();
    }
}

if (!function_exists('getUerId')) {
    function getUerId()
    {
        return getUser()->id;
    }
}

if (!function_exists('isWechat')) {
    function isWechat()
    {
        $result = isset($_SERVER['HTTP_USER_AGENT']) ?
            strpos($_SERVER['HTTP_USER_AGENT'], 'MicroMessenger') : false;
        return $result !== false;
    }
}

if (!function_exists('getHost')) {
    //获取顶级域名
    function getHost()
    {
        $url = $_SERVER['HTTP_HOST'];
        if (strpos($url, 'localhost') !== false) {
            return 'localhost';
        }
        $data = explode('.', $url);
        $co_ta = count($data);
        //判断是否是双后缀
        $zi_tow = true;
        $host_cn = 'com.cn,net.cn';
        $host_cn = explode(',', $host_cn);
        foreach ($host_cn as $host) {
            if (strpos($url, $host)) {
                $zi_tow = false;
            }
        }
        //如果是返回FALSE ，如果不是返回true
        if ($zi_tow == true) {
            $host = $data[$co_ta - 2] . '.' . $data[$co_ta - 1];
        } else {
            $host = $data[$co_ta - 3] . '.' . $data[$co_ta - 2] . '.' . $data[$co_ta - 1];
        }
        return $host;
    }
}