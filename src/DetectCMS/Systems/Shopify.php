<?php
namespace DetectCMS\Systems;

/**
 *
 * @author Vojta Brozek <brozek@thepay.cz>
 */
class Shopify
{
    public $methods;

    /** @var  string */
    public $home_html;
    public $home_headers;
    /** @var string */
    public $url;

    /**
     * @param string $home_html
     * @param $home_headers
     * @param string $url
     */
    public function __construct($home_html, $home_headers, $url)
    {
        $this->home_headers = $home_headers;
        $this->home_html = $home_html;
        $this->url = $url;

        $this->methods = array(
            'checkHtmlHead',
        );
    }

    /**
     * @return bool
     */
    public function checkHtmlHead()
    {
        if(preg_match("/<meta id=\"shopify-digital-wallet\" name=\"shopify-digital-wallet\"/",$this->home_html))
        {
            return true;
        }

        return false;
    }
}
