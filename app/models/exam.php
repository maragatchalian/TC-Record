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
            
            $trainee_id = Param::get('trainee_id');
            $params = array( 
                'trainee_id' => $trainee_id,
                'course_name' => $this->course_name,
                'items' => $this->items,
                'score' => $this->score,
                'status' => $this->status,
                'makeup_score' => $this->makeup_score,
                'makeup_status' => $this->makeup_status,
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

    public static function getAll()
    {
        $exam = array();

        $db = DB::conn();
        $rows = $db->rows("SELECT * FROM exam");

        foreach ($rows as $row) {
            $exam[] = new self($row);
        }
        return $exam;
    }
}