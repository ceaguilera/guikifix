<?php

namespace Guikifix\Core\Contract;

/**
 * EmailServiceInterface
 * 
  * La siguiente clase es el servicio donde se crea el uso de enviar email
 *
 * @author Freddy Contreras <freddycontreras3@gmail.com>
 */
interface EmailServiceInterface
{
/**
     * La siguiente función  envia el correo, recibiendo un conjunto de
     * parametros que dan especificaciones del correo
     *
     * @param array $parameters
     */
    public function sendEmail($parameters = array());

    /**
     * La siguiente función realiza la asignación de los parametros
     * que dan caracteristica al correo
     *
     * @author Freddy Contreras <freddycontreras3@gmail.com>
     * @param $parameters
     */
    public function setParameters(array $parameters);

    /**
     * La siguiente función retorna el valor del atributo
     * @return string
     */
    public function getConfigEmail();

    /**
     * La siguiente función asigna un valor al atributo $configEmail
     * @param string $configEmail
     */
    public function setConfigEmail($configEmail);

    /**
     * La siguiente función retorna el valor del atributo $viewRender
     * @return string
     */
    public function getViewRender();

    /**
     * La siguiente función asigna un valor al atributo viewRender
     * @param string $viewRender
     */
    public function setViewRender($viewRender);

    /**
     * La siguiente función retorna el valor del atributo viewParameters
     * @return array
     */
    public function getViewParameters();

    /**
     * La siguiente función asigna un valor al atributo viewParameters
     * @param array $viewParameters
     */
    public function setViewParameters(array $viewParameters);

    /**
     * La siguiente función retorna el valor del atributo recipients
     * @return array
     */
    public function getRecipients();

    /**
     * La siguiente función asigna un valor al atributo recipients
     * @param array $recipients
     */
    public function setRecipients(array $recipients);

    /**
     * La siguiente función retorna el valor del atributo $subject
     * @return string
     */
    public function getSubject();

    /**
     * La siguiente función asigna un valor al atributo $subject
     * @param string subject
     */
    public function setSubject($subject);

    /**
     * La siguiente función retorna el valor del atributo $emailSender
     * @return string
     */
    public function getEmailSender();

    /**
     * La siguiente función asigna un valor al atributo $emailSender
     * @param string
     */
    public function setEmailSender($emailSender);
}