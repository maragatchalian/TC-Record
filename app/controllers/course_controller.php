<?php

class CourseController extends AppController
{
    const ADD_COURSE = 'add_course';
    const ADD_COURSE_END = 'add_course_end';

    public function index()
    {
        $categories = Course::getDistinctCategory();
        $course_id = Param::get('course_id');
        $courses = Course::getByCategory($course_id);
        $this->set(get_defined_vars());
    }

    public function add_course()
    {
        $params = array(
            'name' => Param::get('name'),
            'category' => Param::get('category'),
        );

        $course = new Course($params);
        $page = Param::get(PAGE_NEXT, self::ADD_COURSE);
        
        switch ($page) {    
            case self::ADD_COURSE:
                break;
            
            case self::ADD_COURSE_END:
                try {
                    $course->add();
                } catch (ValidationException $e) {
                    $page = self::ADD_COURSE;
                }
                break;

            default:
                throw new NotFoundException("{$page} is not found");
                break;
        }
        $this->set(get_defined_vars());
        $this->render($page);
    }

}