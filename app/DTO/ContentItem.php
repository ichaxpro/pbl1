<?php

namespace App\DTO;

class ContentItem
{
    public string $id;
    public ?string $slug;
    public string $title;
    public string $type;
    public string $date;
    public string $operator_name;
    public string $status;
    public ?string $note_admin;
    public string $table; // news, activities, publications, facilities

    public function __construct(array $data)
    {
        $this->id = $data['id'];
        $this->slug = $data['slug'] ?? null;
        $this->title = $data['title'];
        $this->type = $data['type'];
        $this->date = $data['date'];
        $this->operator_name = $data['operator_name'];
        $this->status = $data['status'];
        $this->note_admin = $data['note_admin'] ?? null;
        $this->table = $data['table'];
    }
}
