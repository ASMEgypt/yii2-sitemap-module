<?php
/**
 * Yii2 module for automatically generating robots.txt.
 *
 * @link https://github.com/himiklab/yii2-sitemap-module
 * @author Serge Larin <serge.larin@gmail.com>
 * @author HimikLab
 * @copyright 2015 Assayer Pro Company
 * @license http://opensource.org/licenses/MIT MIT
 *
 */
namespace assayerpro\sitemap;
use Yii;
/**
 * Yii2 module for automatically generating robots.txt.
 *
 * @author Serge Larin <serge.larin@gmail.com>
 * @package assayerpro\sitemap
 */
class RobotsTxt extends \yii\base\Component
{
    /** @var sting */
    public $host = '';
    /** @var string */
    public $sitemap = '';
    /**
     * @inheritdoc
    */
    public function init()
    {
        parent::init();
        if (empty($this->host)) {
            if (Yii::$app->request->IsSecureConnection) {
                $this->host = Yii::$app->request->hostInfo;
            } else {
                $this->host = Yii::$app->request->serverName;
            }
        }
    }
    /**
     * render robots.txt
     *
     * @return string
     */
    public function render()
    {
        $result = "";
        $params['Host'] = $this->host;
        $params['Sitemap'] = $this->sitemap;
        foreach (array_filter($params) as $key => $value) {
            $result .= "$key: $value\n";
        }
        return $result;

    }
}
