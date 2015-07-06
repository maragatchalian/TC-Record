<?php

class Exam extends AppModel
{
	public function add()
    {
        if (!$this->validate()) {
            throw new ValidationException('Invalid Input!');
        }

        try {
            $db = DB::conn(); 
            $db->begin();
            
            $params = array( 
                'trainee_id' => $this->trainee_id,
                'score' => $this->score,
                'makeup_score' => $this->makeup_score,
                'date_taken' => $this->date_taken
            );

            $db->insert('exam', $params); 
            $db->commit();

        } catch(Exception $e) {
            $db->rollback();
            throw $e;
        }
    }

    public static function getAllTrainee($trainee_id)
    {
        return new self(object_to_array(Trainee::getById($trainee_id)));
    }
}