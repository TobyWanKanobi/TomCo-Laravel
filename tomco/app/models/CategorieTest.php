<?php namespace TomCo\models;

class CategorieTest {

	protected $categorie_id;
	protected $naam;
	protected $parent_id;
	
	public function __construct($cat_id, $naam, $parent)
	{
		$this->categorie_id = $cat_id;
		$this->naam = $naam;
		$this->parent_id = $parent;
	}
	
	public function getId()
	{
		return $this->categorie_id;
	}
	
	public function getNaam()
	{
		return $this->naam;
	}
	
	public function getParent()
	{
		return $this->parent_id;
	}
	
}
