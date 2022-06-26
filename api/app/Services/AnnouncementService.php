<?php

namespace App\Services;

use App\Repositories\AnnouncementRepository;
use Exception;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;
use InvalidArgumentException;

class AnnouncementService
{
    protected $announcementRepository;

    public function __construct(AnnouncementRepository $announcementRepository)
    {
        $this->announcementRepository = $announcementRepository;
    }

    public function deleteById($id)
    {
        DB::beginTransaction();

        try {
            $announcement = $this->announcementRepository->delete($id);
        } catch (Exception $e) {
            DB::rollBack();
            Log::info($e->getMessage());

            throw new InvalidArgumentException('Unable to delete announcement data');
        }

        DB::commit();

        return $announcement;
    }

    public function getAll()
    {
        return $this->announcementRepository->getAll();
    }

    public function getById($id)
    {
        return $this->announcementRepository->getById($id);
    }

    public function updateAnnouncement($data, $id)
    {
        $validator = Validator::make($data, [
            'title' => 'bail|min:2',
            'body' => 'bail|min:10'
        ]);

        if ($validator->fails()) {
            throw new InvalidArgumentException($validator->errors()->first());
        }

        DB::beginTransaction();

        try {
            $announcement = $this->announcementRepository->update($data, $id);
        } catch (Exception $e) {
            DB::rollBack();
            Log::info($e->getMessage());

            throw new InvalidArgumentException('Unable to update announcement data');
        }

        DB::commit();

        return $announcement;
    }

    public function saveAnnouncementData($data)
    {
        $validator = Validator::make($data, [
            'title' => 'required',
            'body' => 'required'
        ]);

        if ($validator->fails()) {
            throw new InvalidArgumentException($validator->errors()->first());
        }

        $result = $this->announcementRepository->save($data);

        return $result;
    }

    public function getSeacrhResult($query)
    {
        return $this->announcementRepository->getResult($query);
    }
}
