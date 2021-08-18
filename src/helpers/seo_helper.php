<?php
/**
 * Created by PhpStorm.
 * User: 713uk13m
 * Date: 5/9/18
 * Time: 10:52
 */
if (!function_exists('seo_meta_tag_equiv')) {
    /**
     * Function seo_meta_tag_equiv
     *
     * @param array $data
     *
     * @return string
     * @author   : 713uk13m <dev@nguyenanhung.com>
     * @copyright: 713uk13m <dev@nguyenanhung.com>
     * @time     : 08/18/2021 10:20
     */
    function seo_meta_tag_equiv($data = [])
    {
        $content = [
            [
                'name'    => 'X-UA-Compatible',
                'content' => 'IE=edge',
                'type'    => 'http-equiv'
            ],
            [
                'name'    => 'refresh',
                'content' => $data['refresh']['content'] ?? 1800,
                'type'    => 'equiv'
            ],
            [
                'name'    => 'content-language',
                'content' => 'vi',
                'type'    => 'equiv'
            ],
            [
                'name'    => 'audience',
                'content' => $data['audience']['content'] ?? 'general',
                'type'    => 'equiv'
            ]
        ];
        $common  = new nguyenanhung\Classes\Helper\Common();

        return $common->metaTagEquiv($content);
    }
}
