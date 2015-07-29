<?php

class TraineeController extends AppController
{  
    const ADD_TRAINEE = 'add';
    const ADD_TRAINEE_END = 'add_end';
    const EDIT = 'edit';
    const EDIT_END = 'edit_end';

    const INDEX = 'index';
    const TRAINING_STATUS = 'training_status';
    const SKILL_SET = 'skill_set';
    const BATCH_YEAR = 'batch_year';
    const BATCH_TERM = 'batch_term';
    const COURSE_STATUS = 'course_status';

    public function index()
    {
        $index = Param::get('sort_by', self::INDEX);
        $trainee_id = Param::get('trainee_id');
        $data = Param::get('data');
        $term = Param::get('batch_term');
        $year = Param::get('batch_year');
        $training_status = Trainee::getTrainingStatus();
        $skill_set = Trainee::getSkillSet();
        $course_status = Trainee::getCourseStatus();
        $batch_year = Trainee::getBatchYear();
        $batch_term = Trainee::getBatchTerm();

        $page = 'index';

            switch ($index) {
                case self::INDEX:
                    $trainees = Trainee::getAll();
                    break;

                case self::TRAINING_STATUS:
                    $trainees = Trainee::getByTrainingStatus($data);
                    break;

                case self::SKILL_SET:
                    $trainees = Trainee::getBySkillSet($data);
                    break;

                case self::BATCH_YEAR:
                    $trainees = Trainee::getByBatchYear($data);
                    break;

                case self::BATCH_TERM:
                    list($year, $term) = explode('_', $data);
                    $trainees = Trainee::getByBatchTerm($term, $year);                
                    break;

                case self::COURSE_STATUS:
                    $trainees = Trainee::getByCourseStatus($data);
                    break;
                default:
                    throw new NotFoundException("{$index} is not found");
                    break;
            }
        
        $this->set(get_defined_vars());
        $this->render($page);
    }        

    public function add() 
    {      
        $params = array(
            'employee_id' => Param::get('employee_id'),
            'first_name' => Param::get('first_name'),
            'last_name' => Param::get('last_name'),
            'nickname' => Param::get('nickname'),
            'skill_set' => Param::get('skill_set'),
            'training_status' => Param::get('training_status'),
            'course_status' => Param::get('course_status'),
            'batch_year' => Param::get('batch_year'),
            'batch_term' => Param::get('batch_term'),
            'hired' => Param::get('hired'),
            'graduated' => Param::get('graduated')
        );

        $trainee = new Trainee($params);
        $page = Param::get(PAGE_NEXT, self::ADD_TRAINEE);
        
        switch ($page) {    
            case self::ADD_TRAINEE:
                break;
            
            case self::ADD_TRAINEE_END:
                try {
                    $trainee->add();
                } catch (ValidationException $e) {
                    $page = self::ADD_TRAINEE;
                }
                break;

            default:
                throw new NotFoundException("{$page} is not found");
                break;
        }
        $course_name = Param::get('name');
        $course_status = Trainee::getCourses($course_name);
        $this->set(get_defined_vars());
        $this->render($page);
    }

    public function view_trainee_profile()
    {
        $trainee_id = Param::get('trainee_id');
        $trainee = Trainee::getById($trainee_id);
        $this->set(get_defined_vars());
    }

    public function delete()
    { 
        $trainee_id = Param::get('trainee_id');
        $trainee = Trainee::delete($trainee_id);
        $this->set(get_defined_vars());
    }

    public function edit()
    {
        $trainee_id = Param::get('trainee_id');
        
        $params = array(
            'new_employee_id' => Param::get('employee_id'),
            'last_name' => Param::get('last_name'),
            'first_name' => Param::get('first_name'),
            'nickname' => Param::get('nickname'),
            'skill_set' => Param::get('skill_set'),
            'training_status' => Param::get('training_status'),
            'course_status' => Param::get('course_status'),
            'batch_year' => Param::get('batch_year'),
            'batch_term' => Param::get('batch_term'),
            'hired' => Param::get('hired'),
            'graduated' => Param::get('graduated'),
            'trainee_id' => $trainee_id
        );

        $trainee = new Trainee($params);
        $page = Param::get(PAGE_NEXT, self::EDIT);
        
        switch ($page) {
            case self::EDIT:
                break;
            case self::EDIT_END:
                try {
                    $trainee->edit($trainee_id);
                    $success = true;
                } catch (ValidationException $e) {
                    $page = self::EDIT;
                    $success = false;
                }

                if ($success) {
                    $trainee->employee_id = $trainee->new_employee_id;
                }

                break;
            default:
                throw new NotFoundException("{$page} is not found");
                break;
        }
        $sub_courses = Param::get('name');
        $course_status = Trainee::getCourses($sub_courses);
        $trainee_edit = Trainee::getById($trainee_id);
        $this->set(get_defined_vars());
        $this->render($page);
    }
}