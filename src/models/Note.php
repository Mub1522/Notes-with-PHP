<?php

namespace Usuario\NotesWithPhp\models;

use Usuario\NotesWithPhp\lib\Database;
use PDO;

class Note extends Database
{
    private string $ref;
    private string $title;
    private string $content;

    private string $color;

    public function __construct($title, $content, $color)
    {

        $this->ref = uniqid();
        $this->title = $title;
        $this->content = $content;
        $this->color = $color;

        parent::__construct();
    }

    public function save()
    {
        $query = $this->connect()->prepare("INSERT INTO notes (ref, title, content, color,updated) VALUES (:ref, :title, :content, :color,NOW())");
        $query->execute(["ref" => $this->ref, "title" => $this->title, "content" => $this->content, "color" => $this->color]);
    }

    public function update()
    {
        $query = $this->connect()->prepare("UPDATE notes SET title = :title, content = :content, color = :color,updated = NOW() WHERE ref = :ref");
        $query->execute(["ref" => $this->ref, "title" => $this->title, "content" => $this->content, "color" => $this->color]);
    }

    public static function delete($ref)
    {   
        $db  = new Database();
        $query = $db->connect()->prepare("DELETE FROM notes WHERE ref = :ref");
        $query->execute(["ref" => $ref]);
    }

    public static function get($ref): Note
    {
        $db = new Database();
        $query = $db->connect()->prepare("SELECT * FROM notes WHERE ref = :ref");
        $query->execute(["ref" => $ref]);

        $note = Note::createFromArrayNote($query->fetch(PDO::FETCH_ASSOC));

        return $note;
    }
    public static function getAll(): array
    {
        $notes = [];
        $db = new Database();
        $query = $db->connect()->query("SELECT * FROM notes");

        //Esta iteracion recupera una fila por cada vuelta
        while ($r = $query->fetch(PDO::FETCH_ASSOC)) {
            $note = Note::createFromArrayNote($r);
            array_push($notes, $note);
        }

        return $notes;
    }

    public static function createFromArrayNote($arr): Note
    {
        $note = new Note($arr['title'], $arr['content'], $arr['color']);
        $note->setRef($arr['ref']);

        return $note;
    }

    public function getRef()
    {
        return $this->ref;
    }

    public function setRef($value)
    {
        $this->ref = $value;
    }

    public function getTitle()
    {
        return $this->title;
    }

    public function setTitle($value)
    {
        $this->title = $value;
    }

    public function getContent()
    {
        return $this->content;
    }

    public function setContent($value)
    {
        $this->content = $value;
    }

    public function getColor()
    {
        return $this->color;
    }

    public function setColor($value)
    {
        $this->color = $value;
    }
}
