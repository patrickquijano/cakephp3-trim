<?php

namespace Trim\Controller\Component;

use Cake\Controller\Component;
use Cake\Event\Event;

class TrimComponent extends Component {

    /**
     * @var array
     */
    protected $_defaultConfig = [];

    /**
     * beforeFilter callback
     *
     * @param Event $event
     * @return void
     */
    public function beforeFilter(Event $event) {
        $controller = $this->getController();
        $request = $controller->getRequest();
        $data = $request->getData();
        if (!empty($data)) {
            $newData = array_map(function ($d) {
                return is_string($d) ? trim($d) : $d;
            }, $data);
            foreach ($newData as $key => $value) {
                $request = $request->withData($name, $data);
            }
        }
        $queryParams = $request->getQueryParams();
        if (!empty($queryParams)) {
            $newQueryParams = array_map(function ($d) {
                return is_string($d) ? trim($d) : $d;
            }, $queryParams);
            $request = $request->withQueryParams($newQueryParams);
        }
        if ($request !== $controller->getRequest()) {
            $controller->setRequest($request);
        }
    }

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
