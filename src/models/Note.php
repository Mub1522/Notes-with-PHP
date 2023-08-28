<?php
namespace Usuario\NotesWithPhp\models;

use Usuario\NotesWithPhp\lib\Database;
use PDO;

class Note extends Database
{
    private string $ref;
    private string $title;
    private string $content;

    public function __construct($title, $content){

        $this->ref = uniqid();
        $this->title = $title;
        $this->content = $content;

        parent::__construct();

    }

    public function save(){
        $query = $this->connect()->prepare("INSERT INTO notes (ref, title, content, updated) VALUES (:ref, :title, :content, NOW())");
        $query->execute(["ref" => $this->ref, "title" => $this->title, "content" => $this->content]);
    }

    public function update(){
        $query = $this->connect()->prepare("UPDATE notes SET title = :title, content = :content, updated = NOW() WHERE ref = :ref");
        $query->execute(["ref" => $this->ref, "title" => $this->title, "content" => $this->content]);
    }

    public static function get($ref) : Note {
        $db = new Database();
        $query = $db->connect()->prepare("SELECT * FROM notes WHERE ref = :ref");
        $query->execute(["ref" => $ref]);

        $note = Note::createFromArrayNote($query->fetch(PDO::FETCH_ASSOC));

        return $note;
    }

    public static function createFromArrayNote($arr) : Note {
        $note = new Note($arr['title'], $arr['content']);
        $note->setRef($arr['ref']);

        return $note;
    }

    public function getRef(){
        return $this->ref;
    }

    public function setRef($value){
        $this->ref = $value;
    }

    public function getTitle(){
        return $this->title;
    }

    public function setTitle($value){
        $this->title = $value;
    }

    public function getContent(){
        return $this->content;
    }

    public function setContetn($value){
        $this->content = $value;
    }
    
}