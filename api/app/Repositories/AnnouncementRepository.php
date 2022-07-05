<?php

namespace App\Repositories;

use App\Models\Announcement;

class AnnouncementRepository
{
    protected $announcement;

    public function __construct(Announcement $announcement)
    {
        $this->announcement = $announcement;
    }

    public function getAll()
    {
        return $this->announcement->paginate(15);
    }

    public function getById($id)
    {
        return $this->announcement
            ->where('id', $id)
            ->get();
    }

    public function save($data)
    {
        $announcement = new $this->announcement;

        $announcement->user_id = $data['user_id'];
        $announcement->title = $data['title'];
        $announcement->body = $data['body'];

        $announcement->save();

        return $announcement->fresh();
    }

    public function update($data, $id)
    {
        $announcement = $this->announcement->find($id);

        $announcement->title = $data['title'];
        $announcement->body = $data['body'];

        $announcement->update();

        return $announcement;
    }

    public function delete($id)
    {
        $announcement = $this->announcement->find($id);
        $announcement->delete();

        return $announcement;
    }

    public function getResult($query)
    {
        return $this->announcement
            ->where('title', 'LIKE', '%' . $query . '%')
            ->orWhere('body', 'LIKE', '%' . $query . '%')
            ->get();
    }
}
