<?php

namespace SRC\Helpers;

use SRC\Helpers\Globals;

abstract class Alert
{
    private $_globals;
    private $_alert;

    public function __construct(Globals $_globals)
    {
        $this->_globals = $_globals;
        $this->_alert = $this->getS('alert_session');
    }

    public function isRedirect()
    {
        $rs = $this->_globals->getS('redirect_status');
        if (null !== $rs && 1 !== $rs) {
            return false;
        } else {
            return true;
        }
    }

    public function toggleRedirect()
    {
        $rs = $this->_globals->getS('redirect_status');
        if (null !== $rs && 1 !== $rs) {
            $this->_globals->setS('redirect_status', 1);
        } else {
            $this->_globals->setS('redirect_status', 0);
        }
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
     * Set the value of _message
     */
    public function setAlert($type, string $status,  $table = null, $data = null, $toUnset = true)
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
