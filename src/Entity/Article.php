<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\ArticleRepository")
 */
class Article
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="text", length=100)
     */
    private $title;
    /**
     * @ORM\Column(type="text")
     */

    private $discription;
    /**
     * @ORM\Column(type="text")
     */

    private $fly;
    /**
     * @ORM\Column(type="text")
     */

    private $abilities;
    /**
     * @ORM\Column(type="text")
     */

    private $abilitiesextra;
    /**
     * @ORM\Column(type="text")
     */

    private $magic;

    /**
     * @ORM\Column(type="integer")
     */

    private $move;
    /**
     * @ORM\Column(type="integer")
     */

    private $saves;
    /**
     * @ORM\Column(type="integer")
     */

    private $braverty;
    /**
     * @ORM\Column(type="integer")
     */

    private $wounds;

    /**
     * @ORM\Column(type="blob")
     */
    private $imgmodel;

    //get i set
    public function getId(){
        return $this->id;

    }
    //Title

    public function getTitle(){
        return $this->title;
    }

    public function setTitle($title){
        $this->title= $title;
    }

    //discription

    public function getDiscription(){
        return $this->discription;
    }

    public function setDiscription($discription){
        $this->discription= $discription;
    }

    //Fly

    public function getFly(){
        return $this->fly;
    }

    public function setFly($fly){
        $this->fly= $fly;
    }

    //abilities

    public function getAbilities(){
        return $this->abilities;
    }

    public function setAbilities($abilities){
        $this->abilities= $abilities;
    }

    //abilitiesextra

    public function getAbilitiesextra(){
        return $this->abilitiesextra;
    }

    public function setAbilitiesextra($abilitiesextra){
        $this->abilitiesextra= $abilitiesextra;
    }

    //magic

    public function getMagic(){
        return $this->magic;
    }

    public function setMagic($magic){
        $this->magic = $magic;
    }

    //move

    public function getMove(){
        return $this->move;
    }

    public function setMove($move){
        $this->move = $move;
    }

    //save

    public function getSaves(){
        return $this->saves;
    }

    public function setSaves($saves){
        $this->saves = $saves;
    }

    //bravery

    public function getBraverty(){
        return $this->braverty;
    }

    public function setBraverty($braverty){
        $this->braverty = $braverty;
    }

    //wounds

    public function getWounds(){
        return $this->wounds;
    }

    public function setWounds($wounds){
        $this->wounds = $wounds;
    }

    //wounds

    public function getImgmodel (){
        return $this->imgmodel;
    }

    public function setImgmodel($imgmodel){
        $this->imgmodel = $imgmodel;
    }
}
