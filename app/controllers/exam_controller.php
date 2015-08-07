<?php

class ExamController extends AppController
{
    const ADD_SCORE = 'add_score';
    const ADD_SCORE_END = 'add_score_end';
    const EDIT = 'edit_score';
    const EDIT_END = 'edit_score_end';

    public function view_trainee_score()
    {
        $trainee_id = Param::get('trainee_id');
        $trainee = Exam::getAllTrainee($trainee_id);
        $exam = Exam::getAllByTraineeId($trainee_id);
        $this->set(get_defined_vars());
    }

    public function add_score() 
    {
        $params = array(
            'course_name' => Param::get('course_name'),
            'course_type' => Param::get('course_type'),
            'exam_type' => Param::get('exam_type'),
            'items' => Param::get('items'),
            'score' => Param::get('score'),
            'status' => Param::get('status'),
            'date_taken' => Param::get('date_taken')
        );

        $exam = new Exam($params);
        $page = Param::get(PAGE_NEXT, self::ADD_SCORE);
        
        switch ($page) {    
            case self::ADD_SCORE:
                break;
            
            case self::ADD_SCORE_END:
                try {
                    $exam->add();
                } catch (ValidationException $e) {
                    $page = self::ADD_SCORE;
                }
                break;

            default:
                throw new NotFoundException("{$page} is not found");
                break;
        }
        $sub_courses = Param::get('name');
        $course_status = Exam::getCourses($sub_courses);
        $this->set(get_defined_vars());
        $this->render($page);
    }

    public function edit_score()
    {
        $exam_id = Param::get('exam_id');
        
        $params = array(
            'course_name' => Param::get('course_name'),
            'items' => Param::get('items'),
            'score' => Param::get('score'),
            'status' => Param::get('status'),
            'makeup_score' => Param::get('makeup_score'),
            'makeup_status' => Param::get('makeup_status'),
            'date_taken' => Param::get('date_taken'),
            'exam_id' => $exam_id
        );

        $exam = new Exam($params);
        $page = Param::get(PAGE_NEXT, self::EDIT);
        
        switch ($page) {
            case self::EDIT:
                break;
            case self::EDIT_END:
                try {
                    $exam->edit($exam_id);
                } catch (ValidationException $e) {
                    $page = self::EDIT;
                }
                break;
            default:
                throw new NotFoundException("{$page} is not found");
                break;
        }
        $sub_courses = Param::get('name');
        $course_status = Exam::getCourses($sub_courses);
        $exam_edit = Exam::getById($exam_id);
        $this->set(get_defined_vars());
        $this->render($page);
    }
}