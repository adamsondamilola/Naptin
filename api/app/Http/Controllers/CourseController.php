<?php

namespace App\Http\Controllers;

use Exception;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Services\CourseService;

class CourseController extends Controller
{
    /**
     * @var courseService
     */
    protected $courseService;

    /**
     * CourseController Constructor
     *
     * @param CourseService $courseService
     *
     */
    public function __construct(CourseService $courseService)
    {
        $this->courseService = $courseService;
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $result = ['status' => 200];

        try {
            $result['data'] = $this->courseService->getAll();
        } catch (Exception $e) {
            $result = [
                'status' => 500,
                'error' => $e->getMessage()
            ];
        }

        return response()->json($result, $result['status']);

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->only([
            'trainer_id',
            'program_type_id',
            'course_title',
            'description',
            'course_image',
            'program_category',
            'advert_code',
            'start_date',
            'duration',
            'cost',
            'no_of_installments',
            'min_deposit',
            'pub_status',
            'pub_date',
            'ad_close_date',
            'pay_close_date',
            'projected_start_date',
            'actual_start_date',
            'projected_end_date',
            'actual_end_date',
        ]);

        $result = ['status' => 200];

        try {
            $result['data'] = $this->courseService->saveCourseData($data);
        } catch (Exception $e) {
            $result = [
                'status' => 500,
                'error' => $e->getMessage()
            ];
        }

        return response()->json($result, $result['status']);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $result = ['status' => 200];

        try {
            $result['data'] = $this->courseService->getById($id);
        } catch (Exception $e) {
            $result = [
                'status' => 500,
                'error' => $e->getMessage()
            ];
        }
        return response()->json($result, $result['status']);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data = $request->only([
            'trainer_id',
            'program_type_id',
            'course_title',
            'description',
            'course_image',
            'program_category',
            'advert_code',
            'start_date',
            'duration',
            'cost',
            'no_of_installments',
            'min_deposit',
            'pub_status',
            'pub_date',
            'ad_close_date',
            'pay_close_date',
            'projected_start_date',
            'actual_start_date',
            'projected_end_date',
            'actual_end_date',
        ]);

        $result = ['status' => 200];

        try {
            $result['data'] = $this->courseService->updateCourse($data, $id);

        } catch (Exception $e) {
            $result = [
                'status' => 500,
                'error' => $e->getMessage()
            ];
        }

        return response()->json($result, $result['status']);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $result = ['status' => 200];

        try {
            $result['data'] = $this->courseService->deleteById($id);
        } catch (Exception $e) {
            $result = [
                'status' => 500,
                'error' => $e->getMessage()
            ];
        }
        return response()->json($result, $result['status']);
    }

    public function search($query)
    {
        $result = ['status' => 200];

        try {
            $result['data'] = $this->courseService->getSeacrhResult($query);
        } catch (Exception $e) {
            $result = [
                'status' => 500,
                'error' => $e->getMessage()
            ];
        }
        return response()->json($result, $result['status']);
    }
}
