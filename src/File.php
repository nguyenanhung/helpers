<?php
/**
 * Project helpers.
 * Created by PhpStorm.
 * User: 713uk13m <dev@nguyenanhung.com>
 * Date: 11/6/18
 * Time: 09:07
 */

namespace nguyenanhung\Classes\Helper;

use DateTime;
use Exception;
use SplFileInfo;
use \TheSeer\DirectoryScanner\DirectoryScanner;
use \Symfony\Component\Filesystem\Filesystem as SymfonyFilesystem;

if (!class_exists('nguyenanhung\Classes\Helper\File')) {
    /**
     * Class File
     *
     * @package   nguyenanhung\Classes\Helper
     * @author    713uk13m <dev@nguyenanhung.com>
     * @copyright 713uk13m <dev@nguyenanhung.com>
     */
    class File extends SymfonyFilesystem
    {
        /** @var null|array Mảng dữ liệu chứa các thuộc tính cần quét */
        private $scanInclude = ['*.log', '*.txt'];
        /** @var null|array Mảng dữ liệu chứa các thuộc tính bỏ qua không quét */
        private $scanExclude = ['*/Zip-Archive/*.zip'];

        /**
         * File constructor.
         */

        /**
         * Hàm quét thư mục và list ra danh sách các file con
         *
         * @author: 713uk13m <dev@nguyenanhung.com>
         * @time  : 10/17/18 10:19
         *
         * @param string     $path    Đường dẫn thư mục cần quét, VD: /your/to/path
         * @param null|array $include Mảng dữ liệu chứa các thuộc tính cần quét
         * @param null|array $exclude Mảng dữ liệu chứa các thuộc tính bỏ qua không quét
         *
         * @see   https://github.com/theseer/DirectoryScanner/blob/master/samples/sample.php
         *
         * @return \Iterator
         */
        public function directoryScanner($path = '', $include = NULL, $exclude = NULL)
        {
            $scanner = new DirectoryScanner();
            if (is_array($include) && !empty($include)) {
                foreach ($include as $inc) {
                    $scanner->addInclude($inc);
                }
            }
            if (is_array($exclude) && !empty($exclude)) {
                foreach ($exclude as $exc) {
                    $scanner->addExclude($exc);
                }
            }

            return $scanner($path);
        }

        /**
         * Function setInclude
         *
         * @author: 713uk13m <dev@nguyenanhung.com>
         * @time  : 10/17/18 10:23
         *
         * @param array $include
         */
        public function setInclude($include = [])
        {
            $this->scanInclude = $include;
        }

        /**
         * Function setExclude
         *
         * @author: 713uk13m <dev@nguyenanhung.com>
         * @time  : 10/17/18 10:23
         *
         * @param array $exclude
         */
        public function setExclude($exclude = [])
        {
            $this->scanExclude = $exclude;
        }

        /**
         * Hàm xóa các file Log được chỉ định
         *
         * @author: 713uk13m <dev@nguyenanhung.com>
         * @time  : 10/17/18 10:21
         *
         * @param string $path     Thư mục cần quét và xóa
         * @param int    $dayToDel Số ngày cần giữ lại file
         *
         * @return array Mảng thông tin về các file đã xóa
         */
        public function cleanLog($path = '', $dayToDel = 3)
        {
            try {
                $getDir             = $this->directoryScanner($path, $this->scanInclude, $this->scanExclude);
                $result             = [];
                $result['scanPath'] = $path;
                foreach ($getDir as $fileName) {
                    $SplFileInfo = new SplFileInfo($fileName);
                    $filename    = $SplFileInfo->getPathname();
                    $format      = 'YmdHis';
                    // Lấy thời gian xác định xóa fileName
                    $dateTime   = new DateTime("-" . $dayToDel . " days");
                    $deleteTime = $dateTime->format($format);
                    // Lấy modifyTime của file
                    $getfileTime = filemtime($filename);
                    $fileTime    = date($format, $getfileTime);
                    if ($fileTime < $deleteTime) {
                        $this->chmod($filename, 0777);
                        $this->remove($filename);
                        $result['listFile'][] .= "Delete file: " . $filename;
                    }
                }

                return $result;
            }
            catch (Exception $e) {
                if (function_exists('log_message')) {
                    log_message('error', 'Error Message: ' . $e->getMessage());
                    log_message('error', 'Error Trace As String: ' . $e->getTraceAsString());
                }

                return NULL;
            }
        }

        /**
         * Hàm quét thư mục và zip toàn bộ các file thỏa mãn điều kiện
         *
         * @author: 713uk13m <dev@nguyenanhung.com>
         * @time  : 10/17/18 10:51
         *
         * @param string $scanPath Thư mục cần quét file và zip
         * @param int    $dayToZip Số ngày bỏ qua không zipm mặc định = 3
         * @param string $zipPath  Thư mục lưu trữ file Zip
         *
         * @return array Mảng thông tin về các file đã Zip được và thư mục lưu trữ file Zip, trong đó
         *
         *               'time' => Là thời gian thực hiện quét và nén file
         *
         *               'timeToZip' => Là mốc thời gian thực hiện để quét file
         *
         *               'zipPath' => Là thư mục đích lưu trữ file đã nén
         *
         *               'zipFilePath' => Tên file nén
         *
         *               'listFile' => Mảng dữ liệu chứa danh sách file đã nén, trống biến này nghĩa là ko tìm thấy file nào
         */
        public function scanAndZip($scanPath = '', $dayToZip = 3, $zipPath = '')
        {
            try {
                if (class_exists('\Alchemy\Zippy\Zippy')) {
                    $getDir = $this->directoryScanner($scanPath, $this->scanInclude, $this->scanExclude);
                    if (empty($zipPath)) {
                        /**
                         * Nếu không truyền folder đích lưu trữ file Zip
                         * sẽ Tạo 1 thư mục Con trong folder đó để lưu trữ file Zip
                         */
                        $zipPath = $scanPath . DIRECTORY_SEPARATOR . 'Zip-Archive' . DIRECTORY_SEPARATOR;
                    }
                    $zipPathFilename = $zipPath . date('Y-m-d-H-i-s') . '-archive.zip';
                    // Lấy thời gian xác định sẽ Zip file
                    $format                = 'YmdHis';
                    $dateTime              = new DateTime("-" . $dayToZip . " days");
                    $zipTime               = $dateTime->format($format);
                    $result                = [];
                    $result['time']        = date('Y-m-d H:i:s');
                    $result['timeToZip']   = $dateTime->format('Y-m-d H:i:s');
                    $result['zipPath']     = $zipPath;
                    $result['zipFilePath'] = $zipPathFilename;
                    foreach ($getDir as $fileName) {
                        $SplFileInfo = new SplFileInfo($fileName);
                        $filename    = $SplFileInfo->getPathname();
                        // Lấy modifyTime của file
                        $getFileTime = filemtime($filename);
                        $fileTime    = date($format, $getFileTime);
                        if ($fileTime < $zipTime) {
                            if (!file_exists($zipPath)) {
                                $this->mkdir($zipPath);
                            }
                            // Load Zippy
                            $zippy                = \Alchemy\Zippy\Zippy::load();
                            $archive              = $zippy->create($zipPathFilename, [$filename => $filename], TRUE);
                            $result['listFile'][] .= "Zip file: " . $filename . ' -> ' . json_encode($archive);
                        }
                    }

                    return $result;
                } else {
                    $message = 'Class \Alchemy\Zippy\Zippy is not exists!';
                    if (function_exists('log_message')) {
                        log_message('error', $message);
                    }

                    return NULL;
                }
            }
            catch (Exception $e) {
                if (function_exists('log_message')) {
                    log_message('error', 'Error Message: ' . $e->getMessage());
                    log_message('error', 'Error Trace As String: ' . $e->getTraceAsString());
                }

                return NULL;
            }
        }

        /**
         * Hàm xóa các file Log được chỉ định
         *
         * @author: 713uk13m <dev@nguyenanhung.com>
         * @time  : 10/17/18 10:21
         *
         * @param string $path     Thư mục cần quét và xóa
         * @param int    $dayToDel Số ngày cần giữ lại file
         *
         * @return array Mảng thông tin về các file đã xóa
         */
        public function removeLog($path = '', $dayToDel = 3)
        {
            return $this->cleanLog($path, $dayToDel);
        }
    }
}
