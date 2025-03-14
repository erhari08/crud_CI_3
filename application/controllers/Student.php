<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Student extends CI_Controller {

    public function __construct() {
        parent::__construct(); 
        $this->load->library('form_validation');
        $this->load->library('upload');
        $this->load->model('Student_model');
     }

     public function index()
     {
         $data['title'] = "Students Crud";
         $data['students'] = $this->Student_model->getAllStudents();
         $this->load->view('students/index',$data);
     }

     public function getallstudents(){
    
log_message('error', 'This is an error log');
log_message('debug', 'This is a debug log');
log_message('info', 'This is an info log');
        $students = $this->Student_model->getAllStudents();
        $data = '';
        if ($students) {
            foreach ($students as $key =>$student) {
                // print_r($student);
                // die();
                $data .= '<tr>
                <td>'.($key+1).'</td>
                <td>'.$student->name.'</td>
                <td>'.$student->email.'</td>
                <td>'.$student->address.'</td>
                <td>'.$student->gender.'</td>
                <td><img src="uploads/' . $student->photo . '" class="img-fluid card-img-top"></td>
                <td><button type="button" class="btn btn-warning" onclick="editusers('.$student->id.')">Edit</button>
<button type="button" class="btn btn-danger" onclick="delusers('.$student->id.')">Delete</button></td>
                ';
            }
            return $this->output->set_output(json_encode([
                'error' => false,
                'message' => $data
            ]));
        } else {
            return $this->output->set_output(json_encode([
                'error' => false,
                'message' => '<div class="text-secondary text-center fw-bold my-5">No posts found in the database!</div>'
            ]));
        }
    }

    public function adduser(){

        $this->form_validation->set_rules('name', 'name', 'required');
        $this->form_validation->set_rules('email', 'email', 'required');
        $this->form_validation->set_rules('address', 'address', 'required');
        $this->form_validation->set_rules('gender', 'gender', 'required');

        if (!$this->form_validation->run())
        {
            return $this->output->set_output(json_encode([
                'error' => true,
                'message' => validation_errors()
            ]));
        } else {
           $this->Student_model->create();
           return $this->output->set_output(json_encode([
            'error' => false,
            'message' => "success"
        ]));
        }
    }

    public function edit($id)
    {
      $student = $this->Student_model->edit($id);
      return $this->output->set_output(json_encode([
        'error' => false,
        'data' =>$student
      ]));
    }
   

    public function update($id)
    {
        
        $this->form_validation->set_rules('name', 'name', 'required');
        $this->form_validation->set_rules('email', 'email', 'required');
        $this->form_validation->set_rules('address', 'address', 'required');
        $this->form_validation->set_rules('gender', 'gender', 'required');

        if (!$this->form_validation->run())
        {
            return $this->output->set_output(json_encode([
                'error' => true,
                'message' => validation_errors()
            ]));
        } else {
           $this->Student_model->update($id);
           return $this->output->set_output(json_encode([
            'error' => false,
            'message' => "success"
        ]));
        }
   
   
    }
   
   
    
    public function delete($id)
    {
      $this->Student_model->delete($id);
      return $this->output->set_output(json_encode([
        'error' => false,
        'message' => "success"
    ]));
    }
    
}