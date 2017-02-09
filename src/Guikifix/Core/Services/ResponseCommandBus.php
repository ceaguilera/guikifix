<?php

namespace Guikifix\Core\Services;


/**
* 	ResponseCommandBus 
* 	
* 	Representa el servicio que retorna  la repuesta de un Caso de Uso
*
*	@author Freddy Contreras
*/
class ResponseCommandBus
{
	/**
	* @var integer $status_code  codigo que indica el estado de la accion ejecutada
	*/
	private $status_code;

	/**
	* @var array $data array que contiene datos relevantes
	*/
	private $data;

    /**
     * Constructor de la clase
     *
     * @param integer $codigo codigo de estado de la accion
     * @param array $data array de datos relevantes para la accion ejecutado
     */
	public function __construct($codigo,$data = null)
	{
		$this->status_code = $codigo;
		$this->data = $data;
	}

    /**
     * devuelve un array de datos relevantes para la accion ejecutada
     *
     * @return  array $data
     */
	public function getData()
	{
		return $this->data;
	}

    /**
     * devuelve codigo de estado de la accion ejecutada
     *
     * @return  integer
     */
	public function getStatusCode()
	{
		return $this->status_code;
	}


    /**
     * devuelve array con el contenido del objeto
     *
     * @return  array
     */
	public function getArray()
	{
		return [
			'status' => $this->status_code,
			'data' => $this->data
		];
	}
}
