<?php
class Common_model extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }

    function fetchData($select = "*", $table_name, $data = array())
    {
        $this->db->select($select);
        $this->db->from($table_name);
        $this->db->where($data);
        $result = $this->db->get();
        if($result->num_rows() >= 1)
            return $result->result();
        else
            return false;
    }

    function fetchDataLike($select = "*", $table_name, $data_input, $group = array())
    {
        $this->db->select($select);
        $this->db->from($table_name);

        $count = 0;
        foreach ($data_input as $key => $value) {
            if ($count === 0) {
                $this->db->like($key, $value);
            } else {
                $this->db->or_like($key, $value);
            }

            $count++;
        }
        
        if (!empty($group)) {
            $this->db->group_by($group);
        }

        $result = $this->db->get();
        if($result->num_rows() >= 1) {
            return $result->result();
        }
        else {
            return false;
        }
    }

    function fetchAllData($select = "*", $table_name, $data = array(), $group = array(), $order = "", $limit = 1000, $offset = 0)
    {
        $this->db->select($select);
        $this->db->from($table_name);
        $this->db->where($data);
        $this->db->group_by($group);
        $this->db->order_by($order);
        $this->db->limit($limit, $offset);
        $result = $this->db->get();
        if($result->num_rows() > 0)
            return $result->result();
        else
            return false;
    }

    function fetchAllDataJoin($select = "*", $table_name, $join_table_name, $join_condition, $join_type, $data = array(), $group = array(), $order = "", $limit = 1000, $offset = 0)
    {
        $this->db->select($select);
        $this->db->from($table_name);
        $this->db->join($join_table_name, $join_condition, $join_type);
        $this->db->where($data);
        $this->db->group_by($group);
        $this->db->order_by($order);
        $this->db->limit($limit, $offset);
        $result = $this->db->get();
        if($result->num_rows() > 0)
            return $result->result();
        else
            return false;
    }

    function insertData($table_name, $data)
    {
        if($this->db->insert($table_name, $data))
            return $this->db->insert_id();
        else
            return false;
    }

    function updateData($table_name, $update_data, $where)
    {
        $this->db->update($table_name, $update_data, $where);
        if($this->db->affected_rows() > 0)
            return true;
        else
            return false;
    }

    function deleteData($table_name, $data = array())
    {
        $this->db->delete($table_name, $data);
        if($this->db->affected_rows() > 0)
            return true;
        else
            return false;
    }

    function registerUserDB($table_name, $data)
    {
        $sql = $this->db->select('id')->from($table_name)->where('email', $data['email'])->get();
        if($sql->num_rows() > 0)
            return "This Email already registered, please login to continue or use different email to continue creating a new account";
        else
        {
            if($this->db->insert($table_name, $data))
                return $this->db->insert_id();
            else
                return false;
        }
    }

    function fetchUserDashboardCountAll($table_name, $user_id)
    {
        $query = $this->db->query("SELECT COUNT(id) AS total_count FROM $table_name WHERE user_id=$user_id");
        return $query->result();
    }

    function fetchUserDashboardCountAllJoin($table_name_1, $table_name_2, $join_column, $user_id)
    {
        $query = $this->db->query("SELECT COUNT($table_name_1.id) AS total_count FROM $table_name_1 JOIN $table_name_2 ON $table_name_2.id=$table_name_1.$join_column WHERE $table_name_2.user_id=$user_id");
        return $query->result();
    }

    function fetchUserDashboardCountActive($table_name, $user_id)
    {
        $query = $this->db->query("SELECT COUNT(id) AS total_count FROM $table_name WHERE user_id=$user_id AND `status`=1");
        return $query->result();
    }
}