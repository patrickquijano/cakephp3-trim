<?php

namespace Trim\Controller\Component;

use Cake\Controller\Component;

class TrimComponent extends Component {

    /**
     * @var array
     */
    protected $_defaultConfig = [];

    /**
     * @param string|null $name
     * @param mixed $default
     * @return array|string|null
     */
    public function getData($name = null, $default = null) {
        $data = $this->getController()->getRequest()->getData($name, $default);
        if (is_string($data)) {
            return $data;
        }
        if (is_array($data)) {
            return array_map(function ($d) {
                return is_string($d) ? trim($d) : $d;
            }, $data);
        }
        return null;
    }

}
