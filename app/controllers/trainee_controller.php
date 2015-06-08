<?php

class TraineeController extends AppController
{  
    const ADD_TRAINEE = 'add_trainee';
    const ADD_TRAINEE_END = 'add_trainee_end';

    public function index()
    {
        
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

}