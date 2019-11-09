<?php

namespace SRC\Helpers;

use SRC\Helpers\Globals;

/**
 * Alert class
 * Function to use status alert when using crud operations
 */
abstract class Alert
{
    private $_globals;
    private $_alert;

    public function __construct(Globals $_globals)
    {
        $this->_globals = $_globals;
        $this->_alert = $this->getS('alert_session');
    }

    /**
     * Render the message on views
     */
    public function renderAlert()
    {
        $this->_alert = $this->getS('alert_session');
        if ($this->_alert !== null) {
            require VF . 'partials/alert.php';
        }
    }

    /**
     * Build an alert
     * @param $type : oparation
     * @param $status : color for alert background
     * @param $table
     * @param $data : message
     * @param $toUnset : choose to persist alert
     */
    public function setAlert($type, string $status, $table = null, $data = null, $toUnset = true)
    {
        $message = "";
        switch ($type) {
            case 'create':
                $message = "${table} enregistré";
                break;
            case 'update':
                $message = "${table} : enregistrement ${data} mis à jour";
                break;
            case 'error':
                $message = "Erreur : ${data}";
                break;
            case 'delete':
                $message = "Enregistrement ${data} supprimé avec succès";
                break;
            default:
                $message = $data;
                break;
        }

        $alertData = array(
            "status" => $status,
            "message" => $message
        );

        $this->_globals->setS('alert_session', $alertData);
        $this->_alert = $alertData;
        $this->renderAlert();
        if ($toUnset) {
            unset($_SESSION['alert_session']);
        }
    }

    /**
     * Manually unset alert
     */
    public function unsetAlert()
    {
        unset($_SESSION['alert_session']);
    }
}
