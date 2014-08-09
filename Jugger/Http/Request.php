<?php
/**
 * Created by PhpStorm.
 * User: d
 * Date: 09.08.14
 * Time: 21:12
 */

namespace Jugger\Http;


class Request {
    /*
     * @author FoRyS
     */

    /*
     * @access protected
     * @var array Допустимые типы запросов
     */
    protected $allowedTypes = array('POST', 'GET', 'PUT', 'DELETE');

    /*
     * @access protected
     * @var string Тип запроса
     */
    protected $type;

    /*
     * @access protected
     * @var array Cookies
     */
    protected $cookies = array();

    /*
     * @access protected
     * @var array Get
     */
    protected $get = array();

    /*
     * @access protected
     * @var array Post
     */
    protected $post = array();

    /*
     * @access protected
     * @var array SESSION
     */

    protected $session = array();

    /*
     * @acess protected
     * @var string Request uri
     */
    protected $requestUri;

    /*
     * @access protected
     * @var string HTTP HOST
     */
    protected $httpHost;

    /*
     * @access protected
     * @var string QueryString
     */
    protected $queryString;

    /*
     * @access protected
     * @var string UserAgent
     */
    protected $userAgent;

    /*
     * @access protected
     * @var int IP (ip2long format)
     */
    protected $ip;

    /*
     * @access protected
     * @var array Files
     */
    protected $files = array();

    /*
     * Инициализация
     * @access public
     * @return void
     */

    public static function initialize() {
        $this->cookies = isset($_COOKIE) ? $_COOKIE : false;
        $this->files = isset($_FILES) ? $_FILES : false;
        $this->get = isset($_GET) ? $_GET : false;
        $this->ip = ip2long($_SERVER['REMOTE_ADDR']);
        $this->post = isset($_POST) ? $_POST : false;
        $this->requestUri = $_SERVER['REQUEST_URI'];
        $this->queryString = $_SERVER['QUERY_STRING'];
        $this->session = isset($_SESSION) ? $_SESSION : false;
        $this->type = !in_array($_SERVER['REQUEST_METHOD'], $this->allowedTypes) ? 'GET' : $_SERVER['REQUEST_METHOD'];
    }

} 