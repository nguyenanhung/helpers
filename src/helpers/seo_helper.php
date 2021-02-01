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
     * @author: 713uk13m <dev@nguyenanhung.com>
     * @time  : 2019-03-25 14:26
     *
     * @param array $data
     *
     * @return string
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
                'content' => isset($data['refresh']['content']) ? $data['refresh']['content'] : 1800,
                'type'    => 'equiv'
            ],
            [
                'name'    => 'content-language',
                'content' => 'vi',
                'type'    => 'equiv'
            ],
            [
                'name'    => 'audience',
                'content' => isset($data['audience']['content']) ? $data['audience']['content'] : 'general',
                'type'    => 'equiv'
            ]
        ];
        $common  = new nguyenanhung\Classes\Helper\Common();

        return $common->metaTagEquiv($content);
    }
}
