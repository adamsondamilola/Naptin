<?php

namespace App\Repositories;

use App\Models\Course;

class CourseRepository
{
    /**
    * @var Course
    */
    protected $course;

    /**
    * CourseTepository Constructor
    *
    * @param Course $course
    */
    public function __construct(Course $course)
    {
        $this->course = $course;
    }

    /**
     * Get all courses.
     *
     * @return Course $course
     */
    public function getAll()
    {
        return $this->course->paginate(15);
    }

    /**
     * Get course by id
     *
     * @param $id
     * @return mixed
     */
    public function getById($id)
    {
        return $this->course
            ->where('id', $id)
            ->get();
    }

    /**
     * Save Course
     *
     * @param $data
     * @return Course
     */
    public function save($data)
    {
        $course = new $this->course;

        $course->title = $data['title'];
        $course->description = $data['description'];

        $course->save();

        return $course->fresh();
    }

    /**
     * Update Course
     *
     * @param $data
     * @return Course
     */
    public function update($data, $id)
    {

        $course = $this->course->find($id);

        $course->title = $data['title'];
        $course->description = $data['description'];

        $course->update();

        return $course;
    }

    /**
     * Update Course
     *
     * @param $data
     * @return Course
     */
    public function delete($id)
    {

        $course = $this->course->find($id);
        $course->delete();

        return $course;
    }

    public function getResult($query)
    {
        return $this->course
            ->where('course_title', 'LIKE', '%'.$query.'%')
            ->orWhere('description', 'LIKE', '%'.$query.'%')
            ->get();
    }
}
