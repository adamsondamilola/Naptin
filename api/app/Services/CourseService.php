<?php

namespace App\Services;

use App\Repositories\CourseRepository;
use Exception;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;
use InvalidArgumentException;

class CourseService
{
    /**
     * @var $courseRepository
     */
    protected $courseRepository;

    /**
     * CourseService Constructor.
     *
     * @param CourseRepository $courseRepository.
     */
    public function __construct(CourseRepository $courseRepository)
    {
        $this->courseRepository = $courseRepository;
    }

    /**
     * Delete course by id.
     *
     * @param $id
     * @return String
     */
    public function deleteById($id)
    {
        DB::beginTransaction();

        try {
            $course = $this->courseRepository->delete($id);

        } catch (Exception $e) {
            DB::rollBack();
            Log::info($e->getMessage());

            throw new InvalidArgumentException('Unable to delete course data');
        }

        DB::commit();

        return $course;

    }

    /**
     * Get all courses.
     *
     * @return String
     */
    public function getAll()
    {
        return $this->courseRepository->getAll();
    }

    /**
     * Get course by id.
     *
     * @param $id
     * @return String
     */
    public function getById($id)
    {
        return $this->courseRepository->getById($id);
    }

    /**
     * Update course data
     * Store to DB if there are no errors.
     *
     * @param array $data
     * @return String
     */
    public function updateCourse($data, $id)
    {
        $validator = Validator::make($data, [
            'title' => 'bail|min:2',
            'description' => 'bail|max:255'
        ]);

        if ($validator->fails()) {
            throw new InvalidArgumentException($validator->errors()->first());
        }

        DB::beginTransaction();

        try {
            $course = $this->courseRepository->update($data, $id);

        } catch (Exception $e) {
            DB::rollBack();
            Log::info($e->getMessage());

            throw new InvalidArgumentException('Unable to update course data');
        }

        DB::commit();

        return $course;

    }

    /**
     * Validate course data.
     * Store to DB if there are no errors.
     *
     * @param array $data
     * @return String
     */
    public function saveCourseData($data)
    {
        $validator = Validator::make($data, [
            'title' => 'required',
            'description' => 'required'
        ]);

        if ($validator->fails()) {
            throw new InvalidArgumentException($validator->errors()->first());
        }

        $result = $this->courseRepository->save($data);

        return $result;
    }

    public function getSeacrhResult($query)
    {
        return $this->courseRepository->getResult($query);
    }

}

