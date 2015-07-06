<?php

class ExamController extends AppController
{
    const ADD_SCORE = 'add_score';
    const ADD_SCORE_END = 'add_score_end';

    public function view_score()
    {
        $trainee_id = Param::get('trainee_id');
        $trainee = Exam::getAllTrainee($trainee_id);
        $this->set(get_defined_vars());
    }

    public function add_score() 
    {
        $params = array(
            'score' => Param::get('score'),
            'makeup_score' => Param::get('makeup_score'),
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
        $this->set(get_defined_vars());
        $this->render($page);
    }
}