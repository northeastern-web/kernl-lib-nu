<?php

namespace Kernl\Lib;

class NU
{
    public static $proxyContext = [
        'http' => [
            'timeout' => 3,
            'proxy' => 'tcp://www.proxy.neu.edu:3128',
            'request_fulluri' => true,
        ]
    ];

    /**
     * Retrieve various Northeastern head/meta tags
     * @return string
     */
    public static function headMeta()
    {
        return '
            <link rel="apple-touch-icon" sizes="57x57"  href="https://brand.northeastern.edu/global/assets/favicon/apple-touch-57x57.png?v=2" /><link rel="apple-touch-icon" sizes="60x60"  href="https://brand.northeastern.edu/global/assets/favicon/apple-touch-60x60.png?v=2" />
            <link rel="apple-touch-icon" sizes="72x72"  href="https://brand.northeastern.edu/global/assets/favicon/apple-touch-72x72.png?v=2" />
            <link rel="apple-touch-icon" sizes="76x76"  href="https://brand.northeastern.edu/global/assets/favicon/apple-touch-76x76.png?v=2" />
            <link rel="apple-touch-icon" sizes="114x114"  href="https://brand.northeastern.edu/global/assets/favicon/apple-touch-114x114.png?v=2" />
            <link rel="apple-touch-icon" sizes="120x120"  href="https://brand.northeastern.edu/global/assets/favicon/apple-touch-120x120.png?v=2" />
            <link rel="apple-touch-icon" sizes="144x144"  href="https://brand.northeastern.edu/global/assets/favicon/apple-touch-144x144.png?v=2" />
            <link rel="apple-touch-icon" sizes="152x152"  href="https://brand.northeastern.edu/global/assets/favicon/apple-touch-152x152.png?v=2" />
            <link rel="icon" sizes="144x144" type="image/png" href="https://brand.northeastern.edu/global/assets/favicon/android-chrome-144x144.png?v=2" />
            <link rel="icon" sizes="32x32" type="image/png" href="https://brand.northeastern.edu/global/assets/favicon/favicon-32x32.png?v=2" />
            <link rel="icon" sizes="16x16" type="image/png" href="https://brand.northeastern.edu/global/assets/favicon/favicon-16x16.png?v=2" />
            <link rel="manifest" href="https://brand.northeastern.edu/global/assets/favicon/manifest.json" />
            <meta name="msapplication-TileColor" content="#ffffff" />
            <meta name="msapplication-TileImage" content="https://brand.northeastern.edu/global/assets/favicon/mstile-144x144.png?v=2" />
            <meta name="theme-color" content="#ffffff" />
        ';
    }

    /**
     * Retrieve Northeastern chrome stylesheet
     * @return string
     */
    public static function chromeStyle()
    {
        return '
            <link rel="stylesheet" id="global-font-css" href="https://www.northeastern.edu/nuglobalutils/common/css/material-icons.css" />
            <link rel="stylesheet" id="global-footer-style-css" href="https://www.northeastern.edu/nuglobalutils/common/css/footer.css" />
            <link rel="stylesheet" id="global-header-style-css" href="https://www.northeastern.edu/nuglobalutils/common/css/utilitynav.css" />
        ';
    }

    /**
     * Retrieve Northeastern chrome script
     * @return string
     */
    public static function chromeScript()
    {
        return '<script type="text/javascript" src="https://www.northeastern.edu/nuglobalutils/common/js/navigation.js"></script>';
    }

    /**
     * Retrieve Northeastern header
     * @return string
     */
    public static function chromeHeader()
    {
        try {
            return file_get_contents('https://www.northeastern.edu/resources/components/?return=main-menu', false, stream_context_create(static::$proxyContext));
        } catch (Exception $e) {
            echo $e->getMessage();
        }
    }

    /**
     * Retrieve Northeastern footer
     * @return string
     */
    public static function chromeFooter($legacy = false, $class = '')
    {
        try {
            return file_get_contents('https://www.northeastern.edu/resources/components/?return=footer', false, stream_context_create(static::$proxyContext));
        } catch (Exception $e) {
            echo $e->getMessage();
        }
    }

    /**
     * Retrieve Northeastern Google Tag Manager script
     * @return string
     */
    public static function gtmScript()
    {
        return "
            <!-- Google Tag Manager -->
            <script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
            new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
            j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
            'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
            })(window,document,'script','dataLayer','GTM-WGQLLJ');</script>
            <!-- End Google Tag Manager -->
        ";
    }

    /**
     * Retrieve Northeastern Google Tag Manager noscript
     * @return string
     */
    public static function gtmNoScript()
    {
        return '
            <!-- Google Tag Manager (noscript) -->
            <noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-WGQLLJ"
            height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
            <!-- End Google Tag Manager (noscript) -->
        ';
    }

    /**
     * Retrieve Google Analytics script
     * @param  $tracker Google Analytics tracker ID
     * @return string
     */
    public static function googleAnalytics($tracker)
    {
        return "
            <script>
              (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
              (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
              m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
              })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');
              ga('create', '{$tracker}', 'auto');
              ga('set', 'anonymizeIp', true);
              ga('send', 'pageview');
            </script>
        ";
    }
}
