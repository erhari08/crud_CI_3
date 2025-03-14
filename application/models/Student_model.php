<?php
 
class Student_model extends CI_Model{

    public function __construct() 
    {
        $this->load->library('upload');
    }

    public function getAllStudents()
    {
        $students = $this->db->get("students")->result();
        return $students;
    }

    public function create()
    {
        $config['upload_path']   = './uploads/';   
        $config['allowed_types'] = 'gif|jpg|png|pdf|docx|jpeg'; 
        $config['max_size']      = 2048;          
        $config['encrypt_name']  = TRUE;       
        $this->upload->initialize($config);
        if (!$this->upload->do_upload('file')) {  
            $error = array('error' => $this->upload->display_errors());
            $this->load->view('upload_form', $error);
        } else {
            $upload_data = $this->upload->data();
            $data = [
                'name' => $this->input->post('name'),
                'email' => $this->input->post('email'),
                'address' => $this->input->post('address'),
                'gender' => $this->input->post('gender'),
                'photo'=>$upload_data['file_name']
            ];
            $result = $this->db->insert('students', $data);
            return $result;
        }
    }

    public function edit($id)
    {
        $student = $this->db->get_where('students', ['id' => $id ])->row();
        return $student;
    }
 
    public function update($id) 
    {
      
        $config['upload_path']   = './uploads/';   
        $config['allowed_types'] = 'gif|jpg|png||jpeg'; 
        $config['max_size']      = 2048;          
        $config['encrypt_name']  = TRUE;       
        $this->upload->initialize($config);
        if (!$this->upload->do_upload('file')) {  
            // $error = array('error' => $this->upload->display_errors());
            // $this->load->view('upload_form', $error);
            $data = [
                'name' => $this->input->post('name'),
                'email' => $this->input->post('email'),
                'address' => $this->input->post('address'),
                'gender' => $this->input->post('gender'),
            ];
            $result = $this->db->where('id',$id)->update('students',$data);
            return $result;
        } else {
            $upload_data = $this->upload->data();
            $data = [
                'name' => $this->input->post('name'),
                'email' => $this->input->post('email'),
                'address' => $this->input->post('address'),
                'gender' => $this->input->post('gender'),
                'photo'=>$upload_data['file_name']
            ];
            $result = $this->db->where('id',$id)->update('students',$data);
            return $result;
        }
      
                 
    }
 
    public function delete($id)
    {
        $result = $this->db->delete('students', array('id' => $id));
        return $result;
    }



}