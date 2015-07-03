<?php

class CourseController extends AppController
{
    const ADD_COURSE = 'add_course';
    const ADD_COURSE_END = 'add_course_end';
    const EDIT = 'edit_course';
    const EDIT_END = 'edit_course_end';

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
            'category' => Param::get('category')
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

    public function edit_course()
    {
        $course_id = Param::get('course_id');   
        $params = array(
            'category' => Param::get('category'),
            'name' => Param::get('name'),
            'course_id' => $course_id
        );

        $course = new Course($params);
        $page = Param::get(PAGE_NEXT, self::EDIT);
        
        switch ($page) {
            case self::EDIT:
                break;
            case self::EDIT_END:
                try {
                    $course->edit($course_id);
                } catch (ValidationException $e) {
                    $page = self::EDIT;
                }
                break;
           
            default:
                throw new NotFoundException("{$page} is not found");
                break;
        }
        $course_edit = Course::getById($course_id);
        $this->set(get_defined_vars());
        $this->render($page);
    }

    public function delete_course() 
    { 
        $course_id = Param::get('course_id');
        $course = Course::delete($course_id);
        $this->set(get_defined_vars());
    }

    public function view_course_details()
    {
        $course_id = Param::get('course_id');   
        $course = Course::getById($course_id);
        $this->set(get_defined_vars());   
    }
}