<?php
class Student extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
    }

    function display_students()
    {
        $query = $this->db->select('*')->get('students');
        return $query->result();
    }

    function display_course()
    {
        $query = $this->db->select('*')->get('course');
        return $query->result();
    }

    function enroll($data)
    {
        $result = $this->db->insert('enroll', $data);
        return $result;
    }

    function get_course_details($id)
    {
        $result = $this->db->select('course.course_name,students.student_name')->join('course', 'course.course_id = enroll.course_id')->join('students', 'students.student_id = enroll.student_id')->where('enroll.course_id', $id)->get('enroll')->result_array();
        return $result;
    }

    function stu_status($id)
    {
        $result = $this->db->select('course.course_id')->join('course', 'course.course_id = enroll.course_id')->where('enroll.student_id', $id)->get('enroll')->result_array();
        $data = [];
        for ($i = 0; $i < count($result); $i++) {
            $data[] = $result[$i]["course_id"];
        }
        return $data;
    }
}
// SELECT course.course_name FROM `enroll` JOIN course ON course.course_id = enroll.course_id WHERE enroll.student_id = 1;