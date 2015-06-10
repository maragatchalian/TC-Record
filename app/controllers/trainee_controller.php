<?php

class TraineeController extends AppController
{  
    const ADD_TRAINEE = 'add_trainee';
    const ADD_TRAINEE_END = 'add_trainee_end';
    const EDIT = 'edit_trainee';
    const EDIT_END = 'edit_trainee_end';

    public function index()
    {
        $trainee_id = Param::get('trainee_id');     
        $trainees = Trainee::getAll($trainee_id);
        $this->set(get_defined_vars());   
    }

    public function view_trainee_profile()
    {
        $trainee_id = Param::get('trainee_id');   
        $trainee = Trainee::getById($trainee_id);
        $this->set(get_defined_vars());   
    }


    public function add_trainee() 
    {
        $params = array(
            'employee_id' => Param::get('employee_id'),
            'first_name' => Param::get('first_name'),
            'last_name' => Param::get('last_name'),
            'skill_set' => Param::get('skill_set'),
            'training_status' => Param::get('training_status'),
            'course_status' => Param::get('course_status'),
            'batch' => Param::get('batch'),
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
        $this->set(get_defined_vars());
        $this->render($page);
    }

    public function edit_trainee()
    {
        $trainees = Param::get('trainee_id');
        $trainee_id = Trainee::getById($trainees);
        
        $params = array(
            'employee_id' => Param::get('employee_id'),
            'last_name' => Param::get('last_name'),
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
                } catch (ValidationException $e) {
                    $page = self::EDIT;
                }
                break;
            default:
                throw new NotFoundException("{$page} is not found");
                break;
        }
        $trainee_edit = Trainee::getById($trainee_id);
        $this->set(get_defined_vars());
        $this->render($page);
    }

    public function delete()
    {
        $trainee_id = Trainee::get(Param::get('trainee_id'));
        $trainee_id->delete($trainee_id);
        $this->set(get_defined_vars());
    } 

    public function sort_by_training_status() 
    {
        $trainee_id = Param::get('trainee_id');
        $training_status = Trainee::getAll($trainee_id);
        $this->set(get_defined_vars());
        $this->render('index');
    }
}  
