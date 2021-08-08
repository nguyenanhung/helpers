<?php
/**
 * Created by PhpStorm.
 * User: 713uk13m
 * Date: 5/7/18
 * Time: 20:34
 */
if (!function_exists('get_pagination_number')) {
    /**
     * Function get_pagination_number
     *
     * @author: 713uk13m <dev@nguyenanhung.com>
     * @time  : 2019-03-25 14:03
     *
     * @param $str
     *
     * @return int
     */
    function get_pagination_number($str)
    {
        $str = str_replace('trang-', '', $str);

        return intval($str);
    }
}
if (!function_exists('view_pagination')) {
    /**
     * Function view_pagination
     *
     * @author: 713uk13m <dev@nguyenanhung.com>
     * @time  : 2019-03-25 14:03
     *
     * @param array $input_data
     *
     * @return string|null
     */
    function view_pagination($input_data = array())
    {
        // $page_type           = $input_data['page_type'] ?? '';
        $page_link           = $input_data['page_link'] ?? '';
        $page_title          = $input_data['page_title'] ?? '';
        $page_prefix         = $input_data['page_prefix'] ?? '';
        $page_suffix         = $input_data['page_suffix'] ?? '';
        $current_page_number = $input_data['current_page_number'] ?? 1;
        $total_item          = $input_data['total_item'] ?? 0;
        $item_per_page       = $input_data['item_per_page'] ?? 10;
        $begin               = $input_data['pre_rows'] ?? 3;
        $end                 = $input_data['suf_rows'] ?? 3;
        $first_link          = $input_data['first_link'] ?? '&nbsp;';
        $last_link           = $input_data['last_link'] ?? '&nbsp;';
        /**
         * Kiểm tra giá trị page_number truyền vào
         * Nếu ko có giá trị hoặc giá trị = 0 -> set giá trị = 1
         */
        if (!$current_page_number || empty($current_page_number)) {
            $current_page_number = 1;
        }
        // Tính tổng số page có
        $total_page = ceil($total_item / $item_per_page);
        if ($total_page <= 1) {
            return NULL;
        }
        $output_html = '';
        if ($current_page_number <> 1) {
            $output_html .= '<li class="left"><a href="' . trim($page_link) . trim($page_suffix) . '" title="' . trim($page_title) . '">' . trim($first_link) . '</a></li>';
        }
        for ($page_number = 1; $page_number <= $total_page; $page_number++) {
            if ($page_number < ($current_page_number - $begin) || $page_number > ($current_page_number + $end)) {
                continue;
            }
            if ($page_number == $current_page_number) {
                $output_html .= '<li class="selected"><a href="' . trim($page_link) . trim($page_prefix) . trim($page_number) . trim($page_suffix) . '" title="' . $page_title . ' trang ' . $page_number . '">' . $page_number . '</a></li>';
            } else {
                $output_html .= '<li><a href="' . trim($page_link) . trim($page_prefix) . trim($page_number) . trim($page_suffix) . '" title="' . $page_title . ' trang ' . $page_number . '">' . $page_number . '</a></li>';
            }
        }
        unset($page_number);
        if ($current_page_number <> $total_page) {
            $output_html .= '<li class="right"><a href="' . trim($page_link) . trim($page_prefix) . trim($total_page) . trim($page_suffix) . '" title="' . trim($page_title) . ' - trang cuối">' . trim($last_link) . '</a></li>';
        }

        return $output_html;
    }
}
