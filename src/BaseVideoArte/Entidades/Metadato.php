<?php
namespace BaseVideoArte\Entidades;
/**
 * @Entity
 * @Table(name="tipo_de_metadato")
 */
class Metadato {
	/**
	 * @Id
	 * @Column(type="integer")
	 * @GeneratedValue
	 */
	private $id;
	/**
	 * @Column(type="string")
	 */
	private $metadato;

	/**
	 * @Column(type="integer")
	 */
	private $tipo;
	
	

	/**
	 * @ManyToMany(targetEntity="Persona", mappedBy="metadatos")
	 */
	private $personas;
	
	
	

	//-------------------
	 public function __construct(){
		$this->personas = new \Doctrine\Common\Collections\ArrayCollection();
	 }
	//porobando pra reducir cantidad de entidades
	public function getTipos($cat) {// retorno array para opciones

		$tipos = array(
			'evento' => array(), 
			'obra' => array(), 
			'persona' => array(
					'1' => 'nombre',
					'2' => 'apellido', 
					'3' => 'pais', 
					'4' => 'web', 
					'5' => 'inicio', 
					'6' => 'formato', 
					'7' => 'titulo', 
					),
			);

		return $tipos[$cat];
	}

	public function setTipo($t) {
		$this -> tipo = $t;
	}

	/* VER ESTO*/
	public function getSTipo($cat) {
		$s = "";
		if (isset($this -> tipo)) {
			$s = $this -> getTipos($cat);
			$s = $s[$this -> tipo];
		}

		return $s;
	}

	/**
	 * Get id
	 *
	 * @return integer
	 */
	public function getId() {
		return $this -> id;
	}

	/**
	 * Set metadato
	 *
	 * @param string $metadato
	 * @return Metadato
	 */
	public function setMetadato($metadato) {
		$this -> metadato = $metadato;

		return $this;
	}

	/**
	 * Get metadato
	 *
	 * @return string
	 */
	public function getMetadato() {
		return $this -> metadato;
	}

	/**
	 * Get tipo
	 *
	 * @return integer
	 */
	public function getTipo() {
		return $this -> tipo;
	}

}
